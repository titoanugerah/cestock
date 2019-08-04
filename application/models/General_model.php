<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
*
*/
class General_model extends CI_Model
{

  function __construct()
  {

  }

  //CORE
  public function getDataRow($table, $whereVar, $whereVal)
  {
    return $this->db->get_where($table, $where = array($whereVar => $whereVal))->row();
  }

  public function getNumRow($table, $whereVar1, $whereVal1)
  {
    return $this->db->get_where($table, $where = array($whereVar1 => $whereVal1))->num_rows();
  }

  public function getNumRow2($table, $whereVar1, $whereVal1, $whereVar2, $whereVal2)
  {
    return $this->db->get_where($table, $where = array($whereVar1 => $whereVal1,$whereVar2 => $whereVal2))->num_rows();
  }

  public function updateData($table, $whereVar, $whereVal, $setVar, $setVal)
  {
    $this->db->where($where = array($whereVar => $whereVal));
    return $this->db->update($table, $data = array($setVar=> $setVal));
  }

  //FUNCTIONAL
  public function getSession($id)
  {
    $account = $this->getDataRow('account', 'id', $id);
    $session = array(
      'login' => true,
      'id' => $account->id,
      'username' => $account->username,
      'password' => $account->password,
      'email' => $account->email,
      'fullname' => $account->fullname,
      'display_picture' => $account->display_picture,
      'status' => $account->status,
      'role' => $account->role,
      'id_pic' => $account->id_pic,
      'date_created' => $account->date_created,
      'type' => $account->type
      );
      return $session;
    }

    public function sentEmail($to, $fullname, $subject, $content)
    {
      $account = $this->getDataRow('webconf', 'id', 1);
      $config = [
      'protocol' => 'sentmail',
      'smtp_host' => $account->host,
      'smtp_user' => $account->email,
      'smtp_pass' => $account->password,
      'smtp_crypto' => $account->crypto,
      'charset' => 'utf-8',
      'crlf' => 'rn',
      'newline' => "\r\n",
      'smtp_port' => $account->port
      ];
      $this->load->library('email', $config);
      $this->email->from($account->email);
      $this->email->to($to);
      $this->email->subject($subject);
      $this->email->message('
      Yth. '.$fullname.'
      Di tempat.

      '.$content.'

      Atas perhatiannya kami ucapkan terima kasih.

      Admin
      ');
      $sent = $this->email->send();
      error_reporting(0);
    }

    public function uploadFile($filename,$allowedFile)
    {
      $config['upload_path'] = APPPATH.'../assets/upload/';
      $config['overwrite'] = TRUE;
      $config['file_name']     =  str_replace(' ','_',$filename);
      $config['allowed_types'] = $allowedFile;
      $this->load->library('upload', $config);
      if (!$this->upload->do_upload('fileUpload')) {
        $upload['status']=0;
        $upload['message']= "Mohon maaf terjadi error saat proses upload : ".$this->upload->display_errors();
      } else {
        $upload['status']=1;
        $upload['message'] = "File berhasil di upload";
        $upload['ext'] = $this->upload->data('file_ext');
      }
      $this->session->set_flashdata('message', $upload['message']);
      return $upload;
    }

    //APPLICATION
    public function cLogin()
    {
      $data['webconf'] = $this->getDataRow('webconf', 'id', 1);
      return $data;
    }

    public function loginValidation()
    {
      if($data['status'] = $this->getNumRow2('account', 'username', $this->input->post('username'), 'password', md5($this->input->post('password')))==1)
      {
        $data['session'] = $this->getSession($this->getDataRow('account', 'username', $this->input->post('username'))->id);
        notify('Berhasil', 'Selamat datang '.$this->input->post('username'), 'success', 'fas fa-check', null);
      }
      else { $this->session->set_flashdata('notify', 'Maaf kombinasi yang anda masukan salah, silahkan coba lagi');}
      return $data;
    }

    public function cForgotPassword()
    {
      $data['webconf'] = $this->getDataRow('webconf', 'id', 1);
      return $data;
    }

    public function resetPassword()
    {
      if ($this->getNumRow('account', 'email', $this->input->post('email'))>0) {
        $newPassword = rand(100000, 999999);
        $this->updateData('account', 'email', $this->input->post('email'), 'password', md5($newPassword));
        $this->sentEmail($this->input->post('email'), $this->getDataRow('account', 'email', $this->input->post('email'))->fullname, 'Reset Password', 'Password anda '.$newPassword);
      } else {
        $this->session->set_flashdata('notify', 'Maaf email tidak tersedia, silahkan coba lagi');
      }
    }

    public function cCreateUser()
    {
      $data['webconf'] = $this->getDataRow('webconf', 'id', 1);
      return $data;
    }

    public function createUser()
    {
      if ($this->getDataRow('account', 'email', $this->input->post('email'))==0) {
        // code...
        $newPassword = rand(100000, 999999);
        $data = array(
        'username' => $this->input->post('username'),
        'email' => $this->input->post('email'),
        'password' => md5($newPassword),
        'display_picture' => 'no.jpg',
        'status' => 1,
        'role' => 'user',
        'type' => 'default'
        );
        $this->db->insert('account', $data);
        $content = 'Kami beritahukan bahwa akun anda berhasil dibuat, silahkan login dengan password '.$newPassword;
        $this->sentEmail($this->input->post('email'), $this->input->post('username'), $content);
        $this->session->set_flashdata('notify', 'Akun berhasil dibuat, silahkan cek email anda');
      } else {
        $this->session->set_flashdata('notify', 'Akun sudah tersedia');
      }
    }

    public function cDashboard()
    {
      $data['webconf'] = $this->getDataRow('webconf', 'id', 1);
      $data['view_name'] = 'dashboard';
      return $data;
    }

    public function cProfile()
    {
      $data['webconf'] = $this->getDataRow('webconf', 'id', 1);
      $data['view_name'] = 'profile';
      return $data;
    }

    public function updateAccount()
    {
      if ($this->input->post('password')=='') {
        $data = array(
          'username' => $this->input->post('username'),
          'email' => $this->input->post('email'),
          'fullname' => $this->input->post('fullname'),
        );
      } else {
        $data = array(
          'username' => $this->input->post('username'),
          'email' => $this->input->post('email'),
          'fullname' => $this->input->post('fullname'),
          'password' => md5($this->input->post('password'))
        );

      }
      $this->db->where($where = array('id' => $this->session->userdata['id']));
      $this->db->update('account', $data);
      notify('Berhasil', 'Update profil pengguna berhasil dilakukan', 'success', 'fas fa-check', null);
      return $this->getSession($this->session->userdata['id']);
    }

    public function uploadDP()
    {
      $this->updateData('account', 'id', $this->session->userdata['id'], 'display_picture', 'display_picture_'.$this->session->userdata['id'].$this->uploadFile('display_picture_'.$this->session->userdata['id'],'jpg|jpeg|png')['ext']);
      return $this->getSession($this->session->userdata['id']);
    }

    public function cDetailAccount($id)
    {
      $data['account'] = $this->getDataRow('account', 'id', $id);
      $data['view_name'] = 'detailAccount'.ucfirst($data['account']->role);
      $data['webconf'] = $this->getDataRow('webconf', 'id', 1);
      return $data;

    }

  }



  ?>
