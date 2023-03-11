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
    <link href="login.css" rel="stylesheet"/>
    <!--<link href="../reset.css" rel="stylesheet"/>-->
    <script>
        function checklogin(){
            email = document.getElementsByName("email")[0];
            passw = document.getElementsByName("password")[0];
            correct = true;

            if(email.value == ""){
                email.style.border = "2px solid red";
                email.placeholder = "please fill in this field";
                correct = false;
            }
            else{
                email.style.border = "1px solid rgba(51, 204, 204)";
            }
            if(passw.value == ""){
                passw.style.border = "2px solid red";
                passw.placeholder = "please fill in this field";
                correct = false;
            }
            else{
                passw.style.border = "1px solid rgba(51, 204, 204)";
            }
            return correct;
        }


    </script>
</head>
<body>

<div class="top">
    <div class="logo">
        <img src="https://www.o2o.be/app/uploads/2020/09/0.png" alt="logo" id="logosite">
    </div>
</div>
<nav>
    <ul>
        <li><a href="../index.php">Home</a></li>
        <li><a href="../customer/yourdata.php">Your data</a></li>
        <li><a href="../user/aboutus.php">About us</a></li>
        <li id="login"  class="active">
            <a href="#">
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
    <h1 class="headerforcontainer">Customer</h1>
    <div class="login_container">
        
        <div class="customer">
            <h3>Registered Customers</h3>
            <hr>
            <?php
                if(!isset($_SESSION["username"])){
            ?>
            <p class="ifalreadyaccountp">If you already have an account, log in here with your <br> Company's name</p>
            <form method="POST" action="log_in_user.php" onsubmit="return checklogin()">
                <div class="email">
                    <div class="label"><label for="companyname">Company name*</label></div> 
                    <input type="text" name="companyname" id="companyname" <?php
                    if(isset($_COOKIE["error"])){
                        $holder = str_replace(" ","&nbsp;",$_COOKIE["error"]);
                        echo("placeholder=".$holder);
                        echo(' style="border: 2px solid red "');
                    }
                    ?>>
                </div>
                <div class="password">
                    <div class="label"><label for="password">Password*</label></div>
                    <input type="password" name="password" id="password" <?php
                    if(isset($_COOKIE["error"])){
                        $holder = str_replace(" ","&nbsp;",$_COOKIE["error"]);
                        echo("placeholder=".$holder);
                        echo(' style="border: 2px solid red "');
                    }
                    ?>>

                </div>
                <input type="submit" value="login" name="login">
            </form>
            <?php
                }
                else{
            ?>
            <p class="welcome">Welcome <?php echo($_SESSION["username"]); ?>!</p>
            <form action="logout.php" method="POST">
                <input type="submit" value="logout" name="logout">
            </form>
            <a href="../customer/yourdata.php">Your data</a>
            
            <?php
                
            }
            ?>
        </div>
        

        <div class="new_customer">
            <h3>New Customers</h3>
            <hr>
            <p class="ifalreadyaccountp">If you don't have an account yet, <a href="../user/register.php" class="registerhere">register here</a></p>
            
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
        cu = document.getElementsByClassName("customer");
        cu[0].style.boxShadow = "0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(91, 195, 232,0.5)";
        cu[0].style.backgroundColor = "rgb(100,100,100)"
        cu = document.getElementsByClassName("new_customer");
        cu[0].style.boxShadow = "0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(91, 195, 232,0.5)";
        cu[0].style.backgroundColor = "rgb(100,100,100)"

        cu = document.getElementsByClassName("headerforcontainer");
        cu[0].style.color = "rgba(150, 204, 204)"

        cu = document.getElementsByClassName("registerhere");
        cu[0].style.color = "rgba(194, 210, 233)";
    }
    
</script>
