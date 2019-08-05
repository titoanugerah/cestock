<li class="nav-item <?php if($view_name=='webconf' || $view_name=='category' || $view_name=='classifier'){echo 'active';} ?>">
  <a data-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
    <i class="fas fa-home"></i>
    <p>Konfigurasi</p>
    <span class="caret"></span>
  </a>
  <div class="collapse" id="dashboard">
    <ul class="nav nav-collapse">
      <li>
        <a href="<?php echo base_url('webconf'); ?>">
          <span class="sub-item">Konfigurasi Web</span>
        </a>
      </li>
      <li>
        <a href="<?php echo base_url('category'); ?>">
          <span class="sub-item">Kategori</span>
        </a>
      </li>
      <li>
        <a href="<?php echo base_url('classifier'); ?>">
          <span class="sub-item">Algoritma</span>
        </a>
      </li>

      <li>
        <a href="<?php echo base_url('pricing'); ?>">
          <span class="sub-item">Harga</span>
        </a>
      </li>
    </ul>
  </div>
</li>

<li class="nav-item  <?php if($view_name=='account'){echo 'active';} ?>">
  <a href="<?php echo base_url('account') ?>">
    <i class="fas fa-users"></i>
    <p>Akun</p>
  </a>
</li>
