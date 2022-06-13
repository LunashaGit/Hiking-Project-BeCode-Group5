<?php

if(isset($_POST["submit"])){
    session_start();
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $id = $_SESSION["id"];
    $token = $_SESSION["token"];
    require "../classes/dbh.classes.php";
    require "../classes/reset.classes.php";
    require "../classes/reset-contr.classes.php";

    $login = new ResetContr($password, $cpassword, $id, $token);

    $login->ResetUser();

    header("location: ../index.php?success=passwordreset");
}