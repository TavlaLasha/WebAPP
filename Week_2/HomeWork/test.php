<?php
    include "db.php";
    
    $words = selectAll();
    $randWordIds=array();
    $randAnswers=array();

    foreach($words as $word){
        array_push($randWordIds, $word['ge_ver']);
        $randAnswers[$word['ge_ver']] = $word['eng_ver'];
    }
    shuffle($randWordIds);

    if(isset($_POST['submit'])){
        unset($_POST['submit']);
        
        if(isset($_POST) && 0 !== count($_POST)){
            $startTime = $_POST['stTime'];
            unset($_POST['stTime']);
            $score = checkAnswers($_POST, $randAnswers);
            $endTime = date('Y-m-d H:i:s');
            header('location: results.php?score='.$score.'&stTime='.$startTime.'&edTime='.$endTime);
        }
        else{
            echo('<style type="text/css">
                #testCont > form > span{
                    color:red;
                }
                </style>');
        }
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <!-- <link rel="stylesheet" href="style.css"> -->
    <title>Test</title>
</head>
<body>
    <h2>Translate</h2>
    <div id="Tcontainer">
        <div id="testCont">
            <a href="index.php" style="text-decoration:none; color:black; font-size:30px; float:left; position:relative; top:-20px; left:-10px">&#10006;</a>
            <p>მონიშნეთ შემდეგი სიტყვების სწორი განმარტებები</p>

            <form action="" method="post">
                <?php
                for($i=0; $i<=4; $i++):
                    $cat = $randAnswers[$randWordIds[$i]];
                    $randA = array();
                    array_push($randA, $randWordIds[$i]);
                    for($c=0; $c<=3; $c++){
                        if($randWordIds[$c] == $randWordIds[$i]){
                            continue;
                        }
                        else{
                            array_push($randA, $randWordIds[$c]);
                        }
                    }
                    shuffle($randA);
                    // print_r($randA);
                    echo($i+1);?>.
                    <span><?=$cat;?></span><br>
                    <?php for($k=0; $k<=3; $k++): ?>
                            <input type="radio" name="<?=$cat;?>" value="<?=$randA[$k];?>">
                            <label for="<?=$randA[$k];?>"><?=$randA[$k];?></label><br>
                    <?php endfor;?><br>
                <?php endfor;?><br>
                <input type="hidden" name="stTime" value="<?=date('Y-m-d H:i:s'); ?>">
                <input type="submit" name="submit" value="Submit">
            </form>
        </div>
    </div>
</body>
</html>
