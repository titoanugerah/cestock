<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Analist_model extends CI_Model
{

  function __construct()
  {

  }

  //CORE
  public function getAllData($table)
  {
    return $this->db->get($table)->result();
  }

  public function getDataRow($table, $whereVar, $whereVal)
  {
    return $this->db->get_where($table, $where = array($whereVar => $whereVal))->row();
  }

  public function getSomeData($table, $whereVar, $whereVal)
  {
    return $this->db->get_where($table, $where = array($whereVar => $whereVal))->result();
  }

  public function updateData($table, $whereVar, $whereVal, $setVar, $setVal)
  {
    $this->db->where($where = array($whereVar => $whereVal));
    return $this->db->update($table, $data = array($setVar=> $setVal));
  }

  //FUNCTIONAL
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
  public function cMyStock()
  {
    $data['webconf'] = $this->getDataRow('webconf', 'id', 1);
    $data['category'] = $this->getAllData('category');
    $data['myStock'] = $this->getSomeData('stock', 'id_analist', $this->session->userdata['id']);
    $data['myStock1'] = $this->getSomeData('stock', 'id_analist', $this->session->userdata['id']);
    $data['view_name'] = 'myStock';
    return $data;
  }

  public function createStock()
  {
    $data = array(
      'stock_name' => $this->input->post('stock_name'),
      'stock_code' => $this->input->post('stock_code'),
      'id_category' => $this->input->post('id_category'),
      'id_analist' => $this->session->userdata['id'],
    );
    $this->db->insert('stock', $data);
    $this->updateData('stock', 'id', $this->db->insert_id(), 'model', $this->input->post('stock_code').$this->uploadFile($this->input->post('stock_code'), '*')['ext']);
    notify('Berhasil', 'Proses penambahan saham berhasil dilakukan', 'success', 'fas fa-check', 'myStock');
  }

  public function updateStock()
  {
    $data = array(
      'stock_name' => $this->input->post('stock_name'),
      'stock_code' => $this->input->post('stock_code'),
      'id_category' => $this->input->post('id_category'),
    );
    $this->db->where($where = array('id' => $this->input->post('id')));
    $this->db->update('stock', $data);

    notify('Berhasil', 'Proses update saham berhasil dilakukan', 'success', 'fas fa-check', 'myStock');

  }

  public function updateModel()
  {
    $this->updateData('stock', 'id', $this->input->post('id'), 'model', $this->input->post('stock_code').$this->uploadFile($this->input->post('stock_code'),'*')['ext']);
    notify('Berhasil', 'Proses update model saham berhasil dilakukan', 'success', 'fas fa-check', 'myStock');
  }

  public function deleteStock()
  {
    if (md5($this->input->post('password'))==$this->session->userdata['password']){$this->updateData('stock', 'id', $this->input->post('id'), 'status', 0); notify('Berhasil Terhapus', 'saham berhasil dihapus ', 'success', 'fas fa-trash', null);}
    else {notify('Gagal', 'Proses penghapusan saham gagal, password yang anda masukan tidak cocok', 'danger', 'fas fa-user-times', null);}
  }

  public function recoverStock()
  {
    $this->updateData('stock', 'id', $this->input->post('id'), 'status', 1);
    notify('Berhasil', 'Proses pengembalian saham berhasil dilakukan', 'success', 'fas fa-check', 'myStock');

  }
}


 ?>
