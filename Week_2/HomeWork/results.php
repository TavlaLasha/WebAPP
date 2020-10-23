<?php
    include "db.php";
    
    $score = $_GET['score'];
    $start_date = new DateTime($_GET['stTime']);
    $end_date = new DateTime($_GET['edTime']);
    $since_start = $start_date->diff($end_date);

    $duration='';
    if($since_start->h != 0){
        $duration .= $since_start->h.' Hours-';
    }
    if($since_start->i != 0){
        $duration .= $since_start->i.' Minutes-';
    }
    $duration .= $since_start->s.' Seconds';

    addResult($start_date, $end_date, $score, $duration);
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
    <h2>Translate</h2>
    <div id="Tcontainer">
        <div id="testCont">
            <a href="index.php" style="text-decoration:none; color:black; font-size:30px; float:left; position:relative; top:-20px; left:-10px">&#10006;</a>
            <h2>Your Score is: <?=$score; ?>/5</h2>
            <h3>Time Elapsed:</h3>
            <h4><?=$duration;?></h4>
        </div>
    </div>
</body>
</html>
