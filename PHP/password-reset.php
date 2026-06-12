<?php
session_start();
$pag_title="Password Reset Form";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Reset Password</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/home.css">
        <link rel="stylesheet" href="css/news.css">
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body style="background-image: url(img3.jpg);background-size:cover;background-repeat: no-repeat;">
<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php
                if(isset($_SESSION['status'])){
                    ?>
                    <div class="alert alert-success">
                        <h5><?=$_SESSION['status'];?></h5>
                    </div>
                    <?php
                    unset($_SESSION['status']);
                }
                ?>
                <div class="card">
                    <div class="card-header">
                        <h5>Reset Password</h5>
                    </div>
                    <div class="card-body p-4">
                        <form action="password-reset-code.php" method="post">
                            <div class="form-group mb-3">
                                <label>Email Address</label>
                                <input type="text" name="email"class="form-control"placeholder="Enter your email address">
                            </div>    
                            <div class="form-group mb-3">
                                <button type="submit" name="password_reset_link"class="btn btn-primary">Send Password Reset Link</button>
                            </div>                    
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    </body>
</html>