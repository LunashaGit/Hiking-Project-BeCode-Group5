<?php

class Dbh {

    protected function connect(){
        try{
            $pdo= new PDO($_ENV['PDO']);
            return $pdo;
        }
        catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
            die();
        }
    }
}