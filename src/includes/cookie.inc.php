<?php 
session_start();
if(isset($_SESSION["idPost"])){
    $_SESSION["idPost"] = $_GET["id"];
} else {
    $_SESSION["idPost"] = $_GET["id"];
}

header("Location: ../modify.php")?>

