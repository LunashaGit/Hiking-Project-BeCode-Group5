<?php

if(isset($_POST["submitLog"])){
    $email = $_POST["email"];
    $password = $_POST["password"];
    //Post data to database
    require "../classes/dbh.classes.php";
    require "../classes/login.classes.php";
    require "../classes/login-contr.classes.php";
    //require Login Class & DBH
    session_start();
    $login = new LoginContr($email, $password);
    //Verification Condition
    $login->loginUser();
    //Login User
    header("location: ../welcome.php");

}