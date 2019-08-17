<div class="panel-header bg-<?php echo $webconf->theme_color ?>-gradient">
  <div class="page-inner py-5">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
      <div>
        <h2 class="text-white pb-2 fw-bold">Konfigurasi Website</h2>
        <h5 class="text-white op-7 mb-2"> Halaman panel pengelolaan Konfigurasi</h5>
      </div>
      <div class="ml-md-auto py-2 py-md-0">

      </div>
    </div>
  </div>
</div>
<div class="page-navs bg-white">
  <div class="nav-scroller">
    <div class="nav nav-tabs nav-line nav-color-secondary d-flex align-items-center justify-contents-center w-100">
      <a class="nav-link active show" data-toggle="tab" href="#tab1">Informasi Umum</a>
      <a class="nav-link" data-toggle="tab" href="#tab2">Email</a>
      <a class="nav-link" data-toggle="tab" href="#tab3">Machine Learning</a>
      <a class="nav-link" data-toggle="tab" href="#tab4">Pembayaran</a>
      <!--Update on deploy plan : sept -->
      <a class="nav-link" data-toggle="tab" href="#tab5" hidden>Tampilan</a>

    </div>
  </div>
</div>
<div class="card">
  <div class="tab-content mt-2 mb-3" >
    <div class="tab-pane fade show active" id="tab1" role="tabpanel" >
      <form  method="post">

        <div class="card-body">
          <div class="row">

            <div class="form-group col-6 col-md-6">
              <label>Nama Situs Web</label>
              <input type="text" class="form-control" placeholder="Masukan nama web anda" name="office_name" value="<?php echo $webconf->office_name; ?>">
            </div>

            <div class="form-group col-6 col-md-6">
              <label>Nomor Telepon</label>
              <input type="text" class="form-control" placeholder="Masukan telepon anda" name="office_phone_number" value="<?php echo $webconf->office_phone_number; ?>">
            </div>

            <div class="form-group col-6 col-md-12">
              <label>Alamat Kantor</label>
              <input type="text" class="form-control" placeholder="Masukan alamat" name="office_address" value="<?php echo $webconf->office_address; ?>">
            </div>

          </div>
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-info"  name="updateInfo" value="updateInfo">Update Data</button>
        </div>
      </form>
    </div>
    <div class="tab-pane fade show" id="tab2" role="tabpanel" >
      <form method="post">
        <div class="card-body">
          <div class="row">
            <div class="form-group col-6 col-md-3">
              <label>Host</label>
              <input type="text" class="form-control" placeholder="Masukan host email anda" name="host" value="<?php echo  $webconf->host; ?>">
            </div>

            <div class="form-group col-6 col-md-3">
              <label>Email</label>
              <input type="text" class="form-control" placeholder="Masukan email anda" name="email" value="<?php echo  $webconf->email; ?>">
            </div>

            <div class="form-group col-6 col-md-3">
              <label>Password</label>
              <input type="password" class="form-control" placeholder="Masukan password anda" name="password" value="<?php echo  $webconf->password; ?>">
            </div>

            <div class="form-group col-6 col-md-1">
              <label>Port</label>
              <input type="text" class="form-control" placeholder="Masukan port email anda" name="port" value="<?php echo  $webconf->port; ?>">
            </div>

            <div class="form-group col-6 col-md-2">
              <label>Crypto</label>
              <input type="text" class="form-control" placeholder="Masukan crypto anda" name="crypto" value="<?php echo  $webconf->crypto; ?>">
            </div>

          </div>
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-info"  name="updateEmail" value="updateEmail">Update Data</button>
        </div>
      </form>
    </div>
    <div class="tab-pane fade show" id="tab3" role="tabpanel" >
      <form method="post" enctype="multipart/form-data">
        <div class="card-body">
          <div class="row">
            <div class="card card-secondary card-annoucement card-round col-8" >
              <div class="card-body text-center">
                <div class="card-opening">Machine Learning</div>
                <div class="card-desc">
                  Sistem informasi ini menggunakan WEKA API sebagai Application Program Interface untuk membantu memprediksi saham (HOLD/SELL/BUY), untuk mengganti versi dari API ini dapat mengunggah pada kolom kanan
                </div>
              </div>
            </div>
            <div class="form-group col-4">
              <input type="file" name="fileUpload" class="btn btn-primary" required>
              <br><br>
              <button type="submit" class="btn btn-info"  name="uploadWeka" value="uploadWeka">Upload Machine Learning</button>
            </div>
          </div>
        </div>
      </form>
    </div>
    <div class="tab-pane fade show" id="tab4" role="tabpanel" >
      <form method="post">
        <div class="card-body">
          <div class="row">
            <div class="form-group col-6 col-md-4">
              <label>Nama Bank</label>
              <input type="text" class="form-control" placeholder="Masukan nama bank perusahaan" name="bank_account" value="<?php echo  $webconf->bank_account; ?>">
            </div>

            <div class="form-group col-6 col-md-4">
              <label>Nomor Rekening</label>
              <input type="text" class="form-control" placeholder="Masukan nomor rekening anda " name="bank_account_number" value="<?php echo  $webconf->bank_account_number; ?>">
            </div>

            <div class="form-group col-6 col-md-4">
              <label>Nama Pemilik Rekening</label>
              <input type="text" class="form-control" placeholder="Masukan nama pemilik rekening" name="bank_account_owner" value="<?php echo  $webconf->bank_account_owner; ?>">
            </div>
          </div>
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-info"  name="updatePaymentMethod" value="updatePaymentMethod">Update Data</button>
        </div>
      </form>
    </div>
  </div>
</div>
