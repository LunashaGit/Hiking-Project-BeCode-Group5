<?php


class Forgot extends Dbh{

    protected function getUser($email){
        require "../includes/function.inc.php";

        $stmt = $this->connect()->prepare("SELECT * FROM users WHERE email=:email");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        if($stmt->execute()){
            if($stmt->rowCount() == 0){
                $stmt = null;
                header("location: ../forgot.php");
                $_SESSION['error'] = "No user exists with this email";
                exit();
            } else {
                $result = $stmt->fetch();
                session_start();
                $_SESSION["id"] = $result["id"];
                $_SESSION["username"] = $result["username"];
                $token = str_random(60);
                $stmt = $this->connect()->prepare("UPDATE users SET reset_token=:token WHERE email=:email");
                $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                $stmt->bindParam(':token', $token);
                $stmt->execute();
                mail($email, "Reset your password", "Click on this link to reset your password: http://localhost/reset.php?id={$_SESSION["id"]}&token=$token");
            }
        }

        $stmt = null;
    }


}


