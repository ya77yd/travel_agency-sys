<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

class CreateAccountCurrenciesTable extends Migration
{
    public function up()
    {
        Schema::create('account_currencies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('account_id')->constrained('accounts');  // الحساب الفرعي
            $table->foreignId('currency_id')->constrained('currencies');  // العملة
            $table->decimal('debtor', 18, 2)->default(0);  // الرصيد المدين
            $table->decimal('creditor', 18, 2)->default(0);  // الرصيد الدائن
            $table->boolean('is_active')->default(true);  // حالة الحساب بالعملة (مفعل أو غير مفعل)
            $table->decimal('limit')->default(0);  // حد الرصيد
            $table->unsignedBigInteger('created_by');  // المستخدم الذي أنشأ السجل
            $table->unsignedBigInteger('updated_by')->nullable();  // المستخدم الذي قام بالتحديث
            $table->timestamps();  // تاريخ الإنشاء والتحديث
            $table->unique(['account_id', 'currency_id']);  // ضمان عدم تكرار العملة في نفس الحساب
            

           
            $table->foreign('created_by')->references('id')->on('users');  // المستخدم الذي أنشأ السجل
            $table->foreign('updated_by')->references('id')->on('users');  // المستخدم الذي قام بالتحديث
       
       
        });
    }

    public function down()
    {
        Schema::dropIfExists('account_currencies');
    }
}
