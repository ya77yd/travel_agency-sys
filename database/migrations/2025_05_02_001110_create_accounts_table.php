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
                'id' => 1,
                'code' => '1',
                'name' => 'الأصول',
                'parent_id' => null,
                'type' => 'asset',
                'level' => 1,
                'is_main' => true,
                'status' => true,
                'created_by' => 1,  // افترض أن المستخدم 1 هو من أضاف الحساب
                'updated_by' => 1,
            ],
            [
                'id' => 2,
                'code' => '2',
                'name' => 'الخصوم',
                'parent_id' => null,
                'type' => 'liability',
                'level' => 1,
                'is_main' => true,
                'status' => true,
                'created_by' => 1,
                'updated_by' => 1,
            ],
            [
                'id' => 3,
                'code' => '3',
                'name' => 'حقوق الملكية',
                'parent_id' => null,
                'type' => 'equity',
                'level' => 1,
                'is_main' => true,
                'status' => true,
                'created_by' => 1,
                'updated_by' => 1,
            ],
            [
                'id' => 4,
                'code' => '4',
                'name' => 'الإيرادات',
                'parent_id' => null,
                'type' => 'revenue',
                'level' => 1,
                'is_main' => true,
                'status' => true,
                'created_by' => 1,
                'updated_by' => 1,
            ],
            [
                'id' => 5,
                'code' => '5',
                'name' => 'المصروفات',
                'parent_id' => null,
                'type' => 'expense',
                'level' => 1,
                'is_main' => true,
                'status' => true,
                'created_by' => 1,
                'updated_by' => 1,
            ],
            [
                'id' => 6,
                'code' => '4-1',
                'name' => 'المبيعات',
                'parent_id' => 4,
                'type' => 'revenue',
                'level' => 2,
                'is_main' => true,
                'status' => false,
                'created_by' => 1,
                'updated_by' => 1,
            ],
            [
                'id' => 7,
                'code' => '5-1',
                'name' => 'المشتريات',
                'parent_id' => 5,
                'type' => 'expense',
                'level' => 2,
                'is_main' => true,
                'status' => false,
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

