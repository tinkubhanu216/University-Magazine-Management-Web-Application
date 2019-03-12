<?php
session_start();

unset($_SESSION['username']);
// empty value and expiration one hour before
$res = setcookie('username', '', time() - 3600,"/");
$res = setcookie('userid', '', time() - 3600,"/");


header('location:index.php');

?>