<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\LocationNotification;
use App\Location;

class CheckinController extends Controller
{
    public function create(Location $location)
    {
        // Process checkin
        $subscribers = $location->subscribers;
        $subscribers->each( function($subscriber) use ($location) {
            Mail::to($subscriber->email)
                ->send(new LocationNotification($location, $subscriber));
        } );

        request()->session()->flash('status', 'You checked in at ' . $location->description);

        return redirect()->action('HomeController@index');
    }
}
