<div class="card">
  <div class="card-header">
    <center>
      <h3 style="align:center">Saham</h3>
    </center>
  </div>
  <div class="card-body">
    <div class="row">
      <div id="container0" style="width:100%; height:400px;"></div>
    </div>
  </div>
  <div class="card-footer">
    Sumber : Alphavantage.com (Update <?php echo date('d-M-Y H:i:s'); ?>)
  </div>
</div>


  <script type="text/javascript">
  Highcharts.chart('container0', {
    title: {text: '<?php echo $this->session->userdata['keyword']; ?>'},
    xAxis: {categories: [<?php foreach ($chart['chartData0']['row'] as $item) {echo "'".date('Y-m-d H:i:s', strtotime($item[0]))."',"; } ?>]},
    series: [{data: [<?php foreach ($chart['chartData0']['row'] as $item) {echo ($item[1]).","; } ?>],name: 'Open'}, {data: [<?php foreach ($chart['chartData0']['row'] as $item) {echo ($item[4]).","; } ?>],name: 'Close'}]
  });
  </script>
