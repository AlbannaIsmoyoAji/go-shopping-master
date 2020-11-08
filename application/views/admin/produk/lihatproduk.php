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
        <a href="<?php echo base_url('admin/produk'); ?>" class="btn btn-primary">Kembali</a>
      </h1>
      <ol class="breadcrumb" style="padding: 0;">
        <!-- <li><a href="" class="btn btn-primary">Kembali</a></li> -->
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-4">
            <div class="box box-danger box-solid">
                <div class="box-header">
                    <h3 class="box-title">Gambar Produk</h3>
                </div>
                <div class="box-body">
                    <?php foreach($data as $row) { ?>
                    <img src="<?php echo base_url('asset/img/produk/').$row['nama_file']; ?>" alt="" class="img-responsive">
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="box box-danger box-solid">
            <div class="box-header">
              <h3 class="box-title">Detail Produk</h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-striped">
                <tr>
                  <th>#</th>
                  <th>Informasi</th>
                </tr>
                <tr>
                  <td>Nama Produk</td>
                  <td><?php echo $row['nama_produk']; ?></td>
                </tr>
                <tr>
                  <td>Harga Produk</td>
                  <td>Rp. <?php $harga = $row['harga']; echo number_format($harga, 2,",","."); ?></td>
                </tr>
                <tr>
                  <td>Kategori</td>
                  <td><?php echo $row['kategori']; ?></td>
                </tr>
                <tr>
                  <td>Stok Produk</td>
                  <td><?php echo $row['qty']; ?></td>
                </tr>
                <tr>
                  <td>Deskripsi Produk</td>
                  <td><?php echo $row['deskripsi']; ?></td>
                </tr>
             <?php } ?>
              </table>
            </div>
            <!-- /.box-body -->
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
