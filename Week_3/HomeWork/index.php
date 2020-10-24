<?php
    include "db.php";
    $texts = selectAll("tests");

    if(isset($_POST['add'])){
        unset($_POST['add']);
        addTest($_POST);
        header("Refresh:0");
    }
    elseif(isset($_POST['edit'])){
        unset($_POST['edit']);
        updateTest($_POST);
        header("Refresh:0");
    }
    elseif(isset($_POST['remove'])){
        unset($_POST['remove']);
        removeWord($_POST['id']);
        header("Refresh:0");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <!-- <link rel="stylesheet" href="style.css"> -->
    <title>Document</title>
</head>
<body>
    <h2>Tests</h2>
    <div id="container">
        <div id="nav">
            <input type="button" name="add" value="Add" onclick="location.href='index.php?cat=add';"><br><br>
            <!-- <input type="button" name="edit" value="Edit" onclick="location.href='edit.php';"><br><br> -->
            <input type="button" name="test" value="Test" onclick="location.href='test.php';"><br>
        </div>
        <div id="info">
            <?php foreach($texts as $text): 
                    echo $text["text"];
                    ?>
                    <input type="button" name="edit" value="Edit" onclick="location.href='index.php?id=<?=$text['id'];?>';"><br><br>
            <?php endforeach;
            if(isset($_GET['cat']) && $_GET['cat']="add"){
                include "add.php";
                echo("<script>
                    var element = document.getElementById('info');
                    element.scrollTop=element.scrollHeight;
                 </script>");
            }
            if(isset($_GET['id'])){
                $text = selectOne($_GET['id']);

                include "edit.php";
                echo("<script>
                    var element = document.getElementById('info');
                    element.scrollTop=element.scrollHeight;
                 </script>");
            }
            ?>
        </div>
    </div>
</body>
</html>
