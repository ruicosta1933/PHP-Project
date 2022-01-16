<?php 
    if(isset($_GET["userid"]) && !isset($_GET["block"])){

        $sql = "DELETE FROM utilizadores WHERE id='" . $_GET["userid"] . "'";

         if ($mysqli->query($sql) === TRUE) {
             echo "<meta http-equiv=refresh content='0; url=index.php?page=1&message=8'>";exit;	
            } else {
                echo "<meta http-equiv=refresh content='0; url=index.php?page=1&message=7'>";exit;	
            }

    }
    if(isset($_GET["block"])){
        $id=$_GET["userid"];
            if($_GET["block"] == 1){
                $sql = "UPDATE utilizadores SET ativo=0 WHERE id='".$id."'";

                if ($mysqli->query($sql) === TRUE) {

                    echo "<meta http-equiv=refresh content='0; url=index.php?page=1&message=16'>";exit;	
                    } else {
                        echo "<meta http-equiv=refresh content='0; url=index.php?page=1&message=7'>";exit;	
                    }
                    
            }
                else if($_GET["block"] == 0){
                    $sql = "UPDATE utilizadores SET ativo=1 WHERE id='".$id."'";

                    if ($mysqli->query($sql) === TRUE) {
                        echo "<meta http-equiv=refresh content='0; url=index.php?page=1&message=15'>";exit;	
                        } else {
                            echo "<meta http-equiv=refresh content='0; url=index.php?page=1&message=7'>";exit;	
                        }
                        }
        

    }

?>   
                      <div class="user-data">
                                    <h3 class="title-3 m-b-30">
                                        <i class="zmdi zmdi-account-calendar"></i>user data</h3>
                                        <?php 
                                                require("messages.php");
                                        ?>
                                    <div class="filters m-b-45">
                                        <div class="rs-select2--dark rs-select2--md m-r-10 rs-select2--border">
                                            <select class="js-select2" name="property">
                                                <option selected="selected">All Properties</option>
                                                <option value="">Products</option>
                                                <option value="">Services</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                            
                                        </div>
                                        <div class="rs-select2--dark rs-select2--sm rs-select2--border">
                                            <select class="js-select2 au-select-dark" name="time">
                                                <option selected="selected">All Time</option>
                                                <option value="">By Month</option>
                                                <option value="">By Day</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>

                                        <div class="form-header" style="display: inline">
                                        <input id="myInput" onkeyup="myFunction()" class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                        </div>

                                       

                                        <div style="float: right; display: inline; padding-left: 15px">
                                            <button type="button" class="btn btn-primary"><a href="?page=3" style="color: white">+ Add User</a></button>
                                        </div>
                                        
                                    </div>
                                    <div class="table-responsive table-responsive-data2" >
                                        <table class="table table-data2" id="myTable">
                                                <thead>
                                                    <tr>
                                                        <th>image</th>
                                                        <th>name</th>
                                                        <th>address</th>
                                                        <th>role</th>
                                                        <th></th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <style>

                                                    .imagem{
                                                        display: flex;
                                                        height: 90px;
                                                        width: 90px;
                                                        border-radius: 50px;
                                                    }

                                                        </style>
                                                <?php 
                                            $sql_frase=$mysqli->query("Select * from utilizadores") or die ("Erro ao selecionar o home.");
                                                
                                                    while($row = $sql_frase->fetch_assoc()){
                                                    ?>
                                                    
                                                    <tr class="tr-shadow">
                                                        <td>
                                                        <div><?php
                                                        echo '<img class="imagem" src="data:'.$row['imageType'].';base64,'.base64_encode($row['imageData']).'"/>';
                                                        ?>
                                                        </div>
                                                        </td>
                                                        <td>
                                                            <div class="table-data__info">
                                                                <h6><?php echo $row['nome']?></h6>
                                                                <span>
                                                                    <a href="mailto:<?php echo $row['email']?>"><?php echo $row['email']?></a>
                                                                </span>
                                                            </div>
                                                        </td>
                                                        
                                                        <td>
                                                            <a><?php echo $row['morada']?></a>
                                                        </td>
                                                        <td>
                                                            <?php  
                                                            
                                                            if($row['tipo'] == "User"){
                                                                echo "<span class='role user'>".$row['tipo']."</span>";
                                                            }
                                                            else if($row['tipo'] == "Admin"){
                                                                echo "<span class='role admin'>".$row['tipo']."</span>";
                                                            }
                                                            ?>
                                                            
                                                        </td>
                                                        <td>
                                                            <div class="table-data-feature">

                                                                <a href="?page=2&userid=<?php echo $row["id"]; ?>">
                                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                                        <i class="zmdi zmdi-edit"></i>
                                                                    </button>
                                                                 </a>
                                                                 <?php  
                                                            
                                                            if($row['ativo'] == 1 && $row['tipo'] == "User"){
                                                            ?>
                                                                <a href="?page=1&userid=<?php echo $row["id"]; ?>&block=1">

                                                                   <button class="item" onclick="return confirm('Are you sure you want to Block?');"  data-toggle="tooltip" data-placement="top" title="Block">
                                                                        <i class="zmdi zmdi-eye"></i>
                                                                    </button>
                                                                </a>
                                                                <?php } 
                                                            else if ($row['ativo'] == 0 && $row['tipo'] == "User") {
                                                            ?>
                                                            <a href="?page=1&userid=<?php echo $row["id"]; ?>&block=0">
                                                            <button class="item" onclick="return confirm('Are you sure you want to unBlock?');"  data-toggle="tooltip" data-placement="top" title="Unblock">
                                                                <i class="zmdi zmdi-eye-off"></i>
                                                            </button>
                                                            </a>
                                                            <?php } ?>
                                                                <?php  
                                                            
                                                            if($row['tipo'] == "User" ){
                                                            ?>
                                                                <a href="?page=1&userid=<?php echo $row["id"]; ?>">

                                                                   <button class="item" onclick="return confirm('Are you sure you want to Delete?');"  data-toggle="tooltip" data-placement="top" title="Delete">
                                                                        <i class="zmdi zmdi-delete"></i>
                                                                    </button>
                                                                </a>
                                                              
                                                                <?php } ?>
                                                            </div>
                                                        </td>
                                                        <td></td>
                                                    </tr>
                                                    
                                                    <?php  }?>
                                                </tbody>
                                               
                                        </table>

                                                <script>
                                                        function myFunction() {
                                                            var input, filter, table, tr, td, i, txtValue;
                                                            input = document.getElementById("myInput");
                                                            filter = input.value.toUpperCase();
                                                            table = document.getElementById("myTable");
                                                            tr = table.("tr");

                                                                    for (i = 0; i < tr.length; i++) {
                                                                        td = tr[i].getElementsByTagName("td")[0];
                                                                        if (td) {
                                                                            txtValue = td.textContent || td.innerText;
                                                                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                                                            tr[i].style.display = "";
                                                                        } else {
                                                                            tr[i].style.display = "none";
                                                                        }
                                                                        }       
                                                                    }
                                                        }
                                                </script>
                                    </div>
                                </div>
                                