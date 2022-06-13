<?php

if(isset($_POST["submit"])){
    $email = $_POST["email"];
    require "../classes/dbh.classes.php";
    require "../classes/forgot.classes.php";
    require "../classes/forgot-contr.classes.php";

    $login = new ForgotContr($email);

    $login->ForgotUser();

    header("location: ../index.php");
}