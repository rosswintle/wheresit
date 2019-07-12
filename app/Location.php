<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\User;

class Location extends Model
{
    public function vendor() {
        return $this->belongsTo(User::class, 'vendor_id');
    }

    public function subscribers()
    {
        return $this->hasMany(Subscriber::class);
    }

    public function scopeMine($query)
    {
        return $query->where('vendor_id', Auth::id());
    }
}
