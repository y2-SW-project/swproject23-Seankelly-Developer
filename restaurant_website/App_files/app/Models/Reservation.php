<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getUserReservations()
    {
        return $this->where('customer_name', auth()->user()->name)->get();
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
