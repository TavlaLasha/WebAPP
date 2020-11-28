<?php
    include "db.php";

    $tests = selectAll();
    $randTests = array();

    foreach($tests as $test){
        $randA = array();
        array_push($randTests, $test['question']);
        array_push($randA, $test['correct_ans'], $test['ans1'], $test['ans2']);
        $randAnswers[$test['question']] = $randA;
    }
    shuffle($randTests);
    // print_r($randAnswers);
    // print_r($randAnswers);

    if(isset($_POST['sub'])){
        unset($_POST['sub']);
        
        if(isset($_POST) && 0 !== count($_POST)){
            $score = checkAnswers($_POST, $randAnswers);
            // echo($score);
            // print_r($_POST);
            header('location: results.php?score='.$score);
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <title>Quiz</title>
</head>
<body>
    <h2>Test</h2>
    <div id="Tcontainer">
        <div id="testCont">
            <a href="index.php?cat=end" style="text-decoration:none; color:black; font-size:30px; float:left; position:relative; top:-20px; left:-10px">&#10006;</a>
            <p>მონიშნეთ სწორი პასუხები</p>
            <form action="" method="post">
                <?php
                    for($i=0; $i<=6; $i++):
                        $ans = array();
                        $cat = $randTests[$i];
                        for($k=0; $k<=2; $k++){
                            array_push($ans, $randAnswers[$cat][$k]);
                        }
                        shuffle($ans);
                    echo($i+1);?>.
                    <span><?=$cat;?></span><br>
                    <?php for($k=0; $k<=2; $k++): ?>
                            <input type="radio" id="" name="<?=$cat;?>" value="<?=$ans[$k];?>">
                            <label for="<?=$ans[$k];?>"><?=$ans[$k];?></label><br>
                    <?php endfor;?><br>
                <?php endfor;?><br>
                <input type="submit" name="sub" value="End" id="end">
            </form>
        </div>
    </div>
</body>
<script>
    // $('[name=')
    // $("#end").click(function(){
    //     console.log(ans);
    //     $("#end").prop('disabled', true);
    // })
</script>
</html>