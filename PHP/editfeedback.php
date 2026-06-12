<?php
$con=new mysqli("localhost","root","","phpdairy1");
$id="";
$fid="";
$msg="";
$reply="";
$errorMessage="";
$successMessage="";
if($_SERVER['REQUEST_METHOD']=='GET'){
    if(!isset($_GET["id"])){
        header("location:/phpdairy/viewfeedback.php");
        exit;
    }
    $id=$_GET["id"];
    $fid=$_GET["fid"];
    $sql="SELECT msg,reply FROM tblfeedback WHERE p_id=$id AND f_id=$fid";
    $result=$con->query($sql);
    $row = $result->fetch_assoc();
    if(!$row){
        header("location:/phpdairy/viewfeedback.php");
        exit;
    }
    $msg=$row["msg"];
    $reply=$row["reply"];
}
else{
    $id=$_POST["id"];
    $fid=$_POST["fid"];
    $msg=$_POST["msg"];
    $reply=$_POST["reply"];
    do{
        if(empty($id)||empty($reply)){
            $errorMessage="All the fields are required ";
            break;
        }
        $sql="UPDATE tblfeedback SET reply='$reply' WHERE p_id=$id AND f_id=$fid";
        $result=$con->query($sql);
        if(!$result){
            $errorMessage="Invalid query:".$con->error;
            break;
        }
        $successMessage="Reply added successfully";
        header("location:/phpdairy/viewfeedback.php");
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
    <title>Give Reply</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
</head>
<body style="background-image: url(img3.jpg);background-size:cover;background-repeat: no-repeat;" >
    <div class="container my-5">
        <h2>Feedback</h2>
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
            <input type="hidden" name="fid" value="<?php echo $fid;?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Message</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="msg" value="<?php echo $msg;?>"readonly>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Reply</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="reply" value="<?php echo $reply;?>" autocomplete="off">
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
                    <a class="btn btn-outline-primary" href="/phpdairy/viewfeedback.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>