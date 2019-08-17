<script src="https://code.highcharts.com/highcharts.js"></script>

<div class="panel-header bg-<?php echo $webconf->theme_color ?>-gradient">
  <div class="page-inner py-5">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
      <div>
        <h2 class="text-white pb-2 fw-bold">Pencarian</h2>
      </div>
      <div class="ml-md-auto py-2 py-md-0">
        <form  method="post" hidden>
          <button type="submit" class="btn btn-success btn-round" name="suscribe" value="suscribe" <?php if($suscribeStatus==1){echo 'hidden';} ?>>Suscribe</button> &nbsp;
          <button type="submit" class="btn btn-danger btn-round" name="unsuscribe" value="unsuscribe" <?php if($suscribeStatus==0){echo 'hidden';} ?>>unsuscribe</button> &nbsp;
          <button type="button" data-toggle="modal" data-target="#proficulator" class="btn btn-info btn-round">Analisa Keuntungan</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="page-inner mt--5">
  <?php $this->load->view('admin/statusStock'.$statusStock); ?>
</div>
