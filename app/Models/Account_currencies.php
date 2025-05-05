<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account_currencies extends Model
{
    protected $fillable = ['account_id', 'currency_id', 'debtor', 'creditor', 'is_active'];

    // العلاقة مع حساب
    public function account()
    {
        return $this->belongsTo(Accounts::class);
    }

    // العلاقة مع عملة
    public function currency()
    {
        return $this->belongsTo(Currencies::class);
    }
}
