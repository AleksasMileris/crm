

@extends("layouts.main")

@section("content")


<div class="container d-flex justify-content-between flex-wrap index">


    <div class=" card col-md-4 mt-5">
        <div class="card-header">
            <div class="card-title">
                <h2>Login</h2>
            </div>
        </div>
        <div class="card-body ">
            <form method="post" action="login.php">
                <input type="text" class="form-control mt-4 " name="email" placeholder="Email">
                <input type="password" class="form-control mt-4 " name="password" placeholder="Password">
                <button class="btn btn-success mt-3" name="login">Login</button>
            </form>

            <a class="text-decoration-none float-end text-dark fw-semibold" href="register.php" >Register</a>
        </div>
    </div>





</div>

@endsection