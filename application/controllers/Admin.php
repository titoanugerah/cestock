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
    else if ($this->input->post('uploadWeka')) {$this->admin_model->uploadWeka();}
    else if ($this->input->post('updatePaymentMethod')) {$this->admin_model->updatePaymentMethod();}

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

  public function classifier()
  {
    if ($this->input->post('createClassifier')) {$this->admin_model->createClassifier();}
    elseif ($this->input->post('updateClassifier')) {$this->admin_model->updateClassifier();}
    elseif ($this->input->post('deleteClassification')) {$this->admin_model->deleteClassification();}
    elseif ($this->input->post('recoverClassifier')) {$this->admin_model->recoverClassifier();}
    $this->load->view('template',$this->admin_model->cClassifier());
  }

  public function account()
  {
    $keyword = null;
    if ($this->input->post('addAnalist')) {$this->admin_model->addAnalist();}
    elseif ($this->input->post('search')) {$keyword = $this->input->post('keyword');}
    $this->load->view('template', $this->admin_model->cAccount($keyword));
  }

  public function pricing()
  {
    if ($this->input->post('addPricing')) {$this->admin_model->addPricing();}
    elseif ($this->input->post('updatePricing')) {$this->admin_model->updatePricing();}
    elseif ($this->input->post('deletePricing')) {$this->admin_model->deletePricing();}
    elseif ($this->input->post('recoverPricing')) {$this->admin_model->recoverPricing();}
    $this->load->view('template',$this->admin_model->cPricing());
  }

  public function paymentList()
  {
    if ($this->input->post('verify')) {$this->admin_model->verify();}
    elseif ($this->input->post('unverify')) {$this->admin_model->unverify();}

    $this->load->view('template',$this->admin_model->cPaymentList());

  }
}


 ?>
