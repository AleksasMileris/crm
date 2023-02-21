<?php ?>

@extends("layouts.main")

@section("content")
<div class="container d-flex justify-content-between flex-wrap">


    <div class="card col-md-4 mt-5  ">
        <div class="card-header">
            <div class="card-title">
                <h2>Register</h2>
            </div>
        </div>
        <div class="card-body ">
            <form method="post" action="register.php">
                <input type="text" class="form-control mt-4 tone" name="email" placeholder="Email">
                <input type="password" class="form-control mt-4 tone" name="password" placeholder="Password">
                <input type="password" class="form-control mt-4 tone" name="reenterPassword"  placeholder="Re-enter Password">
                <input type="text" class="form-control mt-4 tone" name="quality" placeholder="type">


                <button class="btn btn-success mt-3" name="register">Register</button>
            </form>

            <a class="text-decoration-none float-end text-dark fw-semibold" href="login.php" >Login</a>
        </div>
    </div>

</div>

@endsection