<?php
    require "dbh.classes.php";

class Delete extends Dbh{

    public function DeleteHike()
    {
        session_start();

        if(isset($_SESSION["idPost"])){
            $id = $_SESSION["idPost"];
            $stmt = $this->connect()->prepare("DELETE FROM hiking WHERE id=:id ");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            header("location: ../welcome.php?delete=success");
        }

    }
}


$delete = new Delete();
$delete->DeleteHike();