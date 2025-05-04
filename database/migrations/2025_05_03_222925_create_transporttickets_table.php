<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('transporttickets', function (Blueprint $table) {
            $table->id(); // معرف فريد للتذكرة
            $table->string('name'); // اسم صاحب التذكرة
            $table->string('tkt')->unique(); // رقم التذكرة
            $table->string('from'); // نقطة الانطلاق
            $table->string('to'); // نقطة الوصول
            $table->date('date'); // اليوم كتاريخ
            $table->dateTime('travel_date'); // تاريخ السفر
            $table->decimal('price', 10, 2); // السعر
            $table->decimal('sale', 10, 2); // سعر البيع
            $table->unsignedBigInteger('supplier_id'); // رقم المورد
            $table->unsignedBigInteger('customer_id'); // رقم العميل
            $table->string('type'); // نوع التذكرة
            $table->date('return')->nullable(); // هل التذكرة تشمل العودة؟
            $table->unsignedBigInteger('created_by'); // المستخدم الذي أنشأ السجل
            $table->unsignedBigInteger('updated_by')->nullable(); // المستخدم الذي قام بالتحديث
            $table->timestamps(); // وقت الإنشاء وآخر تحديث

            // إضافة العلاقات
            $table->foreign('supplier_id')->references('id')->on('suppliers');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('transporttickets');
    }
};
