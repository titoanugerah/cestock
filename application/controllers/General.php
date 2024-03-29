<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class General extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('general_model');
    $this->load->model('admin_model');
    error_reporting(0);
  }

  public function login()
  {
    if ($this->input->post('loginValidation'))
    {
      $login = $this->general_model->loginValidation();
      if ($login['status']==1) {$this->session->set_userdata($login['session']);redirect(base_url('dashboard'));}
    }
    $this->load->view('login', $this->general_model->cLogin());
  }

  public function forgotPassword()
  {
    if ($this->input->post('resetPassword')) {$this->general_model->resetPassword();}
    $this->load->view('forgotPassword', $this->general_model->cForgotPassword());
  }

  public function dashboard()
  {
    $keyword = null;
    if ($this->input->post('search')) { redirect(base_url('search/'.$this->input->post('keyword')));}
    $this->load->view('template', $this->general_model->cDashboard());
  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect(base_url('login'));
  }

  public function createUser()
  {
    if ($this->input->post('createUser')) {$this->general_model->createUser();}
    $this->load->view('createUser', $this->general_model->cCreateUser());
  }

  public function profile()
  {
    $keyword = null;
    if ($this->input->post('search')) { redirect(base_url('search/'.$this->input->post('keyword')));}
    elseif($this->input->post('updateAccount')){$this->session->set_userdata($this->general_model->updateAccount());}
    elseif($this->input->post('uploadDP')){$this->session->set_userdata($this->general_model->uploadDP());}
    $this->load->view('template', $this->general_model->cProfile());
  }

  public function detailAccount($id)
  {
    $keyword = null;
    if ($this->input->post('search')) { redirect(base_url('search/'.$this->input->post('keyword')));}
    elseif($this->input->post('deleteStock')){$this->admin_model->deleteStock();}
    elseif($this->input->post('deleteAccount')){$this->admin_model->deleteAccount();}
    elseif($this->input->post('recoverAccount')){$this->admin_model->recoverAccount();}
    $this->load->view('template', $this->general_model->cDetailAccount($id));
  }

  public function viewInvoice($id)
  {
    echo $id;
  }

  public function detailStock($id)
  {
    $keyword = null;
    if ($this->input->post('search')) { redirect(base_url('search/'.$this->input->post('keyword')));}
    elseif ($this->input->post('suscribe')) {$this->general_model->suscribe($id);}
    elseif ($this->input->post('unsuscribe')) {$this->general_model->unsuscribe($id);}
    elseif ($this->input->post('invest')) {$this->general_model->invest($id);}
    $this->load->view('template', $this->general_model->cDetailStock($id));
  }

  public function stockByCategory($id)
  {
    $keyword = null;
    if ($this->input->post('search')) { redirect(base_url('search/'.$this->input->post('keyword')));}
    $this->load->view('template', $this->general_model->cStockByCategory($id));
  }

  public function search($keyword)
  {
    if ($this->input->post('search')) { redirect(base_url('search/'.$this->input->post('keyword')));}
    $this->load->view('template', $this->general_model->cSearch($keyword));
  }
}


?>
