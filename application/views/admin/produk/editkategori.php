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
        <a href="<?php echo base_url('admin/produk/kategori'); ?>" class="btn btn-primary">Kembali</a>
      </h1>
      <ol class="breadcrumb" style="padding: 0;">
        <li></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-12 col-sm-6 col-xs-12">
          
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-6">
          <div class="box box-danger box-solid">
            <div class="box-header">
              <h3 class="box-title">Edit Kategori</h3>
            </div>

            <div class="box-body">
              <?php
              if($this->session->flashdata('success'))
              {
                echo '<div class="alert alert-success">' . $this->session->flashdata('success') . '</div>';
              }

              if($this->session->flashdata('error'))
              {
                echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
              }
              ?>
              <?php echo form_open('admin/prosesupdatekategori'); ?>
                <div class="box-body">
                  <div class="form-group">
                    <label>Nama Kategori</label>
                    <input type="text" name="id" value="<?php echo $id; ?>" hidden>
                    <?php $kat = array('type' => 'text', 'class' => 'form-control', 'name' => 'kategori', 'value' => set_value('kategori', $kategori)); echo form_input($kat); ?>
                    <?php echo form_error('kategori', validation_errors()) ?>
                  </div>
                </div>

                <div class="box-footer">
                  <?php echo form_submit('submit', 'Submit', array('class' => 'btn btn-primary')); ?>
                  <?php echo form_reset('reset', 'Reset', array('class' => 'btn btn-danger')); ?>
                </div>
              <?php echo form_close(); ?>
            </div>
          </div>
        </div>

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
