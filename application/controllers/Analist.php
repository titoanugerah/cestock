<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Analist extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('analist_model');
  }

  public function myStock()
  {
    $this->load->view('template', $this->analist_model->cMyStock());
  }
}

 ?>
