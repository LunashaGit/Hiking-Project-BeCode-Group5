<?php

class Signup extends Dbh{

    protected function setUser($username, $password, $email){
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->connect()->prepare("INSERT INTO users (username, password, email) VALUES (:username, :password, :email)");
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':password', $hashed_password);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        mail($email, "Welcome to the website", "You have successfully signed up!");
        //Inser Data to Database, Send Mail "Welcome" & Hash Password
        if(!$stmt->execute()){
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        } //Error if it can't execute
        
        $stmt = null;
    }

    protected function checkUser($username, $email){
        $stmt = $this->connect()->prepare("SELECT * FROM users WHERE username = ? OR email = ?;");
        //Verification Username & Email
        if(!$stmt->execute(array($username, $email))){
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }//Error if it can't execute
        
             
    $resultcheck;
        if($stmt->rowCount() > 0){
            $resultcheck = false;
        }else{
            $resultcheck = true;
        } //if Result = 0, it's true, else false (error)

        return $resultcheck;
    }

}