<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Analist_model extends CI_Model
{

  function __construct()
  {
    $this->load->library('Excel');
  }

  //CORE
  public function getAllData($table)
  {
    return $this->db->get($table)->result();
  }

  public function getDataRow($table, $whereVar, $whereVal)
  {
    return $this->db->get_where($table, $where = array($whereVar => $whereVal))->row();
  }

  public function getSomeData($table, $whereVar, $whereVal)
  {
    return $this->db->get_where($table, $where = array($whereVar => $whereVal))->result();
  }

  public function updateData($table, $whereVar, $whereVal, $setVar, $setVal)
  {
    $this->db->where($where = array($whereVar => $whereVal));
    return $this->db->update($table, $data = array($setVar=> $setVal));
  }

  //FUNCTIONAL
  public function uploadFile($filename,$allowedFile)
  {
    $config['upload_path'] = APPPATH.'../assets/upload/';
    $config['overwrite'] = TRUE;
    $config['file_name']     =  str_replace(' ','_',$filename);
    $config['allowed_types'] = $allowedFile;
    $this->load->library('upload', $config);
    if (!$this->upload->do_upload('fileUpload')) {
      $upload['status']=0;
      $upload['message']= "Mohon maaf terjadi error saat proses upload : ".$this->upload->display_errors();
    } else {
      $upload['status']=1;
      $upload['message'] = "File berhasil di upload";
      $upload['ext'] = $this->upload->data('file_ext');
    }
    $this->session->set_flashdata('message', $upload['message']);
    return $upload;
  }

  //FUNCTIONAL

  public function getStock($stock)
  {
    $url = "https://www.alphavantage.co/query?function=TIME_SERIES_INTRADAY&symbol=".$stock."&interval=5min&apikey=QT2PLXB57HD123EU&datatype=csv";
    $data['csv'] = explode("\n",file_get_contents($url));
    for ($i=0; $i < (count($data['csv'])-1); $i++) {
      $data['row'][$i] = explode(",",$data['csv'][$i]);
      $data['count'] = $i;
    }
    return $data;
  }


  public function getStockData($stock)
  {
    $objPHPExcel = new PHPExcel();
    $x=1; $class = array('BUY', 'HOLD', 'SELL');
    $data = $this->getStock($stock);
    $dtest = array();$dtest[0] = ('High,Low,Close,Volume,PP,R1,R2,R3,S1,S2,S3,CLASS');
    for ($i=2; $i < $data['count']; $i++) {
      $date = $data['row'][$i][0];
      $open = floatval(number_format($data['row'][$i][1],2));
      $high = floatval(number_format($data['row'][$i][2],2));
      $low = floatval(number_format($data['row'][$i][3],2));
      $close = floatval(number_format($data['row'][$i][4],2));
      $volume = ((int)$data['row'][$i][5]);
      $PP = ($high + $low + $close)/3;
      $R1 = (2*$PP) - $low;
      $R2 = $PP+($high-$low);
      $R3 = $high + (2*($PP-$low));
      $S1 = (2*$PP) - $high;
      $S2 = $PP - ($high - $low);
      $S3 = $low - (2*($high - $PP));
      $dtest[$x] = ($high.','.$low.','.$close.','.$volume.','.$PP.','.$R1.','.$R2.','.$R3.','.$S1.','.$S2.','.$S3.','.$class[rand(0,2)]);
      $x++;
    }
    // $fp = fopen('assets/upload/balance_csv.csv', 'w');
    $fp = fopen('balance_csv.csv', 'w');
    foreach($dtest as $line){$val = explode(",",$line);fputcsv($fp, $val);}
    fclose($fp);//end
    return true;
  }


  //APPLICATION
  public function cMyStock()
  {
    $data['webconf'] = $this->getDataRow('webconf', 'id', 1);
    $data['category'] = $this->getAllData('category');
    $data['myStock'] = $this->getSomeData('stock', 'id_analist', $this->session->userdata['id']);
    $data['myStock1'] = $this->getSomeData('stock', 'id_analist', $this->session->userdata['id']);
    $data['classifier'] = $this->getSomeData('classifier', 'status', 1);
    $data['view_name'] = 'myStock';
    return $data;
  }

  public function createStock()
  {
    $data = array(
    'stock_name' => $this->input->post('stock_name'),
    'stock_code' => $this->input->post('stock_code'),
    'id_category' => $this->input->post('id_category'),
    'id_analist' => $this->session->userdata['id'],
    'id_classifier' => $this->input->post('id_classifier'),
    );
    $this->db->insert('stock', $data);
    $this->updateData('stock', 'id', $this->db->insert_id(), 'model', $this->input->post('stock_code').$this->uploadFile($this->input->post('stock_code'), '*')['ext']);
    notify('Berhasil', 'Proses penambahan saham berhasil dilakukan', 'success', 'fas fa-check', 'myStock');
  }

  public function updateStock()
  {
    $data = array(
    'stock_name' => $this->input->post('stock_name'),
    'stock_code' => $this->input->post('stock_code'),
    'id_category' => $this->input->post('id_category'),
    'id_classifier' => $this->input->post('id_classifier'),
    );
    $this->db->where($where = array('id' => $this->input->post('id')));
    $this->db->update('stock', $data);

    notify('Berhasil', 'Proses update saham berhasil dilakukan', 'success', 'fas fa-check', 'myStock');

  }

  public function updateModel()
  {
    $this->updateData('stock', 'id', $this->input->post('id'), 'model', $this->input->post('stock_code').$this->uploadFile($this->input->post('stock_code'),'*')['ext']);
    notify('Berhasil', 'Proses update model saham berhasil dilakukan', 'success', 'fas fa-check', 'myStock');
  }

  public function deleteStock()
  {
    if (md5($this->input->post('password'))==$this->session->userdata['password']){$this->updateData('stock', 'id', $this->input->post('id'), 'status', 0); notify('Berhasil Terhapus', 'saham berhasil dihapus ', 'success', 'fas fa-trash', null);}
    else {notify('Gagal', 'Proses penghapusan saham gagal, password yang anda masukan tidak cocok', 'danger', 'fas fa-user-times', null);}
  }

  public function recoverStock()
  {
    $this->updateData('stock', 'id', $this->input->post('id'), 'status', 1);
    notify('Berhasil', 'Proses pengembalian saham berhasil dilakukan', 'success', 'fas fa-check', 'myStock');
  }

  public function refreshStock()
  {
    foreach ($this->getSomeData('stock', 'id_analist', $this->session->userdata['id']) as $item) {
      $this->getStockData($item->stock_code);
      $this->updateData('stock','id', $item->id, 'prediction_1', prediction($item->stock_code, $this->getDataRow('classifier', 'id', $item->id_classifier)->classifier_code));
    }
  }

}


?>
