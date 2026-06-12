<?php
$con=new mysqli("localhost","root","","phpdairy1");
$tdate="";
$tid="";
$mqty="";
$errorMessage="";
$successMessage="";
if($_SERVER['REQUEST_METHOD']=='GET'){
    if(!isset($_GET["tid"])){
        header("location:/phpdairy/viewtransport.php");
        exit;
    }
    $tid=$_GET["tid"];
    $sql="SELECT * FROM tbltransport WHERE t_id=$tid";
    $result=$con->query($sql);
    $row = $result->fetch_assoc();
    if(!$row){
        header("location:/phpdairy/viewtransport.php");
        exit;
    }
    $tdate=$row["t_date"];
    $mqty=$row["m_qty"];
}
else{
    $tid=$_POST["tid"];
    $tdate=$_POST["tdate"];
    $mqty=$_POST["mqty"];
    do{
        if(empty($tdate)||empty($mqty)){
            $errorMessage="All the fields are required ";
            break;
        }
        $sql="UPDATE tbltransport SET m_qty=$mqty,t_date=$tdate WHERE t_id=$tid";
        $result=$con->query($sql);
        if(!$result){
            $errorMessage="Invalid query:".$con->error;
            break;
        }
        $successMessage="Milk Transport details updated successfully";
        header("location:/phpdairy/viwtransport.php");
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
    <title>Edit Transport Details</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
</head>
<body style="background-image: url(img3.jpg);background-size:cover;background-repeat: no-repeat;">
    <div class="container my-5">
        <h2>Edit Milk Transport Details</h2>
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
            <input type="hidden" name="tid" value="<?php echo $tid;?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Date</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="tdate" value="<?php echo $tdate;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Quantity(in Litre)</label>
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
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/phpdairy/viewtransport.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>