@extends('layouts.app')
@section('title', 'Customer Add')
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Customer  @if(@$customer->id) Update @else Create @endif</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Customers</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Customer Form</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form class="form-sample" method="POST" action="{{url('customer/store')}}">
                            @csrf
                            <input type="hidden" name="id" value="{{@$customer->id}}">
                            <p class="card-description"> Personal info </p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">First Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="first_name" placeholder="First Name" value="{{@$customer->first_name}}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Last Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="last_name" class="form-control" placeholder="Last Name" value="{{@$customer->last_name}}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Gender</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="gender">
                                                <option >===Select Gender===</option>
                                                <option @if(@$customer->gender == 'Male') selected @endif value="Male">Male</option>
                                                <option @if(@$customer->gender == 'Female') selected @endif value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Joining Date</label>
                                        <div class="col-sm-9">
                                            <input type="date" name="join_date" class="form-control" value="{{@$customer->join_date}}" placeholder="dd/mm/yyyy" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Select Package</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="package_id">
                                                <option>===Select Package===</option>
                                                @foreach($packages as $package)
                                                    <option @if(@$customer->package_id == $package->id) selected @endif value="{{@$package->id}}">{{@$package->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">User IP</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="{{@$customer->user_ip}}"  name="user_ip" placeholder="Enter User Ip"/>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Password</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="password" value="{{@$customer->password}}"  placeholder="Password"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Phone</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="phone" value="{{@$customer->phone}}"  placeholder="Enter Phone"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Address</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="address" value="{{@$customer->address}}"  placeholder="Enter Address"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Status</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="status">
                                                <option >===Select Status===</option>
                                                <option @if(@$customer->status == 'Active') selected @endif value="Active">Active</option>
                                                <option @if(@$customer->status == 'Inactive') selected @endif value="Inactive">Inactive</option>
                                                <option @if(@$customer->status == 'Banned') selected @endif value="Banned">Banned</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if(@$customer->id)
                                <button type="submit" class="btn btn-gradient-primary mr-2">Update</button>
                            @else
                                <button type="submit" class="btn btn-gradient-primary mr-2">Create</button>
                            @endif
                                <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
