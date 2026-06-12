<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transport Details</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
</head>
<body style="background-image: url(img3.jpg);background-size:cover;background-repeat: no-repeat;">
    <div class="container my-5" >
        <h2>List of Milk Transport Data</h2>
        <br/>
        <br/>
        <br/>
        <br/>
        <table class="table table-info" >
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Quantity(in litre)</th>
                    <th>Destination</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $con=new mysqli("localhost","root","","phpdairy1");
                if($con->connect_error){
                    die("Failed to connect:".$con->connect_error);
                }
                $sql="SELECT * FROM tbltransport";
                $result=$con->query($sql);
                if(!$result){
                    die("Invalid query:".$con->error);
                }
                while($row = $result->fetch_assoc()){
                    echo "
                    <tr>
                    <td>$row[t_id]</td>
                    <td>$row[t_date]</td>
                    <td>$row[time]</td>
                    <td>$row[m_qty]</td>
                    <td>$row[loc]</td>
                    <td>
                    <a class='btn btn-primary btn-sm'href='/phpdairy/edittransport.php?tid=$row[t_id]'>Edit</a>
                    </td>
                </tr>
                ";
                }
                ?>
                
            </tbody>
        </table>
    </div>
</body>
</html>