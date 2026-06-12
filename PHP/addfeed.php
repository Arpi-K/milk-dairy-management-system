<?php
$con=new mysqli("localhost","root","","phpdairy1");
$name="";
$qty="";
$desc="";
$img="";
$amt="";
$errorMessage="";
$successMessage="";
if($_SERVER['REQUEST_METHOD']=='POST'){
    $name=$_POST["name"];
    $qty=$_POST["qty"];
    $desc=$_POST["desc"];
    $img=$_POST["img"];
    $amt=$_POST["amt"];
    do {
        if(empty($name)||empty($qty)||empty($desc)||empty($img)||empty($amt)){
            $errorMessage="All the fields are required ";
            break;
        }
        $sql="INSERT INTO tblfeed(feed_name,qty,details,cf_photo,amt)"."VALUES('$name',$qty,'$desc','$img',$amt)";
        $result=$con->query($sql);
        if(!$result){
            $errorMessage="Invalid query:".$con->error;
            break;
        }
        $name="";
        $qty="";
        $desc="";
        $img="";
        $amt="";
        $successMessage="Feed Details added successfully";
        header("location:/phpdairy/cattlefeed.php");
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
    <title>Add Feed</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
</head>
<body  style="background-image: url(img3.jpg);background-size:cover;background-repeat: no-repeat;">
    <div class="container my-5">
        <h2>Add Feed Details</h2>
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
        <form method="post" >
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Feed Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" required value="<?php echo $name;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Quantity</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="qty"required value="<?php echo $qty;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Image</label>
                <div class="col-sm-6">
                    <input type="file" class="form-control" name="img"required value="<?php echo $img;?>" >
                    <?php if(isset($_GET['error'])):?>
                        <p><?php echo $_GET['error'];?></p>
                        <?php endif?>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Description</label>
                <div class="col-sm-6">
                <textarea rows="4" class="form-control" name="desc" required value="<?php echo $desc;?>"></textarea>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Amount</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="amt"required value="<?php echo $amt;?>">
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
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/phpdairy/cattlefeed.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>