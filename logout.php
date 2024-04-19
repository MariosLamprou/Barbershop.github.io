<?php

session_start();

if(isset($_SESSION['userid']))
{
    unset($_SESION['userid']);
}

header("Location: login.php");
die;
?>