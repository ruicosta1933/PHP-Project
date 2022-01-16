<?php
require ("bd.php");


if(isset($_POST["submit"])){
$nome = filter_var($_POST["first"], FILTER_SANITIZE_STRING);
$sirName = filter_var($_POST["last"], FILTER_SANITIZE_STRING);
$username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
$email = filter_var($_POST["email"], FILTER_SANITIZE_STRING);
$password1 = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
$password2 = filter_var($_POST["confPassword"], FILTER_SANITIZE_STRING);
$role = "User";

if (count($_FILES) > 0) {
    $filepath = $_FILES['file']['tmp_name'];
        $fileSize = filesize($filepath);
                if ($fileSize != 0) {
                    if ($fileSize < 3145728) {
                        if (is_uploaded_file($_FILES['file']['tmp_name'])) {
                            $imageData = addslashes(file_get_contents($_FILES['file']['tmp_name']));
                            $imageProperties = getimageSize($_FILES['file']['tmp_name']);
                        }
                    else {
                        echo "<meta http-equiv=refresh content='0; url=register.php?message=7'>";exit;
                    }
                }
                else {
                    echo "<meta http-equiv=refresh content='0; url=register.php?message=7'>";exit;
                }
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

            $sql = "INSERT INTO utilizadores (nome, apelido, username, email, pass, salt, tipo, imageType, imageData, ativo) VALUES ('".$nome."', '".$sirName."', '".$username."', '".$email."', '".$pass."', '".$salt."', '".$role."', '".$imageProperties['mime']."', '".$imageData."', 1)";
            
            if ($mysqli->query($sql) === TRUE) {
                
                echo "<meta http-equiv=refresh content='0; url=login.php?message=6'>";exit;	
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
