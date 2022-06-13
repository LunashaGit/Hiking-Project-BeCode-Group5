<?php


class ForgotContr extends Forgot{

    private $email;

    public function __construct($email){
        $this->email = $email;
    }

    public function ForgotUser(){
        if($this->emptyInputLog()==false){
            header("location: ../index.php");
            $_SESSION['error'] = "Empty input";
            exit();
        }
        $this->getUser($this->email);
    }

    private function emptyInputLog(){
        $result;
        if(empty($this->email)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

}