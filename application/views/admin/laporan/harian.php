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
        <a href="<?php echo base_url('admin/penjualan'); ?>" class="btn btn-primary">Kembali</a>
        <a href="<?php echo base_url('phpexcel/export'); ?>" class="btn btn-success">Export Excel</a>
        <a href="<?php echo base_url('admin/cetak'); ?>" class="btn btn-danger">Export PDF</a>
      </h1>
      <ol class="breadcrumb" style="padding: 0;">
        <li></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Dalam Pemesanan</span>
              <span class="info-box-number">
                <?php 
                    $today = date('Y-m-d');
                    $query = $this->db->get_where('transaksi', array('tanggal' => $today, 'status' => 'Dalam Pemesanan')); 
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
            <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Dalam Pengiriman</span>
              <span class="info-box-number">
                <?php 
                  $query = $this->db->get_where('transaksi', array('tanggal' => $today, 'status' => 'Dalam Pengiriman')); 
                  echo $query->num_rows(); 
                ?>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Barang Diterima</span>
              <span class="info-box-number">
                <?php 
                  $query = $this->db->get_where('transaksi', array('tanggal' => $today, 'status' => 'Barang Diterima')); 
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
      <!-- /.row -->

      <!-- Main row -->
      <div class="row">
        <div class="col-md-12">
          <div class="box box-danger box-solid">
            <div class="box-header">
                <h3 class="box-title">Daftar Penjualan Harian per <b><?php $new = date('d-m-Y', strtotime($today)); echo $new; ?></b></h3> 
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <?php
                if($this->session->flashdata('success')):
                  echo '<p class="alert alert-success">' . $this->session->flashdata('success') . '</p>';
                endif;
              ?>
                <table id="example1" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                          <th width="2">#</th>
                          <th>Nama Produk</th>
                          <th>Qty</th>
                          <th>Alamat</th>
                          <th>Tanggal</th>
                          <th>Harga (Rp)</th>
                          <th>Nama Pembeli</th>
                          <th width="10">Status</th>
                          <th></th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1; foreach($data as $row): ?>
                        <tr>
                          <td> <?php echo $no++; ?> </td>
                          <td> <?php echo $row['nama_produk'] ?> </td>
                          <td> <?php echo $row['qty']; ?> </td>
                          <td> <?php echo $row['alamat']; ?> </td>
                          <td> <?php echo $row['tanggal']; ?> </td>
                          <td> <?php echo number_format($row['total_harga'], 2,'.','.') ; ?> </td>
                          <td> <?php echo $row['nama_pembeli']; ?> </td>
                          <td> 
                            <?php
                            if($row['status'] == 'Dalam Pemesanan'):
                              echo '<label class="label label-primary">'.$row['status'].'</label>';
                            endif;
                            if($row['status'] == 'Dalam Pengiriman'):
                              echo '<label class="label label-info">'.$row['status'].'</label>';
                            endif;
                            if($row['status'] == 'Barang Diterima'):
                              echo '<label class="label label-success">'.$row['status'].'</label>';
                            endif;
                            ?>  
                          </td>
                          <td> 
                            <a href="<?php echo base_url('admin/penjualan/lihat/').$row['id']; ?>" class="label label-primary"><i class="fa fa-eye" aria-hidden="true"></i></a> 
                            <a href="<?php echo base_url('admin/penjualan/edit/').$row['id']; ?>" class="label label-success"><i class="fa fa-edit" aria-hidden="true"></i></a> 
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                          <th width="2">#</th>
                          <th>Nama Produk</th>
                          <th>Qty</th>
                          <th>Alamat</th>
                          <th>Tanggal</th>
                          <th>Nama Pembeli</th>
                          <th>Status</th>
                          <th></th>
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
$(document).ready(function() {
  $('#example1').DataTable({
    responsive: true
  });
});
</script>
</body>
</html>
