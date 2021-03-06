<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Location;
use App\User;
use App\Subscriber;

class LocationNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $vendor;
    public $location;
    public $subscriber;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Location $location, Subscriber $subscriber)
    {
        $this->vendor     = $location->vendor;
        $this->location   = $location;
        $this->subscriber = $subscriber;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->subject($this->vendor->name . " is at " . $this->location->description)
        ->markdown('emails.location-notification');
    }
}
