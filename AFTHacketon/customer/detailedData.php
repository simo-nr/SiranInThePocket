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
    // this bit is hardcoded, there was no json data to read from in this file system
        /*
        // Path to the JSON file
        $jsonFile = '../datafiles/reviews.json';

        // Read the JSON file
        $jsonData = file_get_contents($jsonFile);

        // Decode the JSON data into a PHP array
        $data = json_decode($jsonData, true);

        // Loop through the data and do something with it
        foreach ($data as $item) {
            echo $item['name'] . ' - ' . $item['age'] . '<br>';

        */
        for ($x = 0;$x<3;$x++){
            ?>
                <div class="review">
                    <div class="keywords">
                        <div class="keyword">
                            <p>Unamusing</p>
                        </div>
                        <div class="keyword">
                            <p>Spotify</p>
                        </div>
                        <div class="keyword">
                            <p>Listen</p>
                        </div>
                        <div class="keyword">
                            <p>Podcasts</p>
                        </div>

                    </div>
                    <div class="summary">
                        <p><b>summary</b><br>1. There is a strong negative sentiment towards the app pushing podcasts on users, since they pay for the service to listen to music without advertisements. <br>2. It is important for the music streaming app to understand the features and content that their users prioritize, especially since they pay for the premium service. </p>
                    </div>
                    <div class="solution">
                    <p><b>solution</b><br>1. Allow users to customize their homepage to prioritize music content and eliminate or minimize podcast recommendations. This could be done by adding a "Music Only" toggle button or giving users the ability to hide podcast recommendations on their homepage. <br>2. Modify the recommendation algorithms to better understand individual user's preferences by tracking the content they listen to throughout the app, as well as analyzing feedback through ratings or reviews. <br> 3. Offer exclusive promotions, discounts or other incentives for premium users that are interested in music only. By providing incentives for users to use the app, the service can maintain their user base and potentially attract new users.</p>
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

