<div class="panel-header bg-<?php echo $webconf->theme_color ?>-gradient">
  <div class="page-inner py-5">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
      <div>
        <h2 class="text-white pb-2 fw-bold">Pembayaran</h2>
      </div>
      <div class="ml-md-auto py-2 py-md-0">

      </div>
    </div>
  </div>
</div>
<div class="page-navs bg-white">
  <div class="nav-scroller">
    <div class="nav nav-tabs nav-line nav-color-secondary d-flex align-items-center justify-contents-center w-100">
      <a class="nav-link active show" data-toggle="tab" href="#tab1">Belum Di Verifikasi</a>
      <a class="nav-link" data-toggle="tab" href="#tab2">Pembayaran Ditolak</a>
      <a class="nav-link" data-toggle="tab" href="#tab3">Pembayaran Disetujui</a>
    </div>
  </div>
</div>
<div class="card">
  <div class="tab-content mt-2 mb-3" >
    <div class="tab-pane fade show active" id="tab1" role="tabpanel" >
      <div class="table-responsive">
        <table id="basic-datatables" class="display table table-striped table-hover" >
          <thead>
            <tr>
              <th>No.</th>
              <th>Tanggal</th>
              <th>Paket</th>
              <th>Harga</th>
              <th>Status</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No.</th>
              <th>Tanggal</th>
              <th>Paket</th>
              <th>Harga</th>
              <th>Status</th>
            </tr>
          </tfoot>
          <tbody>
            <?php $i=1; foreach ($payment as $item): if($item->status!=0){continue;}?>

              <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $item->payment_date; ?></td>
                <td><?php echo $item->package; ?></td>
                <td><?php echo $item->price; ?></td>
                <td> <button type="button" class="btn btn-info" data-toggle="modal" data-target="#payment<?php echo $item->id; ?>">Detail</button> </td>
              </tr>
            <?php $i++;endforeach; ?>


          </tbody>
        </table>
      </div>
    </div>
    <div class="tab-pane fade show" id="tab2" role="tabpanel" >
      <div class="table-responsive">
        <table id="basic-datatables2" class="display table table-striped table-hover" >
          <thead>
            <tr>
              <th>No.</th>
              <th>Tanggal</th>
              <th>Paket</th>
              <th>Harga</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No.</th>
              <th>Tanggal</th>
              <th>Paket</th>
              <th>Harga</th>
            </tr>
          </tfoot>
          <tbody>
            <?php $i=1; foreach ($payment as $item): if($item->status!=1){continue;} ?>
              <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $item->payment_date; ?></td>
                <td><?php echo $item->package; ?></td>
                <td><?php echo $item->price; ?></td>
              </tr>
            <?php $i++;endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="tab-pane fade show" id="tab3" role="tabpanel" >
      <div class="table-responsive">
        <table id="basic-datatables3" class="display table table-striped table-hover" >
          <thead>
            <tr>
              <th>No.</th>
              <th>Tanggal</th>
              <th>Paket</th>
              <th>Harga</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No.</th>
              <th>Tanggal</th>
              <th>Paket</th>
              <th>Harga</th>
              <th>Opsi</th>
            </tr>
          </tfoot>
          <tbody>
            <?php $i=1; foreach ($payment as $item): if($item->status!=2){continue;} ?>
              <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $item->payment_date; ?></td>
                <td><?php echo $item->package; ?></td>
                <td><?php echo $item->price; ?></td>
                <td> <a href="<?php echo base_url('viewInvoice/'.$item->id) ?>" class="btn btn-warning">Lihat Nota</a> </td>
              </tr>
            <?php $i++;endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>

  </div>
</div>

<?php foreach ($payment as $item): ?>

<div class="modal fade" id="payment<?php echo  $item->id;?>" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <center>
          <h4>Verifikasi Pembayaran</h4>
        </center>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form role="form" method="post">
        <div class="modal-body">
          <center>
          <input type="text" name="id" value="<?php echo $item->id ?>" hidden>
          <img src="<?php echo base_url('./assets/upload/'.$item->token) ?>" alt="" style="width:200px">
          <br>
          <b><?php echo 'Rp.'.number_format($item->price,0,',','.'); ?></b>
        </center>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" name="verify" value="verify" <?php if($item->status!=0){echo 'hidden';} ?>>Verifikasi Pembayaran</button>
          <button type="submit" class="btn btn-danger" name="unverify" value="unverify" <?php if($item->status!=0){echo 'hidden';} ?>>Tolak Pembayaran</button>

          <button type="button" class="btn btn-grey" data-dismiss="modal">Kembali</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach; ?>
