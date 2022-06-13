<?php

setcookie("id", "", -1, "/");
setcookie("username", "", -1, "/");
setcookie("email", "", -1, "/");
setcookie("permission", "", -1, "/");
//Destroy Cookie
session_start();
session_destroy();
//Logout
header("Location: ../index.php");
