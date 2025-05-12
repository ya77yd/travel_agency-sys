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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('account_debt'); // الحساب المرتبط بالدفع
            $table->unsignedBigInteger('account_credit');  // الحساب المرتبط بالدفع
            $table->unsignedBigInteger('currency_id');  // العملة المستخدمة في الدفع
            $table->decimal('amount', 18, 2);  // المبلغ المدفوع
            $table->string('payment_method');  // طريقة الدفع (نقدي، شيك، تحويل بنكي، إلخ)
            $table->string('  details')->nullable();  // تفاصيل الدفع (اختياري)
            $table->date('date');  // تاريخ الدفع
           $table->unsignedBigInteger('created_by');  // المستخدم الذي أنشأ السجل
           $table->unsignedBigInteger('updated_by')->nullable();  // المستخدم الذي قام بالتحديث
            $table->timestamps();  // تاريخ الإنشاء والتحديث
            // إضافة قيود فريدة إذا لزم الأمر   
            // إضافة العلاقات
            $table->foreign('created_by')->references('id')->on('users');  // المستخدم الذي أنشأ السجل
            $table->foreign('updated_by')->references('id')->on('users');  // المستخدم الذي قام بالتحديث
           $table->foreign('account_debt')->references('id')->on('accounts');  // العلاقة مع جدول الحسابات
            $table->foreign('account_credit')->references('id')->on('accounts');  // العلاقة مع جدول الحسابات
            $table->foreign('currency_id')->references('id')->on('currencies');
        });
        // إضافة العلاقات
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
