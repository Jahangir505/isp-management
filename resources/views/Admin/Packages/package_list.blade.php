@extends('layouts.app')
@section('title', 'Packages List')

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Package List </h3>
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
                        <h4 class="card-title">Table List</h4>
                        <p class="card-description"> Items</code>
                        </p>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th> # </th>
                                <th> First name </th>
                                <th> Price </th>
                                <th width="90"> Action </th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($packages as $i=>$package)
                                    <tr>
                                        <td> {{$i + 1}} </td>
                                        <td> {{$package->name}} </td>
                                        <td> {{$package->price}} </td>
                                        <td>
                                            <a href="{{url('/package/edit/'). '/'. $package->id}}" class="btn btn-gradient-primary btn-rounded">
                                               Edit
                                            </a>
                                            <a href="{{url('/package/delete/'). '/' . $package->id}}" onclick="return confirm('If you want to delete this item press Ok')" class="btn btn-gradient-dark btn-rounded">
                                                Delete
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
