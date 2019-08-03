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
}


 ?>
