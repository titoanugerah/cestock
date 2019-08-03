<div class="panel-header bg-<?php echo $webconf->theme_color ?>-gradient">
  <div class="page-inner py-5">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
      <div>
        <h2 class="text-white pb-2 fw-bold">Saham Saya</h2>
        <h5 class="text-white op-7 mb-2"> Halaman panel pengelolaan saham</h5>
      </div>

      <div class="ml-md-auto py-2 py-md-0">
        <form  method="post">
          <button type="button" class="btn btn-success btn-round" data-toggle="modal" data-target="#createStock">Tambah saham</button> &nbsp;
          <button type="button" class="btn btn-success btn-round" data-toggle="modal" data-target="#recoverStock">Kembalikan saham terhapus</button> &nbsp;
        <button type="submit" class="btn btn-success btn-round" name="refreshStock" value="refreshStock">Perbaharui Saham</button>
      </form>
      </div>
    </div>
  </div>
</div>
<div class="page-inner mt--5">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Basic</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <div id="basic-datatables_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="basic-datatables_length"><label>Show <select name="basic-datatables_length" aria-controls="basic-datatables" class="form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="basic-datatables_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="basic-datatables"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="basic-datatables" class="display table table-striped table-hover dataTable" role="grid" aria-describedby="basic-datatables_info">
            <thead>
              <th rowspan="1" colspan="1">No</th>
              <th rowspan="1" colspan="1">Nama Perusahaan</th>
              <th rowspan="1" colspan="1">Prediksi</th>
              <th rowspan="1" colspan="1">Opsi</th>
            </thead>
            <tfoot>
              <tr>
                <th rowspan="1" colspan="1">No</th>
                <th rowspan="1" colspan="1">Nama Perusahaan</th>
                <th rowspan="1" colspan="1">Prediksi</th>
                <th rowspan="1" colspan="1">Opsi</th>
              </tr>
            </tfoot>
            <tbody>
              <?php $i=1;foreach ($myStock as $item): if($item->status==0){continue;} ?>
                <tr role="row" class="odd">
                  <td class="sorting_1"><?php echo $i; ?></td>
                  <td><?php echo $item->stock_name; ?></td>
                  <td><?php echo $item->prediction_1; ?></td>
                  <td>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#detailStock<?php echo $item->id; ?>">Detail</button>
<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#updateModel<?php echo $item->id; ?>">Update Model</button>
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteStock<?php echo $item->id; ?>">Hapus Saham</button>

</td>
                </tr>
                <?php $i++;endforeach; ?>
              </tbody>
            </table></div></div><div class="row">
              <div class="col-sm-12 col-md-5"><div class="dataTables_info" id="basic-datatables_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="basic-datatables_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="basic-datatables_previous"><a href="#" aria-controls="basic-datatables" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
              </li>
              <li class="paginate_button page-item active"><a href="#" aria-controls="basic-datatables" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="basic-datatables" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="basic-datatables" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="basic-datatables" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="basic-datatables" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item "><a href="#" aria-controls="basic-datatables" data-dt-idx="6" tabindex="0" class="page-link">6</a></li><li class="paginate_button page-item next" id="basic-datatables_next"><a href="#" aria-controls="basic-datatables" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="modal fade" id="createStock" role="dialog">
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

  <?php foreach ($myStock1 as $item):  ?>
    <div class="modal fade" id="detailStock<?php echo $item->id;?>" role="dialog">
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
              <div class="row">

                <div class="form-group col-6 col-md-9">
                  <label>Nama Perusahaan</label>
                  <input type="text" class="form-control" placeholder="Masukan nama Perusahaan" name="stock_name" value="<?php echo $item->stock_name; ?>" required>
                  <input type="text" class="form-control" name="id" value="<?php echo $item->id; ?>" hidden>
                </div>
                <div class="form-group col-6 col-md-3">
                  <label>Kode Saham</label>
                  <input type="text" class="form-control" placeholder="Masukan kode Saham" name="stock_code" value="<?php echo $item->stock_code; ?>" required>
                </div>
              </div>

              <div class="form-group col-12 col-md-12">
                <label>Kategori</label> &nbsp;&nbsp;&nbsp;&nbsp;
                <select class="select2basic form-control" name="id_category" style="width:350px">
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


      <div class="modal fade" id="updateModel<?php echo $item->id;?>" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <center>
                <h4>Update Model</h4>
              </center>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form role="form" method="post" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="form-group">
                <input type="file" name="fileUpload" class="btn btn-primary">
              </div>
              <input type="text" name="stock_code" value="<?php echo $item->stock_code ?>" hidden>

              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success" name="updateModel" value="updateModel">Update Saham</button>
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
