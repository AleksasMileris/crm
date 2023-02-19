<?php


use models\Company;
use models\Customer;
use eftec\bladeone\BladeOne;
//    require_once "models/Company.php";
//    require_once "models/Conversation.php";
//    require_once "models/Customer.php";

// vietoi 3 require_once 1 vendor failas naudojant composer


require_once "vendor/autoload.php";
//
//foreach (Customer::all() as $customer ){
//    echo  $customer->getName()."<br>";
//}
//foreach (Customer::get(1)->getConversations() as $conve){
//    echo $conve->getDate();
//}

        foreach (Company::all() as $company){
            echo $company->getName()."<br>";
        }

        if(isset($_GET['delete'])){
            Customer::get($_GET['delete'])->delete();
            header('location: index.php');
        }
//foreach (Customer::get(1)->getCompany() as $comp){
//    echo $comp->getName();
//}
   echo Customer::get(1)->getCompany()->getName();
    $blade = new BladeOne( __DIR__."/views",__DIR__."/compile",BladeOne::MODE_DEBUG);
    echo $blade->run("index");
        ?>



