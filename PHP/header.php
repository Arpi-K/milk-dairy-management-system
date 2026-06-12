<nav class="navbar navbar-expand-lg ">
            <div class="container">
              <a class="navbar-brand" href="#" style="padding-left:0%;">Kamadhenu</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link "href="home.php">Home</a>
                  </li>
                  <?php
                      $con=new mysqli("localhost","root","","phpdairy1");
                      if($con->connect_error){
                        die("Failed to connect:".$con->connect_error);
                    }
                      $sql="SELECT * FROM tblsupervisor";
                      $result=mysqli_query($con,$sql);
                       if(mysqli_num_rows($result)===1){
                       $row=mysqli_fetch_assoc($result);
                    if($row['role']==="$_SESSION[role]"){
                      echo "<li class='nav-item'>
                        <a class='nav-link 'href='milkdetails.php'>Milk Statistics</a>
                      </li>
                      <li class='nav-item' style='display:none;'>
                        <a class='nav-link 'href='customerview.php'>Customer View</a>
                      </li>
                      ";
                    }
                  else{
                    echo "<li class='nav-item' style='display:block;'>
                    <a class='nav-link 'href='customerview.php'>Customer View</a>
                  </li>";
                  }}
                      ?>
                  <li class="nav-item">
                    <a class="nav-link "href="cattlefeed.php">Cattle Feed</a>
                  </li>
                  <?php
                      $con=new mysqli("localhost","root","","phpdairy1");
                      if($con->connect_error){
                        die("Failed to connect:".$con->connect_error);
                    }
                      $sql="SELECT * FROM tblsupervisor";
                      $result=mysqli_query($con,$sql);
                       if(mysqli_num_rows($result)===1){
                       $row=mysqli_fetch_assoc($result);
                    if($row['role']==="$_SESSION[role]"){
                      echo "<li class='nav-item' style='display:none;'>
                      <a class='nav-link 'href='custtransport.php'>Milk Transport</a>
                    </li>
                    <li class='nav-item'>
                      <a class='nav-link 'href='transport.php'>Milk Transport</a>
                    </li>
                      ";
                    }
                  else{
                    echo "<li class='nav-item' style='display:block;'>
                    <a class='nav-link 'href='custtransport.php'>Milk Transport</a>
                  </li>";
                  }}
                      ?>
                  <li class="nav-item">
                    <a class="nav-link "href="news.php">News</a>
                  </li>
                  <?php
                      $con=new mysqli("localhost","root","","phpdairy1");
                      if($con->connect_error){
                        die("Failed to connect:".$con->connect_error);
                    }
                      $sql="SELECT * FROM tblsupervisor";
                      $result=mysqli_query($con,$sql);
                       if(mysqli_num_rows($result)===1){
                       $row=mysqli_fetch_assoc($result);
                    if($row['role']==="$_SESSION[role]"){
                      echo "
                    <li class='nav-item' style='display:none;'>
                      <a class='nav-link 'href='feedback.php'>Feedback</a>
                    </li>
                      ";
                    }
                  else{
                    echo "<li class='nav-item' style='display:block;'>
                    <a class='nav-link 'href='feedback.php'>Feedback</a>
                  </li>";
                  }}
                      ?>
                  <li class="nav-item">
                    <a class="nav-link "href="about.php">About Us</a>
                  </li>
                  <?php
                      $con=new mysqli("localhost","root","","phpdairy1");
                      if($con->connect_error){
                        die("Failed to connect:".$con->connect_error);
                    }
                      $sql="SELECT * FROM tblsupervisor";
                      $result=mysqli_query($con,$sql);
                       if(mysqli_num_rows($result)===1){
                       $row=mysqli_fetch_assoc($result);
                    if($row['role']==="$_SESSION[role]"){
                      echo "<li class='nav-item' style='display:none;' >
                      <a class='nav-link' href='myaccount.php'>My Account</a>
                    </li>
                    <li class='nav-item'>
                    <a class='nav-link' href='logout.php' >Logout</a>
                    </li>
                      ";
                    }
                  else{
                    echo "<li class='nav-item' style='display:block;' >
                    <a class='nav-link' href='myaccount.php'>My Account</a>
                  </li>";
                  }}
                      ?>
                </ul>
                <form class="d-flex" role="search">
                  <input class="form-control me-2" type="search" placeholder="Type here.." aria-label="Search" id="searchbar"autocomplete="off">
                  <input class="btn btn-outline-success" type="button"id="btnsearch" value="Search" onclick="search();">
                </form>
              </div>
            </div>
          </nav>