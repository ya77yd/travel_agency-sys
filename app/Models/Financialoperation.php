<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Financialoperation extends Model
{
        protected $fillable = [
            'account_currency_id',
            'debit',
            'credit',
            'operation_type',
            'operation_reference',
            'date',
            'description',
            'created_by',
            'updated_by'
        ];
}
