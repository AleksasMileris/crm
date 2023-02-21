<?php

namespace helper;

class SuperAdmin extends Admin
{
    public function getNav()
    {
        $super = parent::getNav();
        $super['Naujas Klientas'] ='newCustomer.php';
        $super['Atnaujinti'] ='update.php';
        return $super;
    }


}