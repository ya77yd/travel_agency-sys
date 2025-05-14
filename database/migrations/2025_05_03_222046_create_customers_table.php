<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id(); // أي دي ترقيم تلقائي
            $table->unsignedBigInteger('account_id'); // رقم الحساب مأخوذ من جدول الحسابات
           $table->string('name');
            $table->string('phone'); // الهاتف
            $table->string('address'); // العنوان
            $table->string('id_card')->unique(); // رقم البطاقة الشخصية
            $table->unsignedBigInteger('created_by'); // المستخدم الذي أنشأ السجل
            $table->unsignedBigInteger('updated_by')->nullable(); // آخر تحديث بواسطة
            $table->timestamps(); // وقت الإنشاء وآخر تحديث

            // إضافة العلاقات مع الجداول الأخرى
            $table->foreign('account_id')->references('id')->on('accounts');
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('customers');
    }
};
