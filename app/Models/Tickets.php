<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    protected $fillable = [
        'booking_id',
        'tkt',
        'name',
        'age',
        'price',
        'sale',
        
        'created_by',
        'updated_by',
        'created_at', 
        'updated_at'  
    ];

}
