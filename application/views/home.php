<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Sacramento&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/home.css'); ?>">
    <title><?= $title; ?></title>
</head>

<body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="">Instasnap</a>
        <p class="navbar-brand welcome-text">Welcome, <?php echo !is_guest() ? $result['userdata']->username : 'Guest'; ?> </p>
        <a class="btn btn-danger ml-auto" href="<?= site_url('logout'); ?>">Logout</a>
    </nav>

    <div class="container-fluid" id="post-container">
        <div class="row justify-content-center" style="margin-bottom: 5px;">
            <div class="card">
                <div class="card-body">
                <?php if(!empty($this->session->flashdata('success'))){ 
            echo '<div class="alert alert-success">'.$this->session->flashdata('success').'</div>';
        }?>
                    <?php echo form_open_multipart('post'); ?>
                        <div class="form-group">
                            <label for="caption">Post your great picture at Instasnap right now</label>
                            <textarea name="caption" id="post" cols="85" rows="1" class="form-control" placeholder="Insert Caption here ..." maxlength="500"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="file" name="picture" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="form-control btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <hr />
    <div class="container-fluid" id="main-container">

        <div class="row justify-content-center" style="margin-bottom: 5px;">
            <div class="card">
                <div class="card mb-3">
                    <div class="card-title-block">
                        <h5 class="card-title" style="margin: 0px">Username</h5>
                        <p class="card-text" style="margin: 0px"><small class="text-muted">Time</small></p>
                        <p class="card-text">Caption.</p>
                    </div>
                    <img class="card-img-top" src="<?= base_url('assets/img/login-background.jpg'); ?>" alt="Card image cap">
                    <div class="card-title-action">
                        <p class="card-text" style="margin: 0px;"><small class="text-muted">Total like</small></p>
                        <button type="button" class="btn btn-outline-danger btn-block" style="margin: 1px;">Like</button>
                        <textarea rows="1" cols="1" class="form-control" placeholder="Write your comment here ..." maxlength="500"></textarea>
                        <button type="button" class="btn btn-info btn-block">Comment</button>
                    </div>
                    <div class="card-body">
                        <hr />
                        <div class="comment">
                            <h5 class="card-title" style="margin: 0px auto;">Username</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>