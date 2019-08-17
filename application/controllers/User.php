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
    $keyword = null;
    if ($this->input->post('search')) { redirect(base_url('search/'.$this->input->post('keyword')));}
    elseif ($this->input->post('createPayment')) {$this->user_model->createPayment();}
    $this->load->view('template', $this->user_model->cGoPremium());
  }

  public function payment()
  {
    $keyword = null;
    if ($this->input->post('search')) { redirect(base_url('search/'.$this->input->post('keyword')));}
    $this->load->view('template', $this->user_model->cPayment());
  }

  public function stockList()
  {
    $keyword = null;
    if ($this->input->post('search')) { redirect(base_url('search/'.$this->input->post('keyword')));}
    $this->load->view('template', $this->user_model->cStockList());

  }

  public function misqueen()
  {
    $keyword = null;
    if ($this->input->post('search')) { redirect(base_url('search/'.$this->input->post('keyword')));}
    $this->load->view('template', $this->user_model->cMisqueen());
  }
}


 ?>
