<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class User_model extends CI_Model
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

  public function getSomeData($table, $whereVar, $whereVal)
  {
    return $this->db->get_where($table, $where = array($whereVar => $whereVal))->result();
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
  public function cGoPremium()
  {
    $data['pricing'] = $this->getAllData('pricing');
    $data['view_name'] = 'goPremium';
    $data['webconf'] = $this->getDataRow('webconf', 'id', 1);
    return $data;
  }

  public function createPayment()
  {
    $data = array(
      'id_user' => $this->session->userdata['id'],
      'package_id' => $this->input->post('id'),
      'price' => preg_replace('/\D/', '', $this->input->post('price')),
      'status' => 0,
      'duration' => $this->input->post('duration')
     );
     $this->db->insert('payment', $data);
     $this->updateData('payment', 'id', $this->db->insert_id(), 'token', 'payment_'.$this->db->insert_id().$this->uploadFile('payment_'.$this->db->insert_id(),'jpg|jpeg|png')['ext']);
     notify('Sukses', 'Pembayaran berhasil dibuat, silahkan tunggu konfirmasi dari admin', 'success', 'fas fa-check', 'payment');
  }

  public function cPayment()
  {
    $data['payment'] = $this->getSomeData('view_payment', 'id_user', $this->session->userdata['id']);
    $data['view_name'] = 'payment';
    $data['webconf'] = $this->getDataRow('webconf', 'id', 1);
    return $data;

  }

  public function cStockList()
  {
    $data['stock'] = $this->db->query('select a.* from  stock as a, subscription as b where a.id = b.id_stock and b.id_user = '.$this->session->userdata['id'])->result();
    $data['view_name'] = 'stockList';
    $data['webconf'] = $this->getDataRow('webconf', 'id', 1);
    return $data;
  }

}


 ?>
