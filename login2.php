<?php
require("bd.php");
date_default_timezone_set('Europe/Lisbon');

if(isset($_COOKIE["username"]) && isset($_COOKIE["password"])) { 
  
  session_start();

$username = $_COOKIE["username"];
$pass = $_COOKIE["password"];

setcookie("username","");
    setcookie("password","");

$sql = "SELECT * FROM utilizadores WHERE username = '".$username."'";

$result = mysqli_query($mysqli, $sql);

if(mysqli_num_rows($result) > 0 ){
   $row = $result->fetch_assoc();
   
    $confirmPass = md5($pass).$row["salt"];



    if($confirmPass == $row["pass"]){

      
    $_SESSION['id'] = $row["id"];
    $_SESSION['imageData'] = $row["imageData"];
    $_SESSION['imageType'] = $row["imageType"];
    $_SESSION['email'] = $row["email"];
    $_SESSION['tipo'] = $row["tipo"];
    $_SESSION['username'] = $username;

    $log_string = date("Y-m-d")." | ".$username." iniciou sessão às ".date("h:i:s").", através de cookies\n\n============================================================================== \n\n";
    $log_file = "logs.txt";
  
    $handle = fopen($log_file, "a") or die ('Something went wrong !');
  
    fwrite($handle, $log_string);
    fclose($handle);


      if($row["tipo"]=="Admin"){
       
        header('location:index.php?message=2');
       }
       else{
        header('location:../loja/index.php?message=LOGOU');
       }
    }
    else {
      //AVISO - PALAVRA PASS ERRADA
      header('location:LOGIN.php?message=PASSerrada');
    }
}


  }



if(isset($_POST["submit"])){

  if(!empty($_POST["remember"])) {
    setcookie ("username",$_POST["username"],time()+ 3600);
    setcookie ("password",$_POST["password"],time()+ 3600);
  } else {
    setcookie("username","");
    setcookie("password","");
  }
  
session_start();

$username = $_POST['username'];
$pass = $_POST['password'];
// A variavel $result pega as varias $login e $senha, faz uma
//pesquisa na tabela de usuarios


$sql = "SELECT * FROM utilizadores WHERE username = '".$username."'";




$result = mysqli_query($mysqli, $sql);

if(mysqli_num_rows($result) > 0 ){
   $row = $result->fetch_assoc();
   
    $confirmPass = md5($pass).$row["salt"];
    $_SESSION['id'] = $row["id"];
    $_SESSION['imageData'] = $row["imageData"];
    $_SESSION['imageType'] = $row["imageType"];
    $_SESSION['email'] = $row["email"];
    $_SESSION['tipo'] = $row["tipo"];
    $_SESSION['username'] = $username;

  $log_string = date("Y-m-d")." | ".$username." iniciou sessão às ".date("h:i:s")."\n\n============================================================================== \n\n";
  $log_file = "logs.txt";

  $handle = fopen($log_file, "a") or die ('Something went wrong !');

  fwrite($handle, $log_string);
  fclose($handle);


    if($confirmPass == $row["pass"]){
      if($row["tipo"]=="Admin"){
        header('location:index.php?message=2');
       }
       else{
       
        header('location:../loja/index.php?message=LOGOU');
       }
    }
    else {
      //AVISO - PALAVRA PASS ERRADA
      header('location:LOGIN.php?message=PASSerrada');
    }
}

else{
  // remove all session variables
session_unset();

// destroy the session
session_destroy();
  header('location:login.php?message=1');

  }
}
?>

