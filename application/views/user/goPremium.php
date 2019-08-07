<br><br><br>

<div class="row justify-content-center align-items-center mb-1">
  <?php foreach ($pricing as $item): ?>
    <div class="col-md-3 pl-md-0">
      <div class="card card-pricing">
        <div class="card-header">
          <h4 class="card-title"><?php echo $item->package; ?></h4>
          <div class="card-price">
            <span class="price">Rp. <?php echo number_format($item->price,'0',',','.'); ?></span>
          </div>
        </div>
        <div class="card-body">
          <ul class="specification-list">
            <li>
              <span class="name-specification">Durasi</span>
              <span class="status-specification"><?php echo $item->duration; ?> Hari</span>
            </li>
            <li>
              <span class="name-specification">Fitur PinStock</span>
              <span class="status-specification">Tersedia</span>
            </li>
            <li>
              <span class="name-specification">Fitur Proficulator</span>
              <span class="status-specification">Tersedia</span>
            </li>

          </ul>
        </div>
        <div class="card-footer">
          <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#package<?php echo $item->id;?>"><b>Beli</b></button>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>


  <?php foreach ($pricing as $key): ?>
    <div class="modal fade" id="package<?php echo $key->id;?>" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <center>
              <h4>Beli <?php echo $key->package; ?></h4>
            </center>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <form role="form" method="post" enctype="multipart/form-data">
            <div class="modal-body">
              Apabila anda setuju untuk membeli produk ini silahkan lakukan transfer dan upload bukti pembayaran
              <div class="row">
                <div class="form-group col-6 col-md-3">
                  <label>Bank</label>
                  <input type="text" class="form-control" name="bank_account" value="<?php echo $webconf->bank_account; ?>" required>
                </div>
                <div class="form-group col-6 col-md-9">
                  <label>Nama Penerima</label>
                  <input type="text" class="form-control" name="bank_account_owner" value="<?php echo $webconf->bank_account_owner; ?>" required>
                </div>

                <div class="form-group col-6 col-md-6">
                  <label>Nomor Rekening Bank</label>
                  <input type="text" class="form-control" name="bank_account_number" value="<?php echo $webconf->bank_account_number; ?>" required>
                </div>
                <div class="form-group col-6 col-md-6">
                  <label>Biaya Transfer</label>
                  <input type="text" class="form-control" name="price" value="Rp. <?php echo number_format(($key->price+rand(40,100)), 0,',','.'); ?>" required>
                </div>

              </div>

              <div class="form-group col-6 col-md-12">
              </center>
              <input type="file" name="fileUpload" class="btn btn-primary" required>
            </div>

          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" name="createPayment" value="createPayment">Beli Paket</button>
            <button type="button" class="btn btn-grey" data-dismiss="modal">Kembali</button>
          </div>
        </form>
      </div>
    </div>
    </div>
  <?php endforeach; ?>
