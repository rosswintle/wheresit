<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Location;

class Subscriber extends Model
{
    protected $guarded = [];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

}
