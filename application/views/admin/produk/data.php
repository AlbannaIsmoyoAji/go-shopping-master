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
        <a href="<?php echo base_url('admin/produk/tambah'); ?>" class="btn btn-primary">Tambah Produk</a>
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
                <h3 class="box-title">Daftar Produk</h3> 
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <?php
              if($this->session->flashdata('success'))
              {
                echo '<p class="alert alert-success">' . $this->session->flashdata('success') . '</p>';
              }
              ?>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                          <th width="2">#</th>
                          <th width="2">Gambar</th>
                          <th>Nama Produk</th>
                          <th>Harga</th>
                          <th>Kategori</th>
                          <th>Qty</th>
                          <th width="75"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1; foreach($data as $row): ?>
                        <tr>
                          <td> <?php echo $no++; ?> </td>
                          <td> <img src="<?php echo base_url('asset/img/produk/').$row['nama_file']; ?>" alt="<?php echo $row['slug_nama_produk']; ?>" width="100" height="100"> </td>
                          <td> <?php echo $row['nama_produk']; ?> </td>
                          <td> Rp. <?php $harga = $row['harga']; echo number_format($harga, 2,",","."); ?> </td>
                          <td> <?php echo $row['kategori']; ?> </td>
                          <td> <?php echo $row['qty']; ?> </td>
                          <td> 
                            <div class="btn-group">
                                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                                  Aksi <span class="caret"></span>
                                  <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                  <li><a href="<?php echo base_url('admin/produk/lihat/').$row['slug_nama_produk']; ?>">Detail</a></li>
                                  <li><a href="<?php echo base_url('admin/produk/edit/').$row['slug_nama_produk']; ?>">Ubah Data</a></li>
                                  <li class="divider"></li>
                                  <li><a href="<?php echo base_url('admin/produk/hapus/').$row['slug_nama_produk']; ?>">Hapus Data</a></li>
                                </ul>
                            </div>
                          </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                          <th width="2">#</th>
                          <th width="2">Gambar</th>
                          <th>Nama Produk</th>
                          <th>Harga</th>
                          <th>Kategori</th>
                          <th>Qty</th>
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
