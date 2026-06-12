<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Details</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
</head>
<body style="background-image: url(img3.jpg);background-size:cover;background-repeat: no-repeat;">
    <div class="container my-5" >
        <h2>List of News</h2>
        <br/>
        <br/>
        <a class="btn btn-primary"href="/phpdairy/addnews.php" role="button">New News</a>
        <br/>
        <br/>
        <table class="table table-info" >
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Subject</th>
                    <th>Content</th>
                    <th>Photo</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $con=new mysqli("localhost","root","","phpdairy1");
                if($con->connect_error){
                    die("Failed to connect:".$con->connect_error);
                }
                $sql="SELECT * FROM tblnews";
                $result=$con->query($sql);
                if(!$result){
                    die("Invalid query:".$con->error);
                }
                while($row = $result->fetch_assoc()){
                    echo "
                    <tr>
                    <td>$row[n_id]</td>
                    <td>$row[n_title]</td>
                    <td>$row[subject]</td>
                    <td style='size:10px;'>$row[content]</td>
                    <td>$row[photo_id]</td>
                </tr>
                ";
                }
                ?>
                
            </tbody>
        </table>
    </div>
</body>
</html>