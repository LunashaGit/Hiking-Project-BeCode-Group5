<?php

class Create extends Dbh{

    protected function setHiking($name, $difficulty, $distance, $duration, $elevationPos, $idUser, $created_at){
        $stmt = $this->connect()->prepare("INSERT INTO hiking (name, difficulty, distance, duration, elevation_gain, id_user, created_at ) VALUES (:name, :difficulty, :distance, :duration, :elevation, :id, :created_at);");
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':difficulty', $difficulty, PDO::PARAM_STR);
        $stmt->bindParam(':distance', $distance, PDO::PARAM_INT);
        $stmt->bindParam(':duration', $duration);
        $stmt->bindParam(':elevation', $elevationPos, PDO::PARAM_INT);
        $stmt->bindParam(':id', $idUser, PDO::PARAM_INT);
        $stmt->bindParam(':created_at', $created_at);
        if(!$stmt->execute()){
            $stmt = null;
            header("location: ../create.php?error=stmtfailed");
            exit();
        }
        
        $stmt = null;
    }

    }
