<section class="sidebar">

  <ul class="sidebar-menu" data-widget="tree">
    <li class="header">MENU</li>
    <li class="<?php if ( $this->uri->uri_string() == 'admin' ){ echo 'active'; } ?>">
      <a href="<?php echo base_url('admin'); ?>">
        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
      </a>
    </li>
    
    <li class="<?php if ( $this->uri->uri_string() == 'admin/user' ){ echo 'active'; } ?>">
      <a href="<?php echo base_url('admin/user'); ?>">
        <i class="fa fa-dashboard"></i> <span>User</span>
      </a>
    </li>

    <li class="treeview <?php if ( $this->uri->uri_string() == 'admin/produk' ) { echo 'active'; } if ( $this->uri->uri_string() == 'admin/produk/tambah' ){ echo 'active'; }  if ( $this->uri->uri_string() == 'admin/produk/kategori' ){ echo 'active'; } ?>">
      <a href="#">
        <i class="fa fa-dashboard"></i> <span>Produk</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li class="<?php if ( $this->uri->uri_string() == 'admin/produk' ){ echo 'active'; } ?>"><a href="<?php echo base_url('admin/produk'); ?>"><i class="fa fa-circle-o"></i> Data</a></li>
        <li class="<?php if ( $this->uri->uri_string() == 'admin/produk/kategori' ){ echo 'active'; } ?>"><a href="<?php echo base_url('admin/produk/kategori'); ?>"><i class="fa fa-circle-o"></i> Kategori</a></li>
      </ul>
    </li>

    <li class="treeview <?php if ( $this->uri->uri_string() == 'admin/penjualan' ) { echo 'active'; } ?>">
      <a href="#">
        <i class="fa fa-dashboard"></i> <span>Laporan</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li class="<?php if ( $this->uri->uri_string() == 'admin/penjualan' ){ echo 'active'; } ?>"><a href="<?php echo base_url('admin/penjualan'); ?>"><i class="fa fa-circle-o"></i> Penjualan</a></li>
      </ul>
    </li>
  </ul>
  
</section>