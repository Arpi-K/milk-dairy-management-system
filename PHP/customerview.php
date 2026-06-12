<?php 
session_start();
$con=new mysqli("localhost","root","","phpdairy1");
$errorMessage="";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer View</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/home.css">
    <script src="js/bootstrap.bundle.min.js"></script>
</head>
<body style="background-image: url(img3.jpg);background-size:100% 100%;background-repeat: no-repeat;">
<div class="main">
<?php 
        include('header.php');
        ?>
            <hr size="2">    
<div class="container my-5" >
        <h2>Personal Transaction</h2>
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
        <br/>
        <br/>
        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label text-white">Enter Producer ID:</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="pid" autocomplete="off" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label text-white">Enter From Date:</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="fromdate"required>
                </div>
                </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label text-white">Enter To Date:</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="todate"required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
        <table class="table table-info" >
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Created At</th>
                    <th>Date</th>
                    <th>Session</th>
                    <th>Quantity(in Litre)</th>
                    <th>Fat</th>
                    <th>SNF</th>
                    <th>CLR</th>
                    <th>Price</th>
                    <th>Total Price</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if($con->connect_error){
                  die("Failed to connect:".$con->connect_error);
              }
                if($_SERVER['REQUEST_METHOD']=='POST'){
                  $fromdate=$_POST['fromdate'];
                $todate=$_POST['todate'];
                $pid=$_POST['pid'];
                $sql="SELECT * FROM tblproducer,tblmilk WHERE tblproducer.p_id=tblmilk.p_id AND tblmilk.date BETWEEN '$fromdate' AND '$todate'AND tblproducer.p_id=$_SESSION[p_id] limit 10";
                $result=$con->query($sql);
                if(!$result){
                    die("Invalid query:".$con->error);
                }
                if($_SESSION['p_id']===$pid){
                while($row = $result->fetch_assoc()){
                if($row['p_id']===$pid){
                    echo "
                    <tr>
                    <td>$row[p_id]</td>
                    <td>$row[p_name]</td>
                    <td>$row[p_mail]</td>
                    <td>$row[phone]</td>
                    <td>$row[address]</td>
                    <td>$row[created_at]</td>
                    <td>$row[date]</td>
                    <td>$row[session]</td>
                    <td>$row[litre]</td>
                    <td>$row[fat]</td>
                    <td>$row[snf]</td>
                    <td>$row[clr]</td>
                    <td>$row[price]</td>
                    <td>$row[tot_price]</td>
                </tr>
                ";
                }
            }
          }else{
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>Invalid Producer ID</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
            </div>
            ";
                }
          }
                ?>
                
            </tbody>
        </table>
    </div>
    <?php
        include("footer.php");
        ?>
</body>
</html>