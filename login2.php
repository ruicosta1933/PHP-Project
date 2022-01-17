<?php
require("bd.php");
date_default_timezone_set('Europe/Lisbon');

if(isset($_COOKIE["username"]) && isset($_COOKIE["password"])) { 
      

    $log_string = date("Y-m-d")." | ".$_COOKIE["username"]." iniciou sessão às ".date("h:i:s").", através de cookies\n\n============================================================================== \n\n";
    $log_file = "logs.txt";
  
    $handle = fopen($log_file, "a") or die ('Something went wrong !');
  
    fwrite($handle, $log_string);
    fclose($handle);

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

$username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
$pass = filter_var($_POST["password"], FILTER_SANITIZE_STRING);

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

  if($row["ativo"] == "0"){
    session_unset();

// destroy the session
session_destroy();
    $log_string = date("Y-m-d")." | ".$username." tentou iniciar sessão às ".date("h:i:s")." mas esta bloqueado! \n\n============================================================================== \n\n";
    $log_file = "logs.txt";
  
    $handle = fopen($log_file, "a") or die ('Something went wrong !');
  
    fwrite($handle, $log_string);
    fclose($handle);

    echo "<meta http-equiv=refresh content='0; url=../index.php?message=bloqueado'>";exit;
  }


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
        header('location:../index.php?message=5');
       }
    }
    else {
      //AVISO - PALAVRA PASS ERRADA
      header('location:../index.php?message=6');
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

