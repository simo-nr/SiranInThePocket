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
    <!--<link href="reset.css" rel="stylesheet"/>-->
    <link href="index.css" rel="stylesheet"/>
</head>
<body>
<img src="https://www.sinequa.com/wp-content/uploads/blog/6-Ways-a-Data-Driven-Approach-Helps-Your-Organization-Succeed-1200.jpg" alt="dataBG" class="dataBG">
<div class="logo">
    <a href="https://www.inthepocket.com/what-we-do?utm_medium=ppc&utm_source=adwords&utm_campaign=BE+-+EN+-+Branded&utm_term=in%20the%20pocket&hsa_grp=65049897290&hsa_kw=in%20the%20pocket&hsa_tgt=kwd-364938752362&hsa_ver=3&hsa_cam=1838616642&hsa_ad=569399452228&hsa_mt=e&hsa_net=adwords&hsa_acc=5625890881&hsa_src=g&gclid=Cj0KCQiAx6ugBhCcARIsAGNmMbi9oSUJxNZQcOywcXoioAGgOECqNL2abXoUqneYMF1q-sKIKBZIn_0aAgAPEALw_wcB" id="redbull" target=”_blank”>
        <img src="https://recruiting.cdn.greenhouse.io/external_greenhouse_job_boards/logos/000/004/576/original/itp_logo_greenhouse.png?1522843964" alt="logo">
    </a>
    <h2 class="groupname">Made By Siran</h2>
</div>
<nav>
    <ul>
        <li><a href="customer/yourdata.php">Your data</a></li>
        <li><a href="user/aboutus.php">About us</a></li>
        <li id="login">
            <a href="user/login.php">
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
</body>
</html>
<script>
    const isDarkmode = window.matchMedia && window.matchMedia('(prefers-color-scheme:dark)').matches;
    if(isDarkmode){
        cu = document.getElementsByClassName("dataBG");
        cu[0].style.filter = "brightness(70%)";
    }
    
</script>
