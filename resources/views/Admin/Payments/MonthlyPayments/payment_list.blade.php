@extends('layouts.app')
@section('title', 'Packages List')

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Payment List </h3>
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
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th> # </th>
                                <th> Customer Name </th>
                                <th> Date </th>
                                <th> Month </th>
                                <th> Total Amount </th>
                                <th> Paid Amount </th>
                                <th> Due Amount </th>
                                <th> Action </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(@$payments as $i=>$payment)
                                <tr>
                                    <td> {{$i + 1}} </td>
                                    <td> {{$payment->customer->first_name}} </td>
                                    <td> {{$payment->date}} </td>
                                    <td> {{$payment->month}} </td>
                                    <td> {{$payment->total_price}} </td>
                                    <td> {{$payment->paid_amount}} </td>
                                    <td> {{$payment->due_amount}} </td>
                                    <td>
                                        <a href="{{url('/payment/edit/'). '/'. $payment->id}}" class="btn btn-gradient-primary btn-sm">
                                            <i class="mdi mdi-lead-pencil"></i>
                                        </a>
                                        <a href="{{url('/payment/delete/'). '/' . $payment->id}}" onclick="return confirm('If you want to delete this item press Ok')" class="btn btn-gradient-dark btn-sm">
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
