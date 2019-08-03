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
      <form role="form" method="post" enctype="multipart/form-data">
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
