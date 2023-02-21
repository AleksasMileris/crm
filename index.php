<?php


use eftec\bladeone\BladeOne;
use helper\Admin;
use models\Customer;

require_once "config.php";
//    require_once "models/Company.php";
//    require_once "models/Conversation.php";
//    require_once "models/Customer.php";

// vietoi 3 require_once 1 vendor failas naudojant composer



// -----------------------------------------------------------------------
//                               LOGIN
// ------------------------------------------------------------------------

if(! isset($_SESSION['user'])){

    header('location: login.php');
    die();
};

//if(isset($_GET['logout'])){
//    unset($_SESSION['vartotojas']);
//    session_destroy();
//   header('location: login.php');
//    die();
//}

//if(isset($_POST['atsijungti'])){
//    session_destroy();
//    header("location: login.php");
//}

// -----------------------------------------------------------------------
//                               LOGIN
// ------------------------------------------------------------------------


        if(isset($_GET['delete'])){
            Customer::get($_GET['delete'])->delete();
            header('location: index.php');

        }





// -----------------------------------------------------------------------
//                               DELETE
// ------------------------------------------------------------------------



// -----------------------------------------------------------------------
//                             Gražina prisijungusi vartotoja
// ------------------------------------------------------------------------
 //$vartotojas=Admin::getUser($_SESSION['vartotojas'][1]);


// -----------------------------------------------------------------------
//                               Gražina prisijungusi vartotoja
// ------------------------------------------------------------------------




// -----------------------------------------------------------------------
//                               PRISIJUNGIMAS
// ------------------------------------------------------------------------


 // $vartotojas2= Admin::login('dominykas@gmail.com','dominykas');
  // echo $vartotojas2;


// -----------------------------------------------------------------------
//                              PRISIJUNGIMAS
// ------------------------------------------------------------------------


// -----------------------------------------------------------------------
//                               SKIRTINGI NAV BARAI
// ------------------------------------------------------------------------

//foreach ($_SESSION['vartotojas'] as $info){
//    if($info == 'SuperAdmin'){
//       $user = new SuperAdmin;
//    }else{
//        $user = new Admin;
//    }
//
//}



// -----------------------------------------------------------------------
//                               SKIRTINGI NAV BARAI
// ------------------------------------------------------------------------


// -----------------------------------------------------------------------
//                               TIKRINAM AR PRISIJUNGE
// ------------------------------------------------------------------------



//        if(Admin::isLogin()){
//            echo "Prisijunge";
//
//        }else{
//            echo "Neprisijunge";
//}



// -----------------------------------------------------------------------
//                                    TIKRINAM AR PRISIJUNGE
// ------------------------------------------------------------------------





    $blade = new BladeOne( __DIR__."/views",__DIR__."/compile",BladeOne::MODE_DEBUG);
    echo $blade->run("index");
   ?>



