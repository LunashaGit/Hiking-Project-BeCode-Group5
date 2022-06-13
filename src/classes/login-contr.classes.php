<?php


class LoginContr extends Login{

    private $email;
    private $password;

    public function __construct($email, $password){
        $this->email = $email;
        $this->password = $password;
    }

    public function loginUser(){
        if($this->emptyInputLog()==false){
            header("location: ../index.php");
            $_SESSION['error'] = "Empty input";

            exit();
        }
        $this->getUser($this->password, $this->email);
    } 

    private function emptyInputLog(){
        $result;
        if(empty($this->email) || empty($this-> password)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    } //if empty input

}