<?php
$tbName = "users";
$create = "CREATE TABLE IF NOT EXISTS $tbName (
            id INT(6) UNSIGNED AUTO_INCREMENT,
            email VARCHAR(50),
            password VARCHAR (50),
            firstname VARCHAR(30) NULL,
            lastname VARCHAR(30) NULL,
            birthday DATE NULL,
            ranking FLOAT(2, 2) NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            PRIMARY KEY (id)
            )";

try {
    $pdo->exec($create);
} catch(PDOException $e) {
}
?>