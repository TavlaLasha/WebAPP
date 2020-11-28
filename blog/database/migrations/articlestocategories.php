<?php
$tbName = "articlestocategories";
$create = "CREATE TABLE IF NOT EXISTS $tbName (
            id INT(6) UNSIGNED AUTO_INCREMENT,
            cat_id INT(6) UNSIGNED NULL,
            article_id INT(6) UNSIGNED NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            PRIMARY KEY (id),
            FOREIGN KEY (cat_id) REFERENCES categories(id) ON DELETE CASCADE ON UPDATE CASCADE,
            FOREIGN KEY (article_id) REFERENCES articles(id) ON DELETE CASCADE ON UPDATE CASCADE
            )";

try {
    $pdo->exec($create);
} catch(PDOException $e) {
}
?>