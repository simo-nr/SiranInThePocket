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
    <script>
        function checkregister(){
            companyname = document.getElementsByName("companyname")[0];
            email = document.getElementsByName("email")[0];
            password = document.getElementsByName("password")[0];
            correct = true;
            console.log("checking");
            if(companyname.value == ""){
                companyname.placeholder = "please fill in this field";
                companyname.style.border = "2px solid red";
                console.log("false");
                correct = false;
            }
            else{
                companyname.style.border = "1px solid rgba(51, 204, 204)";
            }
            if(email.value == ""){
                email.placeholder = "please fill in this field";
                email.style.border = "2px solid red";
                console.log("false");
                correct = false;
            }
            else{
                email.style.border = "1px solid rgba(51, 204, 204)";
            }
            if(password.value == ""){
                password.placeholder = "please fill in this field";
                password.style.border = "2px solid red";
                console.log("false");
                correct = false;
            }
            else{
                password.style.border = "1px solid rgba(51, 204, 204)";
            }
            return correct;
        }
    </script>
</head>
<body>

<div class="logo">
    <img src="https://www.o2o.be/app/uploads/2020/09/0.png" alt="logo" id="logosite">
    
</div>
<nav>
    <ul>
        <li><a href="../index.php">Home</a></li>
        <li><a href="../customer/yourdata.php">Your data</a></li>
        <li><a href="../user/aboutus.php">About us</a></li>
        <li id="login"  class="active">
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
    <h1 class="headerforcontainer">Customer</h1>
    <div class="login_container">
        
        
        <div class="new_customer">
            <h3>New Customers</h3>
            <hr>
            <p class="ifalreadyaccountp">If you don't have an account yet, register here</p>
            <?php
                if(isset($_COOKIE["emailalreadyexists"])){
                    echo('<p style="color: red;">'.$_COOKIE["emailalreadyexists"].'</p>');
                }
            ?>
            <form method="POST" action="register_user.php" onsubmit="return checkregister()">
                <p>login values</p>
                <div class="companyname">
                    <div class="label"><label for="email">Company name*</label></div> 
                    <input type="text" name="companyname" id="companyname">
                </div>
                <div class="email">
                    <div class="label"><label for="email">Contact Email*</label></div> 
                    <input type="email" name="email" id="email">
                </div>
                <div class="password">
                    <div class="label"><label for="password">Password*</label></div>
                    <input type="password" name="password" id="password">

                </div>
                
                <input type="submit" value="submit" name="register" >
                
            </form>
            <form action="login.php">
                <input type="submit" value="go back">
            </form>
        </div>
        <img src="../images/illustration-pattern-4.png" alt="nice pattern">
    </div>
</div>
</body>
</html>
<script>
    const isDarkmode = window.matchMedia && window.matchMedia('(prefers-color-scheme:dark)').matches;
    if(isDarkmode){
        console.log("dark");
        document.body.style.backgroundColor = "rgb(40,40,40)";
        cu = document.getElementsByClassName("new_customer");
        cu[0].style.boxShadow = "0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(91, 195, 232,0.5)";
        cu[0].style.backgroundColor = "rgb(100,100,100)"

        cu = document.getElementsByClassName("headerforcontainer");
        cu[0].style.color = "rgba(150, 204, 204)"
    }
    
</script>
