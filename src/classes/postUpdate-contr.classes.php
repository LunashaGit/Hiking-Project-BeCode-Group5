<?php 

class PostUpdateContr extends PostUpdate{
    private $name;
    private $difficulty;
    private $distance;
    private $duration;
    private $elevation;
    private $id;

    public function __construct($name, $difficulty, $distance, $duration, $elevation, $id){
        $this->name = $name;
        $this->difficulty = $difficulty;
        $this->distance = $distance;
        $this->duration = $duration;
        $this->elevation = $elevation;
        $this->id = $id;
    }
        
    public function ProfilUpdateUser(){
        if($this->emptyInputLog()==false){
            header("location: ../modify.php");
            $_SESSION['error'] = "Empty input";
            exit();
        }
        
        $this->getUser($this->name, $this->difficulty, $this->distance, $this->duration, $this->elevation, $this->id);
    }

    private function emptyInputLog(){
        $result;
        if(empty($this->name) || empty($this->difficulty) || empty($this->distance) || empty($this->elevation)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    } //if empty input

}