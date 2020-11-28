<?php
    include "db.php";
    
    $succes = false;
    $score = $_GET['score'];
    if($score >= 10){
        $succes = true;
    }
    // addResult($score);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <!-- <link rel="stylesheet" href="style.css"> -->
    <title>Results</title>
</head>
<body>
    <h2>Results</h2>
    <div id="Tcontainer">
        <div id="testCont">
            <a href="index.php" style="text-decoration:none; color:black; font-size:30px; float:left; position:relative; top:-20px; left:-10px">&#10006;</a>
            <h2>Your Score is: <?=$score; ?>/14</h2>
            <?php 
                if($succes){
                    echo("Congrats! You passed!");
                }
            ?>
        </div>
    </div>
</body>
</html>
