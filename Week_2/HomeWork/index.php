<?php
    include "dbconnect.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <h2>Translate</h2>
    <div id="container">
        <div id="nav">
            <input type="button" name="add" value="Add"><br>
            <input type="button" name="edit" value="Edit"><br>
            <input type="button" name="test" value="Test"><br>
        </div>
        <div id="info">
            <?php
                for($i=0; $i<=30; $i++){
                    echo $i;
                    echo"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='button' name='edit' value='Edit'><br><br>";
                }
            ?>
        </div>
    </div>
    <?php

    // $stmt = $conn->prepare("SELECT * FROM base");
    // $stmt->execute();
    // $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    // $data = $stmt->fetchAll();
    // print_r($data);
    // echo "<hr>";
    // for($i=0; $i<count($data); $i++){
    //     print_r($data[$i]['pass']);
    //     echo "<br>";
    // }
    //print_r($data[0]);


    // $stmt = $conn->prepare("INSERT INTO base (eng_ver, ge_ver) 
    //                 VALUES (:eng_ver, :ge_ver)");
    // $stmt->bindParam(':email', $email);
    // $stmt->bindParam(':pass', $pass);
    // $stmt->bindParam(':created_at', $created_at);
    // $email = "jimi@example.com";
    // $created_at = date('2020-10-01');
    // $stmt->execute();
    // $last_id = $conn->lastInsertId();
    // echo "New record created successfully. Last inserted ID is: " . $last_id;
    // $email="user@gau.ge";
    // $sql = "INSERT INTO user (email, pass) VALUES ('$email', '123')";
    // $conn->exec($sql);
    // //$conn->exec($sql);
    // $last_id = $conn->lastInsertId();
    // echo "New record created successfully. Last inserted ID is: " . $last_id;


    $conn = null;

    ?>
</body>
</html>
