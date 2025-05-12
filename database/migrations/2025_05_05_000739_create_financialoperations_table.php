<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('financialoperations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('account_currency_id'); // الحساب المرتبط بالعملة
            $table->decimal('debit', 18, 2)->default(0);
            $table->decimal('credit', 18, 2)->default(0);
            $table->string('operation_type');       // نوع المعاملة (فاتورة، سند قبض...)
            $table->string('operation_reference');  // رقم/رمز المعاملة
            $table->date('date');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            // العلاقات
            $table->foreign('account_currency_id')->references('id')->on('account_currencies');
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('financialoperations');
    }
}
;