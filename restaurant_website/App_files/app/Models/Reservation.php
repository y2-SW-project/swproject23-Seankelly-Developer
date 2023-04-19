<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Reservation extends Model
{
    use HasFactory;
    protected $guarded = [];



    public static function userReservations()
    {
        return self::where('customer_name', auth()->user()->name)->orderBy('reservation_time', 'desc')->get();
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
