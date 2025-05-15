<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    protected $table = 'payments';
    protected $fillable = [
        'account_debt',
        'account_credit',
        'currency_id',
        'amount',
        'type',
        'details',
        'date',
        'created_by',
        'updated_by'
    ];
}
