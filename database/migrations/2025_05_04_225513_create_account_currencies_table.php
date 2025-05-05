<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountCurrenciesTable extends Migration
{
    public function up()
    {
        Schema::create('account_currencies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('account_id')->constrained('accounts')->onDelete('cascade');  // الحساب الفرعي
            $table->foreignId('currency_id')->constrained('currencies')->onDelete('cascade');  // العملة
            $table->decimal('debtor', 18, 4)->default(0);  // الرصيد المدين
            $table->decimal('creditor', 18, 4)->default(0);  // الرصيد الدائن
            $table->boolean('is_active')->default(true);  // حالة الحساب بالعملة (مفعل أو غير مفعل)
            $table->timestamps();  // تاريخ الإنشاء والتحديث

            $table->unique(['account_id', 'currency_id']);  // ضمان عدم تكرار العملة في نفس الحساب
        });
    }

    public function down()
    {
        Schema::dropIfExists('account_currencies');
    }
}
