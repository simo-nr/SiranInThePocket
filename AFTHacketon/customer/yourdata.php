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
    <link href="yourdata.css" rel="stylesheet"/>
    <link href="index.css" rel="stylesheet"/>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
</head>
<body>
<div class="logo">
    <img src="https://www.o2o.be/app/uploads/2020/09/0.png" alt="logo" id="logosite">
</div>
<nav>
    <ul>
        <li><a href="../index.php">Home</a></li>
        <li><a href="yourdata.php" class="active">Your data</a></li>
        <li><a href="../user/aboutus.php">About us</a></li>
        <li id="login">
            <a href="../user/login.php">
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
    <?php
        if(!isset($_COOKIE["login"])){
    ?>
    <div class="box1">
        <h2>please <a href="../user/login.php">login</a> to analyse the data of your company</h2>
    </div>
    <div class="box2">
        <div id="myPlot"></div>
        <div id="myPlot2"></div>
        <script>
            var xArray = [50,60,70,80,90,100,110,120,130,140,150];
            var yArray = [7,8,8,9,9,9,10,11,14,14,15];

            // Define Data
            var data = [{
            x: xArray,
            y: yArray,
            mode: "lines",
            type: "scatter",
            marker: {color:"orange"}
            }];

            // Define Layout
            var layout = {
            xaxis: {range: [40, 160], title: "you need to log in"},
            yaxis: {range: [5, 16], title: "log in"},
            title: "log in"
            };

            // Display using Plotly
            Plotly.newPlot("myPlot", data, layout);

            var xArray = [55, 49, 44, 24, 15];
            var yArray = ["in","log","to","need","you"];

            var data = [{
            x: xArray,
            y: yArray,
            type: "bar",
            orientation: "h"
            }];

            var layout = {title:"you need to log in"};

            Plotly.newPlot("myPlot2", data, layout);
        </script>
    </div>
    <?php
        }
        else if($_COOKIE["login"] == "login"){  
    ?>
    <div class="box1">
    <form method="POST" enctype="multipart/form-data" action="upload.php">
        <input type="file" name="fileToUpload">
        <input type="submit" value="Upload File">
    </form>
    </div>


    <?php
        }
    ?>

</div>
</body>
</html>
<script>
    const isDarkmode = window.matchMedia && window.matchMedia('(prefers-color-scheme:dark)').matches;
    if(isDarkmode){
        console.log("dark");
        document.body.style.backgroundColor = "rgb(40,40,40)";
    }
    
</script>

