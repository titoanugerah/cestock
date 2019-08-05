<div class="panel-header bg-<?php echo $webconf->theme_color ?>-gradient">
  <div class="page-inner py-5">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
      <div>
        <h2 class="text-white pb-2 fw-bold">Harga</h2>
        <h5 class="text-white op-7 mb-2"> Halaman panel pengelolaan harga</h5>
      </div>
      <div class="ml-md-auto py-2 py-md-0">
        <button type="button" class="btn btn-success btn-round" data-toggle="modal" data-target="#addPricing">Tambah Harga</button> &nbsp;
        <button type="button" class="btn btn-success btn-round" data-toggle="modal" data-target="#recoverPricing">Kembalikan daftar harga sebelumnya</button>
      </div>
    </div>
  </div>
</div>

<div class="card">
  <div class="card-body">
    <div class="row">
      <?php $color = array('primary','secondary','success','warning','danger','info'); foreach ($pricing as $item): if($item->status==0){continue;} ?>
      <div class="col-sm-6 col-md-4">
        <a data-toggle="modal" data-target="#detailPricing<?php echo $item->id;?>">
        <div class="card card-stats card-<?php echo $color[rand(0,5)];  ?> card-round">
          <div class="card-body">
            <div class="row">
              <div class="col-3">
                <div class="icon-big text-center">
                  <i class="flaticon-network"></i>
                </div>
              </div>
              <div class="col-9 col-stats">
                <div class="numbers">
                  <h5 class="card-title"><?php echo $item->package; ?></h5>
                  <p><b>Rp. <?php echo number_format($item->price,0,',','.'); ?></b></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        </a>
      </div>
    <?php endforeach; ?>
    </div>
  </div>
</div>


<div class="modal fade" id="addPricing" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <center>
          <h4>Tambah Paket Harga</h4>
        </center>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form role="form" method="post" >
        <div class="modal-body">
          <div class="row">

          <div class="form-group col-6 col-md-12">
            <label>Nama Paket</label>
            <input type="text" class="form-control" placeholder="Masukan nama paket" name="package" required>
          </div>
          <div class="form-group col-6 col-md-6">
            <label>Durasi (Hari)</label>
            <input type="number" class="form-control" placeholder="Masukan durasi pemakaian paket" name="duration" required>
          </div>
          <div class="form-group col-6 col-md-6">
            <label>Harga</label>
            <input type="text" class="form-control" placeholder="Masukan harga paket" name="price" required>
          </div>
        </div>
      </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="addPricing" value="addPricing">Tambah Paket Harga</button>
          <button type="button" class="btn btn-grey" data-dismiss="modal">Kembali</button>
        </div>
      </form>
    </div>
  </div>
</div>


<?php foreach ($pricing as $item): ?>

  <div class="modal fade" id="detailPricing<?php echo $item->id;?>" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <center>
            <h4>Detail Paket Harga</h4>
          </center>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form role="form" method="post" >
          <div class="modal-body">
            <div class="row">

            <div class="form-group col-6 col-md-12">
              <label>Nama Paket</label>
              <input type="text" name="id" value="<?php echo $item->id; ?>" hidden>
              <input type="text" class="form-control" placeholder="Masukan nama paket" name="package" value="<?php echo $item->package; ?>" required>
            </div>
            <div class="form-group col-6 col-md-6">
              <label>Durasi (Hari)</label>
              <input type="number" class="form-control" placeholder="Masukan durasi pemakaian paket" name="duration"  value="<?php echo $item->duration; ?>" required>
            </div>
            <div class="form-group col-6 col-md-6">
              <label>Harga</label>
              <input type="text" class="form-control" placeholder="Masukan harga paket" name="price" value="<?php echo $item->price; ?>"  required>
            </div>
          </div>
        </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" name="updatePricing" value="updatePricing">Perbaharui Paket Harga</button>
            <button type="submit" class="btn btn-danger" name="deletePricing" value="deletePricing">Hapus Paket Harga</button>
            <button type="button" class="btn btn-grey" data-dismiss="modal">Kembali</button>
          </div>
        </form>
      </div>
    </div>
  </div>

<?php endforeach; ?>

<div class="modal fade" id="recoverPricing" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <center>
          <h4>Kembalikan Paket Harga</h4>
        </center>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form role="form" method="post" >
        <div class="modal-body">

          <div class="form-group col-12 col-md-12">
            <label>Paket Harga</label> &nbsp;&nbsp;&nbsp;&nbsp;
            <select class="select2basic form-control" name="id" style="width:350px">
              <?php foreach ($pricing as $item):if($item->status==1){continue;} ?>
                <option value="<?php echo $item->id ?>"><?php echo $item->package; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="recoverPricing" value="recoverPricing">Kembalikan Paket Harga</button>
          <button type="button" class="btn btn-grey" data-dismiss="modal">Kembali</button>
        </div>
      </form>
    </div>
  </div>
</div>
