<?php
    function Select($query){
        global $pdo;

        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }
    function Update($query){
        global $pdo;

        $stmt = $pdo->prepare($query);
        $stmt->execute();
    }
?>