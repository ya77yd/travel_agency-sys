@extends('include.app')
@section('main')
@section('title')
    تهيئة الموردين
@endsection
<section class="content">
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">اضافة مورد</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i></button>
            </div>
        </div>
        <div class="card-body">
            <form role="form" action="{{ route('suppliers.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-4">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="">الاسم</label>
                            <input type="text" id="name" name="name" class="form-control"
                                placeholder="ادخل اسم المورد">
                        </div>
                    </div>
                    <div class="col-4">
                        <!-- text input -->
                        @if (isset($accounts))
                            <div class="form-group">
                                <label>الحساب</label>
                                <select class="form-control" id="account_id" name="account_id">
                                    <option value="">اختر الحساب</option>
                                    @foreach ($accounts as $account)
                                        <option value="{{ $account->id }}">{{ $account->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                    </div>
                    <div class="col-4">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="">رقم الجوال</label>
                            <input type="phone" id="phone" name="phone" class="form-control"
                                placeholder="ادخل رقم الجوال">
                        </div>
                    </div>
                    <div class="col-4">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="">البريد</label>
                            <input type="email" id="email" name="email" class="form-control"
                                placeholder="ادخل البريد الالكتروني">
                        </div>
                    </div>
                    <div class="col-4">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="">العنوان</label>
                            <input type="text" id="address" name="address" class="form-control"
                                placeholder="ادخل العنوان">
                        </div>
                    </div>
                    <div class="col-1">
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
            <h3 class="card-title-rtl">جدول بيانات الموردين</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>الرقم</th>
                        <th>اسم المورد</th>
                        <th> الحساب</th>
                        <th> رقم الجوال</th>
                        <th>البريد الالكتروني </th>
                        <th> العنوان </th>
                        <th>العمليات</th>
                    </tr>
                </thead>
                @php
                    $count = 1;
                @endphp
                <tbody>
                    @if (isset($suppliers))
                        @foreach ($suppliers as $supplier)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $supplier->name }}</td>
                                <td>
                                    @if (isset($accounts))
                                        @foreach ($accounts as $account)
                                            @if ($account->id == $supplier->account_id)
                                                {{ $account->name }}
                                            @endif
                                        @endforeach
                                    @endif
                                </td>
                                <td>{{ $supplier->phone }}</td>
                                <td>{{ $supplier->email }}</td>
                                <td>{{ $supplier->address }}</td>
                                <td>
                                    <a class="btn btn-success btn-sm"
                                        href="{{ route('suppliers.edit', $supplier->id) }}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        تعديل
                                    </a>
                                    <a class="btn btn-danger btn-sm"
                                        href="{{ route('suppliers.destroy', $supplier->id) }}">
                                        <i class="fas fa-trash">
                                        </i>
                                        حذف
                                    </a>
                                </td>
                            </tr>
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
