<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Travelroutes extends Model
{
    protected $fillable = [
        'booking_id',
        'from',
        'to',
        'stopover',
        'departure_time',
        'arrival_time',
        'day',
        'trip_type',
        'status',
        'created_by',
        'updated_by',
        'updated_at',
        'created_at'
    ];

}
