
<!doctype html>
<html lang="en">
  <head>
    <title>Go Shopping</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/pembeli/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/pembeli/css/auth.css">
  </head>

  <body class="text-center">
    <?php echo form_open('auth/prosesregister', array('class' => 'form-signin mb-3')) ?>
      <a href="<?php echo base_url('/'); ?>">
        <img class="mb-4" src="<?php echo base_url('asset/img/logo.png'); ?>" alt="" width="100" height="100">
      </a>
      <?php
        echo validation_errors();

        if($this->session->flashdata('sukses'))
        {
            echo '<div class="alert alert-success">' . $this->session->flashdata('sukses') . '</div>';
        }
        if($this->session->flashdata('error'))
        {
            echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
        }
      ?>
      <h1 class="h3 mb-3 font-weight-normal">Register</h1>

      <label for="inputEmail" class="sr-only">Username</label>
      <?php
        $data = array('type' => 'text', 'class' => 'form-control', 'name' => 'username', 'placeholder' => 'Username', 'required' => 'true', 'autofocus' => 'true');
        echo form_input($data);
      ?>
      
      <label for="inputEmail" class="sr-only">Email address</label>
      <?php
        $data = array('type' => 'email', 'class' => 'form-control', 'name' => 'email', 'placeholder' => 'Email Address', 'required' => 'true');
        echo form_input($data);
      ?>
      
      <label for="inputPassword" class="sr-only">Password</label>
      <?php
        $data = array('type' => 'password', 'class' => 'form-control', 'name' => 'password', 'placeholder' => 'Password', 'required' => 'true');
        echo form_input($data);
      ?>

      <button class="btn btn-lg btn-primary btn-block my-4" type="submit">Register</button>

      <a href="<?php echo base_url('/'); ?>" class="badge badge-primary">Home</a>
      <a href="<?php echo base_url('login'); ?>" class="badge badge-warning">Login</a>
      <p class="mt-5 mb-3 text-muted">&copy; <?php echo date('Y'); ?></p>
    <?php echo form_close(); ?>
  </body>
</html>
