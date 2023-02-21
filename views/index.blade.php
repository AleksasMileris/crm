<?php ?>
@extends("layouts.main")

                    @section("content")
                        <div class="d-flex justify-content-between">
                            <p class="user mt-3">Welcome back: {{ $_SESSION['user']['email'] }} </p>

                        </div>

                        <div class="col-md-12 mt-5"><a href="newCustomer.php" class="btn btn-success float-end">Add New Customer</a></div>
                <div class="col-md-12 ">

                    <div class="card font-monospace text-center">
                        <div class="card-header bg-primary">
                            <h3 class="fw-bold">Customers</h3>

                        </div>
                        <div class="card-body">

                            <table class="table table-sm table-striped">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Surname</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Position</th>
                                    <th>Company Id</th>
                                    <th>Conversations</th>
                                    <th></th>
                                    <th></th>

                                </tr>
                                </thead>
                                <tbody >
                                @foreach( \models\Customer::all() as $customer)

                                                        <tr>
                                                            <td>{{ $customer->getName()}}</td>
                                                            <td>{{ $customer->getSurname()}}</td>
                                                            <td>{{ $customer->getPhone()}}</td>
                                                            <td>{{ $customer->getEmail()}}</td>
                                                            <td>{{ $customer->getAdress()}}</td>
                                                            <td>{{ $customer->getPosition()}}</td>
                                                            <td>{{ $customer->getCompanyId()}}</td>
                                                            <td><a class="btn btn-warning" href="conversations.php?id={{ $customer->getId()}}">Conversations</a></td>


                                                            <td><a class="btn btn-info" href="update.php?id={{ $customer->getId()}}">Update</a></td>
                                                            <td><a class="btn btn-danger" href="index.php?delete={{ $customer->getId()}}">Delete</a></td>
                                                        </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                    @endsection
