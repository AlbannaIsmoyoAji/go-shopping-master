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
            <div class="col-md-4 mt-3">
                <?php $this->load->view('pembeli/library/sidebar'); ?>
            </div>

            <div class="col-md-8 mt-3">
                <div class="card">
                    <div class="card-header text-white bg-primary">
                        Ubah Password
                    </div>
                    <div class="card-body">
                        <?php echo form_open('pembeli/ubahprofil'); ?>
                            <div class="form-group">
                                <label>Password Lama</label>
                                <?php
                                $data = array('type' => 'password', 'class' => 'form-control', 'name' => 'passwordlama', 'placeholder' => 'Password Lama', 'value' => set_value('passwordlama'), 'autofocus' => 'true');
                                echo form_input($data);
                                echo form_error('passwordlama', '<p class="text-danger">', '</p>');
                                ?>
                            </div>
                            <div class="form-group">
                                <label>Password Baru</label>
                                <?php
                                $data = array('type' => 'password', 'class' => 'form-control', 'name' => 'passwordbaru', 'placeholder' => 'Password Baru', 'value' => set_value('passwordbaru'));
                                echo form_input($data);
                                echo form_error('passwordbaru', '<p class="text-danger">', '</p>');
                                ?>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        <?php echo form_close(); ?>
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