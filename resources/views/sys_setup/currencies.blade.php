@extends('include.app')
@section('main')
@section('title')
    تهيئة العملات
@endsection
<section class="content">
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">اضافة عملة</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i></button>
            </div>
        </div>
        <div class="card-body">
            <form role="form" action="{{ route('currencies.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-3">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="">كود العملة</label>
                            <input type="text" id="code" name="code" class="form-control"
                                placeholder=" ادخل كود مكون من 3 احرف " maxlength="3" required>
                        </div>
                    </div>
                    <div class="col-4">
                        <!-- text input -->
                        <div class="form-group">
                            <label>اسم العملة</label>
                            <input type="text" id="name" name="name" class="form-control"
                                placeholder="  ادخل اسم العملة" required>
                        </div>
                    </div>
                    <div class="col-5">
                        <!-- text input -->
                        <div class="form-group">
                            <label>سعر الصرف</label>
                            <input type="float" id="exchange_rate" name="exchange_rate" class="form-control"
                                placeholder="ادخل سعر الصرف" required>
                        </div>
                    </div>
                    <div class="col-2">
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
            <h3 class="card-title-rtl">جدول بيانات العملات</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>الرقم</th>
                        <th>كود العملة</th>
                        <th>اسم العملة</th>
                        <th>سعر الصرف</th>
                        <th>العمليات</th>
                    </tr>
                </thead>
                @php
                    $count = 1;
                @endphp
                <tbody>
                    @if (isset($currencies))
                        @foreach ($currencies as $currency)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $currency->code }}</td>
                                <td>{{ $currency->name }}</td>
                                <td>{{ $currency->exchange_rate }}</td>
                                <td>
                                    <a class="btn btn-success btn-sm"
                                        href="{{ route('currencies.edit', $currency->id) }}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        تعديل
                                    </a>
                                    <a class="btn btn-danger btn-sm"
                                        href="{{ route('currencies.destroy', $currency->id) }}">
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
