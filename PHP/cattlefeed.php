<?php
$con=new mysqli("localhost","root","","phpdairy1");
session_start();
?>
 <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Cattle Feed Transaction</title>
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
                <h1 class='text-center my-4 ' style='color: pink;'>Cattle Feed Details</h1>
                <br>
                <?php
        if(isset($_SESSION['alert'])){
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>$_SESSION[alert]</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
        ?>
                <?php
        
                      $sql="SELECT * FROM tblsupervisor";
                      $result=mysqli_query($con,$sql);
                       if(mysqli_num_rows($result)===1){
                       $row=mysqli_fetch_assoc($result);
                    if($row['role']==="$_SESSION[role]"){
        echo "<a class='btn btn-primary'href='/phpdairy/addfeed.php' role='button' style='margin-left:200px;'>New Feed</a>";
                    }
                }
                ?>
                <div class='row row-cols-1 row-cols-md-2 g-4'>
                      <?php
                        $con=new mysqli("localhost","root","","phpdairy1");
                        if($con->connect_error){
                            die("Failed to connect:".$con->connect_error);
                        }
                        $sql="SELECT * FROM tblfeed";
                        $result=$con->query($sql);
                        if(!$result){
                            die("Invalid query:".$con->error);
                        }
                        while($row = $result->fetch_assoc()){
                          $id=$row['cf_id'];
                        echo "
                    <div class='col'style='padding:10%'>
                      <div class='card' style='width: 20rem;'>
                    <img src='$row[cf_photo]' class='card-img-top img-fluid' alt='...'>
                    <div class='card-body'>
                          <h5 class='card-title'>$row[feed_name]</h5>
                          <p class='card-text'>$row[details]<br>$row[qty]&nbsp;Kg<br><b>$row[amt]/-</b></p>";
                          if(isset($_SESSION['p_id'])){
                          echo "<a href='order.php?fid=$id' class='btn btn-primary'id='order'>Place Order</a>";
                          }
                          echo"
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