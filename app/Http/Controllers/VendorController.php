<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class VendorController extends Controller
{

    public function show(User $vendor)
    {
        return view('vendor.show')
            ->with([
                'vendor' => $vendor,
            ]);
    }

}
