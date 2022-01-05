<?php
require ("bd.php");


if(isset($_POST["submit"])){
    echo "BBBBB";
$nome = $_POST["first"];
$sirName = $_POST["last"];
$username = $_POST["username"];
$email = $_POST["email"];
$password1 = $_POST["password"];
$password2 = $_POST["confPassword"];
$role = "User";

if (count($_FILES) > 0) {
    if (is_uploaded_file($_FILES['file']['tmp_name'])) {
        $imageData = addslashes(file_get_contents($_FILES['file']['tmp_name']));
        $imageProperties = getimageSize($_FILES['file']['tmp_name']);
    }
    else {
        echo "<meta http-equiv=refresh content='0; url=register.php?message=7'>";exit;
    }
}
else {
    echo "<meta http-equiv=refresh content='0; url=register.php?message=10'>";exit;
}




$pattern_pass='/^(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z]).{8,20}$/';
$time = time();
$salt = md5($time);
if($password1 == $password2){
   if(preg_match($pattern_pass, $password1)){
       $Fpassword = md5($password1);
   }
   else{
        echo "<meta http-equiv=refresh content='0; url=register.php?message=2'>";exit;
   }
}
else{
   echo "<meta http-equiv=refresh content='0; url=register.php?message=1'>";exit;
}

$pass = $Fpassword.$salt;

if(!filter_var($email, FILTER_VALIDATE_EMAIL) === false){

        $sql_u = "SELECT * FROM utilizadores WHERE username='$username'";
        $sql_e = "SELECT * FROM utilizadores WHERE email='$email'";
        $res_u = mysqli_query($mysqli, $sql_u);
        $res_e = mysqli_query($mysqli, $sql_e);

        if (mysqli_num_rows($res_u) > 0) {
            echo "<meta http-equiv=refresh content='0; url=register.php?message=4'>";exit;
        }else if(mysqli_num_rows($res_e) > 0){
            //header("url=?page=3&message=4");
            echo "<meta http-equiv=refresh content='0; url=register.php?message=5'>";exit;	
        }

        else{

            $sql = "INSERT INTO utilizadores (nome, apelido, username, email, pass, salt, tipo, imageType, imageData) VALUES ('".$nome."', '".$sirName."', '".$username."', '".$email."', '".$pass."', '".$salt."', '".$role."', '".$imageProperties['mime']."', '".$imageData."')";
            
            if ($mysqli->query($sql) === TRUE) {
                echo "<meta http-equiv=refresh content='0; url=register.php?message=6'>";exit;	
            } else {
                echo "<meta http-equiv=refresh content='0; url=register.php?message=7'>";exit;	
            }
            
            $mysqli->close();
        }
}

}
else{
    echo "AAAAAAAAAAAAAAAAAAAAC";
}

?>
