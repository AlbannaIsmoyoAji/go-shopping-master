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
                <h3 class="box-title">Tambah User</h3> 
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
              <div class="col-md-12">
                <?php echo form_open("admin/prosestambahuser"); ?>
                  <div class="form-group">
                    <label>Username</label>
                    <?php
                    $data = array('class' => 'form-control', 'name' => 'username', 'id' => 'username', 'placeholder' => 'Masukkan Username', 'value' => set_value('username'), 'oninvalid' => 'this.setCustomValidity('."'Username Tidak Boleh Kosong'".')', 'oninput' => 'setCustomValidity('."''".')', 'required' => 'true');
                    echo form_input($data);
                    echo form_error('username', '<p class="text-red">', '</p>'); 
                    ?>
                  </div>
                  
                  <div class="form-group">
                    <label>Email</label>
                    <?php
                    $data = array('type' => 'email', 'class' => 'form-control', 'name' => 'email', 'id' => 'email', 'placeholder' => 'Masukkan Email', 'value' => set_value('email'), 'oninvalid' => 'this.setCustomValidity('."'Email Tidak Boleh Kosong'".')', 'oninput' => 'setCustomValidity('."''".')', 'required' => 'true');
                    echo form_input($data);
                    echo form_error('email', '<p class="text-red">', '</p>'); 
                    ?>
                  </div>

                  <div class="form-group">
                    <label>Password</label>
                    <?php
                    $data = array('type' => 'password', 'class' => 'form-control', 'name' => 'password', 'id' => 'password', 'placeholder' => 'Masukkan Password', 'value' => set_value('password'), 'oninvalid' => 'this.setCustomValidity('."'Password Tidak Boleh Kosong'".')', 'oninput' => 'setCustomValidity('."''".')','required' => 'true');
                    echo form_input($data);
                    echo form_error('password', '<p class="text-red">', '</p>'); 
                    ?>
                  </div>

                  <div class="form-group">
                    <label>Level</label>
                    <?php
                    $data = array('Admin' => 'Admin', 'Pembeli' => 'Pembeli');
                    $class = array('class' => 'form-control', 'required' => 'true');
                    echo form_dropdown('level', $data, '', $class);
                    ?>
                  </div>
              </div>
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
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    CKEDITOR.replace('editor2')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  })
</script>

</body>
</html>
