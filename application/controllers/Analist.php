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
    if ($this->input->post('createStock')) {$this->analist_model->createStock();}
    elseif ($this->input->post('updateStock')) {$this->analist_model->updateStock();}
    elseif ($this->input->post('updateModel')) {$this->analist_model->updateModel();}
    elseif ($this->input->post('deleteStock')) {$this->analist_model->deleteStock();}
    elseif ($this->input->post('recoverStock')) {$this->analist_model->recoverStock();}
    $this->load->view('template', $this->analist_model->cMyStock());
  }
}

 ?>
