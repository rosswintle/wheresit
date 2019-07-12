<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscriber;

class SubscribeController extends Controller
{

    public function create(Request $request)
    {
        $subscriber = Subscriber::create([
            'email' => $request->email,
            'name'  => $request->name,
            'location_id' => $request->location_id,
        ]);

        return redirect()->action('WelcomeController@welcome');
    }

}
