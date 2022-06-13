<?php
    require "dbh.classes.php";

class Read extends Dbh
{
    public function getAllHikes()
    {
        $stmt = $this->connect()->prepare("SELECT * FROM hiking ORDER BY id DESC");
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function getHike()
    {
        if(isset($_SESSION["idPost"])){
            $id = $_SESSION["idPost"];
            $stmt = $this->connect()->prepare("SELECT * FROM hiking WHERE id = '$id'");
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        }
        
    }
    
}

$read = new Read();
$read->getAllHikes();

$post = new Read();
$post->getHike();