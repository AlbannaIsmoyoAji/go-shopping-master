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

<section class="section section-produk">
    <div class="container">
        <h4>Produk</h4>
        <div class="row">
            <?php 
            foreach($data as $row) {
            ?>
                <div class="col-lg-3 col-md-6 col-sm-12 mb-3 d-flex">
                    <a href="<?php echo base_url('post/').$row['slug_nama_produk']; ?>">
                        <div class="card">
                            <img class="card-img-top img-fluid" src="<?php echo base_url('asset/img/produk/').$row['nama_file']; ?>" alt="<?php echo $row['slug_nama_produk']; ?>">
                            <div class="card-body">
                                <h5><?php echo $row['nama_produk']; ?></h5>
                                <small>Rp. <?php echo number_format($row['harga'], 2,",",".") ; ?></small>
                            </div>
                        </div>
                    </a>
                </div>
            <?php } ?>
            <div class="col-sm-12">
                <?php echo $this->pagination->create_links(); ?>
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