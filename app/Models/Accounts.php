<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
    protected $fillable = [
        'code', 'name', 'parent_id', 'type', 'level', 'is_main', 'status', 'created_by', 'updated_by'
    ];

    // علاقة الحسابات الفرعية بالحساب الأب
    public function parent()
    {
        return $this->belongsTo(Accounts::class, 'parent_id');
    }

    // علاقة الحسابات الفرعية بالحسابات الأخرى
    public function children()
    {
        return $this->hasMany(Accounts::class, 'parent_id');
    }

    // فورمات الكود عند إنشاء حساب فرعي
    public static function boot()
    {
        parent::boot();

        static::creating(function ($account) {
            if ($account->parent_id) {
                // إذا كان الحساب يحتوي على parent_id (فرعي)، فأنشئ كود الحساب بناءً على parent_code
                $parent = Accounts::find($account->parent_id);
                $account->code = $parent->code . '-' . str_pad($parent->children->count() + 1, 3, '0', STR_PAD_LEFT);
            } else {
                // إذا كان الحساب رئيسيًا، كود الحساب سيكون الرقم 1000 أو ما تراه مناسبًا
                $account->code = '001';  // كود الحساب الرئيسي
            }
        });
    }
}
