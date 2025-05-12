<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('exchanges', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount', 18, 2);  // المبلغ المدفوع
            $table->decimal('value', 18, 2);  // المبلغ المدفوع

            $table->decimal('exchange_rate', 18, 2);  // سعر الصرف
        
            $table->unsignedBigInteger('amount_currency');  // العملة المستخدمة في الدفع

            $table->unsignedBigInteger('value_currency');  // العملة المستخدمة في الدفع
            $table->unsignedBigInteger('account'); // الحساب المرتبط بالدفع
            $table->string('details')->nullable();  // تفاصيل الدفع (اختياري)
            $table->string('type');  // طريقة الدفع (نقدي، شيك، تحويل بنكي، إلخ)
            $table->date('date');
            $table->unsignedBigInteger('created_by');  // المستخدم الذي أنشأ السجل
            $table->unsignedBigInteger('updated_by')->nullable();  // المستخدم الذي قام بالتحديث
            $table->timestamps();


            // إضافة قيود فريدة إذا لزم الأمر
            // إضافة العلاقات       
            $table->foreign('created_by')->references('id')->on('users');  // المستخدم الذي أنشأ السجل
            $table->foreign('updated_by')->references('id')->on('users');  // المستخدم الذي قام بالتحديث
            $table->foreign('account')->references('id')->on('accounts');  // العلاقة مع جدول الحسابات
            $table->foreign('amount_currency')->references('id')->on('currencies');  // العلاقة مع جدول العملات
            $table->foreign('value_currency')->references('id')->on('currencies');  // العلاقة مع جدول العملات
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exchanges');
    }
};
