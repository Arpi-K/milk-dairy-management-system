<?php
session_start();
$con=new mysqli("localhost","root","","phpdairy1");
if(isset($_SESSION['p_id'])){
$name="";
$email="";
$msg="";
$rating="";
$errorMessage="";
$successMessage="";
if($_SERVER['REQUEST_METHOD']=='GET'){
  $sql="SELECT * FROM tblproducer WHERE p_id=$_SESSION[p_id]";
        $result=$con->query($sql);
        if(!$result){
            $errorMessage="Invalid query:".$con->error;
        }
        $row = $result->fetch_assoc();
        if(!$row){
            $errorMessage="No email found ";
        exit;
    }
    $data=$row["p_id"];
    $name=$row["p_name"];
    $email=$row["p_mail"];
  }
  else{
    $msg=$_POST["msg"];
    $rating=$_POST["rating"];
    do {
        if(empty($msg)||empty($rating)){
            $errorMessage="All the fields are required ";
            break;
        }
        
        $sql="INSERT INTO tblfeedback(p_id,msg,rating)"."VALUES($_SESSION[p_id],'$msg','$rating')";
        $result=$con->query($sql);
        if(!$result){
            $errorMessage="Invalid query:".$con->error;
            break;
        }
        $msg="";
        $rating="";
        $successMessage="Feedback sent successfully!!";
    }while(false);
}
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>Feedback</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
        <link rel="stylesheet" href="css/home.css">
        <link rel="stylesheet" type="text/css" href="jquery.rateyo.min.css"> 
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
                            <h2 class="text-white text-center">Feedback Form</h2>
                            <p class="text-white">We would love to hear your thoughts, concerns or problem with anything so we can improve!</p>
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
                            <form style="color: white;" method="post">
                                <h4>Feedback Type</h4>
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="radio" name="feed" class="pointer">&nbsp;&nbsp;<label>Comments</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="radio" name="feed">&nbsp;&nbsp;<label>Bug Reports</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="radio" name="feed">&nbsp;&nbsp;<label>Questions</label>
                                    </div>
                                </div>
                                <div class="form-group mt-3 mb-3">
                                    <label class="form-label">Full Name:</label>
                                    <input type="text" class="form-control" name="name"  value="<?php echo $name ?>" readonly>
                                </div>
                                <div class="form-group mb-2">
                                    <label class="form-label">Email:</label>
                                    <input type="email" class="form-control"name="email"  value="<?php echo $email ?>" readonly>
                                </div>
                                <div class="form-group mb-2">
                                    <label class="form-label">Describe Feedback:</label>
                                    <textarea rows="4" class="form-control" name="msg" required></textarea>
                                </div>
                                <div class="form-group mb-2">
                                  <label class="form-label">Give Ratings:</label>&emsp;
                                    <input type="radio" name="rating" value="verybad"/>Very Bad
                                    &emsp;<input type="radio" name="rating" value="bad"/>Bad
                                    &emsp;<input type="radio" name="rating" value="neutral"/>Neutral
                                    &emsp;<input type="radio" name="rating" value="good"/>Good
                                    &emsp;<input type="radio" name="rating" value="verygood"/>Very Good
                                </div>
                                <br><button type="submit" class="btn btn-primary" name="submit">Submit feedback</button>
                                
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