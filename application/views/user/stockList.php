<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Panel Saham</h4>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table id="basic-datatables" class="display table table-striped table-hover dataTable" role="grid" aria-describedby="basic-datatables_info">
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
                  <a href="<?php echo base_url('detailStock/'.$item->id); ?>" class="btn btn-info">Detail</a>
                </td>
              </tr>
              <?php $i++;endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
