<?php
include('dbconnect.php');
$date="";
$name="";
$oid="";
$stats="";
$errorMessage="";
$successMessage="";
if($_SERVER['REQUEST_METHOD']=='GET'){
    if(!isset($_GET["oid"])){
        header("location:/phpdairy/vieworder.php");
        exit;
    }
    $oid=$_GET["oid"];
    $sql="SELECT * FROM tblorder,tblproducer WHERE order_id=$oid AND tblproducer.p_id=tblorder.p_id";
    $result=$con->query($sql);
    $row = $result->fetch_assoc();
    if(!$row){
        header("location:/phpdairy/vieworder.php");
        exit;
    }
    $date=$row["order_date"];
    $name=$row["p_name"];
    $stats=$row["status"];
}
else{
    $oid=$_POST["oid"];
    $date=$_POST["date"];
    $name=$_POST["name"];
    $stats=$_POST["status"];
    do{
        if(empty($date)||empty($name)||empty($stats)){
            $errorMessage="All the fields are required ";
            break;
        }
        $sql="UPDATE tblorder SET status='$stats' WHERE order_id=$oid";
        $result=$con->query($sql);
        if(!$result){
            $errorMessage="Invalid query:".$con->error;
            break;
        }
        $successMessage="Order details updated successfully";
        header("location:/phpdairy/vieworder.php");
        exit;
    }while(false);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Order</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
</head>
<body style="background-image: url(img3.jpg);background-size:cover;background-repeat: no-repeat;">
    <div class="container my-5">
        <h2>Edit Order Status</h2>
        <?php
        if(!empty($errorMessage)){
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>$errorMessage</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
        ?>
        <form method="post">
            <input type="hidden" name="oid" value="<?php echo $oid;?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Date</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="date" value="<?php echo $date;?>"readonly>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $name;?>" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Status</label>
                <div class="col-sm-6">
                    <select name="status" class="form-control" required>
                        <option value="Pending">Pending</option>
                        <option value="Delivered">Delivered</option>
                    </select> 
                </div>
            </div>
            <?php
        if(!empty($successMessage)){
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
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/phpdairy/vieworder.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>