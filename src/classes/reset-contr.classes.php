<?php 

class ResetContr extends Reset{
    private $password;
    private $cpassword;
    private $id;
    private $token;

    public function __construct($password, $cpassword, $id, $token){
        $this->password = $password;
        $this->cpassword = $cpassword;
        $this->id = $id;
        $this->token = $token;
    }

    public function ResetUser(){
        if($this->emptyInputLog()==false){
            header("location: ../reset.php");
            $_SESSION['error'] = "Empty input";
            exit();
        }
        if($this->passwordMatch()==false){
            header("location: ../reset.php");
            $_SESSION['error'] = "Password doesn't match";
            exit();
        }
        $this->getUser($this->password, $this->cpassword, $this->id, $this->token);
    }

    private function emptyInputLog(){
        $result;
        if(empty($this->password) || empty($this->cpassword)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    } //if empty input

    private function passwordMatch(){
        $result;
        if($this->password !== $this->cpassword){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }
}