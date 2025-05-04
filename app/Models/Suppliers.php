<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model
{
    protected $fillable = [
        'name',
        'account_id',
        'phone',
        'email',
        'address',
        'created_by',
        'updated_by','created_at','ipdated_at'
    ];

}
