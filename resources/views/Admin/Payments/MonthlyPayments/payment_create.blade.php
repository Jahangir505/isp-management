@extends('layouts.app')
@section('title', 'Customer Payment')

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
        <form class="forms-sample" method="POST" action="{{url('/customer/payment/store')}}">
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
                                <label for="exampleInputMobile" class="col-sm-4 col-form-label">Monthly Price</label>
                                <div class="col-sm-8">
                                    <input readonly type="text" value="{{@$payment->total_price}}" id="monthly_amount" class="form-control" name="total_price" placeholder="Monthly Price">
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
                                <label for="exampleInputUsername2" class="col-sm-4 col-form-label">Select Month</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="month" id="month">
                                        <option >===Select Month===</option>
                                            <option @if(@$payment->month == 'January') selected @endif value="January">January</option>
                                            <option @if(@$payment->month == 'February') selected @endif value="February">February</option>
                                            <option @if(@$payment->month == 'March') selected @endif value="March">March</option>
                                            <option @if(@$payment->month == 'April') selected @endif value="April">April</option>
                                            <option @if(@$payment->month == 'May') selected @endif value="May">May</option>
                                            <option @if(@$payment->month == 'June') selected @endif value="June">June</option>
                                            <option @if(@$payment->month == 'July') selected @endif value="July">July</option>
                                            <option @if(@$payment->month == 'August') selected @endif value="August">August</option>
                                            <option @if(@$payment->month == 'September') selected @endif value="September">September</option>
                                            <option @if(@$payment->month == 'October') selected @endif value="October">October</option>
                                            <option @if(@$payment->month == 'November') selected @endif value="November">November</option>
                                            <option @if(@$payment->month == 'December') selected @endif value="December">December</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputMobile" class="col-sm-4 col-form-label">Select Year</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="year" id="year">
                                        <option >===Select Year===</option>
                                        <option @if(@$payment->year == '2020') selected @endif value="2020">2020</option>
                                        <option @if(@$payment->year == '2021') selected @endif value="2021">2021</option>
                                        <option @if(@$payment->year == '2022') selected @endif value="2022">2022</option>
                                        <option @if(@$payment->year == '2023') selected @endif value="2023">2023</option>
                                        <option @if(@$payment->year == '2024') selected @endif value="2024">2024</option>
                                        <option @if(@$payment->year == '2025') selected @endif value="2025">2025</option>
                                        <option @if(@$payment->year == '2026') selected @endif value="2026">2026</option>
                                        <option @if(@$payment->year == '2027') selected @endif value="2027">2027</option>
                                        <option @if(@$payment->year == '2028') selected @endif value="2028">2028</option>
                                        <option @if(@$payment->year == '2029') selected @endif value="2029">2029</option>
                                        <option @if(@$payment->year == '2030') selected @endif value="2030">2030</option>
                                    </select>
                                </div>
                            </div>
                        <div class="form-group row">
                            <label for="exampleInputMobile" class="col-sm-4 col-form-label">Due Amount</label>
                            <div class="col-sm-8">
                                <input readonly value="{{@$payment->due_amount}}"  type="text" id="due_amount" class="form-control" name="due_amount" placeholder="Due Amount">
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
                $.get('{{ url("customer/")}}',{ customer_id:CustomerId }, function(data){
                    let amount = data.package.price;
                    console.log(amount);
                    $('#monthly_amount').val(amount);
                });
            }
        });

        $('#paid_amount').keyup(function () {
            var paid = $(this).val();
            var amount = $('#monthly_amount').val();
             if(Number(amount) > Number(paid)){
                 var due = amount - paid;
             }

             $('#due_amount').val(due);

        })
    </script>

@endsection

