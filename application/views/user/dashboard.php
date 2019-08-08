<script src="https://code.highcharts.com/highcharts.js"></script>
<?php// $j=1;foreach ($chart['chartData0']['row'] as $item) {var_dump($item[0]); };die;?>
<div class="panel-header bg-<?php echo $webconf->theme_color ?>-gradient">
  <div class="page-inner py-5">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
      <div>
        <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
      </div>
    </div>
  </div>
</div>
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
          <div id="container<?php echo $i;?>" style="width:250px; height:200px;"></div>
          <?php $i++; endforeach; ?>
        </div>
      </div>
      <div class="card-footer">
        Sumber : Alphavantage.com
      </div>
    </div>
  </div>

  <br><br>
  <div class="page-inner mt--5">
    <center>
    <h3>Kategori</h3>
  </center>

    <div class="row">
      <?php foreach ($category as $category): if($category->status==0){continue;} ?>
        <div class="col-sm-6 col-lg-3">
          <div class="card">
            <div class="p-2">
              <img class="card-img-top rounded" src="<?php echo base_url('./assets/upload/'.$category->image); ?>" alt="Product 1">
            </div>
            <div class="card-body pt-2">
              <h4 class="mb-1 fw-bold"><?php echo $category->category; ?></h4>
              <p class="text-muted small mb-2"><?php echo $category->description; ?></p>

            </div>
          </div>
        </div>
      <?php endforeach; ?>
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
