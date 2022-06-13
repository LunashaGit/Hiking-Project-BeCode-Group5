<?php 

class ProfilUpdateContr extends ProfilUpdate{
    private $username;
    private $email;
    private $description;

    public function __construct($username, $email, $description){
        $this->username = $username;
        $this->email = $email;
        $this->description = $description;
    }

    public function ProfilUpdateUser(){
        if($this->emptyInputLog()==false){
            header("location: ../index.php");
            $_SESSION['error'] = "Empty input";
            exit();
        }
        
        $this->getUser($this->username, $this->email, $this->description);
    }

    private function emptyInputLog(){
        $result;
        if(empty($this->username) || empty($this->email) || empty($this->description)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    } //if empty input

}