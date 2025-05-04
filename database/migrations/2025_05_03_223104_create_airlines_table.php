<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('airlines', function (Blueprint $table) {
            $table->id(); // معرف فريد لشركة الطيران
            $table->string('code')->unique(); // كود شركة الطيران
            $table->string('name_ar'); // اسم الشركة باللغة العربية
            $table->string('name_en'); // اسم الشركة باللغة الإنجليزية
            $table->string('country'); // الدولة
            $table->unsignedBigInteger('created_by'); // المستخدم الذي أنشأ السجل
            $table->unsignedBigInteger('updated_by')->nullable(); // آخر تحديث بواسطة
            $table->timestamps(); // وقت الإنشاء وآخر تحديث

            // علاقة المستخدمين
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('airlines');
    }
};
