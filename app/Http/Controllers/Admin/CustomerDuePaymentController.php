<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\CustomerDuePayment;
use App\Models\CustomerPayment;
use Exception;
use Faker\Core\Number;
use Illuminate\Http\Request;

class CustomerDuePaymentController extends Controller
{
    public function index()
    {
        try {
            $due_payments = CustomerDuePayment::all();

            return view('Admin.Payments.DuePayments.due_payment_list', compact('due_payments'));
        } catch (Exception $exception) {
            return redirect('/due/payments');
        }
    }

    public function create()
    {
        try {
            $customers = Customer::all();
            return view('Admin.Payments.DUePayments.due_payment', compact('customers'));
        } catch (Exception $exception) {
            return redirect('/due/payments');
        }
    }

    public function customerDue(Request $request)
    {
        try {
            $id = (int)$request->input('customer_id');
            $customer_due = CustomerPayment::where('customer_id', '=', $id)->sum('due_amount');
            $customer_pay = CustomerDuePayment::where('customer_id', '=', $id)->sum('paid_amount');

            $total_due = (double)$customer_due - (double)$customer_pay;

            return $total_due;
        } catch (Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }

    public function store(Request $request)
    {
        try {
            $id = (int) $request->input('id');
            $request->validate([
                'date' => 'required'
            ]);

            if ($id){
                $due_payment = CustomerDuePayment::find($id);
            }else{
                $due_payment = new CustomerDuePayment();
            }
            $due_payment->customer_id = $request->input('customer_id');
            $due_payment->date = $request->input('date');
            $due_payment->prev_due = $request->input('total_due');
            $due_payment->paid_amount = $request->input('paid_amount');
            $due_payment->after_pay_due = $request->input('after_pay_due');
            $due_payment->save();

            if ($id){
                return redirect('/customers')->with('success', 'Due Payment Update Successfully!');
            }else{
                return redirect('/customers')->with('success', 'Due Payment Added Successfully!');
            }

        } catch (Exception $exception) {
            return redirect('/customers')->with('error', $exception->getMessage());
        }
    }
}
