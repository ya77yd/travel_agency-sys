<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    protected $fillable = [
        'account_id',
        'phone',
        'address',
        'id_card',
        'created_by',
        'updated_by','created_at','updated_at'
    ];

}
