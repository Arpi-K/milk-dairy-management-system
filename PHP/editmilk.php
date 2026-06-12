<?php
$con=new mysqli("localhost","root","","phpdairy1");
$date="";
$session="";
$pid="";
$mid="";
$litre="";
$fat="";
$clr="";
$snf="";
$price="";
$total="";
$errorMessage="";
$successMessage="";
if($_SERVER['REQUEST_METHOD']=='GET'){
    if(!isset($_GET["pid"])){
        header("location:/phpdairy/milkdetails.php");
        exit;
    }
    $pid=$_GET["pid"];
    $mid=$_GET["mid"];
    $sql="SELECT * FROM tblmilk WHERE p_id=$pid AND m_id=$mid";
    $result=$con->query($sql);
    $row = $result->fetch_assoc();
    if(!$row){
        header("location:/phpdairy/milkdetails.php");
        exit;
    }
    $date=$row["date"];
    $session=$row["session"];
    $litre=$row["litre"];
    $fat=$row["fat"];
    $clr=$row["clr"];
    $snf=$row["snf"];
    $price=$row["price"];
}
else{
    $pid=$_POST["pid"];
    $mid=$_POST["mid"];
    $date=$_POST["date"];
    $session=$_POST["session"];
    $litre=$_POST["litre"];
    $fat=$_POST["fat"];
    $snf=$_POST["snf"];
    $clr=$_POST["clr"];
    $price=$_POST["price"];
    do{
        if(empty($date)||empty($litre)||empty($fat)||empty($snf)||empty($clr)||empty($price)||empty($session)){
            $errorMessage="All the fields are required ";
            break;
        }
        $sql="UPDATE tblmilk SET fat=$fat,clr=$clr,litre=$litre,snf=$snf,price=$price,date='$date',tot_price=($litre*$price),session='$session' WHERE p_id=$pid AND m_id=$mid";
        $result=$con->query($sql);
        if(!$result){
            $errorMessage="Invalid query:".$con->error;
            break;
        }
        $successMessage="Milk details updated successfully";
        header("location:/phpdairy/milkdetails.php");
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
    <title>Edit Milk</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
</head>
<body style="background-image: url(img3.jpg);background-size:cover;background-repeat: no-repeat;">
    <div class="container my-5">
        <h2>Edit Milk Details</h2>
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
            <input type="hidden" name="pid" value="<?php echo $pid;?>">
            <input type="hidden" name="mid" value="<?php echo $mid;?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Date</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="date" value="<?php echo $date;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Session</label>
                <div class="col-sm-6">
                    <select name="session" class="form-control" required>
                        <option value="Morning">Morning</option>
                        <option value="Evening">Evening</option>
                    </select> 
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Quantity(in Litre)</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="litre" value="<?php echo $litre;?>" step="0.01">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Fat</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="fat" value="<?php echo $fat;?>" step="0.01">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">SNF</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="snf" value="<?php echo $snf;?>" step="0.01">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">CLR</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="clr" value="<?php echo $clr;?>" step="0.01">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Price</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="price" value="<?php echo $price;?>" step="0.01">
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
                    <a class="btn btn-outline-primary" href="/phpdairy/milkdetails.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>