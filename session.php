<?php

session_start();

if(!isset($_SESSION['username']) && !isset($_SESSION['password']) or $_SESSION['tipo']=="User" ){
   
    echo "<meta http-equiv=refresh content='0; url=../loja/index.php?mensagem=malandro'>";exit;
  }



?>