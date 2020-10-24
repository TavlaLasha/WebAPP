<?php
    require('dbconnect.php');
    date_default_timezone_set("Asia/Tbilisi");
    
    function selectAll($table){
        global $conn;

        $stmt = $conn->prepare("SELECT * FROM $table");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $data = $stmt->fetchAll();
        return $data;
    }
    function selectOne($id){
        global $conn;

        $stmt = $conn->prepare("SELECT * FROM tests WHERE id=$id");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $data = $stmt->fetchAll();
        return $data[0];
    }
    function addTest($data){
        global $conn;

        $stmt = $conn->prepare("INSERT INTO tests (text, answer) 
        VALUES (:text, :answer)");
        $stmt->bindParam(':text', $data["text"]);
        $stmt->bindParam(':answer', $data["answer"]);
        $stmt->execute();
    }
    function updateTest($data){
        global $conn;
        $id = $data['id'];
        $text = $data['text'];
        $answer = $data['answer'];
        $stmt = $conn->prepare("UPDATE tests SET text='$text', answer='$answer' WHERE id=$id");
        $stmt->execute();
    }
    function removeWord($id){
        global $conn;
        
        $stmt = $conn->prepare("DELETE FROM tests WHERE id=$id");
        $stmt->execute();
    }
    function checkAnswers($data, $randAnswers){
        $score=0;

        foreach($data as $key => $d){
            if($randAnswers[str_replace('_', ' ', $key)] == $d){
                $score++;
            }
        }
        return $score;
    }
    function addResult($start_date, $end_date, $score, $duration){
        global $conn;

        $std = $start_date->format('Y-m-d H:i:s');
        $end = $end_date->format('Y-m-d H:i:s');
        
        $stmt = $conn->prepare("INSERT INTO done_tests (start_time, end_time, duration, score) 
        VALUES (:start_time, :end_time, :duration, :score)");
        $stmt->bindParam(':start_time', $std);
        $stmt->bindParam(':end_time', $end);
        $stmt->bindParam(':duration', $duration);
        $stmt->bindParam(':score', $score);
        $stmt->execute();
    }
?>