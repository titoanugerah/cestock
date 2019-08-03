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
    if ($this->input->post('loginValidation'))
    {
      $login = $this->general_model->loginValidation();
      if ($login['status']==1) {$this->session->set_userdata($login);redirect(base_url('dashboard'));}
    }
    $this->load->view('login', $this->general_model->cLogin());
  }

  public function ($value='')
  {
    // code...
  }
}


 ?>
