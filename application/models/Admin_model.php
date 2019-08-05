<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model
{

  function __construct()
  {

  }

  //CORE
  public function getDataRow($table, $whereVar, $whereVal)
  {
    return $this->db->get_where($table, $where = array($whereVar => $whereVal))->row();
  }

  public function getNumRow($table, $whereVar, $whereVal)
  {
    return $this->db->get_where($table, $where = array($whereVar => $whereVal))->num_rows();
  }


  public function getAllData($table)
  {
    return $this->db->get($table)->result();
  }

  public function updateData($table, $whereVar, $whereVal, $setVar, $setVal)
  {
    $this->db->where($where = array($whereVar => $whereVal));
    return $this->db->update($table, $data = array($setVar=> $setVal));
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

  //APPLICATION
  public function cWebconf()
  {
    $data['webconf'] = $this->getDataRow('webconf', 'id', 1);
    $data['view_name'] = 'webconf';
    return $data;
  }


  public function updateInfo()
  {
    $this->db->where($where = array('id' => 1));
    if($a = $this->db->update('webconf',$data = array('office_name' => $this->input->post('office_name'), 'office_address' => $this->input->post('office_address'), 'office_phone_number' => $this->input->post('office_phone_number'))))
    {notify('Update Berhasil', 'Proses perubahan informasi umum berhasil dilakukan', 'success', 'fas fa-sign-language', null);}
  }

  public function updateEmail()
  {
    $this->db->where($where = array('id' => 1));
    if($this->db->update('webconf',$data = array('host' => $this->input->post('host'), 'crypto' => $this->input->post('crypto'), 'port' => $this->input->post('port'), 'email' => $this->input->post('email'), 'password' => $this->input->post('password'))))
    {notify('Update Berhasil', 'Proses perubahan email berhasil dilakukan', 'success', 'fas fa-sign-language', null);}
  }

  public function cCategory()
  {
    $data['category'] = $this->getAllData('category');
    $data['detailCategory'] = $this->getAllData('category');
    $data['view_name'] = 'category';
    $data['webconf'] = $this->getDataRow('webconf', 'id', 1);
    return $data;
  }

  public function createCategory()
  {
    $data = array(
    'category' => $this->input->post('category'),
    'description' => $this->input->post('description'),
    'status' => 1,
    'id_admin' => $this->session->userdata['id']
    );
    $this->db->insert('category', $data);
    $this->updateData('category', 'id', $this->db->insert_id(), 'image', 'category_'.$this->db->insert_id().$this->uploadFile('category_'.$this->db->insert_id(), 'jpg|png|jpeg')['ext']);
    notify('Berhasil', 'Kategori berhasil ditambahkan', 'success', 'fas fa-plus', 'category');
  }

  public function deleteCategory()
  {
    if (md5($this->input->post('password'))==$this->session->userdata['password']){$this->updateData('category', 'id', $this->input->post('id'), 'status', 0); notify('Berhasil Terhapus', 'Kategori berhasil dihapus ', 'success', 'fas fa-trash', null);}
    else {notify('Gagal', 'Proses penghapusan kategori gagal, password yang anda masukan tidak cocok', 'danger', 'fas fa-user-times', null);}
  }

  public function updateCategory()
  {
    $this->updateData('category', 'id', $this->input->post('id'), 'name', $this->input->post('name'));
    $this->updateData('category', 'id', $this->input->post('id'), 'description', $this->input->post('description'));
    {notify('Sukses', 'Proses update kategori '.$this->input->post('name').' berhasil dilakukan','success','fas fa-check',null);}
  }

  public function recoverCategory()
  {
    $this->updateData('category', 'id', $this->input->post('id'), 'status', 1); notify('Berhasil kembali', 'Kategori berhasil dikembalikan ', 'success', 'fas fa-trash', null);
  }

  public function cClassifier()
  {
    $data['classifier'] = $this->getAllData('classifier');
    $data['view_name'] = 'classifier';
    $data['webconf'] = $this->getDataRow('webconf', 'id', 1);
    return $data;
  }

  public function createClassifier()
  {
    $data = array('classifier' => $this->input->post('classifier'), 'description' => $this->input->post('description'), 'classifier_code' => $this->input->post('classifier_code'), 'id_admin' => $this->session->userdata['id'], 'status' => 1);
    $this->db->insert('classifier', $data);
    notify('Berhasil', 'Pembuatan algoritma klasifikasi '.$this->input->post('classifier').' berhasil dilakukan ', 'success', 'fas fa-check', 'classifier');
  }

  public function deleteClassification()
  {
    if (md5($this->input->post('password'))==$this->session->userdata['password']){$this->updateData('classifier', 'id', $this->input->post('id'), 'status', 0); notify('Berhasil Terhapus', 'klasifikasi berhasil dihapus ', 'success', 'fas fa-trash', null);}
    else {notify('Gagal', 'Proses penghapusan klasifikasi gagal, password yang anda masukan tidak cocok', 'danger', 'fas fa-user-times', null);}
  }

  public function updateClassifier()
  {
    $data = array('classifier' => $this->input->post('classifier'), 'description' => $this->input->post('description'), 'classifier_code' => $this->input->post('classifier_code'), 'id_admin' => $this->session->userdata['id'], 'status' => 1);
    $this->db->where($where = array('id' => $this->input->post('id')));
    $this->db->update('classifier', $data);
    {notify('Sukses', 'Proses update klasifikasi '.$this->input->post('classifier').' berhasil dilakukan','success','fas fa-check',null);}
  }

  public function recoverClassifier()
  {
    $this->updateData('classifier', 'id', $this->input->post('id'), 'status', 1); notify('Berhasil kembali', 'Klasifikasi berhasil dikembalikan ', 'success', 'fas fa-trash', null);
  }

  public function uploadWeka()
  {
    $this->uploadFile('weka', '*');
    notify('Berhasil', 'Proses upload API berhasil', 'success', 'fas fa-check', null);
  }

  public function cAccount($keyword)
  {
    //    $data['account'] = $this->getAllData('account');
    $data['account'] = $this->db->query('select * from account where username LIKE "%'.$keyword.'%" or fullname LIKE "%'.$keyword.'%" or email LIKE "%'.$keyword.'%"')->result();
    $data['view_name'] = 'account';
    $data['webconf'] = $this->getDataRow('webconf', 'id', 1);
    return $data;
  }

  public function addAnalist()
  {
    $password = rand(100000,999999);
    $data = array(
    'username' => $this->input->post('username'),
    'email' => $this->input->post('email'),
    'display_picture' => 'no.jpg',
    'status' => 1,
    'password' => md5($password),
    'role' => 'analist',
    'id_pic' => $this->session->userdata['id'],
    );
    $this->db->insert('account', $data);
    $content = 'Bersamaan dengan email ini kami sampaikan bahwa akun analist anda berhasil diproses, silahkan login dengan username '.$this->input->post('username').' dan password '.$password;
    $this->sentEmail($this->input->post('email'), $this->input->post('username'), 'Selamat datang analist baru', $content);
    notify('Berhasil', 'Proses pembuatan akun analist berhasil dilakukan ', 'success','fas fa-user','account');
  }

  public function deleteStock()
  {
    if (md5($this->input->post('password'))==$this->session->userdata['password']){$this->updateData('stock', 'id', $this->input->post('id'), 'status', 0); notify('Berhasil Terhapus', 'saham berhasil dihapus ', 'success', 'fas fa-trash', null);}
    else {notify('Gagal', 'Proses penghapusan saham gagal, password yang anda masukan tidak cocok', 'danger', 'fas fa-user-times', null);}
  }

  public function deleteAccount()
  {
    //    var_dump($this->input->post('id'));die;
    if (md5($this->input->post('password'))==$this->session->userdata['password']){$this->updateData('account', 'id', $this->input->post('id'), 'status', 0); notify('Berhasil Terhapus', 'akun berhasil dihapus ', 'success', 'fas fa-trash', null);}
    else {notify('Gagal', 'Proses penghapusan akun gagal, password yang anda masukan tidak cocok', 'danger', 'fas fa-user-times', null);}
  }

  public function recoverAccount()
  {
    if (md5($this->input->post('password'))==$this->session->userdata['password']){$this->updateData('account', 'id', $this->input->post('id'), 'status', 1); notify('Berhasil Dikembalikan', 'akun berhasil kembali ', 'success', 'fas fa-user', null);}
    else {notify('Gagal', 'Proses pengembalian akun gagal, password yang anda masukan tidak cocok', 'danger', 'fas fa-user-times', null);}
  }

  public function cPricing()
  {
    $data['pricing'] = $this->getAllData('pricing');
    $data['view_name'] = 'pricing';
    $data['webconf'] = $this->getDataRow('webconf', 'id', 1);
    return $data;
  }

  public function addPricing()
  {
    if ($this->getNumRow('pricing', 'package', $this->input->post('package'))==0) {
      $data = array(
      'package' => $this->input->post('package'),
      'duration' => $this->input->post('duration'),
      'price' => $this->input->post('price'),
      'id_admin' => $this->session->userdata['id']
      );
      $this->db->insert('pricing', $data);
      notify('Berhasil', 'Proses penambahan paket biaya berhasil', 'success', 'fas fa-plus', 'pricing');
    } else{
      notify('Gagal', 'Proses penambahan paket biaya gagal dilakukan, paket sudah pernah dibuat sebelumnya', 'danger', 'fas fa-plus', 'pricing');
    }
  }

  public function updatePricing()
  {
    $data = array('package' => $this->input->post('package'), 'price' => $this->input->post('price'), 'duration' => $this->input->post('duration'));
    $this->db->where($where = array('id' => $this->input->post('id')));
    $this->db->update('pricing', $data);
    notify('Berhasil', 'Proses update paket biaya berhasil', 'success', 'fas fa-check', null);
  }

  public function deletePricing()
  {
    $this->updateData('pricing', 'id', $this->input->post('id'), 'status', 0);
    notify('Berhasil', 'Proses hapus paket biaya berhasil', 'success', 'fas fa-trash', null);
  }

  public function recoverPricing()
  {
    $this->updateData('pricing', 'id', $this->input->post('id'), 'status', 1);
    notify('Berhasil', 'Proses recover paket biaya berhasil', 'success', 'fas fa-check', null);

  }


}


?>
