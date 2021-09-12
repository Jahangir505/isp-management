<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerPayment;
use Exception;
use Illuminate\Http\Request;

class CustomerPaymentController extends Controller
{
    public function index()
    {
        try {

            $payments = CustomerPayment::with('customer')->get();
            return view('Admin.Payments.MonthlyPayments.payment_list', compact('payments'));
        } catch (Exception $exception) {
            return redirect('/payments')->with('error', $exception->getMessage());
        }
    }

    public function create()
    {
        try {
            $customers = Customer::with('package')->get();
            return view("Admin.Payments.MonthlyPayments.payment_create", compact('customers'));
        } catch (Exception $exception) {
            return redirect('/payments')->with('error', $exception->getMessage());
        }
    }

    public function customerByID(Request $request)
    {
        try {
            $id = $request->input('customer_id');
            $customer = Customer::where('id', '=', $id)->with('package')->first();

            return $customer;
        } catch (Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'customer_id' => 'required'
            ]);

            $month = $request->input('month');

            $id = $request->input('id');
            if ($id) {
                $payment = CustomerPayment::find($id);
            } else {
                $payment = new CustomerPayment();
            }

            $payment->customer_id = $request->input('customer_id');
            $payment->month = $request->input('month');
            $payment->year = $request->input('year');
            $payment->date = date('Y-m-d');
            $payment->total_price = $request->input('total_price');
            $payment->paid_amount = $request->input('paid_amount');
            $payment->due_amount = $request->input('due_amount');
            $payment->save();

            if ($id) {
                return redirect('payments')->with('success', 'Payment Update Successfully!');
            } else {
                return redirect('payments')->with('success', 'Payment Added Successfully!');
            }

        } catch (Exception $exception) {
            return redirect('payments')->with('error', "Already taken for ! $month Bill!");
        }
    }

    public function edit($id)
    {
        try {
            $customers = Customer::with('package')->get();
            $payment = CustomerPayment::find($id);
            return view("Admin.Payments.MonthlyPayments.payment_create", compact('customers', 'payment'));
        } catch (Exception $exception) {
            return redirect('payments')->with('error', $exception->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            CustomerPayment::where('id', '=', $id)->delete();
            return redirect('/payments')->with('success', 'Payment data delete successfully!');
        } catch (Exception $exception) {
            return redirect('/payments')->with('error', $exception->getMessage());
        }
    }
}
