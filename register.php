<?php

use eftec\bladeone\BladeOne;
use helper\Admin;
use helper\DB;

require_once "config.php";

if(isset($_POST['register'])){

    if(Admin::register($_POST['email'],$_POST['password'],$_POST['quality'])!=null){
        header('location: login.php');
        die();
    }else{
        echo "<h2 class='alert alert-danger'>".'Netinkami duomenys'."</h2>" ;
    }







};


$blade = new BladeOne( __DIR__."/views",__DIR__."/compile",BladeOne::MODE_DEBUG);
echo $blade->run("register");
?>





