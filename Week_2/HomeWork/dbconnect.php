<?php
$servername = "localhost";
$dbname = "translate";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<script> console.log('Connection Successfull')</script>";
} catch(Exception $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>