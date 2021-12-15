<?php
require("bd.php");
if(isset($_GET["submit"])){

    $nome = $_GET["name"];
    $sirName = $_GET["sirname"];
    $username = $_GET["username"];
    $address = $_GET["address"];
    $email = $_GET["email"];
    $password1 = $_GET["password1"];
    $password2 = $_GET["password2"];
    $role = $_GET["role"];
    

    if($role == 1 ){
        $role = "Admin";
    } else if($role == 2){
        $role = "User";
    }
    else{
        echo "<meta http-equiv=refresh content='0; url=index.php?page=3&message=3'>";exit;
    }

   $pattern_pass='/^(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z]).{8,20}$/';
   $time = time();
   $salt = md5( $time);
   if($password1 == $password2){
       if(preg_match($pattern_pass, $password1)){
           $Fpassword = md5($password1);
       }
       else{
            echo "<meta http-equiv=refresh content='0; url=index.php?page=3&message=2'>";exit;
       }
   }
   else{
       echo "<meta http-equiv=refresh content='0; url=index.php?page=3&message=1'>";exit;
   }
 
   $pass = $Fpassword.$salt;
   if(!filter_var($email, FILTER_VALIDATE_EMAIL) === false){

            $sql_u = "SELECT * FROM utilizadores WHERE username='$username'";
            $sql_e = "SELECT * FROM utilizadores WHERE email='$email'";
            $res_u = mysqli_query($mysqli, $sql_u);
            $res_e = mysqli_query($mysqli, $sql_e);

            if (mysqli_num_rows($res_u) > 0) {
                echo "<meta http-equiv=refresh content='0; url=index.php?page=3&message=4'>";exit;
            }else if(mysqli_num_rows($res_e) > 0){
                //header("url=?page=3&message=4");
                echo "<meta http-equiv=refresh content='0; url=index.php?page=3&message=5'>";exit;	
            }

            else{

                $sql = "INSERT INTO utilizadores (nome, apelido, username, morada, email, pass, salt, tipo) VALUES ('".$nome."', '".$sirName."', '".$username."', '".$address."', '".$email."', '".$pass."', '".$salt."', '".$role."')";
                
                if ($mysqli->query($sql) === TRUE) {
                    echo "<meta http-equiv=refresh content='0; url=index.php?page=3&message=6'>";exit;	
                } else {
                    echo "<meta http-equiv=refresh content='0; url=index.php?page=3&message=7'>";exit;	
                }
                
                $mysqli->close();
            }
   }

}

?>
                        <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Add User Form</div>
                                    <div class="card-body card-block">

                                    <?php require("messages.php"); ?>

                                        <form action="addUser.php">
                                        <div class="form-group">
                                                <div class="input-group">
                                                    
                                                        <div class="input-group-addon">Name</div>
                                                        
                                                        <input type="text" id="username3" name="name" class="form-control" Required>
                                                        
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-user"></i>
                                                        </div>
                                                    
                                                    &nbsp; &nbsp; 

                                                        <div class="input-group-addon">Sir Name</div>
                                                        
                                                        <input type="text" id="username3" name="sirname" class="form-control" Required>
                                                        
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-user"></i>
                                                        </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">Username</div>
                                                    <input type="text" id="username3" name="username" class="form-control" Required>
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </div>&nbsp; &nbsp;
                                                    <div class="input-group-addon">Address</div>
                                                    <input type="text" id="username3" name="address" class="form-control" Required>
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">Email</div>
                                                    <input type="email" id="email3" name="email" class="form-control" Required>
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-envelope"></i>
                                                    </div>
                                                </div>
                                            </div>
                                                            <div class="input-group">
                                                                <div class="input-group-addon">Password</div>
                                                                <input type="password" id="password1" name="password1" class="form-control" Required>
                                                                <div class="input-group-addon">
                                                                    <i class="fa fa-asterisk"></i>
                                                                </div>&nbsp; &nbsp; 
                                                                <div class="input-group-addon">Confirm Password</div>
                                                                <input type="password" id="password2" name="password2" class="form-control" Required>
                                                                <div class="input-group-addon">
                                                                    <i class="fa fa-asterisk"></i>
                                                                </div>
                                                            </div>
                                          <br>
                                            <div class=" input-group">
                                                            <label for="select" class=" form-control-label input-group-addon">
                                                            Role
                                                            </label>
                                                    
                                                            <select name="role" id="select" class="form-control" Required>
                                                                <option value="">Choose the User Role</option>
                                                                <option value="1">Administrator</option>
                                                                <option value="2">User</option>
                                                            </select>
                                                </div>
                                                <br>
                                                <div class="form-actions form-group" style="float:right">
                                                    <input type="submit" class="btn btn-primary btn-sm" value="Submit" name="submit"/>
                                                </div>
                                            </div>
                                                
                                        </form>
                                    </div>
                                </div>
                            </div>