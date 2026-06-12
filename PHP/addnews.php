<?php
$con=new mysqli("localhost","root","","phpdairy1");
$title="";
$sub="";
$desc="";
$img="";
$errorMessage="";
$successMessage="";
if($_SERVER['REQUEST_METHOD']=='POST'){
    $title=$_POST["title"];
    $sub=$_POST["sub"];
    $desc=$_POST["desc"];
    $img=$_POST["img"];
    do {
        if(empty($title)||empty($sub)||empty($desc)||empty($img)){
            $errorMessage="All the fields are required ";
            break;
        }
        $sql="INSERT INTO tblnews(n_title,subject,content,photo_id)"."VALUES('$title','$sub','$desc','$img')";
        $result=$con->query($sql);
        if(!$result){
            $errorMessage="Invalid query:".$con->error;
            break;
        }
        $title="";
        $sub="";
        $desc="";
        $img="";
        $successMessage="News Details added successfully";
        header("location:/phpdairy/newsdetails.php");
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
    <title>Add News</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
</head>
<body  style="background-image: url(img3.jpg);background-size:cover;background-repeat: no-repeat;">
    <div class="container my-5">
        <h2>Add News Details</h2>
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
                <label class="col-sm-3 col-form-label">Title</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="title" required value="<?php echo $title;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Subject</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="sub"required value="<?php echo $sub;?>">
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
                    <a class="btn btn-outline-primary" href="/phpdairy/newsdetails.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>