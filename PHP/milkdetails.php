<?php
$con=new mysqli("localhost","root","","phpdairy1");
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Milk Details</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
</head>
<body style="background-image: url(img3.jpg);background-size:100% 100%;background-repeat: no-repeat;">
    <div class="container my-5" >
        <h2>List of Milk Producers and their Milk supply details</h2>
        <br/>
        <br/>
        <?php
        session_start();
                      $sql="SELECT * FROM tblsupervisor";
                      $result=mysqli_query($con,$sql);
                       if(mysqli_num_rows($result)===1){
                       $row=mysqli_fetch_assoc($result);
                    if($row['role']==="$_SESSION[role]"){
        echo "<a class='btn btn-primary'href='/phpdairy/addmilk.php' role='button''>New Entry</a>";
                    }
                }
                ?>
        <br/>
        <br/>
        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label text-white">Member Id</label>
                <div class="col-sm-6">
                    <select name="pid" class="form-control"
                    <?php
                    $sql="SELECT p_id FROM tblproducer";
                    $result=$con->query($sql);
                    if(!$result){
                        $errorMessage="No member details found:".$con->error;
                        return;
                    }
                    echo "<select name='pid'>";
                    while($row=$result->fetch_assoc())
                    {
                        echo "<option value='".$row['p_id']."'>".$row['p_id']."</option>";
                    }
                    echo "</select";?>
                    ></select> 
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
                    <th>Producer ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Date</th>
                    <th>Session</th>
                    <th>Quantity(in Litre)</th>
                    <th>Fat</th>
                    <th>SNF</th>
                    <th>CLR</th>
                    <th>Price</th>
                    <th>Total Price</th>
                    <th>Action</th>
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
                $sql="SELECT * FROM tblproducer,tblmilk WHERE tblproducer.p_id=tblmilk.p_id AND tblproducer.p_id=$pid AND date BETWEEN '$fromdate' AND '$todate'  ORDER BY m_id ASC limit 50";
                $result=$con->query($sql);
                if(!$result){
                    die("Invalid query:".$con->error);
                }
                while($row = $result->fetch_assoc()){
                    echo "
                    <tr>
                    <td>$row[m_id]</td>
                    <td>$row[p_id]</td>
                    <td>$row[p_name]</td>
                    <td>$row[p_mail]</td>
                    <td>$row[phone]</td>
                    <td>$row[address]</td>
                    <td>$row[date]</td>
                    <td>$row[session]</td>
                    <td>$row[litre]</td>
                    <td>$row[fat]</td>
                    <td>$row[snf]</td>
                    <td>$row[clr]</td>
                    <td>$row[price]</td>
                    <td>$row[tot_price]</td>
                    <td>
                        <a class='btn btn-primary btn-sm'href='/phpdairy/editmilk.php?pid=$row[p_id]&mid=$row[m_id]'>Edit</a>
                    </td>
                </tr>
                ";
                }
            }
            else{
                $sql="SELECT * FROM tblproducer,tblmilk WHERE tblproducer.p_id=tblmilk.p_id ORDER BY m_id DESC limit 20";
                $result=$con->query($sql);
                if(!$result){
                    die("Invalid query:".$con->error);
                }
                while($row = $result->fetch_assoc()){
                    echo "
                    <tr>
                    <td>$row[m_id]</td>
                    <td>$row[p_id]</td>
                    <td>$row[p_name]</td>
                    <td>$row[p_mail]</td>
                    <td>$row[phone]</td>
                    <td>$row[address]</td>
                    <td>$row[date]</td>
                    <td>$row[session]</td>
                    <td>$row[litre]</td>
                    <td>$row[fat]</td>
                    <td>$row[snf]</td>
                    <td>$row[clr]</td>
                    <td>$row[price]</td>
                    <td>$row[tot_price]</td>
                    <td>
                        <a class='btn btn-primary btn-sm'href='/phpdairy/editmilk.php?pid=$row[p_id]&mid=$row[m_id]'>Edit</a>
                    </td>
                </tr>
                ";
              
                }
            }
                ?> 
            </tbody>
        </table>
    </div>
</body>
</html>