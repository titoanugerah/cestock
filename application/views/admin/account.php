<div class="panel-header bg-<?php echo $webconf->theme_color ?>-gradient">
  <div class="page-inner py-5">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
      <div>
        <h2 class="text-white pb-2 fw-bold">Akun</h2>
        <h5 class="text-white op-7 mb-2"> Halaman panel pengelolaan akun</h5>
      </div>
      <div class="ml-md-auto py-2 py-md-0">
        <button type="button" class="btn btn-success btn-round" data-toggle="modal" data-target="#addAnalist">Tambah Akun Analist</button> &nbsp;
      </div>
    </div>
  </div>
</div>
<div class="page-navs bg-white">
  <div class="nav-scroller">
    <div class="nav nav-tabs nav-line nav-color-secondary d-flex align-items-center justify-contents-center w-100">
      <a class="nav-link active show" data-toggle="tab" href="#tab1">Analist</a>
      <a class="nav-link" data-toggle="tab" href="#tab2">Client</a>
    </div>
  </div>
</div>
<div class="tab-content mt-2 mb-3" >
  <div class="tab-pane fade show active" id="tab1" role="tabpanel" >
    <div class="row">
      <?php foreach ($account as $item): if($item->role!='analist'){continue;} ?>
        <div class="col-sm-6 col-lg-3">
          <div class="card">
            <div class="p-2">
              <img class="card-img-top rounded" src="<?php echo base_url('assets/upload/'.$item->display_picture); ?>" alt="Product 1">
            </div>
            <div class="card-body pt-2">
              <h4 class="mb-1 fw-bold"><?php echo $item->fullname; ?></h4>
              <p class="text-muted small mb-2">@<?php echo $item->username; ?></p>
              <br>
              <center>
                <a href="<?php echo base_url('detailAccount/'.$item->id) ?>" class="btn btn-secondary btn-round">Detail Akun</a>
              </center>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

  </div>
  <div class="tab-pane fade" id="tab2" role="tabpanel" >
    <div class="row">

      <?php foreach ($account as $item): if($item->role!='user'){continue;} ?>
        <div class="col-sm-6 col-lg-3">
          <div class="card">
            <div class="p-2">
              <img class="card-img-top rounded" src="<?php echo base_url('assets/upload/'.$item->display_picture); ?>" alt="Product 1">
            </div>
            <div class="card-body pt-2">
              <h4 class="mb-1 fw-bold"><?php echo $item->fullname; ?></h4>
              <p class="text-muted small mb-2">@<?php echo $item->username; ?></p>
              <br>
              <center>
                <a href="<?php echo base_url('detailAccount/'.$item->id) ?>" class="btn btn-secondary btn-round" hidden>Detail Akun</a>
              </center>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<div class="modal fade" id="addAnalist" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <center>
          <h4>Tambah Akun Analist</h4>
        </center>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form role="form" method="post" >
        <div class="modal-body">
          <div class="form-group col-6 col-md-12">
            <label>Username</label>
            <input type="text" class="form-control" placeholder="Masukan username" name="username" required>
          </div>
          <div class="form-group col-6 col-md-12">
            <label>Email</label>
            <input type="email" class="form-control" placeholder="Masukan email" name="email" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="addAnalist" value="addAnalist">Tambah Analist</button>
          <button type="button" class="btn btn-grey" data-dismiss="modal">Kembali</button>
        </div>
      </form>
    </div>
  </div>
</div>
