<?php
function logError($error){
    $timestamp = date("Y-m-d h:m:s");
    $code = $error->getCode();
    $message = $error->getMessage();
    $file = $error->getFile();
    $line = $error->getLine();

    $message = "Error $code logged at: $timestamp | $file | $line | $message \n";
    error_log($message,3,"../errorlog.log");
}
    $host		= "localhost";
    $user 	= "Webuser";
    $password	= "Lab2022";
    $database 	= "afthacketon";
    if(isset($_POST["register"])){
        try{

        $companyname = htmlspecialchars($_POST["companyname"]);
        $email = htmlspecialchars($_POST["email"]);

        $psw = password_hash(htmlspecialchars($_POST["password"]), PASSWORD_DEFAULT);
        
        $link = mysqli_connect($host, $user, $password) or die("Error: no connection can be made to $host");
        mysqli_select_db($link, $database) or die("Error: the database could not be opened");
        $query1 = "SELECT * FROM company WHERE companyname = '$companyname'";
        $result1 = mysqli_query($link, $query1) or die("Error: an error has occurred while executing the query");
        if (mysqli_num_rows($result1) == 0){

            $query1 = "insert into company (Companyname,PASSWORD,contactEmail) values ('$companyname','$psw','$email') ";
            $result1 = mysqli_query($link, $query1) or die("Error: an error has occurred while executing the query");

            mysqli_close($link);
            header( "Location: login.php" );
        }
        else{
            $end = time() + 5;
            setcookie("emailalreadyexists","An account with this email already exists",$end);
            header( "Location: register.php" );
        }
        
        }catch(Exception $e){
            logError($e);
            $end = time() + 5;
            setcookie("emailalreadyexists","something went wrong on our end, please try again later",$end);
            header( "Location: register.php" ); 
        }
        
    }
    else{
        header( "Location: login.php" );
    }
    
?>