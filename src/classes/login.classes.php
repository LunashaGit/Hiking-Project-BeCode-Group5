<?php

class Login extends Dbh{

    protected function getUser($password, $email){
        $stmt = $this->connect()->prepare("SELECT * FROM users WHERE email=:email");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        //Result Data & Verification Password & Hash
        if($stmt->execute()){
            $result = $stmt->fetch();
            if($stmt->rowCount() == 0){
                $stmt = null;
                header("location: ../index.php");
                $_SESSION['error'] = "No user exists with this email";
                exit(); //If result = 0
            } else {
                if(password_verify($password, $result["password"])){
                    //Cookie with ID
                    $_SESSION['username'] = $result["username"];
                    $_SESSION['id'] = $result["id"];
                    $_SESSION['permission'] = $result["permission"];
                    $_SESSION['email'] = $result["email"];
                    
                    if($result["permission"] == 1){
                        header("location: ../admin.php");
                    }else{
                        header("location: ../welcome.php");
                    }
                    //If the permission is 1, it's admin, else it's user
                }else{
                    header("location: ../index.php");
                    $_SESSION['error'] = "Wrong password";
                    //If the password it's wrong... it's error
                }
            }
            
        }

        
        $stmt = null;
    }


}