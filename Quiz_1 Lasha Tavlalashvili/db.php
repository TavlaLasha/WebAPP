<?php
    require("dbconnect.php");

    function selectAll(){
        global $conn;

        $stmt = $conn->prepare("SELECT * FROM test");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $data = $stmt->fetchAll();
        return $data;
    }
    function selectOne($id){
        global $conn;

        $stmt = $conn->prepare("SELECT * FROM test WHERE id=$id");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $data = $stmt->fetchAll();
        return $data[0];
    }
    function checkAnswers($data, $randAnswers){
        $score=0;

        foreach($data as $key => $d){
            if($randAnswers[str_replace('_', ' ', $key)][0] == $d){
                $score+=2;
            }
        }
        return $score;
    }
    function addResult($score){
        global $conn;
        
        $stmt = $conn->prepare("INSERT INTO done_tests (score) 
        VALUES (:score)");
        $stmt->bindParam(':score', $score);
        $stmt->execute();
    }
?>