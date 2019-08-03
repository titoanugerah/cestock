<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class General extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('general_model');
  }

  public function login()
  {
    
  }
}


 ?>
