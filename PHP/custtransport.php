<?php
session_start();
$con=new mysqli("localhost","root","","phpdairy1");
if($con->connect_error){
    die("Failed to connect:".$con->connect_error);
}
$sql="SELECT litre,date FROM tblmilk WHERE p_id=$_SESSION[p_id] order by m_id desc limit 10";
$result=$con->query($sql);
if(!$result){
    die("Invalid query:".$con->error);
}
$chart_data="";
while($row = $result->fetch_assoc()){
    $date[]=$row['date'];
    $litre[]=$row['litre'];

}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
        <title>Milk Transport</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/home.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> 
        <script src="js/bootstrap.bundle.min.js"></script>
        <style>
        #chart-container{
            width:640px;
            height:auto;
        }
        </style>
    </head>
    <body style="background-image: url(img3.jpg);background-size:100% 100%;background-repeat: no-repeat;">
        <div class="main">
        <?php 
        include('header.php');
        ?>
            <hr size="2">
            <h2 class="text-white text-center">Milk Transport</h2>
            <div class="container my-5" >
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="card">
                            <div class="card-body">
                                <canvas id="bargraph"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
        <br/>
        <br/>
        <table class="table table-info" >
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>Total Quantity</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $con=new mysqli("localhost","root","","phpdairy1");
                if($con->connect_error){
                    die("Failed to connect:".$con->connect_error);
                }
                $result=mysqli_query($con,"SELECT litre,date,m_id FROM tblmilk WHERE p_id=$_SESSION[p_id] order by m_id desc limit 10");
                if(!$result){
                    die("Invalid query:".$con->error);
                }
                while($row=mysqli_fetch_array($result)){
                    echo "
                    <tr>
                    <td>$row[m_id]</td>
                    <td>$row[date]</td>
                    <td>$row[litre]</td>
                    </tr>
                ";
                }
                ?>   
            </tbody>
        </table>
    </div>
            <?php
        include("footer.php");
        ?>
        </div>
        <script type="text/javascript" src="jquery/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script type="text/javascript">
          const labels=<?php echo json_encode($date);?>;
const data = {
  labels: labels,
  datasets: [{
    label: 'Milk Transport Report',
    data: <?php echo json_encode($litre);?>,
    backgroundColor: [
      'rgba(255, 99, 132, 0.2)',
      'rgba(255, 159, 64, 0.2)',
      'rgba(255, 205, 86, 0.2)',
      'rgba(75, 192, 192, 0.2)',
      'rgba(54, 162, 235, 0.2)',
      'rgba(153, 102, 255, 0.2)',
      'rgba(201, 203, 207, 0.2)'
    ],
    borderColor: [
      'rgb(255, 99, 132)',
      'rgb(255, 159, 64)',
      'rgb(255, 205, 86)',
      'rgb(75, 192, 192)',
      'rgb(54, 162, 235)',
      'rgb(153, 102, 255)',
      'rgb(201, 203, 207)'
    ],
    hoverBackgroundColor:[
      "#25d5f2",
      "#25d5f2",
      "#25d5f2",
                        ],
    borderWidth: 1,
    barPercentage: 0.3,
  }]
};
          const config = {
  type: 'line',
  data: data,
  options: {
    scales: {
      y: {
        beginAtZero: true,
      }
    }
  },
};
            var ctx=document.getElementById("bargraph").getContext("2d");
            var mychart=new Chart(ctx,config);
                
        </script>
        </body>
</html>