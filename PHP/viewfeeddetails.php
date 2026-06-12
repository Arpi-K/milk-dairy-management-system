<?php
$con=new mysqli("localhost","root","","phpdairy1");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feed Details</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
</head>
<body style="background-image: url(img3.jpg);background-size:cover;background-repeat: no-repeat;">
    <div class="container my-5" >
        <h2>List of Cattle Feed</h2>
        <br/>
        <br/>
      
        <table class="table table-info" >
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Feed Name</th>
                    <th>Feed Photo</th>
                    <th>Quantity(in Kg)</th>
                    <th>Amount</th>
                    <th>Details</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if($con->connect_error){
                    die("Failed to connect:".$con->connect_error);
                }
                $sql="SELECT * FROM tblfeed";
                $result=$con->query($sql);
                if(!$result){
                    die("Invalid query:".$con->error);
                }
                while($row = $result->fetch_assoc()){
                    echo "
                    <tr>
                    <td>$row[cf_id]</td>
                    <td>$row[feed_name]</td>
                    <td>$row[cf_photo]</td>
                    <td>$row[qty]</td>
                    <td>$row[amt]</td>
                    <td>$row[details]</td>
                </tr>
                ";
                }
                ?>
                
            </tbody>
        </table>
    </div>
</body>
</html>