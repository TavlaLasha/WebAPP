<?php
    include "db.php";

    if(isset($_POST["sub"])){
        unset($_POST["sub"]);
        session_start();
        $_SESSION["post"]=$_POST;

        header('location: start.php');
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
    <div id="container">
        <form action="" method="post">
            <input type="text" name="fname" placeholder="First Name">
            <input type="text" name="lname" placeholder="Last Name">
            <input type="text" name="ID" placeholder="ID">
            <input type="submit" name="sub" value="End" id="end">
        </form>
    </div>
</body>
</html>