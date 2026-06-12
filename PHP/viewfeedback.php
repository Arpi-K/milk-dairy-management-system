<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Details</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
</head>
<body style="background-image: url(img3.jpg);background-size:cover;background-repeat: no-repeat;">
    <div class="container my-5" >
        <h2>List of Feedback</h2>
        <br/>
        <br/>
        <br/>
        <br/>
        <table class="table table-info" >
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Member ID</th>
                    <th>Email</th>
                    <th>Rating</th>
                    <th>Feedback</th>
                    <th>Reply</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $con=new mysqli("localhost","root","","phpdairy1");
                if($con->connect_error){
                    die("Failed to connect:".$con->connect_error);
                }
                $sql="SELECT * FROM tblfeedback,tblproducer WHERE tblfeedback.p_id=tblproducer.p_id";
                $result=$con->query($sql);
                if(!$result){
                    die("Invalid query:".$con->error);
                }
                while($row = $result->fetch_assoc()){
                    echo "
                    <tr>
                    <td>$row[f_id]</td>
                    <td>$row[p_id]</td>
                    <td>$row[p_mail]</td>
                    <td>$row[rating]</td>
                    <td>$row[msg]</td>
                    <td>$row[reply]</td>
                    <td>
                        <a class='btn btn-primary btn-sm'href='/phpdairy/editfeedback.php?id=$row[p_id]&fid=$row[f_id]'>Edit</a>
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