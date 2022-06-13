<?php


class Reset extends Dbh{

    protected function getUser($password, $cpassword, $id, $token){
        $stmt = $this->connect()->prepare("SELECT * FROM users WHERE id='$id' AND reset_token='$token'");
        
        if($stmt->execute()){
            
                if($stmt->rowCount() > 0){
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                    $stmt = $this->connect()->prepare("UPDATE users SET password=:password, reset_token='' WHERE id='$id'");
                    $stmt->bindParam(':password', $hashed_password);
                    $stmt->execute();
                    header("location: ../index.php?success=passwordreset");
                }
            
        }

        $stmt = null;
    }


}