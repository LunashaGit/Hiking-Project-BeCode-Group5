<?php


class CreateContr extends Create{

    private $name;
    private $difficulty;
    private $distance;
    private $duration;
    private $elevationPos;
    private $idUser;

    public function __construct($name, $difficulty, $distance, $duration, $elevationPos, $idUser){
        $this->name = $name;
        $this->difficulty = $difficulty;
        $this->distance = $distance;
        $this->duration = $duration;
        $this->elevationPos = $elevationPos;
        $this->idUser = $idUser;
        $this->created_at = date("Y-m-d H:i:s");
    }

    //All condition for signup
    public function Create(){
        if($this->emptyInput()==false){
            header("location: ../create.php");
            $_SESSION['error'] = "Empty input";
            exit();
        }
        
        if($this->name()==false){
            header("location: ../create.php");
            $_SESSION['error'] = "Empty input";
            exit();
        }

        $this->setHiking($this->name, $this->difficulty, $this->distance, $this->duration, $this->elevationPos, $this->idUser, $this->created_at);
    }

    private function emptyInput(){
        $result;
        if(empty($this->name) || empty($this->difficulty) || empty($this->distance)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    } //If Empty

    private function name(){
        $result;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->name)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    } //If Invalid Username (Only a-z, A-Z, 0-9)


}