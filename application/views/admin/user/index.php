<!DOCTYPE html>
<html>
<head>
  <title><?php echo SITE_NAME .": ". ucfirst($this->uri->segment(1)) ." - ". ucfirst($this->uri->segment(2)) ?></title>
  <?php $this->load->view('admin/library/head'); ?>
</head>
<body class="hold-transition skin-red sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <?php $this->load->view('admin/library/header'); ?>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <?php $this->load->view('admin/library/sidebar'); ?>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <a href="<?php echo base_url('admin/user/tambah'); ?>" class="btn btn-primary">Tambah User</a>
      </h1>
      <ol class="breadcrumb" style="padding: 0;">
        <li></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Jumlah User</span>
              <span class="info-box-number">
                <?php 
                  $query = $this->db->get('user'); 
                  echo $query->num_rows(); 
                ?>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-user"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Pembeli</span>
              <span class="info-box-number">
                <?php 
                  $query = $this->db->get_where('user', array('level' => 'Pembeli')); 
                  echo $query->num_rows(); 
                ?>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-user"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Admin</span>
              <span class="info-box-number">
                <?php 
                  $query = $this->db->get_where('user', array('level' => 'Admin')); 
                  echo $query->num_rows(); 
                ?>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-2">
            
        </div>

        <div class="col-md-12">
        <div class="box box-danger box-solid">
            <div class="box-header">
                <h3 class="box-title">Daftar User</h3> 
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <?php
              if($this->session->flashdata('success')):
                echo '<p class="alert alert-success">' . $this->session->flashdata('success') . '</p>';
              endif;
              ?>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                          <th width="2">#</th>
                          <th>Username</th>
                          <th>Email</th>
                          <th>Password</th>
                          <th>Level</th>
                          <th width="75"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($data as $row): ?>
                        <tr>
                          <td> <?php echo $row['id']; ?> </td>
                          <td> <?php echo $row['username']; ?> </td>
                          <td> <?php echo $row['email']; ?> </td>
                          <td> <?php echo $row['password']; ?> </td>
                          <td> 
                            <?php
                            if($row['level'] == 'Admin'):
                                echo '<span class="label label-info">'.$row['level'].'</span>';
                            endif;
                            if($row['level'] == 'Pembeli'):
                                echo '<span class="label label-primary">'.$row['level'].'</span>';
                            endif;
                            ?>
                          </td>
                          <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                                  Aksi <span class="caret"></span>
                                  <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                  <li><a href="<?php echo base_url('admin/user/edit/').$row['id']; ?>">Ubah Data</a></li>
                                  <li><a href="<?php echo base_url('admin/user/editpassword/').$row['id']; ?>">Ubah Password</a></li>
                                  <li class="divider"></li>
                                  <li><a href="<?php echo base_url('admin/user/hapus/').$row['id']; ?>">Hapus Data</a></li>
                                </ul>
                            </div>
                          </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                          <th width="2">#</th>
                          <th>Username</th>
                          <th>Email</th>
                          <th>Password</th>
                          <th>Level</th>
                          <th width="75"></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <?php $this->load->view('admin/library/footer'); ?>
  </footer>

</div>
<!-- ./wrapper -->
<?php $this->load->view('admin/library/js'); ?>
<script>
  $(function () {
    $('#example1').DataTable()
  })
</script>
</body>
</html>
