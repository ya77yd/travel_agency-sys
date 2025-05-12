<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('airports', function (Blueprint $table) {
            $table->id(); // معرف فريد للمطار
            $table->string('code')->unique(); // رمز المطار
            $table->string('name_ar'); // اسم المطار باللغة العربية
            $table->string('name_en'); // اسم المطار باللغة الإنجليزية
            $table->string('country'); // الدولة
            $table->string('city'); // المدينة
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
        Schema::dropIfExists('airports');
    }
};
