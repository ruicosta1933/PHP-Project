<?php

if(isset($_POST['submit']) && isset($_GET['key']) && isset($_GET['reset']))
{


  $id=$_POST['id'];
  $password1=$_POST['password'];
  $password2=$_POST['password2'];

    
   $pattern_pass='/^(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z]).{8,20}$/';
   $time = time();
   $salt = md5($time);

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


   $select=mysqli_query($mysqli, "UPDATE utilizadores set pass='".$pass."', salt='".$salt."' where id='".$id."'");


   if ($mysqli->query($select) === TRUE) {
    echo "<meta http-equiv=refresh content='0; url=login.php?message=6'>";exit;	
    } else {
        echo "<meta http-equiv=refresh content='0; url=login.php?message=7'>";exit;	
    }

 


}

?>