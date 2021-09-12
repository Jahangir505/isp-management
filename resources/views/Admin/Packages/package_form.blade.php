@extends('layouts.app')
@section('title', 'Packages Create')

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            @if(@$package)
                <h3 class="page-title"> Package Update </h3>
            @else
                <h3 class="page-title"> Package Create </h3>
            @endif
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/packages')}}">Packages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Package</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-8 col-offset-2 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add Package</h4>
                        <form class="forms-sample" method="POST" action="{{url('/package/store')}}">
                            @csrf
                            <input type="hidden" name="id" value="{{@$package->id}}">
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Package Name</label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{@$package->name}}" class="form-control" name="name" placeholder="Package Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Package Price</label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{@$package->price}}" class="form-control" name="price" placeholder="Package Price">
                                </div>
                            </div>
                            @if(@$package)
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
