<?php
    include "db.php";
    $words = selectAll();

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
            <p>მონიშნეთ შემდეგი სიტყვების სწორი განმარტებები</p>
            <?php
            $randWords=array();
            foreach($words as $word){
                array_push($randWords, $word['id']);
            }
            shuffle($randWords);
            // print_r($randWords);
            ?>
            <form action="test.php" method="post">
                <?php
                for($i=0; $i<=4; $i++):
                    $data = selectOne($randWords[$i]);
                    echo($i+1);?>.
                    <span><?=$data[0]['eng_ver'];?><br></span><br>
                    <?php for($k=0; $k<=3; $k++): ?>
                        <input type="radio" name="<?=$data[0]['eng_ver'];?>" value="<?=$data[0]['eng_ver'];?>">
                        <label for="<?=$data[0]['eng_ver'];?>"><?=$data[0]['ge_ver'];?></label><br>
                    <?php endfor;?><br>
                <?php endfor;?><br>
                <input type="submit" name="submit" value="Submit">
            </form>
        </div>
    </div>
</body>
</html>
