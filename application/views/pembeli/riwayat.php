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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
</head>
<body>

<section class="section section-header">
    <?php $this->load->view('pembeli/library/header'); ?>
</section>

<section class="section section-profil">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mt-3">
                <?php $this->load->view('pembeli/library/sidebar'); ?>
            </div>

            <div class="col-md-8 mt-3">
                <?php
                if($this->session->flashdata('sukses'))
                {
                    echo '<div class="alert alert-success">'.$this->session->flashdata('sukses').'</div>';
                }
                ?>
                <div class="card">
                    <div class="card-header text-white bg-primary">
                        Riwayat Pemesanan
                    </div>
                    <div class="card-body table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Produk</th>
                                    <th>Qty</th>
                                    <th>Harga (Rp.)</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($data as $row): ?>
                                <tr>
                                    <td><?php echo $row['nama_produk']; ?></td>
                                    <td><?php echo $row['qty']; ?></td>
                                    <td>
                                        <?php echo number_format($row['total_harga'], 2,'.','.'); ?>
                                    </td>
                                    <td><?php echo $row['tanggal']; ?></td>
                                    <td>
                                        <?php 
                                        if($row['status'] == 'Dalam Pemesanan'):
                                            echo '<badge class="badge badge-primary">'.$row['status'].'</badge>';
                                        endif;
                                        if($row['status'] == 'Dalam Pengiriman'):
                                            echo '<badge class="badge badge-info">'.$row['status'].'</badge>';
                                        endif;
                                        if($row['status'] == 'Barang Diterima'):
                                            echo '<badge class="badge badge-success">'.$row['status'].'</badge>';
                                        endif;
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Produk</th>
                                    <th>Qty</th>
                                    <th>Harga</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                </tr>
                            </tfoot>
                        </table>
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
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script>
$(document).ready(function() {
    $('#example').DataTable({
        "autoWidth": false
    });
} );
</script>
</body>
</html>