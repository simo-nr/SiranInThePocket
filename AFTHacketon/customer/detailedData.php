<?php
    if(isset($_COOKIE["login"])){
        if ($_COOKIE["login"] == "login"){
            session_start();
            if(!isset($_SESSION["ID"])){
                header( "Location: ../user/you'vebeenblocked.php" );
            }
        
        
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <title>visualdata</title>
    <link href="detailedData.css" rel="stylesheet"/>
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
    <div class="preword">
        <h1>This is your detailed analysis</h1>
        <p>Here we used the most common keyword pairs in your reviews,</p>
        <p>to generate a summary of what the problem is and give you a possible solution on how to fix it.</p>
        <a href="yourdata.php">go back</a>
    </div>
    <?php
        for ($x = 0;$x<5;$x++){
            ?>
                <div class="review">
                    <div class="keywords">
                    <?php
                    for($y = 0;$y<3;$y++){
                        ?>
                            <div class="keyword">
                                <p>keyword</p>
                            </div>
                        <?php
                    }
                    ?>
                    </div>
                    <div class="summary">
                        <p><b>summary</b><br>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus dicta doloremque nihil reprehenderit itaque nostrum dolorum, sint tenetur ipsam libero, maiores earum eos cumque, sunt officia et assumenda commodi non.</p>
                    </div>
                    <div class="solution">
                    <p><b>solution</b><br>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus dicta doloremque nihil reprehenderit itaque nostrum dolorum, sint tenetur ipsam libero, maiores earum eos cumque, sunt officia et assumenda commodi non.</p>
                    </div>
                </div>
            <?php
        }
    ?>
</div>
</div>
</body>
</html>
<?php
        }
        else{
            header("Location:../user/login.php");
        }
    }
    else{
        header("Location:../user/login.php");
    }
?>
<script>
    const isDarkmode = window.matchMedia && window.matchMedia('(prefers-color-scheme:dark)').matches;
    if(isDarkmode){
        console.log("dark");
        document.body.style.backgroundColor = "rgb(40,40,40)";
    }
    
</script>

