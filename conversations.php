
<?php

use eftec\bladeone\BladeOne;
use models\Customer;

//require_once "helper/DB.php";
//require_once "models/Company.php";
//require_once "models/Conversation.php";
//require_once "models/Customer.php";


// vietoi 4 require_once 1 vendor failas naudojant composer


require_once "vendor/autoload.php";




//
//foreach (Customer::all() as $customer ){
//    echo  $customer->getName()."<br>";
//}
//foreach (Customer::get(1)->getConversations() as $conve){
//    echo $conve->getDate();
//}
$id= $_GET['id'];
$customer=Customer::get($id);
 $blade = new BladeOne( __DIR__."/views",__DIR__."/compile",BladeOne::MODE_DEBUG);
    echo $blade->run("conversations",[
        "customer"=>$customer
    ]);
?>