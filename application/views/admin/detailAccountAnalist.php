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
                <a class="nav-link" data-toggle="tab" href="#tab3">Analisa Perusahaan</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="tab-content mt-2 mb-3" >
              <div class="tab-pane fade show active" id="tab1" role="tabpanel" >
                coba aja
              </div>

              <div class="tab-pane fade" id="tab2" role="tabpanel" >
                coba aja cwfw
              </div>
              <div class="tab-pane fade" id="tab3" role="tabpanel" >
                fiwhfih
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
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Ganti Foto</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
