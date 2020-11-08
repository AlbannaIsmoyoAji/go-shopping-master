<!DOCTYPE html>
<html lang="en">
<head>
    <title>Go Shopping</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/pembeli/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/pembeli/css/style.css">
</head>
<body>

<section class="section section-header">
    <?php $this->load->view('pembeli/library/header'); ?>
</section>

<section class="section section-keranjang">
    <div class="container">
        <h2 class="my-4">Keranjang Belanja</h2>
        <?php
        if($this->session->flashdata('tambah'))
        {
            echo '<div class="alert alert-success">'.$this->session->flashdata('tambah').'</div>';
        }
        if($this->session->flashdata('update'))
        {
            echo '<div class="alert alert-success">'.$this->session->flashdata('update').'</div>';
        }
        if($this->session->flashdata('sukses'))
        {
            echo '<div class="alert alert-success">'.$this->session->flashdata('sukses').'</div>';
        }
        if($this->session->flashdata('gagal'))
        {
            echo '<div class="alert alert-danger">'.$this->session->flashdata('gagal').'</div>';
        }
        ?>
        <div class="table-responsive">
            <table class="table table-sm table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Qty</th>
                        <th scope="col" colspan="2">Sub Total</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                $total = 0;
                foreach($data as $row) {
                ?>
                    <tr>
                        <input type="text" name="id" value="<?php echo $row['id']; ?>" hidden>
                        <th scope="row"><?php echo $no++; ?></th>
                        <td> <?php echo $row['nama_produk']; ?> </td>
                        <td> Rp. <?php echo number_format($row['harga'], 2,".","."); ?> </td>
                        <td> <?php echo $row['qty']; ?> </td>
                        <td> Rp. <?php echo number_format($row['total_harga'], 2,".","."); ?> </td>
                        <td width="2"> <a href="" class="badge badge-danger float-right" data-toggle="modal" data-target="#hapusmodal<?php echo $row['id']; ?>" title="Hapus Keranjang"><i class="fa fa-times"></i></a> </td>
                    </tr>
                <?php $total += $row['total_harga']; } ?>
                    <tr>
                        <th colspan="4">Total Harga</th>
                        <th colspan="2"> Rp. <?php echo number_format($total, 2,".","."); ?> </th>
                    </tr>
                </tbody>
            </table>

            <a href="<?php echo base_url('/'); ?>" class="btn btn-primary">Kembali Berbelanja</a>
            <?php
            if($data != NULL)
            {
                echo '<a href="'.base_url('pembayaran').'" class="btn btn-success">Lanjut Pembayaran</a>';
            }
            ?>
        </div>
    </div>
</section>

<!-- Modal -->
<?php foreach($data as $row) { ?>
<div class="modal fade" id="hapusmodal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Hapus Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Ingin Menghapus Produk <b><?php echo $row['nama_produk']; ?></b> ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <a href="<?php echo base_url('hapuskeranjang/').$row['id']; ?>" class="btn btn-success">Hapus</a>
      </div>
    </div>
  </div>
</div>
<?php } ?>

<div class="footer">
    <?php $this->load->view('pembeli/library/footer'); ?>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="<?php echo base_url(); ?>asset/pembeli/js/bootstrap.min.js"></script>
</body>
</html>