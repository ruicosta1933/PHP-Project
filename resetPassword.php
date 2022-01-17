<?php

if(isset($_POST['submit']) && isset($_GET['key']) && isset($_GET['reset']))
{


  $id=$_POST['id'];
  $password1=filter_var($_POST["password"], FILTER_SANITIZE_STRING);
  $password2=filter_var($_POST["password2"], FILTER_SANITIZE_STRING);

    
   $pattern_pass='/^(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z]).{8,20}$/';
 
   $salt = md5(time());

   if($password1 == $password2){
       if(preg_match($pattern_pass, $password1)){
           $Fpassword = md5($password1);
       }
       else{
            echo "<meta http-equiv=refresh content='0; url=resetPass.php?message=1'>";exit;
       }
   }
    else{
        echo "<meta http-equiv=refresh content='0; url=resetPass.php?message=2'>";exit;
    }

   $pass = $Fpassword.$salt;
   
   require("bd.php");

   $sql = "UPDATE utilizadores set pass='".$pass."', salt='".$salt."' where id='".$id."'";
       
   if ($mysqli->query($sql) === TRUE) {
 echo "<meta http-equiv=refresh content='0; url=login.php?message=11'>";exit;	
    } else {
         echo "<meta http-equiv=refresh content='0; url=login.php?message=7'>";exit;	
    }

}

?>