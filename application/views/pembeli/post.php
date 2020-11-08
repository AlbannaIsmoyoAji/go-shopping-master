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

<section class="section section-produk-post">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                <?php foreach($data as $row) { ?>
                    <div class="col-md-6 col-sm-12">
                        <img src="<?php echo base_url('asset/img/produk/').$row['nama_file']; ?>" class="card-img-top" height="500" alt="">
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <h3><?php echo $row['nama_produk']; ?></h3>
                        <h5 class="text-danger">Rp. <?php echo number_format($row['harga'], 2,".","."); ?></h5>
                        <hr>
                        <?php echo $row['deskripsi']; ?>
                        <p>Stok: <?php echo $row['qty']; ?></p>
                        <a href="" class="badge badge-primary"><?php echo $row['kategori']; ?></a>
                        <hr>
                        <?php
                            if($this->session->flashdata('error'))
                            {
                              echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
                            }
                        ?>
                        <?php echo form_open('pembeli/tambahkeranjang'); ?>
                        <input type="text" name="id" value="<?php echo $row['id']; ?>" hidden>
                            <?php
                                $data = array('type' => 'text', 'name' => 'nama_produk', 'value' => $row['nama_produk'], 'hidden' => 'true');
                                echo form_input($data);
                            ?>
                            <?php
                                $data = array('number' => 'text', 'name' => 'harga', 'value' => $row['harga'], 'hidden' => 'true');
                                echo form_input($data);
                            ?>
                            <?php
                            $session = $this->session->userdata('username');
                            if(!$session)
                            {
                                echo '<p class="text-danger">Silahkan Daftar / Masuk Terlebih Dahulu Untuk Melakukan Pemesanan</p>';
                            }
                            else
                            {
                            ?>
                            <label for="">Jumlah Pesanan</label>
                            <?php
                                $data = array('type' => 'number', 'class' => 'form-control', 'name' => 'qty', 'required' => 'true');
                                echo form_input($data);
                            ?>
                            <br>
                            <?php echo form_submit('submit', 'Tambah ke Keranjang', array('class' => 'btn btn-primary')); } ?>
                    </div>
                        <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="footer">
    <?php $this->load->view('pembeli/library/footer'); ?>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="<?php echo base_url(); ?>asset/pembeli/js/bootstrap.min.js"></script>
</body>
</html>