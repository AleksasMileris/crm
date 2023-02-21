<?php

use eftec\bladeone\BladeOne;
use helper\Admin;
use helper\DB;

require_once "config.php";

if(isset($_POST['login'])){

    if(Admin::login($_POST['email'],$_POST['password'])!=null){
        header('location: index.php');
        die();
    }else{
        echo "<h2 class='alert alert-danger'>".'Blogi Prisijungimai'."</h2>" ;
    }
}


if (isset($_GET['logout'])){
    Admin::logout();
}


//    print_r($_POST);
//    $pdo=DB::getDB();
//    $login = $pdo->prepare("SELECT * FROM `users` WHERE email = ?"  );
//    $login->execute([$_POST['email']]);
//    $duomenys = $login->fetch(PDO::FETCH_ASSOC);
//
//
//
//        if($duomenys['email']== $_POST['email']){
//
//
//            if(password_verify($_POST['password'],$duomenys['password']) ){
//                $_SESSION['vartotojas']['email']=$duomenys['email'];
//                $_SESSION['vartotojas']['id']=$duomenys['id'];
//                $_SESSION['vartotojas']['quality']=$duomenys['quality'];
//                header("location: index.php");
//                die();
//            }else {
//                echo "<h2 class='alert alert-danger'>".'This password doesnt exist. Try again'."</h2>" ;
//            }
//
//        }else {
//            echo "<h2 class='alert alert-danger'>".'Username does not exist'."</h2>" ;
//        }



$blade = new BladeOne( __DIR__."/views",__DIR__."/compile",BladeOne::MODE_DEBUG);
echo $blade->run("login");
?>
