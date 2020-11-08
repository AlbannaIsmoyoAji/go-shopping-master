<a href="<?php echo base_url('admin'); ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>G</b>S</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Go</b>SHOP</span>
    </a>

    <nav class="navbar navbar-static-top bg-red">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <li class="dropdown user user-menu">
            <a href="<?php echo base_url('/'); ?>">
              <span class="hidden-xs">Beranda</span>
            </a>
          </li>

          <li class="dropdown user user-menu">
            <a href="<?php echo base_url('admin'); ?>">
              <span class="hidden-xs"><?php echo $this->session->userdata('username'); ?></span>
            </a>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="<?php echo base_url('logout'); ?>"><i class="fa fa-sign-out"></i></a>
          </li>
        </ul>
      </div>

    </nav>