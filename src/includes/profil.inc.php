<?php

if(isset($_POST["submit"])){
    $username = $_POST["username"];
    $email = $_POST["email"];
    $description = $_POST["description"];
    require "../classes/dbh.classes.php";
    require "../classes/profilUpdate.classes.php";
    require "../classes/profilUpdate-contr.classes.php";

    $profil = new ProfilUpdateContr($username, $email, $description);

    $profil->ProfilUpdateUser();

    header("location: ../profil.php?success=profilchanged");
}