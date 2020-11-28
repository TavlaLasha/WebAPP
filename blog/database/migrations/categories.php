<?php
$tbName = "categories";
$create = "CREATE TABLE IF NOT EXISTS $tbName (
            id INT(6) UNSIGNED AUTO_INCREMENT,
            title VARCHAR(50),
            autor_id INT(6) UNSIGNED NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            PRIMARY KEY (id),
            FOREIGN KEY (autor_id) REFERENCES users(id) ON DELETE SET NULL ON UPDATE SET NULL
            )";

try {
    $pdo->exec($create);
} catch(PDOException $e) {
}
?>