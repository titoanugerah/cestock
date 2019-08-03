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
  public function getDataRow($table, $whereVar, $whereVal)
  {
    return $this->db->get_where($table, $where = array($whereVar => $whereVal))->row();
  }

  public function getSomeData($table, $whereVar, $whereVal)
  {
    return $this->db->get_where($table, $where = array($whereVar => $whereVal))->result();
  }

  //APPLICATION
  public function cMyStock()
  {
    $data['webconf'] = $this->getDataRow('webconf', 'id', 1);
    $data['myStock'] = $this->getSomeData('stock', 'id_analist', $this->session->userdata['id']);
    $data['view_name'] = 'myStock';
    return $data;
  }
}


 ?>
