<?php


class PostUpdate extends Dbh{

    protected function getUser($name, $difficulty, $distance, $duration, $elevation, $id){
        $stmt = $this->connect()->prepare("SELECT * FROM hiking WHERE id=:id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        
        if($stmt->execute()){
                if($stmt->rowCount() > 0){
                    $stmt = $this->connect()->prepare("UPDATE hiking SET name =:name, difficulty =:difficulty, distance =:distance, duration =:duration, elevation_gain =:elevation   WHERE id=:id");
                    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
                    $stmt->bindParam(':difficulty', $difficulty, PDO::PARAM_STR);
                    $stmt->bindParam(':distance', $distance, PDO::PARAM_INT);
                    $stmt->bindParam(':duration', $duration);
                    $stmt->bindParam(':elevation', $elevation, PDO::PARAM_INT);

                    $stmt->execute();
                    header("location: ../welcome.php?success=hikeupdated");
                }
            
        }

        $stmt = null;
    }


} 