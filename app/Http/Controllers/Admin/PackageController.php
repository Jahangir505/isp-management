<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Package;
use Exception;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        try {
            $packages = Package::all();
            return view('Admin.Packages.package_list', compact('packages'));
        } catch (Exception $exception) {
            return redirect('dashboard')->with('error', $exception->getMessage());
        }

    }

    public function create()
    {
        try {
            return view('Admin.Packages.package_form');
        } catch (Exception $exception) {
            return redirect('dashboard')->with('error', $exception->getMessage());
        }

    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'price' => 'required',
            ]);
            $id = $request->input('id');
            if ($id) {
                $package = Package::find($id);
            } else {
                $package = new Package();
            }

            $package->name = $request->input('name');
            $package->price = $request->input('price');
            $package->save();
            if ($id) {
                return redirect('/packages')->with('success', 'Data Update Successfully');
            } else {
                return redirect('/packages')->with('success', 'Data Insert Successfully');
            }
        } catch (Exception $exception) {
            return redirect('/packages')->with('error', $exception->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            $package = Package::find($id);
            return view('Admin.Packages.package_form', compact('package'));
        } catch (Exception $exception) {
            return redirect('packages')->with('error', $package->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $restrict = Helper::restricted($id);
            if ($restrict){
                return redirect('packages')->with('error', 'Restricted Relational Entry!');
            }
             Package::where('id', '=', $id)->delete();
            return redirect('packages')->with('success', 'Package Delete Successfully!');
        } catch (Exception $exception) {
            return redirect('packages')->with('error', $exception->getMessage());
        }
    }


}
