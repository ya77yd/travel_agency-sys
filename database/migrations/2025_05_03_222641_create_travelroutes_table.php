<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('travelroutes', function (Blueprint $table) {
            $table->id(); // معرف فريد للمسار
            $table->unsignedBigInteger('booking_id'); // رقم الحجز كمفتاح أجنبي
            $table->string('from'); // نقطة الانطلاق
            $table->string('to'); // نقطة النهاية
            $table->string('stopover')->nullable(); // التوقف (اختياري)
            $table->dateTime('departure_time'); // وقت الإقلاع
            $table->dateTime('arrival_time'); // وقت الوصول
            $table->date('day'); // اليوم كتاريخ
            $table->string('trip_type'); // نوع الرحلة
            $table->string('status'); // الحالة
            $table->unsignedBigInteger('created_by'); // المستخدم الذي أنشأ السجل
            $table->unsignedBigInteger('updated_by')->nullable(); // آخر تحديث بواسطة
            $table->timestamps(); // وقت الإنشاء وآخر تحديث

            // علاقة رقم الحجز
            $table->foreign('booking_id')->references('id')->on('bookings');
            // علاقة المستخدمين
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('travelroutes');
    }
};