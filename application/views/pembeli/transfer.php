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

<section class="section section-profil">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Halo, <?php echo $this->session->userdata('username'); ?>!</h5>
                        <p>
                            Terima kasih telah melakukan transaksi. <br>
                            Tagihan Anda sebesar <b>Rp. <?php echo number_format($this->session->userdata('tagihan'), 2,'.','.'); ?></b> <br>
                            Silahkan transfer ke No Rekening dibawah.
                        </p>
                        <hr>
                        <h3>No Rekening</h3>
                        <table width="500">
                            <tr>
                                <td>BCA</td>
                                <td>:</td>
                                <td>xxxx xxxx xxxx xxxx</td>
                            </tr>
                            <tr>
                                <td>BRI</td>
                                <td>:</td>
                                <td>xxxx xxxx xxxx xxxx</td>
                            </tr>
                            <tr>
                                <td>MANDIRI</td>
                                <td>:</td>
                                <td>xxxx xxxx xxxx xxxx</td>
                            </tr>
                        </table>
                        <hr>
                        <p>
                            Silahkan melakukan konfirmasi di 08xx-xxxx-xxxx (WA) dengan format <br>
                            <b>#NAMA_PEMBELI#TAGIHAN</b>
                        </p>
                    </div>
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