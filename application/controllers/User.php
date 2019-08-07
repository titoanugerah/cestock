<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('user_model');
  }

  public function goPremium()
  {

    $this->load->view('template', $this->user_model->cGoPremium());
  }
}


 ?>
