<?php

namespace App\Helpers;

use App\Models\Customer;

class Helper
{
    public static function restricted($package_id)
    {
        $customer = Customer::where('package_id', '=', $package_id);
        if ($customer->exists()) {
            return true;
        }

        return false;
    }
}
