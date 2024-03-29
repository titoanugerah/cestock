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
    $keyword = null;
    if ($this->input->post('search')) { redirect(base_url('search/'.$this->input->post('keyword')));}
    elseif ($this->input->post('createStock')) {$this->analist_model->createStock();}
    elseif ($this->input->post('updateStock')) {$this->analist_model->updateStock();}
    elseif ($this->input->post('updateModel')) {$this->analist_model->updateModel();}
    elseif ($this->input->post('deleteStock')) {$this->analist_model->deleteStock();}
    elseif ($this->input->post('recoverStock')) {$this->analist_model->recoverStock();}
    elseif ($this->input->post('refreshStock')) {$this->analist_model->refreshStock();}
    $this->load->view('template', $this->analist_model->cMyStock());
  }
}

 ?>
