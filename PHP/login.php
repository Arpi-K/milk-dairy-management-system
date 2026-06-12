<?php
session_start();
$session=session_id();
if(isset($_POST['email'])&&isset($_POST['password'])&&isset($_POST['role'])){
    function test_input($data){
        $data=trim($data);
        $data=stripcslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }
    $email=test_input($_POST['email']);
    $password=test_input($_POST['password']);
    $role=test_input($_POST['role']);
    if(empty($email)||empty($password)||empty($role)){
        echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong> All the fields are required</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
    }
    else {
        include('dbconnect.php');
        if(!$con){
            echo "Connection failed";
            exit();
        }
        if($role=='admin'){
        $sql="SELECT * FROM tbladmin WHERE a_mail='$email' AND password='$password'";
        $result=mysqli_query($con,$sql);
        if(mysqli_num_rows($result)===1){
            $row=mysqli_fetch_assoc($result);
            if($row['password']===$password && $row['role']===$role){
                $_SESSION['a_mail']=$email;
                $_SESSION['password']=$password;
                $_SESSION['role']=$role;
                header("Location:admin.php");
            }
            else{
                echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>Invalid Email and Password</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
            }
        }else{
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>Invalid Email and Password</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
    }
    else if($role=='supervisor'){
        $sql="SELECT * FROM tblsupervisor WHERE emailid='$email' AND pwd='$password'";
        $result=mysqli_query($con,$sql);
        if(mysqli_num_rows($result)===1){
            $row=mysqli_fetch_assoc($result);
            if($row['pwd']===$password && $row['role']===$role){
                $_SESSION['emailid']=$email;
                $_SESSION['pwd']=$password;
                $_SESSION['role']=$role;
                header("Location:home.php");
            }
            else{
                echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>Invalid Email and Password</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
            }
        }else{
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>Invalid Email and Password</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
    }
    else if($role=='producer'){
        $sql="SELECT * FROM tblproducer WHERE p_mail='$email' AND p_pwd='$password'";
        $result=mysqli_query($con,$sql);
        if(mysqli_num_rows($result)===1){
            $row=mysqli_fetch_assoc($result);
            if($row['p_pwd']===$password && $row['role']===$role){
                $_SESSION['p_mail']=$email;
                $_SESSION['p_pwd']=$password;
                $_SESSION['role']=$role;
                $_SESSION['p_id']=$row['p_id'];
                header("Location:home.php");
            }
            else{
                echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>Invalid Email and Password</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
            }
        }else{
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>Invalid Email and Password</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
    }
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>Login page</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="jquery/jquery.min.js"></script> 
        <style type="text/css">
            .icon-user{
                position: absolute;
                left: 251px;
                top: 103px;
                width: 50px;
                height: 8%;
                display: flex;
                align-items: center;
                justify-content: center;
                background-color: lightblue;
                border-radius: 5px;
            }
            .icon-eye{
                position: absolute;
                left: 251px;
                top: 189px;
                width: 50px;
                height: 8%;
                display: flex;
                align-items: center;
                justify-content: center;
                background-color: lightblue;
                border-radius: 5px;
            }
        </style>
    </head>
    <body style="background-image: url(img3.jpg);background-size:100% 100%;background-repeat: no-repeat;">
        <div class="container vh-100 ">
            <div class="row justify-content h-100 " >
                <div class="card w-25 my-auto shadow">
                    <div class="card-header text-center bg-info text-white">
                        <h2>Login Form</h2>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" class="form-control" name="email" autocomplete="off" >
                                <div class="icon-user">
                                    <i class="fa-solid fa-user" aria-hidden="true"></i>
                                </div>
                            </div><br>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" id="password" class="form-control" name="password" autocomplete="off" minlength="8" maxlength="16" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,16}$">
                                <div class="icon-eye">
                                    <span><i class="fa-solid fa-eye" id="show-password" aria-hidden="true"></i></span>
                                </div>
                            </div><br>
                            <div class="form-group">
                                <label for="role">User Role</label>
                                <select class="form-select mb-3" name="role" >
                                    <option selected value="producer">Producer</option>
                                    <option value="admin">Admin</option>
                                    <option value="supervisor">Supervisor</option>
                                </select>
                            </div>
                            <input type="submit" class="btn btn-info w-100" value="Login" name=""/>
                            <br><p>Don't have an account?&nbsp;<a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Sign here</a></p>
                        </form>                
                    </div>
                    <div class="card-footer text-right">
                        <small>&copy; Copyrights are reserved</small>
                    </div>
                </div>
            </div>
        </div>
        <script >
            const togglePassword = document.querySelector('#show-password');
            const password = document.querySelector('#password');

            togglePassword.addEventListener('click', function (e) {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.classList.toggle('fa-eye-slash');
            });
        </script>
        <script src="jquery/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
<!-- Modal -->
<!-- Registration Form -->
<?php
    $email="";
    $name="";
    $password="";
    $phone="";
    $errorMessage="";
    $successMessage="";
    if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['create'])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $password=$_POST['password'];
    $con=new mysqli("localhost","root","","phpdairy1");
    if($con->connect_error){
        die("Failed to connect:".$con->connect_error);
    }
    $sql="SELECT * FROM tblproducer where p_mail='$email'";
    $result=$con->query($sql);
    if(!$result){
        die("Invalid query:".$con->error);
    }
    $row = $result->fetch_assoc();
    if($row['p_mail']===$email){
    $sql="UPDATE tblproducer SET p_pwd='$password' WHERE p_mail='$email'";
    $result=$con->query($sql);
    if(!$result){
        die("Invalid query:".$con->error);
     }
    } else{
                $errorMessage="Invalid Email Address";
            }
        }
        $successMessage="Successfully Inserted";
        }
        $email="";
        $name="";
        $password="";
        $phone="";
        $errorMessage="";
        $successMessage=""; 
    ?>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Sign In</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <div class="card  my-auto shadow">
                <div class="card-header text-center bg-info text-white">
                    <h2>Registartion Form</h2>
                </div>
                <div class="card-body">
                    <p>Fill up the form with correct values..</p>
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
        <?php
        if(!empty($successMessage)){
            echo "
            <div class='row mb-3'>
                <div class='offset-sm-3 col-sm-6'>
            <div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>$successMessage</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            </div>
            </div>
            ";
        }
        ?>
                    <form method="post">
                        <div class="form-group">
                            <label for="name"><b>Name:</b></label>
                            <input class="form-control" type="text" name="name" autocomplete="off" required>
                        </div><br>
                        <div class="form-group">
                            <label for="email"><b>Email:</b></label>
                            <input class="form-control" type="email" name="email" autocomplete="off" required>
                        </div><br>
                        <div class="form-group">
                            <label for="phone"><b>Phone Number:</b></label>
                            <input class="form-control" type="number" name="phone" autocomplete="off" required>
                        </div><br>
                        <div class="form-group">
                            <label for="password"><b>Password:</b></label>
                            <input class="form-control" type="password" name="password" autocomplete="off" required minlength="8" maxlength="16" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,16}$">
                        </div><br>
            <input type="submit" class="btn btn-info w-100" value="Sign Up"name="create" >
                    </form>
                </div>
                <div class="card-footer text-right">
                        <small>&copy; Copyrights are reserved</small>
                    </div>
            </div>
      </div>
    </div>
  </div>
</div>
    </body>
</html>


                         