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
            $table->unsignedBigInteger('from'); // نقطة الانطلاق
            $table->unsignedBigInteger('to'); // نقطة النهاية
            $table->unsignedBigInteger('stopover')->nullable(); // التوقف (اختياري)
            $table->unsignedBigInteger('airline_id'); // معرف شركة الطيران
            $table->dateTime('departure_time'); // وقت الإقلاع
            $table->dateTime('arrival_time'); // وقت الوصول
            // اليوم كتاريخ
            $table->string('trip_type'); // نوع الرحلة
            $table->string('status'); // الحالة
            $table->unsignedBigInteger('created_by'); // المستخدم الذي أنشأ السجل
            $table->unsignedBigInteger('updated_by')->nullable(); // آخر تحديث بواسطة
            $table->timestamps(); // وقت الإنشاء وآخر تحديث

            // علاقة رقم الحجز
            $table->foreign('booking_id')->references('id')->on('bookings');
            // علاقة المستخدمين
            $table->foreign('airline_id')->references('id')->on('airlines');
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
            $table->foreign('from')->references('id')->on('airports');
            $table->foreign('to')->references('id')->on('airports');
            $table->foreign('stopover')->references('id')->on('airports');
        });
    }

    public function down()
    {
        Schema::dropIfExists('travelroutes');
    }
};