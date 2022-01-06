<?php 
session_start();
date_default_timezone_set('Europe/Lisbon');

$log_string = date("Y-m-d")." | ".$_SESSION["username"]." terminou sessão às ".date("h:i:s")."\n\n============================================================================== \n\n";
$log_file = "logs.txt";

$handle = fopen($log_file, "a") or die ('Something went wrong !');

fwrite($handle, $log_string);
fclose($handle);



session_unset();

// destroy the session
session_destroy();

unset($_COOKIE['username']);
setcookie('username', '', time() - 3600, '/');
unset($_COOKIE['password']);
setcookie('password', '', time() - 3600, '/');

header('location:../index.php');

?>