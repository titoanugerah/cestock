<script src="https://code.highcharts.com/highcharts.js"></script>
<?php// $j=1;foreach ($chart['chartData0']['row'] as $item) {var_dump($item[0]); };die;?>
<div class="card">
  <div class="row">
    <?php $i=0; foreach ($stockSymbol as $item1): ?>
      <div id="container<?php echo $i;?>" style="width:250px; height:200px;"></div>
      <?php $i++; endforeach; ?>
    </div>
  </div>
  <?php $i=0; foreach ($stockSymbol as $item1): ?>

    <script type="text/javascript">
    Highcharts.chart('container<?php echo $i;?>', {
      title: {text: '<?php echo $item1->stock_code; ?>'},
      xAxis: {categories: [<?php foreach ($chart['chartData'.$i]['row'] as $item) { echo "'".date('H:i', strtotime($item[0]))."',"; } ?>]},
      series: [{data: [<?php foreach ($chart['chartData'.$i]['row'] as $item) {echo ($item[1]).","; } ?>],name: 'Open'}, {data: [<?php foreach ($chart['chartData'.$i]['row'] as $item) {echo ($item[4]).","; } ?>],name: 'Close'}]
    });
    </script>
    <?php $i++; endforeach; ?>
