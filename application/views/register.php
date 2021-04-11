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
                <h2 class="text-center" >Register</h2>
            </div>
        </div>
        <?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?>
        <div class="row">
            <div class="col-12">
                <?= form_open(site_url('register')); ?>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" autocomplete="off" minlength="1" maxlength="25" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" autocomplete="off" maxlength="45" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" autocomplete="off" minlength="5" maxlength="12" class="form-control" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" autocomplete="off" minlength="5" maxlength="255" class="form-control" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="confirmpassword">Confirm Password</label>
                    <input type="password" autocomplete="off" minlength="5" maxlength="255" class="form-control" id="confirmpassword" name="confirmpassword" required>
                </div>
                <div class="form-group text-center">
                    <input type="submit" class="btn btn-primary btn-block" value="Submit">
                </div>
                <?= form_close(); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p>Already have an account? <a href="<?= site_url('login');?>">Login Here</a></p>
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