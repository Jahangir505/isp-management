<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Package;
use Exception;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        try {
            $customers = Customer::with('package')->get();
            return view('Admin.Customers.customer_list', compact('customers'));
        } catch (Exception $exception) {
            return redirect('dashboard')->with('error', $exception->getMessage());
        }
    }

    public function create()
    {
        try {
            $packages = Package::all();
            return view('Admin.Customers.customer_form', compact('packages'));
        } catch (Exception $exception) {
            return redirect('customers')->with('error', $exception->getMessage());
        }
    }

    public function store(Request $request)
    {
        try {
            //return $request->all();
            $id = $request->input('id');

            if ($id) {
                $customer = Customer::find($id);
            } else {
                $customer = new Customer();
            }
            $customer->first_name = $request->input('first_name');
            $customer->last_name = $request->input('last_name');
            $customer->address = $request->input('address');
            $customer->user_ip = $request->input('user_ip');
            $customer->password = $request->input('password');
            $customer->phone = $request->input('phone');
            $customer->package_id = $request->input('package_id');
            $customer->join_date = $request->input('join_date');
            $customer->gender = $request->input('gender');
            $customer->status = $request->input('status');
            $customer->save();

            if ($id) {
                return redirect('customers')->with('success', 'Customer Updated Successfully!');
            } else {
                return redirect('customers')->with('success', 'Customer Added Successfully!');
            }
        } catch (Exception $exception) {
            return redirect('customers')->with('error', $exception->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            $customer = Customer::find($id);
            $packages = Package::all();
            return view('Admin.Customers.customer_form', compact('customer', 'packages'));
        } catch (Exception $exception) {
            return redirect('customers')->with('error', $exception->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            Customer::where('id', '=', $id)->delete();
            return redirect('customers')->with('success', 'Customer Delete successfully!');
        }catch (Exception $exception){
           return redirect('customers')->with('error', $exception->getMessage());
        }
    }


}
