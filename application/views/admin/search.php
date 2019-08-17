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

<div class="page-inner mt--5">
  <center>
    <h3>Kategori</h3>
  </center>

  <div class="row">
    <?php foreach ($category as $category): if($category->status==0){continue;} ?>
      <div class="col-sm-6 col-lg-3">
        <div class="card">
          <a href="<?php echo base_url('stockByCategory/'.$category->id) ?>">
            <div class="p-2">
              <img class="card-img-top rounded" src="<?php echo base_url('./assets/upload/'.$category->image); ?>" alt="Product 1">
            </div>
          </a>
          <div class="card-body pt-2">
            <h4 class="mb-1 fw-bold"><?php echo $category->category; ?></h4>
            <p class="text-muted small mb-2"><?php echo $category->description; ?></p>

          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
