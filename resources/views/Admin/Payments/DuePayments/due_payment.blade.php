@extends('layouts.app')
@section('title', 'Customer Due Payment')

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            @if(@$payment)
                <h3 class="page-title"> Payment Update </h3>
            @else
                <h3 class="page-title"> Payment Create </h3>
            @endif
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/payments')}}">Payments</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Package</li>
                </ol>
            </nav>
        </div>
        <form class="forms-sample" method="POST" action="{{url('/customer/due/payment/store')}}">
            @csrf
            <input type="hidden" name="id" value="{{@$payment->id}}">
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-4 col-form-label">Select Customer</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="customer_id" id="customer_id">
                                        <option >===Select Customer===</option>
                                        @foreach($customers as $customer)
                                            <option @if(@$payment->customer_id == $customer->id) selected @endif value="{{$customer->id}}">{{$customer->first_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputMobile" class="col-sm-4 col-form-label">Total Due</label>
                                <div class="col-sm-8">
                                    <input readonly type="text" value="{{@$payment->total_price}}" id="due_amount" class="form-control" name="total_due" placeholder="Due Amount">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputMobile" class="col-sm-4 col-form-label">Paid Amount</label>
                                <div class="col-sm-8">
                                    <input  type="text" value="{{@$payment->paid_amount}}" id="paid_amount" class="form-control" name="paid_amount" placeholder="Paid Amount">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-4 col-form-label">Select Date</label>
                                <div class="col-sm-8">
                                    <input type="date"  name="date" autocomplete="off" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="exampleInputMobile" class="col-sm-4 col-form-label">After Pay Due</label>
                                <div class="col-sm-8">
                                    <input readonly value="{{@$payment->due_amount}}"  type="text" id="after_pay_due" class="form-control" name="after_pay_due" placeholder="Due Amount">
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            @if(@$payment)
                <button type="submit" class="btn btn-gradient-primary mr-2">Update</button>
            @else
                <button type="submit" class="btn btn-gradient-primary mr-2">Payment</button>
            @endif
            <button class="btn btn-light">Cancel</button>
        </form>
    </div>

    <script>
        $('#customer_id').change(function(){

            var CustomerId = $(this).val();

            if(CustomerId > 0){
                $.get('{{ url("customer/due")}}',{ customer_id:CustomerId }, function(data){
                    let amount = data;
                    console.log(amount);
                    $('#due_amount').val(amount);
                });
            }
        });

        $('#paid_amount').keyup(function () {
            var paid = $(this).val();
            var amount = $('#due_amount').val();
            if(Number(amount) > Number(paid)){
                var due = amount - paid;
            }

            $('#after_pay_due').val(due);

        });
    </script>

@endsection

