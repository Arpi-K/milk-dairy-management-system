<?php
$con=new mysqli("localhost","root","","phpdairy1");
$id="";
$name="";
$email="";
$phone="";
$address="";
$errorMessage="";
$successMessage="";
if($_SERVER['REQUEST_METHOD']=='GET'){
    if(!isset($_GET["id"])){
        header("location:/phpdairy/membership.php");
        exit;
    }
    $id=$_GET["id"];
    $sql="SELECT * FROM tblproducer WHERE p_id=$id";
    $result=$con->query($sql);
    $row = $result->fetch_assoc();
    if(!$row){
        header("location:/phpdairy/membership.php");
        exit;
    }
    $name=$row["p_name"];
    $email=$row["p_mail"];
    $phone=$row["phone"];
    $address=$row["address"];
}
else{
    $id=$_POST["id"];
    $name=$_POST["name"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];
    $address=$_POST["address"];
    do{
        if(empty($id)||empty($name)||empty($email)||empty($phone)||empty($address)){
            $errorMessage="All the fields are required ";
            break;
        }
        $sql="UPDATE tblproducer SET p_name='$name',p_mail='$email',phone=$phone,address='$address' WHERE p_id=$id";
        $result=$con->query($sql);
        if(!$result){
            $errorMessage="Invalid query:".$con->error;
            break;
        }
        $successMessage="Member updated successfully";
        header("location:/phpdairy/membership.php");
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
    <title>Edit member</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
</head>
<body style="background-image: url(img3.jpg);background-size:cover;background-repeat: no-repeat;">
    <div class="container my-5">
        <h2>Edit Member Details</h2>
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
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $name;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="email" value="<?php echo $email;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Phone</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="phone" value="<?php echo $phone;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Address</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="address" value="<?php echo $address;?>">
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
                    <a class="btn btn-outline-primary" href="/phpdairy/membership.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>