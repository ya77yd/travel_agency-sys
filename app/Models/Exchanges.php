<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exchanges extends Model
{
    protected $table = 'exchanges';
    protected $fillable = [
        'amount',
        'value',
        'exchange_rate',
        'amount_currency',
        'value_currency',
        'account',
        'details',
        'type',
        'date',
        'created_by',
        'updated_by'
    ];
}
