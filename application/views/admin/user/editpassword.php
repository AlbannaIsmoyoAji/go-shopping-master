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
        <a href="<?php echo base_url('admin/user'); ?>" class="btn btn-primary">Kembali</a>
      </h1>
      <ol class="breadcrumb" style="padding: 0;">
        <li></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-2">
            
        </div>

        <div class="col-md-12">
        <div class="box box-danger box-solid">
            <div class="box-header">
                <h3 class="box-title">Edit Password</h3> 
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <?php
              if($this->session->flashdata('success')):
                echo '<div class="alert alert-success">'. $this->session->flashdata('success') .'</div>';
              endif;

              if($this->session->flashdata('error')):
                echo '<div class="alert alert-danger">'. $this->session->flashdata('error') .'</div>';
              endif;
              ?>
              <?php
              foreach($data as $edit):
              ?>
              <div class="col-md-12">
                <?php echo form_open("admin/proseseditpassword"); ?>
                <input type="text" name="id" value="<?php echo $edit['id']; ?>" hidden>
                  <div class="form-group">
                    <label>Password Baru</label>
                    <?php
                    $data = array('type' => 'password', 'class' => 'form-control', 'name' => 'password_baru', 'id' => 'password_baru', 'placeholder' => 'Masukkan Password', 'value' => set_value('password_baru'), 'oninvalid' => 'this.setCustomValidity('."'Password Tidak Boleh Kosong'".')', 'oninput' => 'setCustomValidity('."''".')', 'required' => 'true');
                    echo form_input($data);
                    echo form_error('password_baru', '<p class="text-red">', '</p>'); 
                    ?>
                  </div>
                  
                  <div class="form-group">
                    <label>Konfirmasi Password</label>
                    <?php
                    $data = array('type' => 'password', 'class' => 'form-control', 'name' => 'konfirmasi_password_baru', 'id' => 'konfirmasi_password_baru', 'placeholder' => 'Masukkan Ulang Password', 'value' => set_value('konfirmasi_password_baru'), 'oninvalid' => 'this.setCustomValidity('."'Password Tidak Boleh Kosong'".')', 'oninput' => 'setCustomValidity('."''".')', 'required' => 'true');
                    echo form_input($data);
                    echo form_error('konfirmasi_password_baru', '<p class="text-red">', '</p>'); 
                    ?>
                  </div>

              </div>
              <?php endforeach; ?>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <?php echo form_submit('submit', 'Submit', array('class' => 'btn btn-primary')); ?>
              <?php echo form_reset('reset', 'Reset', array('class' => 'btn btn-danger')); ?>
            </div>
            <?php echo form_close(); ?>
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

</body>
</html>
