<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
*
*/
class General_model extends CI_Model
{

  function __construct()
  {
    $this->load->library('Excel');
  }

  //CORE
  public function getDataRow($table, $whereVar, $whereVal)
  {
    return $this->db->get_where($table, $where = array($whereVar => $whereVal))->row();
  }

  public function getDataRow2($table, $whereVar1, $whereVal1, $whereVar2, $whereVal2)
  {
    return $this->db->get_where($table, $where = array($whereVar1 => $whereVal1,$whereVar2 => $whereVal2))->row();
  }

  public function getNumRow($table, $whereVar1, $whereVal1)
  {
    return $this->db->get_where($table, $where = array($whereVar1 => $whereVal1))->num_rows();
  }

  public function getSomeData($table, $whereVar1, $whereVal1)
  {
    return $this->db->get_where($table, $where = array($whereVar1 => $whereVal1))->result();
  }

  public function getAllData($table)
  {
    return $this->db->get($table)->result();
  }

  public function getNumRow2($table, $whereVar1, $whereVal1, $whereVar2, $whereVal2)
  {
    return $this->db->get_where($table, $where = array($whereVar1 => $whereVal1,$whereVar2 => $whereVal2))->num_rows();
  }

  public function updateData($table, $whereVar, $whereVal, $setVar, $setVal)
  {
    $this->db->where($where = array($whereVar => $whereVal));
    return $this->db->update($table, $data = array($setVar=> $setVal));
  }

  //FUNCTIONAL

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

  public function getSession($id)
  {
    $account = $this->getDataRow('account', 'id', $id);
    $premium = $this->getDataRow('view_premium', 'id', $id);
    $session = array(
    'login' => true,
    'id' => $account->id,
    'username' => $account->username,
    'password' => $account->password,
    'email' => $account->email,
    'fullname' => $account->fullname,
    'display_picture' => $account->display_picture,
    'status' => $account->status,
    'role' => $account->role,
    'id_pic' => $account->id_pic,
    'date_created' => $account->date_created,
    'type' => $account->type,
    'exp' => $premium->deadline
    );
    return $session;
  }

