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
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Main row -->
      <div class="row">
        <div class="col-md-6">
          <div class="box box-danger box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Pengguna Baru</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                    <tr>
                      <th width="5">#</th>
                      <th>Username</th>
                      <th>Email</th>
                      <th>Level</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    <?php
                    $this->db->from('user');
                    $this->db->order_by('id', 'DESC');
                    $this->db->limit(7);
                    $pb = $this->db->get();
                    $pb = $pb->result_array();
                    foreach($pb as $row):
                    ?>
                    <tr>
                      <td><?php echo $row['id']; ?></td>
                      <td><?php echo $row['username']; ?></td>
                      <td><?php echo $row['email']; ?></td>
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
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="<?php echo base_url('admin/user'); ?>" class="btn btn-sm btn-default btn-flat pull-right">Lihat Semua</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>

        <div class="col-md-6">
          <div class="box box-danger box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Produk Terbaru</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                    <tr>
                      <th width="5">#</th>
                      <th>Nama Produk</th>
                      <th>Harga</th>
                      <th>Qty</th>
                      <th>Kategori</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    <?php
                    $this->db->from('produk');
                    $this->db->order_by('id', 'DESC');
                    $this->db->limit(7);
                    $prb = $this->db->get();
                    $prb = $prb->result_array();
                    foreach($prb as $row):
                    ?>
                    <tr>
                      <td><?php echo $row['id']; ?></td>
                      <td><?php echo $row['nama_produk']; ?></td>
                      <td><?php echo $row['harga']; ?></td>
                      <td><?php echo $row['qty']; ?></td>
                      <td><span class="label label-primary"><?php echo $row['kategori']; ?></span></td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="<?php echo base_url('admin/produk'); ?>" class="btn btn-sm btn-default btn-flat pull-right">Lihat Semua</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
      
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-md-6">
          <div class="box box-danger box-solid">
            <div class="box-header">
              <h3 class="box-title">Penjualan Terbaru</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                    <tr>
                      <th width="5">#</th>
                      <th>Nama Produk</th>
                      <th>Qty</th>
                      <th>Harga</th>
                      <th>Pembeli</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    <?php
                    $this->db->from('transaksi');
                    $this->db->order_by('id', 'DESC');
                    $this->db->limit(7);
                    $plb = $this->db->get();
                    $plb = $plb->result_array();
                    foreach($plb as $row):
                    ?>
                    <tr>
                      <td><?php echo $row['id']; ?></td>
                      <td><?php echo $row['nama_produk']; ?></td>
                      <td><?php echo $row['qty']; ?></td>
                      <td><?php echo $row['total_harga']; ?></td>
                      <td><span class="label label-primary"><?php echo $row['nama_pembeli']; ?></span></td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="<?php echo base_url('admin/penjualan'); ?>" class="btn btn-sm btn-default btn-flat pull-right">Lihat Semua</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>

        <div class="col-md-6">
          <div class="box box-danger box-solid">
            <div class="box-header">
              <h3 class="box-title">Kategori Terbaru</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                    <tr>
                      <th width="5">#</th>
                      <th>Kategori</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    <?php
                    $this->db->from('kategori');
                    $this->db->order_by('id', 'DESC');
                    $this->db->limit(7);
                    $k = $this->db->get();
                    $k = $k->result_array();
                    foreach($k as $row):
                    ?>
                    <tr>
                      <td><?php echo $row['id']; ?></td>
                      <td><?php echo $row['kategori']; ?></td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="<?php echo base_url('admin/produk/kategori'); ?>" class="btn btn-sm btn-default btn-flat pull-right">Lihat Semua</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>

      </div>

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
