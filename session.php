<?php

session_start();

if(!isset($_SESSION['username']) && !isset($_SESSION['password'])){
   
    echo "<meta http-equiv=refresh content='0; url=login.php?message=543'>";exit;
  }



?>