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

  //APPLICATION
  public function cLogin()
  {
    $data['webconf'] = $this->getDataRow('webconf', 'id', 1);
    return $data;
  }

  public function loginValidation()
  {
    if($data['status'] = $this->getNumRow2('account', 'username', $this->input->post('username'), 'password', md5($this->input->post('password')))==1)
    {$data['session'] = $this->getSession($this->getDataRow('account', 'username', $this->input->post('username'))->id);}
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
    if ($this->getNumRow2('account', 'email', $this->input->post('email'))>0) {
      $newPassword = rand(100000, 999999);
      $this->updateData('account', 'email', $this->input->post('email'), 'password', md5($newPassword));
      $this->sentEmail($this->input->post('email'), $this->getDataRow('account', 'email', $this->input->post('email'))->fullname, 'Reset Password', 'Password anda '.$newPassword);
    }
  }
}


 ?>
