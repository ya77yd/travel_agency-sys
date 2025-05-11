<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    protected $fillable = [
        'pnr',
        'supplier_id',
        'customer_id',
        'trip_type',
        'price',
        'sale_price',
        'notes',
        'currency',
        'created_by',
        'updated_by',
        'created_at', // إضافة التايم ستامب
        'updated_at'  // إضافة التايم ستامب
    ];

}
