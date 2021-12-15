<?php

if(!isset($_GET['page'])){
    $_GET['page']=0;
}
    switch($_GET['page']) {
        case 1:
        require "customers.php";
    break;
        case 2:
        require "admins.php";
    break;
        case 3:
        require "addUser.php";
    break;

        default:
        include "main.php";
    break;

}


                        ?>