<?php include 'contact.php';
session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
        <title>Home Page</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/home.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> 
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="jquery/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    </head>
    <body style="background-image: url(img3.jpg);background-size:100% 100%;background-repeat: no-repeat;">
        <div class="main">
        <?php 
        include('header.php');
        ?>
            <hr size="2">
            <div id="carouselExampleIndicators" class="carousel slide">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="slide1.jpg" class="d-block w-100" alt="..."style="width:100%;height:400px;">
                  </div>
                  <div class="carousel-item">
                    <img src="slide2.jpg" class="d-block w-100" alt="..."style="width:100%;height:400px;">
                  </div>
                  <div class="carousel-item">
                    <img src="slide3.jpg" class="d-block w-100" alt="..."style="width:100%;height:400px;">
                  </div>
                  <div class="carousel-item">
                    <img src="slide4.jpg" class="d-block w-100" alt="..."style="width:100%;height:400px;">
                  </div>
                </div>
              </div>
            <div class="content">
                <div class="dflt">
                    <input  type="text" name="rate" value="Amount - 35.00"  readonly style="text-align: center;width: 28%;height: 40px;font-size: 20px;"><br><br>
                    <input  type="text" name="fat" value="SNF - 8.5" readonly style="text-align: center;width: 28%;height: 40px;font-size: 20px;"><br><br>
                    <input  type="text" name="clr" value="CLR - 25" readonly style="text-align: center;width: 28%;height: 40px;font-size: 20px;">
                </div>
                <h1><span><p id='p'>Kuriya Milk Producers’ Co-operative Society Limited,<br> Kuriya-Reg 3629 </span></h1>
                <p class="par"><br>President : Vijayahari Rai <br>Secretary : Lokesh Naithady </p>
                <button class="cn"><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal1">CONTACT US</a></button></p>
                </div>
        <?php
        include("footer.php");
        ?>
        </div>
        <script>
            var myIndex=0;
            carousel();
            function carousel(){
                var i;
                var x=document.getElementsByClassName("carousel-item");
                for(i=0;i<x.length;i++){
                    x[i].style.display="none";
                }
                myIndex++;
                if(myIndex>x.length){myIndex=1}
                x[myIndex-1].style.display="block";
                setTimeout(carousel,5000);
                }
        </script>
        <script type="text/javascript" name="searchfile">
    const p=document.getElementById("p");
    function search(){
        let input=document.getElementById("searchbar").value;
        if(input!==""){
            let regExp=new RegExp(input,"gi");
            p.innerHTML = (p.textContent).replace(regExp,"<mark>$&</mark>");
        }
    }
</script>
<!-- Contact Us -->
<?php echo $alert; ?>
    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">CONTACT US</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <div class="card  my-auto shadow">
                <div class="card-header text-center bg-info text-white">
                    <h2>Contact Form</h2>
                </div>
                <div class="card-body" style="background-color:lightgoldenrodyellow;" id="contact">
                    <i><h3 class="text-center" style="font-size:18px;">Lokesh Naithady<br>
                    Secretary<br>
                    Kuriya Haalu Uthpaadakara Sahakaara Sangha Niyamitha,<br>
                    Kuriya- Reg 3629<br>
                    Mobile No: 9900627851<br>
  </h3></i>
                </div>
                <div class="card-footer text-right">
                        <small>&copy; Copyrights are reserved</small>
                    </div>
            </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  if(window.history.replaceState){
    window.history.replaceState(null,null,window.location.href);
  }
</script>
    </body>
</html>