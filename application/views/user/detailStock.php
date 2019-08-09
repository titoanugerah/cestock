<script src="https://code.highcharts.com/highcharts.js"></script>

<div class="panel-header bg-<?php echo $webconf->theme_color ?>-gradient">
  <div class="page-inner py-5">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
      <div>
        <h2 class="text-white pb-2 fw-bold"><?php echo $detail->stock_name.'('.$detail->stock_code.')'; ?></h2>
      </div>
      <div class="ml-md-auto py-2 py-md-0">
        <form  method="post">
          <button type="submit" class="btn btn-success btn-round" name="suscribe" value="suscribe" <?php if($suscribeStatus==1){echo 'hidden';} ?>>Suscribe</button> &nbsp;
          <button type="submit" class="btn btn-danger btn-round" name="unsuscribe" value="unsuscribe" <?php if($suscribeStatus==0){echo 'hidden';} ?>>unsuscribe</button> &nbsp;
          <button type="button" data-toggle="modal" data-target="#proficulator" class="btn btn-info btn-round">Analisa Keuntungan</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
// var_dump($stock['row']);die;
 ?>

<div class="page-inner mt--5">
  <div class="card">
    <div class="card-header">
      <center>
        <h3 style="align:center">Highlight Saham</h3>
      </center>
    </div>
    <div class="card-body">
      <div class="row">
        <?php $i=0; foreach ($stockSymbol as $item1): ?>
          <div id="container<?php echo $i;?>" style="width:100%; height:400px;"></div>
          <?php $i++; endforeach; ?>
        </div>
      </div>
      <div class="card-footer">
        Sumber : Alphavantage.com
      </div>
    </div>

    <div class="row">

    <div class="col-md-9">
      <div class="card">
        <div class="card-header">
          Prediksi
        </div>
        <div class="card-body">
          Berdasarkan prediksi oleh analist <?php echo $analist->fullname; ?> menggunakan klasifikasi/algoritma <?php echo $classifier->classifier; ?> untuk 1 jam kedepan disarankan untuk <?php echo $detail->prediction_1; ?>
        </div>
      </div>
      <div class="card">
        <div class="card-header">
          Penjelasan Klasifikasi / Algoritma <?php echo $classifier->classifier; ?>
        </div>
        <div class="card-body">
          <p><?php echo $classifier->classifier; ?></p>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card">
        <div class="card-header">
          <center>
            Analist
          </center>
        </div>
        <div class="card-body">
          <center>
            <div class="avatar avatar-xxl">
              <img src="<?php echo base_url('./assets/upload/'.$analist->display_picture); ?>" alt="..." class="avatar-img rounded-circle">
              <br><br>
              <h4><?php echo $analist->fullname ?></h4>
              <p><?php echo "@".$analist->username; ?></p>

            </div>
          </div>
        </div>
      </div>
    </div>

  </div>



  <?php $i=0; foreach ($stockSymbol as $item1):  ?>
    <script type="text/javascript">
    Highcharts.chart('container<?php echo $i;?>', {
      title: {text: '<?php echo $item1->stock_code; ?>'},
      xAxis: {categories: [<?php foreach ($chart['chartData'.$i]['row'] as $item) {echo "'".date('Y-m-d H:i:s', strtotime($item[0]))."',"; } ?>]},
      series: [{data: [<?php foreach ($chart['chartData'.$i]['row'] as $item) {echo ($item[1]).","; } ?>],name: 'Open'}, {data: [<?php foreach ($chart['chartData'.$i]['row'] as $item) {echo ($item[4]).","; } ?>],name: 'Close'}]
    });
    </script>
  <?php $i++; endforeach; ?>
