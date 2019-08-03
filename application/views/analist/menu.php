<li class="nav-item  <?php if($view_name=='dashboard'){echo 'active';} ?>">
  <a href="<?php echo base_url('dashboard') ?>">
    <i class="fas fa-home"></i>
    <p>Dashboard</p>
  </a>
</li>

<li class="nav-item  <?php if($view_name=='myStock'){echo 'active';} ?>">
  <a href="<?php echo base_url('myStock') ?>">
    <i class="fas fa-chart-line"></i>
    <p>Saham Saya</p>
  </a>
</li>
