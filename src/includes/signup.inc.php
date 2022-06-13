<?php

if(isset($_POST["submit"])){
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    //Post data to database
    require "../classes/dbh.classes.php";
    require "../classes/signup.classes.php";
    require "../classes/signup-contr.classes.php";
    //require SignUp Class & DBH
    $login = new SignupContr($username, $email, $password, $cpassword);
    //Verification Condition
    $login->signupUser();
    //Create User
    header("location: ../index.php?signup=success");

}
