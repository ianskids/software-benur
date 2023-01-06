<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url(); ?>assets/img/<?php echo $userdata->foto; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $userdata->nama; ?></p>
        <!-- Status -->
        <a href="<?php echo base_url(); ?>assets/#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <ul class="sidebar-menu" data-widget="treeview">
      <li class="header">LIST MENU</li>
      <!-- Optionally, you can add icons to the links -->

      <li class="treeview <?php if ($page == 'home') {echo 'active';} ?>">
        <a href="<?php echo base_url('Home'); ?>">
          <i class="fa fa-home"></i>
          <span>Home</span>
        </a>

      </li>
      
      <li <?php if ($page == 'pegawai') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Pegawai'); ?>">
          <i class="fa fa-user"></i>
          <span>Data Pegawai</span>
        </a>
      </li>

      <li <?php if ($page == 'benur'||'regular'||'premium'||'maksimalprima') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Benur'); ?>">
          <i class="fa fa-user"></i>
          <span>Data Benur</span><span class="pull-right-container"><i class='fa fa-angle-left pull-right'></i></span>
        </a>
        <ul class="treeview-menu">
          <li <?php if ($page == 'benur') {echo 'class="active"';} ?>> <a href="<?php echo base_url('benur'); ?>">
            <i class="fa fa-user"></i>
            <span>Pendaftaran Benur</span>
          </a></li>
        </ul>
        <ul class="treeview-menu">
         <li <?php if ($page == 'regular'||'premium'||'maksimalprima') {echo 'class="active"';} ?>><a href="<?php echo base_url('benur_proses'); ?>">
          <i class="fa fa-user"></i>
          <span>Proses Benur</span><span class="pull-right-container"><i class='fa fa-angle-left pull-right'></i></span>
        </a>
        <ul class="treeview-menu">
          <li <?php if ($page == 'regular') {echo 'class="active"';} ?>> <a href="<?php echo base_url('benur_proses'); ?>">
            <i class="fa fa-user"></i>
            <span>Regular</span>
          </a></li>
        </ul>
        <ul class="treeview-menu">
          <li <?php if ($page == 'premium') {echo 'class="active"';} ?>> <a href="<?php echo base_url('benur_proses/premium'); ?>">
            <i class="fa fa-user"></i>
            <span>Premium</span>
          </a></li>
        </ul>
        <ul class="treeview-menu">
          <li <?php if ($page == 'maksimalprima') {echo 'class="active"';} ?>> <a href="<?php echo base_url('benur_proses/maksimalprima'); ?>">
            <i class="fa fa-user"></i>
            <span>Maksimal Prima</span>
          </a></li>
        </ul>
      </li>
    </ul>
    <ul class="treeview-menu">
     <li><a href="<?php echo base_url('benur_realisasi'); ?>">
      <i class="fa fa-user"></i>
      <span>Realisasi Benur</span>
    </a></li>
  </ul>
</li>

<li <?php if ($page == 'petambak') {echo 'class="active"';} ?>>
  <a href="<?php echo base_url('Petambak'); ?>">
    <i class="fa fa-user"></i>
    <span>Data Petambak</span>
  </a>
</li>

<li <?php if ($page == 'posisi') {echo 'class="active"';} ?>>
  <a href="<?php echo base_url('Posisi'); ?>">
    <i class="fa fa-briefcase"></i>
    <span>Data Posisi</span>
  </a>
</li>

<li <?php if ($page == 'kota') {echo 'class="active"';} ?>>
  <a href="<?php echo base_url('Kota'); ?>">
    <i class="fa fa-location-arrow"></i>
    <span>Data Kota</span>
  </a>
</li>
</ul>
<!-- /.sidebar-menu -->
</section>
<!-- /.sidebar -->
</aside>