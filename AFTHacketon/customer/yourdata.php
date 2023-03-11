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
    <div class="box3">
        <h3>upload an .svg or a .json file for our employees to add to your data analysis</h3>
        <form method="POST" enctype="multipart/form-data" action="upload.php">
            <input type="file" name="fileToUpload">
            <br>
            <input type="submit" value="Upload File">
        </form>
        <hr>
        <div class="more">
            <h3>Click here for your <a href="detailedData.php">detailed analysis</a></h3>
        </div>
        <hr>
        <div class="reviewAVG"> 
            <div class="reviewAVGtext">
                <p><b>Average</b> </p>
                <p>These are Average ratings of every 2 weeks over the timespan of 3 months</p>
            </div>
            <div id="reviewAVGgraph">
                
            </div><!-- this part is hardcoded-->
            <script>
                var xArray = [50,60,70,80,90,100,110,120,130,140,150];
                var yArray = [1,1,2,3,3,1,4,2,1,1,1];

                // Define Data
                var data = [{
                 x: xArray,
                 y: yArray,
                 mode:"lines",
                type:"scatter"
                }];

                // Define Layout
                var layout = {
                xaxis: {range: [40, 160], title: "time"},
                yaxis: {range: [0, 5], title: "rating"},
                title: "Average rating of reviews per 2 weeks"
                };

                    Plotly.newPlot("reviewAVGgraph", data, layout);
            </script>
        </div>
        <hr>
        <div class="reviewAVG">
            <div class="reviewAVGtext">
                <p><b>Total</b> </p>
                <p>These are the total amount of reviews in the past 2 weeks</p>
            </div>
            <div id="reviewtotalgraph">
                
            </div>
            <form>
            <?php
                $file = fopen('../datafiles/amountReviews.txt', 'r'); // open file for reading
                $lines = '';
                if ($file) {
                    $counter = 0;
                    while (($line = fgets($file)) !== false) { // read file line by line
                        ?>
                            <input type="hidden" name="file_contents<?php echo($counter);?>" value="<?php echo htmlspecialchars($line); ?>">
                        <?php
                        $counter++;
                    }
                    fclose($file); // close the file
                }
                ?>
                    
                </form>
            <script>
                const xArray2 = [];
                const yArray2 = [];

                yArray2.push(document.getElementsByName("file_contents0")[0].value)
                yArray2.push(document.getElementsByName("file_contents1")[0].value)
                yArray2.push(document.getElementsByName("file_contents2")[0].value)
                yArray2.push(document.getElementsByName("file_contents3")[0].value)
                yArray2.push(document.getElementsByName("file_contents4")[0].value)
                yArray2.push(document.getElementsByName("file_contents5")[0].value)
                yArray2.push(document.getElementsByName("file_contents6")[0].value)
                yArray2.push(document.getElementsByName("file_contents8")[0].value)
                yArray2.push(document.getElementsByName("file_contents9")[0].value)
                yArray2.push(document.getElementsByName("file_contents10")[0].value)
                yArray2.push(document.getElementsByName("file_contents11")[0].value)
                yArray2.push(document.getElementsByName("file_contents12")[0].value)
                yArray2.push(document.getElementsByName("file_contents13")[0].value)


                // Get the current date
                const currentDate = new Date();

                // Loop through the last 14 days (including today)
                for (let i = 0; i < 14; i++) {
                    // Get the date for each day and add it to the array

                    const date = new Date(currentDate.getFullYear(), currentDate.getMonth(), currentDate.getDate() - i);

                    let month = (date.getMonth() + 1).toString();
                    if (month.length < 2) {
                    month = '0' + month;
                    }
                    let day = date.getDate().toString();
                    if (day.length < 2) {
                    day = '0' + day;
                    }
                    const dateString = month + '/' + day;
                    xArray2.push(dateString);
                
                }
                console.log(xArray2);
                console.log(yArray2);

                var data = [{
                x: xArray2,
                y: yArray2,
                type: "bar"  }];
                var layout = {title:"total reviews per day last 2 weeks"};

                Plotly.newPlot("reviewtotalgraph", data, layout);
            </script>
        </div>
        <hr>
        

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