  public function sentEmail($to, $fullname, $subject, $content)
  {
    $account = $this->getDataRow('webconf', 'id', 1);
    $config = [
    'protocol' => 'sentmail',
    'smtp_host' => $account->host,
    'smtp_user' => $account->email,
    'smtp_pass' => $account->password,
    'smtp_crypto' => $account->crypto,
    'charset' => 'utf-8',
    'crlf' => 'rn',
    'newline' => "\r\n",
    'smtp_port' => $account->port
    ];
    $this->load->library('email', $config);
    $this->email->from($account->email);
    $this->email->to($to);
    $this->email->subject($subject);
    $this->email->message('
    Yth. '.$fullname.'
    Di tempat.

    '.$content.'

    Atas perhatiannya kami ucapkan terima kasih.

    Admin
    ');
    $sent = $this->email->send();
    error_reporting(0);
  }

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

  public function getStock($stock)
  {
    $url = "https://www.alphavantage.co/query?function=TIME_SERIES_INTRADAY&symbol=".$stock."&interval=5min&apikey=QT2PLXB57HD123EU&datatype=csv";
    $data['csv'] = explode("\n",file_get_contents($url));
    $data['count'] = 0;
    for ($i=0; $i < (count($data['csv'])-1); $i++) {
      if($i==0){
        continue;
      } else {
        $data['row'][$i] = explode(",",$data['csv'][$i]);
        $data['count'] = $i;
      }
    }
    return $data;
  }


  //APPLICATION
  public function cLogin()
  {
    $data['webconf'] = $this->getDataRow('webconf', 'id', 1);
    return $data;
  }

  public function loginValidation()
  {
    if($data['status'] = $this->getNumRow2('account', 'username', $this->input->post('username'), 'password', md5($this->input->post('password')))==1)
    {
      $data['session'] = $this->getSession($this->getDataRow('account', 'username', $this->input->post('username'))->id);
      notify('Berhasil', 'Selamat datang '.$this->input->post('username'), 'success', 'fas fa-check', null);
    }
    else { $this->session->set_flashdata('notify', 'Maaf kombinasi yang anda masukan salah, silahkan coba lagi');}
    return $data;
  }

  public function cForgotPassword()
  {
    $data['webconf'] = $this->getDataRow('webconf', 'id', 1);
    return $data;
  }

  public function resetPassword()
  {
    if ($this->getNumRow('account', 'email', $this->input->post('email'))>0) {
      $newPassword = rand(100000, 999999);
      $this->updateData('account', 'email', $this->input->post('email'), 'password', md5($newPassword));
      $this->sentEmail($this->input->post('email'), $this->getDataRow('account', 'email', $this->input->post('email'))->fullname, 'Reset Password', 'Password anda '.$newPassword);
    } else {
      $this->session->set_flashdata('notify', 'Maaf email tidak tersedia, silahkan coba lagi');
    }
  }

  public function cCreateUser()
  {
    $data['webconf'] = $this->getDataRow('webconf', 'id', 1);
    return $data;
  }

  public function createUser()
  {
    if ($this->getDataRow('account', 'email', $this->input->post('email'))==0) {
      // code...
      $newPassword = rand(100000, 999999);
      $data = array(
      'username' => $this->input->post('username'),
      'email' => $this->input->post('email'),
      'password' => md5($newPassword),
      'display_picture' => 'no.jpg',
      'status' => 1,
      'role' => 'user',
      'type' => 'default'
      );
      $this->db->insert('account', $data);
      $content = 'Kami beritahukan bahwa akun anda berhasil dibuat, silahkan login dengan password '.$newPassword;
      $this->sentEmail($this->input->post('email'), $this->input->post('username'), 'Selamat datang pelanggan baru', $content);
      $this->session->set_flashdata('notify', 'Akun berhasil dibuat, silahkan cek email anda');
    } else {
      $this->session->set_flashdata('notify', 'Akun sudah tersedia');
    }
  }

  public function cDashboard()
  {
    $data['stock'] = $this->getAllData('stock');
    $data['stockCount'] = $this->db->get('stock')->num_rows();
    $data['stockSymbol'] = $this->db->query('select * from stock order by rand() asc limit 0,'.$data['stockCount'])->result();
    $i = 0;foreach ($data['stockSymbol'] as $item) {$data['chart']['chartData'.$i] = $this->getStock($item->stock_code);$i++;}
    $data['chart']['ihsg'] = $this->getStock('idx');

    $data['category'] = $this->getAllData('category');
    $data['webconf'] = $this->getDataRow('webconf', 'id', 1);
    $data['view_name'] = 'dashboard';
    return $data;
  }

  public function cProfile()
  {
    $data['webconf'] = $this->getDataRow('webconf', 'id', 1);
    $data['view_name'] = 'profile';
    return $data;
  }

  public function updateAccount()
  {
    if ($this->input->post('password')=='') {
      $data = array(
      'username' => $this->input->post('username'),
      'email' => $this->input->post('email'),
      'fullname' => $this->input->post('fullname'),
      );
    } else {
      $data = array(
      'username' => $this->input->post('username'),
      'email' => $this->input->post('email'),
      'fullname' => $this->input->post('fullname'),
      'password' => md5($this->input->post('password'))
      );

    }
    $this->db->where($where = array('id' => $this->session->userdata['id']));
    $this->db->update('account', $data);
    notify('Berhasil', 'Update profil pengguna berhasil dilakukan', 'success', 'fas fa-check', null);
    return $this->getSession($this->session->userdata['id']);
  }

  public function uploadDP()
  {
    $this->updateData('account', 'id', $this->session->userdata['id'], 'display_picture', 'display_picture_'.$this->session->userdata['id'].$this->uploadFile('display_picture_'.$this->session->userdata['id'],'jpg|jpeg|png')['ext']);
    return $this->getSession($this->session->userdata['id']);
  }

  public function cDetailAccount($id)
  {
    $data['account'] = $this->getDataRow('account', 'id', $id);
    $data['stock'] = $this->getSomeData('stock', 'id_analist', $id);
    $data['category'] = $this->getAllData('category');
    $data['classifier'] = $this->getAllData('classifier');
    $data['view_name'] = 'detailAccount'.ucfirst($data['account']->role);
    $data['webconf'] = $this->getDataRow('webconf', 'id', 1);
    return $data;
  }

  public function cDetailStock($id)
  {
    $data['stockSymbol'] = $this->db->query('select * from stock where id = '.$id)->result();
    $data['detail'] = $this->getDataRow('stock', 'id', $id);
    $data['classifier'] = $this->getDataRow('classifier', 'id', $data['detail']->id_classifier);
    $i = 0;foreach ($data['stockSymbol'] as $item) {$data['chart']['chartData'.$i] = $this->getStock($item->stock_code);$i++;}
//    var_dump(prediction($data['detail']->stock_code, $data['classifier']->classifier_code));die;
    $this->getStockData($data['detail']->stock_code);
    $this->updateData('stock','stock_code', $data['detail']->stock_code, 'prediction_1', prediction($data['detail']->stock_code, $data['classifier']->classifier_code));
    $this->updateData('stock', 'stock_code', $data['detail']->stock_code, 'date_prediction_1', date('Y-m-d H:i:s'));
    $data['suscribeStatus'] = $this->getNumRow2('subscription', 'id_user', $this->session->userdata['id'], 'id_stock', $id);
    $data['classifier'] = $this->getDataRow('classifier', 'id', $data['detail']->id_classifier);
    $data['analist'] = $this->getDataRow('account', 'id', $data['detail']->id_analist);
    $data['stock'] = $this->getStock($data['detail']->stock_code);
    $data['currentPrice'] = $data['stock']['row'][1][4];
    $data['invest'] = $this->getDataRow2('subscription', 'id_user',$this->session->userdata['id'], 'id_stock', $id );
    $data['investValue'] = ($data['currentPrice'] - $data['invest']->price)*($data['invest']->invest/$data['invest']->price);
    $data['view_name'] = 'detailStock';
    $data['webconf'] = $this->getDataRow('webconf', 'id', 1);
    return $data;
  }

  public function suscribe($id)
  {
    if (($this->session->userdata['exp']>=0 && $this->session->userdata['exp']!=null) && $this->getNumRow2('subscription','id_user',$this->session->userdata['id'],'id_stock', $id)==null) {
      $this->db->insert('subscription', $data = array('id_user' => $this->session->userdata['id'], 'id_stock' => $id));
      notify('Sukses', 'Anda berhasil berlangganan '.$this->getDataRow('stock', 'id', $id)->stock_name, 'success', 'fas fa-check', 'detailStock/'.$id);
    } elseif($this->getNumRow2('subscription','id_user',$this->session->userdata['id'],'id_stock', $id)==1) {
      notify('Gagal', 'Anda gagal berlangganan '.$this->getDataRow('stock', 'id', $id)->stock_name.' anda sudah berlangganan sebelumnya', 'danger', 'fas fa-check', 'detailStock/'.$id);
    } else {
      notify('Gagal', 'Anda gagal berlangganan '.$this->getDataRow('stock', 'id', $id)->stock_name.' anda silahkan beli paket terlebih dahulu', 'danger', 'fas fa-check', 'misqueen');
    }
  }

  public function unsuscribe($id)
  {
    $this->db->delete('subscription', array('id_stock' => $id, 'id_user' => $this->session->userdata['id']));
    notify('Sukses', 'Anda berhasil tidak berlangganan '.$this->getDataRow('stock', 'id', $id)->stock_name, 'success', 'fas fa-trash', 'detailStock/'.$id);
  }

  public function invest($id)
  {
    $identity = $this->getDataRow2('subscription', 'id_user', $this->session->userdata['id'], 'id_stock', $id);
    $this->updateData('subscription', 'id', $identity->id, 'invest', $this->input->post('amount'));
    $this->updateData('subscription', 'id', $identity->id, 'date_invest', date('Y-m-d H:i:s'));
    $this->updateData('subscription', 'id', $identity->id, 'price', $this->getStock($this->getDataRow('stock', 'id', $id)->stock_code)['row'][1][4]);
  }

  public function cStockByCategory($id)
  {
    $data['stock'] = $this->getSomeData('stock', 'id_category', $id);
    $data['category'] = $this->getDataRow('category', 'id', $id);
    $data['webconf'] = $this->getDataRow('webconf', 'id', 1);
    $data['view_name'] = 'StockByCategory';
    return $data;
  }

  public function cSearch($keyword)
  {
    if ($this->getNumRow('stock', 'stock_code', $keyword)) {
      redirect(base_url('detailStock/'.$this->getDataRow('stock', 'stock_code', $keyword)->id));
    } elseif ($this->getStock($keyword)['count']>1) {
      $data['statusStock'] = 1;
      $data['chart']['chartData0'] = $this->getStock($keyword);
      // var_dump($this->getStock($keyword));die;
    } else {
      $data['statusStock'] = 0;
    }
    $this->session->set_flashdata('keyword', $keyword);
    $data['category'] = $this->db->query('select * from category where category LIKE "%'.$keyword.'%"')->result();
    $data['account'] = $this->db->query('select * from account where username LIKE "%'.$keyword.'%" or fullname LIKE "%'.$keyword.'%" or email LIKE "%'.$keyword.'%"')->result();
    $data['webconf'] = $this->getDataRow('webconf', 'id', 1);
    $data['view_name'] = 'search';
    return $data;

  }
}



?>
