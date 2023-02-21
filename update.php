<?php

use models\Customer;

//require_once "helper/DB.php";
//require_once "models/Company.php";
//require_once "models/Conversation.php";
//require_once "models/Customer.php";


// vietoi 4 require_once 1 vendor failas naudojant composer


require_once "config.php";

$id=$_GET['id'];
$customer=Customer::get($id);
if (isset($_POST['save'])) {
    $customer = new Customer($_POST['name'], $_POST['surname'], $_POST['phone'], $_POST['email'], $_POST['address'], $_POST['position'], $_POST['company_id'],$id);
    $customer->save();
    header("location: index.php");
    die();
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card font-monospace">
                <div class="card-header bg-primary">
                    Update
                </div>
                <div class="card-body">
                    <form method="post">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input class="form-control" type="text" name="name" value="<?= $customer->getName() ?>">
                        </div>


                        <div class="mb-3">
                            <label class="form-label">Surname</label>
                            <input class="form-control" type="text" name="surname" value="<?= $customer->getSurname() ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input class="form-control" type="text" name="phone" value="<?= $customer->getPhone() ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input class="form-control" type="text" name="email" value="<?= $customer->getEmail() ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <input class="form-control" type="text" name="address" value="<?= $customer->getAdress() ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Position</label>
                            <input class="form-control" type="text" name="position" value="<?= $customer->getPosition() ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Which company called (Id)</label>
                            <input class="form-control" type="text" name="company_id" value="<?= $customer->getCompanyId() ?>">
                        </div>
                        <button type="submit" class="btn btn-success" name="save">Update</button>
                    </form>

                </div>

            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>

</body>
</html>