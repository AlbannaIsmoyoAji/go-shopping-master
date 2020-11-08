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
      </h1>
      <ol class="breadcrumb" style="padding: 0;">
        <li></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Main row -->
      <div class="row">
        <div class="col-md-12">
          <div class="box box-danger box-solid">
            <div class="box-header">
              <h3 class="box-title">Detail Penjualan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th>#</th>
                  <th>Detail</th>
                </tr>
                <tr>
                  <td>Nama Produk</td>
                  <td><?php echo $data[0]['nama_produk']; ?></td>
                </tr>
                <tr>
                  <td>Qty</td>
                  <td><?php echo $data[0]['qty']; ?></td>
                </tr>
                <tr>
                  <td>Total Harga</td>
                  <td><?php echo $data[0]['total_harga']; ?></td>
                </tr>
                <tr>
                  <td>Nama Pembeli</td>
                  <td><?php echo $data[0]['nama_pembeli']; ?></td>
                </tr>
                <tr>
                  <td>Provinsi</td>
                  <td>
                    <?php
                    $this->db->from('provinces');
                    $this->db->where('id', $data[0]['provinsi']);
                    $provinsi = $this->db->get();
                    $provinsi = $provinsi->result_array();
                    echo $provinsi[0]['name'];
                    ?>
                  </td>
                </tr>
                <tr>
                  <td>Kota / Kabupaten</td>
                  <td>
                    <?php
                    $this->db->from('regencies');
                    $this->db->where('id', $data[0]['kota_kabupaten']);
                    $kotakab = $this->db->get();
                    $kotakab = $kotakab->result_array();
                    echo $kotakab[0]['name'];
                    // $data[0]['kota_kabupaten'];
                    ?>
                  </td>
                </tr>
                <tr>
                  <td>Kecamatan</td>
                  <td>
                    <?php
                    $this->db->from('districts');
                    $this->db->where('id', $data[0]['kecamatan']);
                    $kec = $this->db->get();
                    $kec = $kec->result_array();
                    echo $kec[0]['name'];
                    // $data[0]['kecamatan'];
                    ?>
                  </td>
                </tr>
                <tr>
                  <td>Kode Pos</td>
                  <td><?php echo $data[0]['kodepos']; ?></td>
                </tr>
                <tr>
                  <td>Alamat</td>
                  <td><?php echo $data[0]['alamat']; ?></td>
                </tr>
                <tr>
                  <td>Email</td>
                  <td><?php echo $data[0]['email']; ?></td>
                </tr>
                <tr>
                  <td>Catatan</td>
                  <td><?php echo $data[0]['catatan']; ?></td>
                </tr>
                <tr>
                  <td>Tanggal</td>
                  <td><?php echo $data[0]['tanggal']; ?></td>
                </tr>
                <tr>
                  <td>User</td>
                  <td><?php echo $data[0]['user']; ?></td>
                </tr>
                <tr>
                  <td>Status</td>
                  <td>
                    <?php
                    if($data[0]['status'] == 'Dalam Pemesanan'):
                        echo '<label class="label label-primary">'.$data[0]['status'].'</label>';
                    endif;
                    if($data[0]['status'] == 'Dalam Pengiriman'):
                        echo '<label class="label label-info">'.$data[0]['status'].'</label>';
                    endif;
                    if($data[0]['status'] == 'Barang Diterima'):
                        echo '<label class="label label-success">'.$data[0]['status'].'</label>';
                    endif;
                    ?>  
                  </td>
                </tr>
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
