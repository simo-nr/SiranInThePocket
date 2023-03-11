<?php
    if(isset($_COOKIE["login"])){
        if ($_COOKIE["login"] == "login"){
            session_start();
        }
        
    }

    if(isset($_POST["logout"]) || isset($_GET["logout"])){
        if (isset($_SESSION["username"]) || isset($_GET["logout"])){
            session_unset();
		    session_destroy();
            $end = time() - 72000;
            setcookie("login","",$end,'/');
		    echo ("<p>You are succesfully loged out!</p>");
        }
    }
    header( "Location: login.php" );
?>