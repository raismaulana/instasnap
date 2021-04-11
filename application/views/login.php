<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('assets/css/login.css');?>">
    <!-- font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Sacramento&display=swap" rel="stylesheet">

    <title><?= $title;?></title>
</head>
<body>

    <!-- Main Content -->
    <div class="container-fluid login-content">
        <div class="row login-head">
            <div class="col-12">
                <h2 class="text-center" >Instasnap</h2>
            </div>
        </div>
        <?php if(!empty($this->session->flashdata('register_success'))){ 
            echo '<div class="alert alert-success">'.$this->session->flashdata('register_success').'</div>';
        }
        if(!empty($this->session->flashdata('failed_login'))){ 
            echo '<div class="alert alert-danger">'.$this->session->flashdata('failed_login').'</div>';
        }
        ?>
        <div class="row">
            <div class="col-12">
                <?= form_open(site_url('login')); ?>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" autocomplete="off" maxlength="45" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" autocomplete="off" maxlength="255" class="form-control" name="password" required>
                </div>
                <div class="form-group text-center">
                    <input type="submit" class="btn btn-primary btn-block" value="Login">
                </div>
                <?= form_close(); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p>Don't have an account? <a href="<?= site_url('register');?>">Register Here</a></p>
            </div>
        </div>
	</div>
	<!-- Footer -->
	<div class="container-fluid text-center footer">
        <p> © Copyright 2021 Instasnap.</p>
	</div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>