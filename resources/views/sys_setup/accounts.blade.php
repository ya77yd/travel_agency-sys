@extends('include.app')
@section('main')
@section('title')
    تهيئة الحسابات
@endsection
<section class="content">
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">اضافة حساب</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i></button>
            </div>
        </div>
        <div class="card-body">
            <form role="form" action="{{ route('accounts.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-4">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="">الاسم</label>
                            <input type="text" id="name" name="name" class="form-control"
                                placeholder="ادخل اسم الاحساب">
                        </div>
                    </div>
                    <div class="col-4">
                        <!-- text input -->
                        @if (isset($accounts))
                            <div class="form-group">
                                <label>الحساب الاب</label>
                                <select class="form-control" id="parent_id" name="parent_id">
                                    <option value="">اختر الحساب</option>
                                    @foreach ($accounts as $account)
                                        <option value="{{ $account->id }}">{{ $account->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label>حساب رئيسي؟</label>
                            <select class="form-control" id="is_main" name="is_main">
                                <option value="0">لا</option>
                                <option value="1">نعم</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">تأكيد</button>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
        </div>
        </form>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title-rtl">جدول بيانات الحسابات</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>الرقم</th>
                        <th>كود الحساب</th>
                        <th>اسم الحساب</th>
                        <th>الحساب الاب</th>
                        <th>نوع الحساب </th>
                        <th>مستوى الحساب </th>
                        <th> حساب رئيسي </th>
                        <th> حالة الحساب </th>
                        <th>العمليات</th>
                    </tr>
                </thead>
                @php
                    $count = 1;
                @endphp
                <tbody>
                    @if (isset($accounts))
                        @foreach ($accounts as $account)
                            @if ($account->id > 7)
                                <tr>
                                    <td>{{ $count++ }}</td>
                                    <td>{{ $account->code }}</td>
                                    <td>{{ $account->name }}</td>
                                    <td>
                                        @if (isset($accounts))
                                            @foreach ($accounts as $parent)
                                                @if ($parent->id == $account->parent_id)
                                                    {{ $parent->name }}
                                                @endif
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>{{ $account->type }}</td>
                                    <td>{{ $account->level }}</td>
                                    <td>
                                        @if ($account->is_main == 1)
                                            نعم
                                        @else
                                            لا
                                        @endif
                                    </td>
                                    <td>
                                        @if ($account->status == 1)
                                            مفعل
                                        @else
                                            غير مفعل
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-success btn-sm"
                                            href="{{ route('accounts.edit', $account->id) }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            تعديل
                                        </a>
                                        <a class="btn btn-danger btn-sm"
                                            href="{{ route('accounts.destroy', $account->id) }}">
                                            <i class="fas fa-trash">
                                            </i>
                                            حذف
                                        </a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6" class="text-center">لا توجد بيانات</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
</section>
@endsection
