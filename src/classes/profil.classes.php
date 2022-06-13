<?php
    require "dbh.classes.php";

class Profil extends Dbh
{
    public function ProfilInformation()
    {
        $id = $_SESSION["id"];
        $stmt = $this->connect()->prepare("SELECT * FROM users WHERE id = '$id'");
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }
    
}

$profil = new Profil();
$profil->ProfilInformation();