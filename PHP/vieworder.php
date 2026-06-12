<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cattle Feed order Details</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
</head>
<body style="background-image: url(img3.jpg);background-size:cover;background-repeat: no-repeat;">
    <div class="container my-5" >
        <h2>List of Orders</h2>
        <br/>
        <br/>
        <table class="table table-info" >
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Producer ID</th>
                    <th>Name</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Delivery Address</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $con=new mysqli("localhost","root","","phpdairy1");
                if($con->connect_error){
                    die("Failed to connect:".$con->connect_error);
                }
                $sql="SELECT *,amt*quantity as sum FROM tblorder,tblproducer,tblfeed WHERE tblfeed.cf_id=tblorder.cf_id AND tblproducer.p_id=tblorder.p_id";
                $result=$con->query($sql);
                if(!$result){
                    die("Invalid query:".$con->error);
                }
                while($row = $result->fetch_assoc()){
                    echo "
                    <tr>
                    <td>$row[order_id]</td>
                    <td>$row[p_id]</td>
                    <td>$row[p_name]</td>
                    <td>$row[feed_name]</td>
                    <td>$row[quantity]</td>
                    <td>$row[addr]</td>
                    <td>$row[sum]</td>
                    <td>$row[order_date]</td>
                    <td>$row[status]</td>
                    <td>
                        <a class='btn btn-primary btn-sm'href='/phpdairy/editorder.php?oid=$row[order_id]'>Edit</a>
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