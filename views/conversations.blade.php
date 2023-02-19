<?php ?>

@extends("layouts.main")

@section("content")



<div class="col-md-12 mt-5"><a class="btn btn-secondary" href="index.php">Back</a><a href="newCustomer.php" class="btn btn-success float-end">Add New Customer</a></div>
                <div class="col-md-12 ">

                    <div class="card font-monospace text-center">
                        <div class="card-header bg-primary">
                            <h3 class="fw-bold">Conversations with: {{ $customer->getName() }} </h3>

</div>
<div class="card-body">

    <table class="table table-sm table-striped">
        <thead>
        <tr>
            <th>Customer ID</th>
            <th>Date</th>
            <th>Conversation</th>


        </tr>
        </thead>
        <tbody >
       @foreach($customer->getConversations() as $conversation)
        <tr>
            <td>{{ $conversation->getCustomerId() }}</td>
            <td>{{ $conversation->getDate() }}</td>
            <td>{{ $conversation->getConversation() }}</td>




        </tr>
       @endforeach
        </tbody>
    </table>
</div>

</div>
</div>

@endsection