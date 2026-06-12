<script src="jquery/jquery.min.js"></script>
<?php
$con=new mysqli("localhost","root","","phpdairy1");
if($con->connect_error){
    die("Failed to connect:".$con->connect_error);
}
$id='';
$id=$_GET["fid"];
session_start();
    $pid="";
    $sql="SELECT p_id FROM tblproducer where p_mail='$_SESSION[p_mail]'";
        $result=mysqli_query($con,$sql);
        if(!$result){
            die("Invalid query:".$con->error);
        }
        while($row = $result->fetch_assoc()){
            $pid=$row['p_id'];
            break;
        }
$name="";
$email="";
$phone="";
$addr="";
$qty="";
$cod="";
$errorMessage="";
$successMessage="";
if(isset($_SESSION['p_id'])){
    $sql="SELECT * FROM tblproducer WHERE p_id=$_SESSION[p_id]";
    $result=$con->query($sql);
    $row = $result->fetch_assoc();
    if(!$row){
        $errorMessage="No details found!!";
    }
    $name=$row["p_name"];
    $email=$row["p_mail"];
    $phone=$row["phone"];
}
if($_SERVER['REQUEST_METHOD']=='POST'){
    $addr=$_POST["addr"];
    $qty=$_POST["qty"];
    $cod=$_POST["cod"];
    do {
        if(empty($name)||empty($email)||empty($phone)||empty($addr)||empty($qty)||empty($cod)){
            $errorMessage="All the fields are required ";
            break;
        }
        $sql="INSERT INTO tblorder(quantity,addr,paymethod,cf_id,p_id)"."VALUES($qty,'$addr','$cod','$id','$pid')";
        $result=$con->query($sql);
        if(!$result){
            $errorMessage="Invalid query:".$con->error;
            break;
        }
        $addr="";
        $phone="";
        $cod="";
        $_SESSION['alert']="Order placed successfully";  
        header("location:/phpdairy/cattlefeed.php");     
    }while(false);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place Order</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
</head>
<body  style="background-image: url(img3.jpg);background-size:cover;background-repeat: no-repeat;">
    <div class="container my-5">
        <h2>Add details</h2>
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
<form method="post">
        <div class="row mb-3">
        <label for="name" class="col-sm-3 col-form-label"><b>Name:</b></label>
                <div class="col-sm-6">
                <input class="form-control" type="text" name="name" value="<?php echo $name ?>" required readonly>
            </div>
        </div>
            <div class="row mb-3">
            <label for="email" class="col-sm-3 col-form-label"><b>Email:</b></label>
                <div class="col-sm-6">
                <input class="form-control" type="email" name="email" value="<?php echo $email ?>" required readonly>
                </div>
            </div>
            <div class="row mb-3">
            <label for="phone" class="col-sm-3 col-form-label"><b>Phone Number:</b></label>
                <div class="col-sm-6">
                <input class="form-control" type="text" name="phone" value="<?php echo $phone ?>" required readonly>
                </div>
            </div>
            <div class="row mb-3">
            <label for="addr" class="col-sm-3 col-form-label"><b>Delivery Address</b></label>
                <div class="col-sm-6">
                <textarea rows="4" class="form-control" name="addr" required ></textarea>
                </div>
            </div>
            <div class="row mb-3">
            <label for="qty" class="col-sm-3 col-form-label"><b>Quantity(in packets)</b></label>
                <div class="col-sm-6">
                <input class="form-control" type="number" name="qty"  required autocomplete="off">
                </div>
            </div>
            <div class="row mb-3">
            <label for="cod" class="col-sm-3 col-form-label"><b>Payment Method</b></label>
                <div class="col-sm-6">
                <input type="radio" name="cod" value="cod"/>&nbsp;Cash on Delivery
                </div>
            </div>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary" name="order" >Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/phpdairy/cattlefeed.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>