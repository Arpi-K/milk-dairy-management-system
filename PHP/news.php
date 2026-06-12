<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>News Blog</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/home.css">
        <link rel="stylesheet" href="css/news.css">
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body style="background-image: url(img3.jpg);background-size:100% 100%;background-repeat: no-repeat;">
        <div class="main">
        <?php 
        include('header.php');
        ?>
            <hr size="2">
            <div class='container my-5'>
                <h1 class='text-center my-4 ' style='color: pink;'>Latest Dairy News</h1>
                <div class='row row-cols-1 row-cols-md-3 g-4'>
                      <?php
                      $con=new mysqli("localhost","root","","phpdairy1");
                        if($con->connect_error){
                            die("Failed to connect:".$con->connect_error);
                        }
                        $sql="SELECT * FROM tblnews";
                        $result=$con->query($sql);
                        if(!$result){
                            die("Invalid query:".$con->error);
                        }
                        while($row = $result->fetch_assoc()){
                          $nid=$row['n_id'];
                        echo "
                    <div class='col'>
                      <div class='card h-100'>
                    <img src='$row[photo_id]' class='card-img-top img-fluid' alt='...'>
                    <div class='card-body'>
                          <h5 class='card-title'>$row[n_title]</h5>
                          <p class='card-text'>$row[subject]<a href='content.php?myid=$nid' target='_blank'> Read more</a></p>
                        </div>
                        <div class='card-footer'>
                          <small class='text-body-secondary'>$row[n_date]&nbsp;$row[n_time]</small>
                        </div>   
                        </div>
                          </div>
                        
                ";
                }
                ?> 
                </div>
                </div>
                <?php
        include("footer.php");
        ?>
            </div>
    </body>
</html>