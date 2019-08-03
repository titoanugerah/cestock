<div class="panel-header bg-<?php echo $webconf->theme_color ?>-gradient">
  <div class="page-inner py-5">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
      <div>
        <h2 class="text-white pb-2 fw-bold">Saham Saya</h2>
        <h5 class="text-white op-7 mb-2"> Halaman panel pengelolaan saham</h5>
      </div>
      <div class="ml-md-auto py-2 py-md-0">
        <button type="button" class="btn btn-success btn-round" data-toggle="modal" data-target="#addCategory">Tambah saham</button> &nbsp;
        <button type="button" class="btn btn-success btn-round" data-toggle="modal" data-target="#recoverStock">Kembalikan saham terhapus</button>
      </div>
    </div>
  </div>
</div>
<div class="page-inner mt--5">

</div>


<div class="modal fade" id="addCategory" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <center>
          <h4>Tambah Saham</h4>
        </center>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form role="form" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="row">
            <div class="form-group col-6 col-md-8">
              <label>Nama Perusahaan</label>
              <input type="text" class="form-control" placeholder="Masukan nama saham" name="stock_name" required>
            </div>
            <div class="form-group col-6 col-md-4">
              <label>Kode Saham</label>
              <input type="text" class="form-control" placeholder="Kode saham" name="stock_code" required>
            </div>
          </div>

          <div class="form-group col-12 col-md-12">
            <label>Kategori</label> &nbsp;&nbsp;&nbsp;&nbsp;
            <select class="select2basic form-control" name="id_category" style="width:350px">
              <?php foreach ($category as $items): ?>
                <option value="<?php echo $items->id ?>"><?php echo $items->category; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group col-6 col-md-12">
          </center>
          <input type="file" name="fileUpload" class="btn btn-primary" required>
        </div>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="createStock" value="createStock">Tambah Saham</button>
        <button type="button" class="btn btn-grey" data-dismiss="modal">Kembali</button>
      </div>
    </form>
  </div>
</div>
</div>

<div class="modal fade" id="recoverStock" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <center>
          <h4>Kembalikan Saham Terhapus</h4>
        </center>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form role="form" method="post">
        <div class="modal-body">
          <div class="form-group col-12 col-md-12">
            <label>Nama Peusahaan</label> &nbsp;&nbsp;&nbsp;&nbsp;
            <select class="select2basic form-control" name="id" style="width:350px">
              <?php foreach ($myStock as $item):if($item->status==1){continue;} ?>
                <option value="<?php echo $item->id ?>"><?php echo $item->stock_name; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" name="recoverStock" value="recoverStock">Kembalikan Saham</button>
          <button type="button" class="btn btn-grey" data-dismiss="modal">Kembali</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php foreach ($myStock as $item): if($item->status==0){continue;} ?>
  <div class="modal fade" id="detailCategory<?php echo $item->id;?>" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <center>
            <h4>Detail Saham</h4>
          </center>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form role="form" method="post">
          <div class="modal-body">
            <div class="form-group col-6 col-md-9">
              <label>Nama Perusahaan</label>
              <input type="text" class="form-control" placeholder="Masukan nama Perusahaan" name="stock_name" value="<?php echo $item->stock_name; ?>" required>
              <input type="text" class="form-control" name="id" value="<?php echo $item->id; ?>" hidden>
            </div>
            <div class="form-group col-6 col-md-3">
              <label>Kode Saham</label>
              <input type="text" class="form-control" placeholder="Masukan kode Saham" name="stock_code" value="<?php echo $item->stock_code; ?>" required>
            </div>

            <div class="form-group col-12 col-md-12">
              <label>Kategori</label> &nbsp;&nbsp;&nbsp;&nbsp;
              <select class="select2basic form-control" name="id" style="width:350px">
                <?php foreach ($category as $items): ?>
                  <option value="<?php echo $items->id ?>" <?php if($items->id==$item->id_category){echo 'selected';} ?>><?php echo $items->category; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success" name="updateStock" value="updateStock">Update Saham</button>
            <button type="button" class="btn btn-grey" data-dismiss="modal">Kembali</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="deleteStock<?php echo $item->id;?>" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <center>
            <h4>Hapus Saham</h4>
          </center>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form role="form" method="post">
          <div class="modal-body">
            <p>Apakah anda yakin menghapus saham <?php echo $item->stock_name; ?>? untuk melanjutkan silahkan masukan password anda pada kolom dibawah ini</p>
            <div class="form-group col-6 col-md-12">
              <input type="text" name="id" value="<?php echo $item->id ?>" hidden>
              <input type="password" name="password" class="form-control" placeholder="masukan password anda">
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-danger" name="deleteStock" value="deleteStock">Hapus Saham</button>
            <button type="button" class="btn btn-grey" data-dismiss="modal">Kembali</button>
          </div>
        </form>
      </div>
    </div>
  </div>

<?php endforeach; ?>
