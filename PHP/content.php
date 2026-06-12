<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>News Content</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link rel="stylesheet" href="css/home.css">
    </head>
    <body style="background-image: url(img3.jpg);background-size:100% 100%;background-repeat: no-repeat;">
        <div class="main">
            <br/>
            <br/>
            <br/>
            <div class="container mt-4 shadow-lg " style="height: 100%;">
                <div class="row">
                    <div class="col-md-2" ></div>
                        <div class="col-md-8" style="font-family: 'Times New Roman';">
                            <br/>
                            <?php 
                            $id=$_GET["myid"];
                            $con=new mysqli("localhost","root","","phpdairy1");
                            if($con->connect_error){
                                die("Failed to connect:".$con->connect_error);
                            }
                            $sql="SELECT * FROM tblnews WHERE $id=n_id";
                            $result=$con->query($sql);
                            if(!$result){
                                die("Invalid query:".$con->error);
                            }
                            while($row = $result->fetch_assoc()){
                                echo "
                                <h2 class='text-center'style='color:pink;font-weight-bold;font-size:38px;'>$row[n_title]<br></h2>
                            <br/><img src='$row[photo_id]' height='20%' width='80%'><br>
                            <hr>
                            <p class='text-white text-justify' style='font-size:20px; '>
                            $row[content]<br></p>";  
                            }
                        
                            ?>
                        </div>
                </div>
            </div>
            <br/>
            <br/>
            <br/>
            </div>
    </body>
</html>