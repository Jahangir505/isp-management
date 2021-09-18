@extends('layouts.app')
@section('title', 'Customer List')

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Customer List </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Tables</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Basic tables</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-description"> Items</code>
                        </p>
                        <table class="table table-bordered table-responsive">
                            <thead>
                            <tr>
                                <th> # </th>
                                <th> Name </th>
                                <th> Phone </th>
                                <th> Address </th>
                                <th> User IP </th>
                                <th> Password </th>
                                <th> Package Name </th>
                                <th> Package Price </th>
                                <th> Join Date </th>
                                <th> Total Due </th>
                                <th> Status </th>
                                <th width="90"> Action </th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $total_due = 0;
                                $total_paid = 0;
                                $due = 0;
                            @endphp
                            @foreach($customers as $i=>$customer)
                                <tr>
                                    @php
                                        $total_due = DB::table('customer_payments')->where('customer_id', '=',$customer->id )->sum('due_amount');
                                        $total_paid = DB::table('customer_due_payments')->where('customer_id', '=',$customer->id )->sum('paid_amount');
                                        $due = (double) $total_due - (double)$total_paid;
                                    @endphp
                                    <td> {{$i + 1}} </td>
                                    <td> {{$customer->first_name. ' ' . $customer->last_name}}  </td>
                                    <td> {{$customer->phone}} </td>
                                    <td> {{$customer->address}} </td>
                                    <td> {{$customer->user_ip}} </td>
                                    <td> {{$customer->password}} </td>
                                    <td> {{$customer->package->name}} </td>
                                    <td> {{$customer->package->price}} </td>
                                    <td> {{$customer->join_date}} </td>
                                    <td> {{$due}} </td>
                                    <td> {{$customer->status}} </td>
                                    <td>
                                        <a href="{{url('/customer/edit/'). '/'. $customer->id}}" class="btn btn-gradient-primary  btn-sm">
                                            <i class="mdi mdi-lead-pencil"></i>
                                        </a>
                                        <a href="{{url('/customer/delete/') . '/' . $customer->id}}" onclick="return confirm('If you want to delete this item press Ok')" class="btn btn-gradient-dark btn-sm">
                                            <i class="mdi mdi-delete"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
