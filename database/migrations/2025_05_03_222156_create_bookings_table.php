<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id(); // أي دي ترقيم تلقائي
            $table->string('pnr'); // رقم الحجز (PNR)
            $table->unsignedBigInteger('supplier_id'); // رقم المورد
            $table->unsignedBigInteger('customer_id'); // رقم الزبون
            $table->string('trip_type'); // نوع الرحلة
            $table->date('date'); // تاريخ الإنشاء
            $table->decimal('price', 10, 2); // السعر
            $table->decimal('sale_price', 10, 2); // سعر البيع
            $table->text('notes')->nullable();
            $table->unsignedBigInteger('currency'); // العملة
            $table->unsignedBigInteger('created_by'); // المستخدم الذي أنشأ الحجز
            $table->unsignedBigInteger('updated_by')->nullable(); // المستخدم الذي قام بالتحديث
            $table->timestamps(); // وقت الإنشاء وآخر تحديث

            // إضافة العلاقات
            $table->foreign('currency')->references('id')->on('currencies');
            $table->foreign('supplier_id')->references('id')->on('suppliers');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('bookings');
    }
};
