<?php

session_start();
$misession=$_SESSION['email'];

if ($misession == null || $misession = '') {
    header("location:login.php");
}

    	session_destroy();
    	header("location:login.php");


?>
