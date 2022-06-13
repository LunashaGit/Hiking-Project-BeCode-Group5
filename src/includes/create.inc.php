<?php

if(isset($_POST["submit"])){
    session_start();
    $name = $_POST["name"];
    $difficulty = $_POST["difficulty"];
    $distance = $_POST["distance"];
    $duration = $_POST["duration"];
    $elevationPos = $_POST["elevationPos"];
    $idUser = $_SESSION["id"];

    //Post data to database
    require "../classes/dbh.classes.php";
    require "../classes/create.classes.php";
    require "../classes/create-contr.classes.php";
    //require create Class & DBH
    $create = new CreateContr($name, $difficulty, $distance, $duration, $elevationPos, $idUser);
    //Verification Condition
    $create->Create();
    //Create User
    header("location: ../create.php?create=success");

}
