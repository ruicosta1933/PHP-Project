<?php

if(!isset($_GET['page'])){
    $_GET['page']=0;
}
    switch($_GET['page']) {
        case 1:
        require "customers.php";
    break;
        case 2:
        require "updateUser.php";
    break;
        case 3:
        require "addUser.php";
    break;
    case 4:
        require "readtxt.php";
    break;

        default:
        include "main.php";
    break;

}


                        ?>