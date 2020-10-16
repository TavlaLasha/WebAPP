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
    function addResult($data, $score){
        global $conn;

        $stmt = $conn->prepare("INSERT INTO base (eng_ver, ge_ver) 
        VALUES (:eng_ver, :ge_ver)");
        $stmt->bindParam(':eng_ver', $data["eng"]);
        $stmt->bindParam(':ge_ver', $data["geo"]);
        $stmt->execute();
    }
?>