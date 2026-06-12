<?php
$con=new mysqli("localhost","root","","phpdairy1");
?>
<?php
if($con->connect_error){
    die("Failed to connect:".$con->connect_error);
}
$sql="SELECT * FROM tbltransport order by t_id desc limit 5";
$result=$con->query($sql);
if(!$result){
    die("Invalid query:".$con->error);
}
$chart_data="";
while($row = $result->fetch_assoc()){
    $date[]=$row['t_date'];
    $mqty[]=$row['m_qty'];

}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <title>Admin dashboard
		</title>
	    <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	    <!----css3---->
        <link rel="stylesheet" href="css/custom.css">
		<!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
	
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

	
	
	
	<!--google material icon-->
        <link href="https://fonts.googleapis.com/css2?family=Material+Icons"
      rel="stylesheet">
  </head>
  <body>


<div class="wrapper">


<div class="body-overlay"></div>


        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3><img src="title.png" class="img-fluid"></h3>
            </div>
            <ul class="list-unstyled components">
			<li  class="active">
                    <a href="#" class="dashboard"><i class="material-icons">dashboard</i><span>Dashboard</span></a>
                </li>
                <li class="dropdown">
                    <a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
					<i class="material-icons">aspect_ratio</i><span>Membership Management</span></a>
                    <ul class="collapse list-unstyled menu" id="homeSubmenu1">
                        <li>
                            <a href="/phpdairy/membership.php">View Member</a>
                        </li>
                        <li>
                            <a href="/phpdairy/addmember.php">Add Member</a>
                        </li>
                        <li>
                            <a href="/phpdairy/membership.php">Edit Member</a>
                        </li>
                        <li>
                            <a href="/phpdairy/membership.php">Delete Member</a>
                        </li>
                    </ul>
                </li>
                
                <li class="dropdown">
                    <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
					<i class="material-icons">apps</i><span>Milk Statistics</span></a>
                    <ul class="collapse list-unstyled menu" id="pageSubmenu2">
                        <li>
                            <a href="/phpdairy/milkdetails.php">View Milk</a>
                        </li>
                        <li>
                            <a href="/phpdairy/milkdetails.php">Edit Milk</a>
                        </li>
                    </ul>
                </li>
				
				 <li class="dropdown">
                    <a href="#pageSubmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
					<i class="material-icons">equalizer</i>
				
					
					<span>Milk Transport Report</span></a>
                    <ul class="collapse list-unstyled menu" id="pageSubmenu3">
                        <li>
                            <a href="/phpdairy/viewtransport.php">View Transport</a>
                        </li>
                    </ul>
                </li>
				  <li class="dropdown">
                    <a href="#pageSubmenu4" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
					<i class="material-icons">extension</i><span>Cattle Feed Management</span></a>
                    <ul class="collapse list-unstyled menu" id="pageSubmenu4">
                        <li>
                            <a href="/phpdairy/viewfeeddetails.php">View Feed</a>
                        </li>
                    </ul>
                </li>
				
				<li class="dropdown">
                    <a href="#pageSubmenu5" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
					<i class="material-icons">border_color</i><span>Feedback Management</span></a>
                    <ul class="collapse list-unstyled menu" id="pageSubmenu5">
                        <li>
                            <a href="/phpdairy/viewfeedback.php">View Feedback</a>
                        </li>
                        <li>
                            <a href="/phpdairy/viewfeedback.php">Give Response</a>
                        </li>
                    </ul>
                </li>
               
			   
			   
			   <li class="dropdown">
                    <a href="#pageSubmenu6" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
					<i class="material-icons">grid_on</i><span>News</span></a>
                    <ul class="collapse list-unstyled menu" id="pageSubmenu6">
                        <li>
                            <a href="/phpdairy/newsdetails.php">View News</a>
                        </li>
                        <li>
                            <a href="/phpdairy/addnews.php">Add News</a>
                        </li>
                    </ul>
                </li>
               
			   
			     <li class="dropdown">
                    <a href="#pageSubmenu7" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
					<i class="material-icons">shopping_cart</i><span>Orders</span></a>
                    <ul class="collapse list-unstyled menu" id="pageSubmenu7">
                        <li>
                            <a href="/phpdairy/vieworder.php">View Feed Orders</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#pageSubmenu8" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
					<i class="material-icons">account_box</i><span>Logout</span></a>
                    <ul class="collapse list-unstyled menu" id="pageSubmenu8">
                        <li>
                            <a href="/phpdairy/logout.php">Admin logout</a>
                        </li>
                    </ul>
                </li>
               
               
            </ul>

           
        </nav>
		
		

        <!-- Page Content  -->
        <div id="content">
		
		<div class="top-navbar">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="d-xl-block d-lg-block d-md-mone d-none">
                        <span class="material-icons">arrow_back_ios</span>
                    </button>
					
					<a class="navbar-brand" href="#"> Dashboard </a>
					
                    <button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse"
					data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="material-icons">more_vert</span>
                    </button>
                </div>
            </nav>
	    </div>
			
			
			<div class="main-content">
			
			<div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header">
                                    <div class="icon icon-warning">
                                       <span class="material-icons">equalizer</span>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <p class="category"><strong>Milk Quantity</strong></p>
                                    <h3 class="card-title">
                                    <?php
                        if($con->connect_error){
                          die("Failed to connect:".$con->connect_error);
                      }
                        $result=mysqli_query($con,"SELECT sum(litre) FROM tblmilk");
                        if(!$result){
                            die("Invalid query:".$con->error);
                        }
                        while($row=mysqli_fetch_array($result)){
                            echo $row['sum(litre)'];
                            
                        }
                        ?>
                                    </h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons text-info">info</i>
                                        <a href="milkdetails.php">See detailed report</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header">
                                    <div class="icon icon-rose">
                                       <span class="material-icons">shopping_cart</span>

                                    </div>
                                </div>
                                <div class="card-content">
                                    <p class="category"><strong>Orders</strong></p>
                                    <h3 class="card-title">
                                        <?php
                        if($con->connect_error){
                          die("Failed to connect:".$con->connect_error);
                      }
                        $sql="SELECT * FROM tblorder";
                        $result=$con->query($sql);
                        if(!$result){
                            die("Invalid query:".$con->error);
                        }
                        $rowcount=mysqli_num_rows($result);
                        echo "$rowcount";
                        ?>
                                    </h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">local_offer</i> 
                                        Total orders
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header">
                                    <div class="icon icon-success">
                                        <span class="material-icons">
                                    attach_money
                                    </span>

                                    </div>
                                </div>
                                <div class="card-content">
                                    <p class="category"><strong>Revenue</strong></p>
                                    <h3 class="card-title">
                                    <?php
                        if($con->connect_error){
                          die("Failed to connect:".$con->connect_error);
                      }
                        $result=mysqli_query($con,"SELECT sum(tot_price) FROM tblmilk");
                        if(!$result){
                            die("Invalid query:".$con->error);
                        }
                        while($row=mysqli_fetch_array($result)){
                            echo $row['sum(tot_price)'];
                            
                        }
                        ?>
                                    </h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">date_range</i> Monthly Revenue
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header">
                                    <div class="icon icon-info">
                                    
                                    <span class="material-icons">
                                    follow_the_signs
                                    </span>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <p class="category"><strong>Total Members</strong></p>
                                    <h3 class="card-title">
                                    <?php
                        if($con->connect_error){
                          die("Failed to connect:".$con->connect_error);
                      }
                        $sql="SELECT * FROM tblproducer";
                        $result=$con->query($sql);
                        if(!$result){
                            die("Invalid query:".$con->error);
                        }
                        $rowcount=mysqli_num_rows($result);
                        echo "$rowcount";
                        ?>
                                    </h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">update</i> Just Updated
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					
					
					<div class="row ">
                        <div class="col-lg-7 col-md-12">
                            <div class="card" style="min-height: 485px">
                                <div class="card-header card-header-text">
                                    <h4 class="card-title">Members Stats</h4>
                                    <p class="category">New Members Joined</p>
                                </div>
                                <div class="card-content table-responsive">
                                    <table class="table table-hover">
                                        <thead class="text-primary">
                                            <tr><th>ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Address</th>
                                                <th>Joined at</th>
                                        </tr></thead>
                                        <tbody>
                                            <?php
                                            $sql="(SELECT * FROM tblproducer ORDER BY p_id DESC LIMIT 5) ORDER BY p_id ASC";
                                            $result=$con->query($sql);
                                            if(!$result){
                                                die("Invalid query:".$con->error);
                                            }
                                            while($row = $result->fetch_assoc()){
                                                echo "
                                                <tr>
                                                <td>$row[p_id]</td>
                                                <td>$row[p_name]</td>
                                                <td>$row[p_mail]</td>
                                                <td>$row[phone]</td>
                                                <td>$row[address]</td>
                                                <td>$row[created_at]</td>
                                            </tr>
                                            ";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                      
                        <div class="col-lg-5 col-md-12">
                            <div class="card" style="min-height: 635px">
                                <div class="card-header card-header-text">
                                    <h4 class="card-title">Daily Milk Transport</h4>
                                </div>
                                <div class="card-content" >
                                    <br><br>
                    <canvas id="piechart" width='1200px;'height='900px;'></canvas>
                                </div>

                            </div>
                        </div>
                    </div>
					
					
						
					<footer class="footer">
                <div class="container-fluid">
				  <div class="row">
				  <div class="col-md-6">
                    <nav class="d-flex">
                        <ul class="m-0 p-0">
                            <li><a href="home.php">Home</a></li>
                          <li><a href="about.php">About Us</a></li>
                        </ul>
                    </nav>
                   
                </div>
				<div class="col-md-6">
                    <p class="copyright d-flex justify-content-end">
                        &copy;2023
                        <a href="#">Copyrights are Reserved </a>
                      </p>
				</div>
				  </div>
				    </div>
            </footer>
					
					</div>
					
				

        </div>
    </div>






	
  
     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   <script src="js/jquery-3.3.1.min.js"></script>
  
  
   <script type="text/javascript">
  $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
				$('#content').toggleClass('active');
            });
			
			 $('.more-button,.body-overlay').on('click', function () {
                $('#sidebar,.body-overlay').toggleClass('show-nav');
            });
			
        });


     
           
       
</script>
        <script type="text/javascript" src="jquery/jquery.min.js"></script>
        <script type="text/javascript" src="js/chart.min.js"></script>
        <script type="text/javascript">
            var ctx=document.getElementById("piechart").getContext("2d");
            var mychart=new Chart(ctx,{
                type:'pie',
                data:{
                    labels:<?php echo json_encode($date);?>,
                    datasets:[{
                        backgroundColor:[
                            "#6f3535",
                            "#5945fd",
                            "#ECAED9",
                            "#25d5f2",
                            'rgb(255, 99, 132)',
                            "#ECAED9",
                        ],
                        hoverBackgroundColor:[
                            "#25d5f2",
                            "#25d5f2",
                            "#25d5f2",
                        ],
                            data:<?php echo json_encode($mqty);?>
                }]
                    },
                    option:{
                        legend:{
                            responsive:true,
                            display:true,
                            position:'bottom',
                            labels:{
                                fontColor:'pink',
                                fontFamily:'Times New Roman',
                                fontSize:18,
                                padding:30,
                            },
                        }
                    }
            });
        </script>
  
  



  </body>
  
  </html>


