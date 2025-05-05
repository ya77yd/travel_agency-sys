<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateAccountsTable extends Migration
{
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();  // كود الحساب
            $table->string('name');  // اسم الحساب
            $table->foreignId('parent_id')->nullable()->constrained('accounts')->onDelete('cascade');  // الحساب الأب
            $table->string('type');  // نوع الحساب (أصل، خصم، إيراد، مصروف، إلخ)
            $table->integer('level')->default(1);  // مستوى الحساب في الشجرة
            $table->boolean('is_main')->default(false);  // حساب رئيسي أو فرعي
            $table->boolean('status')->default(true);  // حالة الحساب
            $table->timestamps();  // تاريخ الإنشاء والتحديث
            $table->foreignId('created_by')->nullable()->constrained('users');  // المستخدم الذي أنشأ الحساب
            $table->foreignId('updated_by')->nullable()->constrained('users');  // المستخدم الذي قام بآخر تعديل
        });

        // إضافة الحسابات الرئيسية تلقائيًا
        $this->addMainAccounts();
    }

    public function down()
    {
        Schema::dropIfExists('accounts');
    }

    protected function addMainAccounts()
    {
        // إضافة الحسابات الرئيسية إذا لم تكن موجودة
        $mainAccounts = [
            [
                'code' => '1000',
                'name' => 'الأصول',
                'parent_id' => null,
                'type' => 'أصل',
                'level' => 1,
                'is_main' => true,
                'status' => true,
                'created_by' => 1,  // افترض أن المستخدم 1 هو من أضاف الحساب
                'updated_by' => 1,
            ],
            [
                'code' => '2000',
                'name' => 'الخصوم',
                'parent_id' => null,
                'type' => 'خصم',
                'level' => 1,
                'is_main' => true,
                'status' => true,
                'created_by' => 1,
                'updated_by' => 1,
            ],
            [
                'code' => '3000',
                'name' => 'حقوق الملكية',
                'parent_id' => null,
                'type' => 'حقوق ملكية',
                'level' => 1,
                'is_main' => true,
                'status' => true,
                'created_by' => 1,
                'updated_by' => 1,
            ],
            [
                'code' => '4000',
                'name' => 'الإيرادات',
                'parent_id' => null,
                'type' => 'إيراد',
                'level' => 1,
                'is_main' => true,
                'status' => true,
                'created_by' => 1,
                'updated_by' => 1,
            ],
            [
                'code' => '5000',
                'name' => 'المصروفات',
                'parent_id' => null,
                'type' => 'مصروف',
                'level' => 1,
                'is_main' => true,
                'status' => true,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ];

        foreach ($mainAccounts as $account) {
            // تأكد من أن الحساب الرئيسي غير موجود مسبقًا
            $existingAccount = DB::table('accounts')->where('code', $account['code'])->first();
            if (!$existingAccount) {
                DB::table('accounts')->insert($account);
            }
        }
    }
}

