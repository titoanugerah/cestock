<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('admin_model');
  }

  public function webconf()
  {
    if ($this->input->post('updateInfo')) {$this->admin_model->updateInfo();}
    else if ($this->input->post('updateEmail')) {$this->admin_model->updateInfo();}
    $this->load->view('template',$this->admin_model->cWebconf());
  }

  public function category()
  {
    if ($this->input->post('createCategory')) {$this->admin_model->createCategory();}
    elseif ($this->input->post('deleteCategory')) {$this->admin_model->deleteCategory();}
    elseif ($this->input->post('updateCategory')) {$this->admin_model->updateCategory();}
    elseif ($this->input->post('recoverCategory')) {$this->admin_model->recoverCategory();}
    $this->load->view('template',$this->admin_model->cCategory());
  }
}


 ?>
