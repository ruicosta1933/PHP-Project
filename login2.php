<?php
require("bd.php");
if(isset($_POST["submit"])){


session_start();

$username = $_POST['username'];
$pass = $_POST['password'];
// A variavel $result pega as varias $login e $senha, faz uma
//pesquisa na tabela de usuarios


$sql = "SELECT * FROM utilizadores WHERE username = '".$username."' AND pass= '".$pass."'";

$result = mysqli_query($mysqli, $sql);

if(mysqli_num_rows($result) > 0 ){

    

   $row = $result->fetch_assoc();
   
   if($row["tipo"]=="Admin"){
    $_SESSION['id'] = $row["id"];
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $pass;
    header('location:index.php?message=2');
   }
   else{
// remove all session variables
session_unset();

// destroy the session
session_destroy();

header('location: http://istudent.ipt.pt/~balegria/nhecos1.jpg');
 
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
