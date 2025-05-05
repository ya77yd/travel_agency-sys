<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currencies extends Model
{
    protected $fillable=[


'name','code','exchange_rate','created_by',  'updated_by',  'created_at', 'updated_at' 


    ];
}
