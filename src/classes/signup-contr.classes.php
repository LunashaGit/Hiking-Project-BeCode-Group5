<?php


class SignupContr extends Signup{

    private $username;
    private $email;
    private $password;
    private $cpassword;

    public function __construct($username, $email, $password, $cpassword){
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->cpassword = $cpassword;
    }

    //All condition for signup
    public function signupUser(){
        session_start();
        if($this->emptyInput()==false){
            header("location: ../register.php");
            $_SESSION['error'] = "Empty input";
            exit();
        }
        
        if($this->invalidUsername()==false){
            header("location: ../register.php");
            $_SESSION['error'] = "Invalid name";
            exit();
        }

        if($this->invalidEmail()==false){
            header("location: ../register.php");
            $_SESSION['error'] = "Invalid email";
            exit();
        }

        if($this->passwordMatch()==false){
            header("location: ../register.php");
            $_SESSION['error'] = "Password doesn't match";
            exit();
        }

        if($this->check()==false){
            header("location: ../register.php?error=useroremailtaken");
            $_SESSION['error'] = "Username Or Email is already taken";
            exit();
        }
        
        $this->setUser($this->username, $this->password, $this->email);
    }

    private function emptyInput(){
        $result;
        if(empty($this->username) || empty($this->email) || empty($this-> password) || empty($this->cpassword)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    } //If Empty

    private function invalidUsername(){
        $result;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->username)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    } //If Invalid Username (Only a-z, A-Z, 0-9)

    private function invalidEmail(){
        $result;
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    } //If Invalid Email (FilterEmail)

    private function passwordMatch(){
        $result;
        if($this->password !== $this->cpassword){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    } //If Password doesn't match

    private function check(){
        $result;
        if(!$this->checkUser($this->username, $this->email)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    } //If Username or Email is taken
    

}