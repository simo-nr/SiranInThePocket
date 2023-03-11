<?php
    if(isset($_COOKIE["login"])){
        if ($_COOKIE["login"] == "login"){
            session_start();
            if(!isset($_SESSION["ID"])){
                header( "Location: ../user/you'vebeenblocked.php" );
            }
        }
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <title>visualdata</title>
    <link href="aboutus.css" rel="stylesheet"/>
    <link href="index.css" rel="stylesheet"/>
</head>
<body>
<div class="logo">
    <img src="https://www.o2o.be/app/uploads/2020/09/0.png" alt="logo" id="logosite">
</div>
<nav>
    <ul>
        <li><a href="../index.php">Home</a></li>
        <li><a href="../customer/yourdata.php">Your data</a></li>
        <li><a href="../user/aboutus.php" class="active">About us</a></li>
        <li id="login">
            <a href="login.php">
                <?php
                    if(isset($_COOKIE["login"])){
                        if ($_COOKIE["login"] == "login"){
                            echo("My account");
                        }
                        
                    }
                    else{
                        echo("Login");
                    }
                ?>
                
            </a>
        </li>
    </ul>
</nav>
<div class="container">
    <div class="box">
        <div class="person">
            <p>Simon Deschagt</p>
            <img src="../images/SimonD.jpg" alt="simonR">
        </div>
        <hr>
        <div class="person">
            <img src="../images/joranS.jpg" alt="joranD">
            <p>Joran Deschagt</p>
        </div>
        <hr>
        <div class="person">
            <p>Andreas Vanderdonckt</p>
            <img src="../images/andreas.jpg" alt="andreas">
        </div>
        <hr>
        <div class="person">
            <img src="../images/joranV.jpg" alt="joranV">
            <p>Joran Van Nieuwenhoven</p>
        </div>
        <hr>
        <div class="person">
            <p>Simon Rolly</p>
            <img src="../images/simonr.jpg" alt="simonR">
        </div>
    </div>

</div>
</body>
</html>
<script>
    const isDarkmode = window.matchMedia && window.matchMedia('(prefers-color-scheme:dark)').matches;
    if(isDarkmode){
        console.log("dark");
        document.body.style.backgroundColor = "rgb(40,40,40)";
        document.getElementById("logosite").src = "https://www.o2o.be/app/uploads/2020/09/0.png";
    }
    
</script>

