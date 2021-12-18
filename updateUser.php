<?php
require("bd.php");

if(isset($_GET["submit"])){
    $id = $_GET["iduser"];
    $name = $_GET["name"];
    $sirName = $_GET["sirname"];
    $username = $_GET["username"];
    $address = $_GET["address"];
    $email = $_GET["email"];
    $role = $_GET["role"];
    

    if($role == 1 ){
        $role = "Admin";
    } else if($role == 2){
        $role = "User";
    }
    else{
        echo "<meta http-equiv=refresh content='0; url=index.php?page=3&message=3'>";exit;
    }
 
   if(!filter_var($email, FILTER_VALIDATE_EMAIL) === false){

            $sql_u = "SELECT * FROM utilizadores WHERE username='$username' NOT id='$id'";
            $sql_e = "SELECT * FROM utilizadores WHERE email='$email' NOT id='$id'";
            $res_u = mysqli_query($mysqli, $sql_u);
            $res_e = mysqli_query($mysqli, $sql_e);

            if (mysqli_num_rows($res_u) > 0) {
               echo "<meta http-equiv=refresh content='0; url=index.php?page=2&userid=".$id."&message=4'>"; exit;
            }else if(mysqli_num_rows($res_e) > 0){
                //header("url=?page=3&message=4");
                echo "<meta http-equiv=refresh content='0; url=index.php?page=2&userid=".$id."&message=5'>";exit;	
            }

            else{
                $sql = "UPDATE utilizadores SET nome='".$name."', apelido='".$sirName."', username='".$username."', morada='".$address."', email='".$email."', tipo='".$role."' WHERE id='".$id."'";
       
                if ($mysqli->query($sql) === TRUE) {
                    echo "<meta http-equiv=refresh content='0; url=index.php?page=2&userid=".$id."&message=6'>";exit;	
                } else {
                    echo "<meta http-equiv=refresh content='0; url=index.php?page=2&userid=".$id."&message=7'>";exit;	
                }
                
                $mysqli->close();
            }
   }

}

?>
                        <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Update User Form</div>
                                    <div class="card-body card-block">

                                    <?php require("messages.php"); ?>
                                    <?php 
                                            $sql_frase=$mysqli->query("Select * from utilizadores WHERE id='" . $_GET["userid"] . "'") or die ("Erro ao selecionar o home.");
                                                
                                                    while($row = $sql_frase->fetch_assoc()){
                                                        ?>
                                        <form action="updateUser.php?iduser=<?php echo $row["id"]; ?>">
                                        <div class="form-group">
                                                <div class="input-group">
                                                <input type="hidden" name="iduser" class="txtField" value="<?php echo $row['id']; ?>">
                                                    
                                                        <div class="input-group-addon">Name</div>
                                                        
                                                        <input type="text" id="username3" name="name" class="form-control" value="<?php echo $row["nome"];?>" Required>
                                                        
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-user"></i>
                                                        </div>
                                                    
                                                    &nbsp; &nbsp; 

                                                        <div class="input-group-addon">Sir Name</div>
                                                        
                                                        <input type="text" id="username3" name="sirname" value="<?php echo $row["apelido"];?>" class="form-control" Required>
                                                        
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-user"></i>
                                                        </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">Username</div>
                                                    <input type="text" id="username3" value="<?php echo $row["username"];?>" name="username" class="form-control" Required>
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </div>&nbsp; &nbsp;
                                                    <div class="input-group-addon">Address</div>
                                                    <input type="text" id="username3" name="address" value="<?php echo $row["morada"];?>" class="form-control" Required>
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">Email</div>
                                                    <input type="email" id="email3" name="email" value="<?php echo $row["email"];?>" class="form-control" Required>
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-envelope"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class=" input-group">
                                                            <label for="select" class=" form-control-label input-group-addon">
                                                            Role
                                                            </label>
                                                    
                                                            <select name="role" id="select" class="form-control" Required>
                                                                <?php
                                                                
                                                              if($row["tipo"] == "User"){?>
                                                                <option value="2">User</option>
                                                                <option value="1">Administrator</option>
                                                                <?php
                                                              } else {?>
                                                                <option value="1">Administrator</option>
                                                                <option value="2">User</option><?php
                                                              }
                                                            
                                                                ?>
                                                               
                                                            </select>
                                                </div>
                                                <br>
                                                <div class="form-actions form-group" style="float:right">
                                                    <input type="submit" class="btn btn-success btn-sm" value="Update" name="submit"/>
                                                </div>
                                            </div>
                                                
                                        </form>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            