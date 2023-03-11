
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
    if(isset($_POST["login"])){
        if(isset($_POST["companyname"]) && isset($_POST["password"])){
            if(!empty($_POST["companyname"] ) && !empty($_POST["password"] )){
                $psw = htmlspecialchars($_POST["password"]);
                $companyname = htmlspecialchars($_POST["companyname"]);
                try{
                $link = mysqli_connect($host, $user, $password) or die("Error: no connection can be made to $host");
                mysqli_select_db($link, $database) or die("Error: the database could not be opened");
                $query1 = "SELECT * FROM company WHERE CompanyName = '$companyname'";
                
                $result1 = mysqli_query($link, $query1) or die("Error: an error has occurred while executing the query");
                $company = mysqli_fetch_array($result1);
                if (mysqli_num_rows($result1) != 0){
                    if(($company["CompanyName"] == $companyname)){
                        if(password_verify($psw, $company["PASSWORD"])){
                            $em = $company["contactEmail"];
                            $ID = $company["ID"];

                            session_start();
                            $_SESSION['sid'] = session_id();
                            $_SESSION["username"] = $companyname;
                            $_SESSION["contactEmail"] = $em;
                            //$_SESSION["permissions"] = $permissions;
                            $_SESSION["ID"] = $ID;
                            
                            
                            $end = time() + 7200;///////////////////////////////////////////////////////////////////////////////////////
                            setcookie("login","login",$end,'/');
                            echo("<p>you've been logged in</p>");
                        }
                        else{
                            echo("<p>wrong name or password</p>");
                            $end = time() + 5;
                            setcookie("error","wrong name or password",$end);
                        }
                    }
                    else{
                        echo("<p>wrong name or password</p>");
                        $end = time() + 5;
                        setcookie("error","wrong name or password",$end);
                    }
                }
                else{
                    echo("<p>this user does not exist</p>");
                    $end = time() + 5;
                    setcookie("error","this user does not exist",$end);
                }
                mysqli_close($link);
                }catch(Exception $e){
                    logError($e);
                    $end = time() + 5;
                    setcookie("error","something went wrong on our end, try again later",$end);
                }
            }
            else{
                echo("<p>mpty</p>");
            }
        }




    }
    header( "Location: login.php" );
?>