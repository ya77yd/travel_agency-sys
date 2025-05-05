<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Airports extends Model
{
    protected $fillable=[
'code','name_ar','name_en','country',
    
    'created_by',
        'updated_by',
        'created_at', 
        'updated_at' ];
}
