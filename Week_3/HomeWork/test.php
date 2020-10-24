<?php
    include "db.php";
    
    $tests = selectAll("tests");
    $randTestIds=array();
    $randAnswers=array();

    foreach($tests as $test){
        array_push($randTestIds, $test['text']);
        $randAnswers[$test['text']] = $test["answer"];
    }
    shuffle($randTestIds);

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
    <h2>Test</h2>
    <div id="Tcontainer">
        <div id="testCont">
            <a href="index.php" style="text-decoration:none; color:black; font-size:30px; float:left; position:relative; top:-20px; left:-10px">&#10006;</a>
            <p>მონიშნეთ შემდეგი სიტყვების სწორი განმარტებები</p>

            <form action="" method="post">
                <?php
                $i=1;
                foreach($randTestIds as $randTest):
                    if($i > 5){
                    break;
                    }
                    echo($i);
                    $i++;?>.
                    <span><?=$randTest;?></span><br>
                    <input type="radio" name="<?=$randTest;?>" value="1">
                    <label for="1">True</label><br>
                    <input type="radio" name="<?=$randTest;?>" value="0">
                    <label for="0">False</label><br>
                <?php endforeach;?><br>
                <input type="hidden" name="stTime" value="<?=date('Y-m-d H:i:s'); ?>">
                <input type="submit" name="submit" value="Submit">
            </form>
        </div>
    </div>
</body>
<script>
    $
</script>
</html>
