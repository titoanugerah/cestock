<div class="panel-header bg-<?php echo $webconf->theme_color ?>-gradient">
  <div class="page-inner py-5">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
      <div>
        <h2 class="text-white pb-2 fw-bold">Profil</h2>
        <h5 class="text-white op-7 mb-2"> <?php echo $this->session->userdata['fullname']; ?></h5>
      </div>
    </div>
  </div>
</div>

<div class="page-inner mt--5">
  <div class="row">
    <div class="col-md-8">
      <div class="card">
        <form  method="post">
          <div class="page-navs bg-white">
            <div class="nav-scroller">
              <div class="nav nav-tabs nav-line nav-color-secondary d-flex align-items-center justify-contents-center w-100">
                <a class="nav-link active show" data-toggle="tab" href="#tab1">Status</a>
                <a class="nav-link" data-toggle="tab" href="#tab2">Analisa Perusahaan</a>
                <a class="nav-link" data-toggle="tab" href="#tab3">Opsi</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="tab-content mt-2 mb-3" >
              <div class="tab-pane fade show active" id="tab1" role="tabpanel" >

              </div>

              <div class="tab-pane fade" id="tab2" role="tabpanel" >
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
                      <?php $i=1;foreach ($stock as $item): if($item->status==0){continue;} ?>
                        <tr role="row" class="odd">
                          <td class="sorting_1"><?php echo $i; ?></td>
                          <td><?php echo $item->stock_name; ?></td>
                          <td><?php echo $item->prediction_1; ?></td>
                          <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#detailStock<?php echo $item->id; ?>">Detail</button>
                          </td>
                        </tr>
                        <?php $i++;endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12 col-md-5">
                    <div class="dataTables_info" id="basic-datatables_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                  </div>
                  <div class="col-sm-12 col-md-7">
                    <div class="dataTables_paginate paging_simple_numbers" id="basic-datatables_paginate">
                      <ul class="pagination">
                        <li class="paginate_button page-item previous disabled" id="basic-datatables_previous">
                          <a href="#" aria-controls="basic-datatables" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                      </li>
                      <li class="paginate_button page-item active">
                        <a href="#" aria-controls="basic-datatables" data-dt-idx="1" tabindex="0" class="page-link">1</a>
                      </li>
                      <li class="paginate_button page-item ">
                        <a href="#" aria-controls="basic-datatables" data-dt-idx="2" tabindex="0" class="page-link">2</a>
                      </li>
                      <li class="paginate_button page-item ">
                        <a href="#" aria-controls="basic-datatables" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="basic-datatables" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="basic-datatables" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item "><a href="#" aria-controls="basic-datatables" data-dt-idx="6" tabindex="0" class="page-link">6</a></li><li class="paginate_button page-item next" id="basic-datatables_next"><a href="#" aria-controls="basic-datatables" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="tab3" role="tabpanel" >
                    <div class="row">
                      <div class="col-5 col-md-3">
                        <div class="nav flex-column nav-pills nav-secondary" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                          <a class="nav-link active show" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home<?php echo $account->status;  ?>" role="tab" aria-controls="v-pills-home" aria-selected="false">Hapus/aktifkan Akun</a>
                          <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="true" hidden>Model</a>
                          <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false" hidden>Hapus</a>
                        </div>
                      </div>
                      <div class="col-7 col-md-8">
                        <div class="tab-content" id="v-pills-tabContent">
                          <div class="tab-pane fade active show" id="v-pills-home1" role="tabpanel" aria-labelledby="v-pills-home-tab" <?php if($account->status==0){ echo 'hidden';} ?>>
                            <p>Apakah anda yakin menghapus akun <?php echo $account->username; ?>? untuk melanjutkan silahkan masukan password anda pada kolom dibawah ini</p>
                            <div class="form-group col-6 col-md-12">
                              <input type="password" name="password" class="form-control" placeholder="masukan password anda">
                              <input type="text" name="id" value="<?php echo $account->id; ?>" hidden>
                            </div>
                            <div class="card-footer">
                              <button type="submit" class="btn btn-danger" name="deleteAccount" value="deleteAccount">Hapus Akun</button>
                              <a href="<?php echo base_url('account'); ?>" class="btn btn-warning" >Kembali</a>
                            </div>
                          </div>
                          <div class="tab-pane fade active show" id="v-pills-home0" role="tabpanel" aria-labelledby="v-pills-home-tab" <?php if($account->status==1){ echo 'hidden';} ?>>
                            <p>Apakah anda yakin mengaktifkan akun <?php echo $account->username; ?>? untuk melanjutkan silahkan masukan password anda pada kolom dibawah ini</p>
                            <div class="form-group col-6 col-md-12">
                              <input type="password" name="password" class="form-control" placeholder="masukan password anda">
                              <input type="text" name="id" value="<?php echo $account->id; ?>" hidden>
                            </div>
                            <div class="card-footer">
                              <button type="submit" class="btn btn-success" name="recoverAccount" value="recoverAccount">Aktifkan Akun</button>
                              <a href="<?php echo base_url('account'); ?>" class="btn btn-warning" >Kembali</a>
                            </div>
                          </div>
                          <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-home-tab">
                            fwfw
                          </div>
                          <div class="tab-pane fade" id="v-pills-message" role="tabpanel" aria-labelledby="v-pills-home-tab">
                            fwfw
                          </div>

                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-header">
              <center>
                Foto Profil
              </center>
            </div>
            <div class="card-body">
              <center>
                <div class="avatar avatar-xxl">
                  <img src="<?php echo base_url('./assets/upload/'.$this->session->userdata['display_picture']); ?>" alt="..." class="avatar-img rounded-circle">
                  <br><br>
                  <h4><?php echo $this->session->userdata['fullname']; ?></h4>
                  <p><?php echo "@".$this->session->userdata['username']; ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <?php foreach ($stock as $item):  ?>
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
                <div class="row">
                  <div class="col-5 col-md-3">
                    <div class="nav flex-column nav-pills nav-secondary" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                      <a class="nav-link active show" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-homes<?php echo $item->id;?>" role="tab" aria-controls="v-pills-home" aria-selected="false">Informasi</a>
                      <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile<?php echo $item->id;?>" role="tab" aria-controls="v-pills-profile" aria-selected="true">Model</a>
                      <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages<?php echo $item->id;?>" role="tab" aria-controls="v-pills-messages" aria-selected="false">Hapus</a>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="tab-content" id="v-pills-tabContent">
                      <div class="tab-pane fade active show" id="v-pills-homes<?php echo $item->id;?>" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <div class="modal-body">
                          <div class="row">
                            <div class="form-group col-6 col-md-8">
                              <label>Nama Perusahaan</label>
                              <input type="text" class="form-control" placeholder="Masukan nama Perusahaan" name="stock_name" value="<?php echo $item->stock_name; ?>" required>
                              <input type="text" class="form-control" name="id" value="<?php echo $item->id; ?>" hidden>
                            </div>
                            <div class="form-group col-6 col-md-4">
                              <label>Kode Saham</label>
                              <input type="text" class="form-control" placeholder="Masukan kode Saham" name="stock_code" value="<?php echo $item->stock_code; ?>" required>
                            </div>
                          </div>

                          <div class="form-group col-12 col-md-12">
                            <label>Kategori</label> &nbsp;&nbsp;&nbsp;&nbsp;
                            <select class="select2basic form-control" name="id_category" style="width:200px">
                              <?php foreach ($category as $items): ?>
                                <option value="<?php echo $items->id ?>" <?php if($items->id==$item->id_category){echo 'selected';} ?>><?php echo $items->category; ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>

                          <div class="form-group col-12 col-md-12">
                            <label>Algoritma Klasifikasi</label> &nbsp;&nbsp;&nbsp;&nbsp;
                            <select class="select2basic form-control" name="id_classifier" style="width:270px">
                              <?php foreach ($classifier as $items): ?>
                                <option value="<?php echo $items->id ?>" <?php if($item->id_classifier = $items->id){echo 'selected';} ?>><?php echo $items->classifier; ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-grey" data-dismiss="modal">Kembali</button>
                        </div>

                      </div>
                      <div class="tab-pane fade " id="v-pills-profile<?php echo $item->id;?>" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <div class="modal-body">
                          <h5><b><?php foreach ($classifier as $flow) {if($flow->id!=$item->id_classifier){continue;} echo $flow->classifier;} ?></b></h5>
                          <p><?php  foreach ($classifier as $flow) {if($flow->id!=$item->id_classifier){continue;} echo $flow->description;}  ?></p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-grey" data-dismiss="modal">Kembali</button>
                        </div>
                      </p>
                    </div>
                    <div class="tab-pane fade" id="v-pills-messages<?php echo $item->id;?>" role="tabpanel" aria-labelledby="v-pills-messages-tab">
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
                    </div>
                  </div>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
