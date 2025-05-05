<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transporttickets extends Model
{
    protected $fillable = [
        'name',
        'tkt',
        'from',
        'to',
        'date',
        'travel_date',
        'supplier_id',
        'customer_id',
        'type', 
        'return',
        'price',
        'sale',
        'created_by',
        'updated_by',
        'created_at', 
        'updated_at'  
    ];
}
