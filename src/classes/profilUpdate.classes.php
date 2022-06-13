<?php


class ProfilUpdate extends Dbh
{

    protected function getUser($username, $email, $description)
    {
        session_start();
        $id = $_SESSION["id"];
        $stmt = $this->connect()->prepare("SELECT * FROM users WHERE id='$id'");
        
        if($stmt->execute()){
                if($stmt->rowCount() > 0){
                    $stmt = $this->connect()->prepare("UPDATE users SET username=:username, email =:email, description =:description WHERE id=:id");
                    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
                    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                    $stmt->bindParam(':description', $description, PDO::PARAM_STR);
                    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                    $stmt->execute();
                    header("location: ../profil.php?success=profilchanged");
                }
            
        }

        $stmt = null;
    }
}
