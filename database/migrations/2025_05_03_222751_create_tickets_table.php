<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id(); // معرف فريد للتذكرة
            $table->unsignedBigInteger('booking_id'); // رقم الحجز كمفتاح أجنبي
            $table->string('tkt')->unique(); // رقم التذكرة
            $table->string('name'); // اسم صاحب التذكرة
            $table->string('age'); // العمر
            $table->decimal('price', 10, 2); // السعر
            $table->decimal('sale', 10, 2); // سعر البيع
            $table->unsignedBigInteger('created_by'); // المستخدم الذي أنشأ السجل
            $table->unsignedBigInteger('updated_by')->nullable(); // آخر تحديث بواسطة
            $table->timestamps(); // وقت الإنشاء وآخر تحديث

            // العلاقة مع جدول الحجوزات
            $table->foreign('booking_id')->references('id')->on('bookings');
            // علاقة المستخدمين
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tickets');
    }
};