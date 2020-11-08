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
                <h3 class="box-title">Edit Produk</h3> 
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
              <div class="col-md-8">
                <?php echo form_open("admin/prosesupdateproduk"); ?>
                  <input type="text" name="id" value="<?php echo $id; ?>" hidden>
                  <div class="form-group">
                    <label>Nama Produk</label>
                    <?php $data = array('type' => 'text', 'class' => 'form-control', 'name' => 'nama_produk', 'value' => set_value('nama_produk', $nama_produk)); echo form_input($data); ?>
                    <?php echo form_error('nama_produk', '<p class="text-red">', '</p>'); ?>
                  </div>

                  <div class="form-group">
                    <label>Harga</label>
                    <?php $data = array('type' => 'text', 'class' => 'form-control', 'name' => 'harga', 'value' => set_value('harga', $harga)); echo form_input($data); ?>
                    <?php echo form_error('harga', '<p class="text-red">', '</p>'); ?>
                  </div>

                  <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea id="editor1" name="deskripsi" rows="10" cols="80">
                      <?php echo $deskripsi; ?>
                    </textarea>
                    <?php echo form_error('deskripsi', '<p class="text-red">', '</p>'); ?>
                  </div>
              </div>
              
              <div class="col-md-4">
                <div class="form-group">
                  <label>Kategori</label>
                  <select class="form-control select2" name="kategori">
                  <?php $kat = $this->db->get('kategori'); $kat=$kat->result_array(); foreach($kat as $row) { ?>
                    <option value="<?php echo $row['kategori']; ?>" <?php echo set_select('kategori', $row['kategori'], ($row['kategori'] == $kategori)? true : false ); ?>><?php echo $row['kategori']; ?></option>
                  <?php } ?>
                  </select>
                  <?php echo form_error('kategori', '<p class="text-red">', '</p>'); ?>
                </div>

                <div class="form-group">
                  <label>Stok</label>
                  <?php $data = array('type' => 'number', 'class' => 'form-control', 'name' => 'qty', 'value' => set_value('qty', $qty)); echo form_input($data); ?>
                  <?php echo form_error('stok', '<p class="text-red">', '</p>'); ?>
                </div>

              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <?php echo form_submit('submit', 'Submit', array('class' => 'btn btn-primary')); ?>
              <?php echo form_reset('reset', 'Reset', array('class' => 'btn btn-danger')); ?>
            </div>
            <?php echo form_close(); ?>
            <?php  ?>
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
<script>
$("#upfile1").click(function () {
    $("#file1").trigger('click');
});
</script>

</body>
</html>
