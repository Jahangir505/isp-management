<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerDuePayment;
use App\Models\CustomerPayment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $payments = CustomerPayment::with('customer')->orderBy('id', 'DESC')->take(5)->get();
        $total_pay_due = CustomerPayment::get()->sum('due_amount');
        $total_customer = Customer::where('status', '=', 'Active')->count();
        $total_paid = CustomerPayment::get()->sum('paid_amount');
        $total_due_paid = CustomerDuePayment::get()->sum('paid_amount');
        $total = (double)$total_paid + (double)$total_due_paid;
        $total_due = (double)$total_pay_due - (double)$total_due_paid;
        return view('Admin.Dashboard.dashboard', compact('total', 'total_customer', 'total_due', 'payments'));
    }
}
