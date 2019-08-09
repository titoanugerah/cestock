<li class="nav-item  <?php if($view_name=='dashboard'){echo 'active';} ?>">
  <a href="<?php echo base_url('dashboard') ?>">
    <i class="fas fa-home"></i>
    <p>Dashboard</p>
  </a>
</li>
<li class="nav-item  <?php if($view_name=='payment'){echo 'active';} ?>">
  <a href="<?php echo base_url('payment') ?>">
    <i class="fas fa-money-bill-wave"></i>
    <p>Pembayaran</p>
  </a>
</li>
<li class="nav-item  <?php if($view_name=='stockList'){echo 'active';} ?>">
  <a href="<?php if($this->session->userdata['exp']>0 && $this->session->userdata['exp']!=null){ echo base_url('stockList');} else {echo base_url('misqueen');} ?>">
    <i class="fas fa-list"></i>
    <p>StockList</p>
  </a>
</li>
