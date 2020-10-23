<?php
    require('dbconnect.php');
    date_default_timezone_set("Asia/Tbilisi");
    
    function selectAll(){
        global $conn;

        $stmt = $conn->prepare("SELECT * FROM base");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $data = $stmt->fetchAll();
        return $data;
    }
    function selectOne($id){
        global $conn;

        $stmt = $conn->prepare("SELECT * FROM base WHERE id=$id");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $data = $stmt->fetchAll();
        return $data;
    }
    function addWord($data){
        global $conn;

        $stmt = $conn->prepare("INSERT INTO base (eng_ver, ge_ver) 
        VALUES (:eng_ver, :ge_ver)");
        $stmt->bindParam(':eng_ver', $data["eng"]);
        $stmt->bindParam(':ge_ver', $data["geo"]);
        $stmt->execute();
    }
    function updateWord($data){
        global $conn;
        $id = $data['id'];
        $eng = $data['eng'];
        $geo = $data['geo'];
        $stmt = $conn->prepare("UPDATE base SET eng_ver='$eng', ge_ver='$geo' WHERE id=$id");
        $stmt->execute();
    }
    function removeWord($id){
        global $conn;
        
        $stmt = $conn->prepare("DELETE FROM base WHERE id=$id");
        $stmt->execute();
    }
    function checkAnswers($data, $randAnswers){
        $score=0;

        foreach($data as $key => $d){
            if($key == $randAnswers[$d]){
                $score++;
            }
        }
        return $score;
    }
    function addResult($start_date, $end_date, $score, $duration){
        global $conn;

        $std = $start_date->format('Y-m-d H:i:s');
        $end = $end_date->format('Y-m-d H:i:s');
        
        $stmt = $conn->prepare("INSERT INTO tests (start_time, end_time, duration, score) 
        VALUES (:start_time, :end_time, :duration, :score)");
        $stmt->bindParam(':start_time', $std);
        $stmt->bindParam(':end_time', $end);
        $stmt->bindParam(':duration', $duration);
        $stmt->bindParam(':score', $score);
        $stmt->execute();
    }
?>