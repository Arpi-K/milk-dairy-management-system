<?php
$con=new mysqli("localhost","root","","phpdairy1");
$date="";
$mqty="";
$time="";
$loc="";
$errorMessage="";
$successMessage="";
if($_SERVER['REQUEST_METHOD']=='POST'){
    $date=$_POST["date"];
    $mqty=$_POST["mqty"];
    do {
        if(empty($date)||empty($mqty)){
            $errorMessage="All the fields are required ";
            break;
        }
        $sql="INSERT INTO tbltransport(m_qty,t_date) VALUES($mqty,'$date')";
        $result=$con->query($sql);
        if(!$result){
            $errorMessage="Invalid query:".$con->error;
            break;
        }
        $date="";
        $mqty="";
        $successMessage="Milk Transport details added successfully";       
        header("location:/phpdairy/transport.php");
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
    <title>Add Milk Transport details</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
</head>
<body  style="background-image: url(img3.jpg);background-size:cover;background-repeat: no-repeat;">
    <div class="container my-5">
        <h2>Transport Details</h2>
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
                <label class="col-sm-3 col-form-label">Date</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="date" value="<?php echo $date;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Total Quantity(in Litre)</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="mqty" value="<?php echo $mqty;?>" step="0.01">
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
                    <button type="submit" class="btn btn-primary" >Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/phpdairy/transport.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>