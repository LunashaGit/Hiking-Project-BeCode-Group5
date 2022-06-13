<?php

if(isset($_POST["submit"])){
    session_start();
    $name = $_POST["name"];
    $difficulty = $_POST["difficulty"];
    $distance = $_POST["distance"];
    $duration = $_POST["duration"];
    $elevation = $_POST["elevationPos"];
    $id = $_SESSION["idPost"];

    require "../classes/dbh.classes.php";
    require "../classes/postUpdate.classes.php";
    require "../classes/postUpdate-contr.classes.php";

    $profil = new PostUpdateContr($name, $difficulty, $distance, $duration, $elevation, $id);

    $profil->ProfilUpdateUser();

    header("location: ../modify.php?success=hikechanged");
}