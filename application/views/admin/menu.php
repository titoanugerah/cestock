<li class="nav-item <?php if($view_name=='webconf' || $view_name=='category'){echo 'active';} ?>">
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

    </ul>
  </div>
</li>
