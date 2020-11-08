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
        <div class="col-md-6">
          <div class="box box-danger box-solid">
            <div class="box-header">
              <h3 class="box-title">Tambah Kategori</h3>
            </div>

            <div class="box-body">
              <?php
              if($this->session->flashdata('success')):
                echo '<div class="alert alert-success">' . $this->session->flashdata('success') . '</div>';
              endif;

              if($this->session->flashdata('error')):
                echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
              endif;
              ?>
              <?php echo form_open('admin/prosestambahkategori'); ?>
                <div class="box-body">
                  <div class="form-group">
                    <label>Nama Kategori</label>
                    <?php $kat = array('type' => 'text', 'class' => 'form-control', 'name' => 'kategori', 'placeholder' => 'Masukkan Kategori', 'value' => set_value('kategori')); echo form_input($kat); ?>
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

        <div class="col-md-6">
        <div class="box box-danger box-solid">
            <div class="box-header">
                <h3 class="box-title">Daftar Produk</h3> 
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <?php
                if($this->session->flashdata('sukses-hapus')):
                  echo '<p class="alert alert-success">' . $this->session->flashdata('sukses-hapus') . '</p>';
                endif;
              ?>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                          <th width="2">#</th>
                          <th>Kategori</th>
                          <th width="75"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1; foreach($data as $row): ?>
                        <tr>
                          <td> <?php echo $no++; ?> </td>
                          <td> <?php echo $row['kategori']; ?> </td>
                          <td> 
                            <a href="<?php echo base_url('admin/produk/editkategori/').$row['id']; ?>" class="label label-success"><i class="fa fa-fw fa-edit"></i></a>
                            <a href="<?php echo base_url('admin/hapuskategori/').$row['id']; ?>" class="label label-danger"><i class="fa fa-fw fa-close"></i></a>
                          </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                          <th width="2">#</th>
                          <th>Kategori</th>
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
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
