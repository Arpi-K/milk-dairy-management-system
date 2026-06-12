<?php
session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>About Us</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/about.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> 
        <script src="js/bootstrap.bundle.min.js"></script>
    </head>
    <body style="background-image: url(img3.jpg);background-size:100% 100%;background-repeat: no-repeat;">
       <div class="main" >
       <?php 
        include('header.php');
        ?>
            <hr class="cross">
            <div class="text-block">
            <h1 class="title"><b>About Us</b></h1>
            <h5><b>Kuriya Society:-</b></h5>
        <p class="para" >
            <span class="tab1">Kuriya </span> Milk Producers’ Co-operative Society Limited was 
            established in the year 1972-73 having Shrinivaas Rai as President and 
            Surendra as Secretary with the name ‘Malenaadu Milk Producers’ Co-operative Society Limited’. 
            In 1985-86, it was merged with KMF. Then in the year 1995-96 it moved to its own building.
            Now this society was achieving higher results with efforts of President Vijayahari Rai and Secretary Deranna.
            (Deranna got retired on March 31,2023. Currently, Lokesh Naithady was appointed as Secretary).
    </p>
    <h5><b>DK Milk Union:-</b></h5>
        <p class="para" >
            <span class="tab1">Dakshina </span> Kannada Co-Operative Milk Producers’ Union is a FSSC 22000(ver.5) certified organisation
            having jurisdiction of Dakshina Kannada and Udupi Coastal Districts. It is one of the leading Milk Unions in the State of Karnataka.
            At the time of registration during the year 1986, the Unions' milk procurement was 4,500 KPD. Now the Union is procuring 5,20,000 KPD. 
            In the beginning, Union was procuring 80% of its requirement of milk from neighbouring/other Milk Unions of Karnataka Milk Federation 
            and now the Union is at threshold of becoming self-reliant by increasing local milk procurement.<br>
            <div class="missionbg">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="rtitle">Our Mission</h3>
                            <p id="p">
                            <span class="tab1">Union</span> aim to help its members to increase milk production and produce good quality milk by extending need based services, thereby 
                            improving their economic and social development while ensuring the financial viability of the Union. Union also strives to satisfy
                            the customers by providing continuously high quality milk and milk products thereby becoming number one at national level.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
           </p>
    <h5><b>KMF:-</b></h5>
        <p class="para" >
            <span class="tab1">The </span> Karnataka Milk Federation (KMF) is a dairy cooperative from Karnataka, India, which sells products such as 
            milk , curds, ghee, butter, icecream, chocolates, and sweets under the brand name Nandini. It is a federation of milk producers under 
            the ownership of Ministry of Cooperation, Government of Karnataka. Almost every district in Karnataka has milk producing co-operatives. 
            The milk is collected from farmers who are its members, processed and sold in the market under the brand. It is the second-largest milk
            co-operative in India after Amul.<br>
            Trade Name: Nandini<br>
            Native Name: Karnataka Co-operative Milk Producers’ Union<br>
            Type: Co-operative<br>
            Industry: Dairy<br>
            Founded: 1974<br>
            Headquarters: Bangalore, Karnataka, India<br>
            Key People: Balachandra Jarkiholi (President)<br> 
            Website: <a target="_blank" href="kmfnandini.coop">kmfnandini.coop</a><br>
            <h4><b>Background:-</b></h4>
            <p class="para" id="p">
                <span class="tab1">The </span> first of the dairy co-operatives that make up KMF started in 1955 in Kudige, Kodagu District.
                KMF was founded in 1974 as Karnataka Dairy Development Cooperation (KDDC) to implement a dairy development project run by the 
                World Bank. In 1984, the organisation was renamed as KMF. KMF has 14 milk unions throughout the Karnataka State which procure 
                milk from Primary Dairy Cooperative Societies (DCS) and distribute milk to the consumers in various urban and rural markets in
                Karnataka State with 1,500 members.
        </p>
    </p>
    </div> 
    <?php
        include("footer.php");
        ?>
</div>
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
</body>
</html>