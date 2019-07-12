<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Location;

class WelcomeController extends Controller
{
    public function welcome() {

        $vendors = User::all();
        $locations = Location::all();

        return view('welcome')
            ->with([
                'vendors' => $vendors,
                'locations' => $locations
            ]);

    }
}
