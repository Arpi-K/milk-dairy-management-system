<?php
session_start();
$con=new mysqli("localhost","root","","phpdairy1");
if(isset($_SESSION['p_id'])){
$name="";
$email="";
$pid="";
$phone="";
$addr="";
$errorMessage="";
$successMessage="";
if($_SERVER['REQUEST_METHOD']=='GET'){
    $sql="SELECT * FROM tblproducer WHERE p_id=$_SESSION[p_id]";
    $result=$con->query($sql);
    $row = $result->fetch_assoc();
    if(!$row){
        $errorMessage="Please Login";
        header("location:/phpdairy/login.php");
        exit;
    }
    $name=$row["p_name"];
    $email=$row["p_mail"];
    $phone=$row["phone"];
    $addr=$row["address"];
}
else{
    $name=$_POST["name"];
    $phone=$_POST["phone"];
    $addr=$_POST["address"];
    do{
        if(empty($name)||empty($phone)||empty($addr)){
            $errorMessage="All the fields are required ";
            break;
        }
        if(isset($_POST['update'])){
        $sql="UPDATE tblproducer SET p_name='$name',phone=$phone,address='$addr' WHERE p_id=$_SESSION[p_id]";
        $result=$con->query($sql);
        if(!$result){
            $errorMessage="Invalid query:".$con->error;
            break;
        }
        $successMessage="Your details updated successfully";
    }
    }while(false);
}
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>My Account</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
        <link rel="stylesheet" href="css/home.css"> 
        <script src="jquery/jquery.min.js"></script>
    </head>
    <body style="background-image: url(img3.jpg);background-size:100% 100%;background-repeat: no-repeat;">
        <div class="main">
        <?php 
        include('header.php');
        ?>
            <hr >
            <div class="container mt-4 shadow-lg">
                <div class="row">
                    <div class="col-md-3"></div>
                        <div class="col-md-6" style="font-family: 'Times New Roman';">
                            <h2 class="text-white text-center">My Account</h2>
                            <hr>
                            <?php
                                if(!empty($errorMessage)){
                                    echo "
                                    <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                    <strong>$errorMessage</strong>
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
                                    </div>
                                    ";
                                }
                                ?>
                            <form style="color: white;" method="post">
                                <div class="form-group mt-3 mb-3">
                                    <label class="form-label">Full Name:</label>
                                    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label class="form-label">Email:</label>
                                    <input type="email" class="form-control"name="email" value="<?php echo $email; ?>" readonly>
                                </div>
                                <div class="form-group mt-3 mb-3">
                                    <label class="form-label">Phone Number:</label>
                                    <input type="number" class="form-control" name="phone" value="<?php echo $phone; ?>" required>
                                </div>
                                <div class="form-group mt-3 mb-3">
                                    <label class="form-label">Address:</label>
                                    <input type="text" class="form-control" name="address" value="<?php echo $addr; ?>" required>
                                </div>
                                <div class="container my-5" >
                                <br/>
        <h2>List of Orders from last 5 days</h2>
        <br/>

        <table class="table table-info" >
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Delivery Address</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $con=new mysqli("localhost","root","","phpdairy1");
                if($con->connect_error){
                    die("Failed to connect:".$con->connect_error);
                }
                if(isset($_SESSION['p_id'])){
                $sql="SELECT *,amt*quantity as sum FROM tblorder,tblproducer,tblfeed WHERE tblfeed.cf_id=tblorder.cf_id AND tblproducer.p_id=tblorder.p_id AND tblproducer.p_id='$_SESSION[p_id]' LIMIT 5";
                $result=$con->query($sql);
                if(!$result){
                    die("Invalid query:".$con->error);
                }
                while($row = $result->fetch_assoc()){
                    echo "
                    <tr>
                    <td>$row[order_id]</td>
                    <td>$row[p_name]</td>
                    <td>$row[feed_name]</td>
                    <td>$row[quantity]</td>
                    <td>$row[addr]</td>
                    <td>$row[sum]</td>
                    <td>$row[order_date]</td>
                    <td>$row[status]</td>
                </tr>
                ";
                }
              }
                ?>
                
            </tbody>
        </table>
        <br/>
        <h2>Feedbacks</h2>
        <br/>

        <table class="table table-info" >
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Message</th>
                    <th>Rating</th>
                    <th>Reply</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $con=new mysqli("localhost","root","","phpdairy1");
                if($con->connect_error){
                    die("Failed to connect:".$con->connect_error);
                }
                if(isset($_SESSION['p_id'])){
                $sql="SELECT * FROM tblproducer,tblfeedback WHERE tblfeedback.p_id=tblproducer.p_id AND tblproducer.p_id='$_SESSION[p_id]' LIMIT 5";
                $result=$con->query($sql);
                if(!$result){
                    die("Invalid query:".$con->error);
                }
                while($row = $result->fetch_assoc()){
                    echo "
                    <tr>
                    <td>$row[f_id]</td>
                    <td>$row[msg]</td>
                    <td>$row[rating]</td>
                    <td>$row[reply]</td>
                </tr>
                ";
                }
              }
                ?>
                
            </tbody>
        </table>
    </div>
                                <div style="background-color:pink;border-radius:5px;width:60px;height:30px;">
                  <a href="logout.php" style="color:black;" onclick="<?php echo "<script>alert('Do you really want to logout?');</script>";?>">Logout</a>
                  </div>
                                <?php if(!empty($successMessage)){
                            echo "
                            <div class='row mb-3'>
                                <div class='offset-sm-3 col-sm-6'>
                            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong>$successMessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>
                            </div>
                            </div>
                            ";
                        }
                        ?>
                                <br><button type="submit" class="btn btn-primary" name="update">Update details</button>
                                
                            </form>
                            <br/>
                        </div>
                </div>
            </div>
            <br/>
            <br/>
            <br/>
            <?php
        include("footer.php");
        ?>
            </div>
            <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
    <script src="jquery/jquery.min.js"></script>
    <script type="text/javascript">
        $(function () {
 
 $(".rateyo").rateYo().on("rateyo.change",function(e,data){
   var rating=data.rating;
   $(this).parent().find('.score').text('score: '+$(this).attr('data-rateyo-score'));
   $(this).parent().find('.result').text('rating: '+rating);
   $(this).parent().find('input[name=rating]').val(rating);
 });

});
    </script>
    </body>
</html>