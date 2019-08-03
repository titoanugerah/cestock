<div class="panel-header bg-<?php echo $webconf->theme_color ?>-gradient">
  <div class="page-inner py-5">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
      <div>
        <h2 class="text-white pb-2 fw-bold">Algoritma Klasifikasi</h2>
        <h5 class="text-white op-7 mb-2"> Halaman panel pengelolaan algoritma</h5>
      </div>
      <div class="ml-md-auto py-2 py-md-0">
        <button type="button" class="btn btn-success btn-round" data-toggle="modal" data-target="#addClassifier">Tambah Algoritma</button> &nbsp;
        <button type="button" class="btn btn-success btn-round" data-toggle="modal" data-target="#recoverClassifier">Kembalikan Algoritma Terhapus</button>
      </div>
    </div>
  </div>
</div>
<div class="card">
  <div class="card-body">
    <div class="row">

      <?php $color = array('primary','secondary','success','warning','danger','info'); foreach ($classifier as $item): if($item->status==0){continue;} ?>
      <div class="col-sm-6 col-md-3">
        <a data-toggle="modal" data-target="#detailClassifier<?php echo $item->id;?>">
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
                  <h5 class="card-title"><?php echo $item->classifier; ?></h5>
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

<div class="modal fade" id="addClassifier" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <center>
          <h4>Tambah Algoritma Klasifikasi</h4>
        </center>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form role="form" method="post" >
        <div class="modal-body">
          <div class="form-group col-6 col-md-12">
            <label>Nama Klasifikasi</label>
            <input type="text" class="form-control" placeholder="Masukan nama klasifikasi" name="classifier" required>
          </div>
          <div class="form-group col-6 col-md-12">
            <label>Deskripsi</label>
            <textarea name="description" rows="4" cols="80" placeholder="Masukan keterangan algoritma klasifikasi" class="form-control" required></textarea>
          </div>
          <div class="form-group col-6 col-md-12">
            <label>Perintah Klasifikasi</label>
            <input type="text" class="form-control" placeholder="Masukan perintah klasifikasi pada weka" name="classifier_code" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="createClassifier" value="createClassifier">Tambah Klasifikasi</button>
          <button type="button" class="btn btn-grey" data-dismiss="modal">Kembali</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="recoverClassifier" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <center>
          <h4>Kembalikan Algoritma Klasifikasi</h4>
        </center>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form role="form" method="post" >
        <div class="modal-body">

          <div class="form-group col-12 col-md-12">
            <label>Kategori</label> &nbsp;&nbsp;&nbsp;&nbsp;
            <select class="select2basic form-control" name="id" style="width:350px">
              <?php foreach ($classifier as $item):if($item->status==1){continue;} ?>
                <option value="<?php echo $item->id ?>"><?php echo $item->classifier; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="recoverClassifier" value="recoverClassifier">Kembalikan Klasifikasi</button>
          <button type="button" class="btn btn-grey" data-dismiss="modal">Kembali</button>
        </div>
      </form>
    </div>
  </div>
</div>


<?php foreach ($classifier as $item): ?>
  <div class="modal fade" id="detailClassifier<?php echo $item->id;?>" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <center>
            <h4>Detail Algoritma Klasifikasi</h4>
          </center>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form role="form" method="post">
          <div class="row">
            <div class="col-5 col-md-3">
              <div class="nav flex-column nav-pills nav-secondary" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active show" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="false">Informasi</a>
                <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Hapus</a>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade active show" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                  <div class="modal-body">
                    <div class="form-group col-6 col-md-12">
                      <label>Nama Klasifikasi</label>
                      <input type="text" class="form-control" placeholder="Masukan nama klasifikasi" name="classifier" value="<?php echo $item->classifier; ?>" required>
                    </div>
                    <div class="form-group col-6 col-md-12">
                      <label>Deskripsi</label>
                      <textarea name="description" rows="4" cols="80" placeholder="Masukan keterangan algoritma klasifikasi" class="form-control" required><?php echo $item->description; ?></textarea>
                    </div>
                    <div class="form-group col-6 col-md-12">
                      <label>Perintah Klasifikasi</label>
                      <input type="text" class="form-control" placeholder="Masukan perintah klasifikasi pada weka" name="classifier_code" value="<?php echo $item->classifier_code; ?>" required>
                      <input type="text" name="id" value="<?php echo $item->id ?>" hidden>

                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="updateClassifier" value="updateClassifier">Ubah Klasifikasi</button>
                    <button type="button" class="btn btn-grey" data-dismiss="modal">Kembali</button>
                  </div>

                </div>
              <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                <div class="modal-body">
                  <p>Apakah anda yakin menghapus algoritma klasifikasi  <?php echo $item->classifier; ?>? untuk melanjutkan silahkan masukan password anda pada kolom dibawah ini</p>
                  <div class="form-group col-6 col-md-12">
                    <input type="text" name="id" value="<?php echo $item->id ?>" hidden>
                    <input type="password" name="password" class="form-control" placeholder="masukan password anda">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-danger" name="deleteClassification" value="deleteClassification">Hapus klasifikasi</button>
                  <button type="button" class="btn btn-grey" data-dismiss="modal">Kembali</button>
                </div>
              </div>
            </div>
          </div>
        </div>

      </form>
    </div>


    </div>
  </div>
<?php endforeach; ?>
