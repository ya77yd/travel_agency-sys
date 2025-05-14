@extends('include.app')
@section('main')
@section('title')
    اضافة حساب
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
            <form role="form" action="{{ route('account_currencies.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-4">
                        <!-- text input -->
                        @if (isset($accounts))
                            <div class="form-group">
                                <label>الحساب</label>
                                <select class="form-control" id="account_id" name="account_id" required>
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
                        @if (isset($currencies))
                            <div class="form-group">
                                <label>العملات</label>
                                <select class="form-control" id="currency_id" name="currency_id" required>
                                    <option value="">اختر العملة</option>
                                    @foreach ($currencies as $currency)
                                        <option value="{{ $currency->id }}">{{ $currency->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                    </div>
                    <div class="col-4">
                        <!-- text input -->
                        <div class="form-group">
                            <label for=""> المدين</label>
                            <input type="float" id="debtor" name="debtor" class="form-control"
                                placeholder="  رصيد المدين الافتتاحي">
                        </div>
                    </div>
                    <div class="col-4">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="">الدائن</label>
                            <input type="float" id="creditor" name="creditor" class="form-control"
                                placeholder="  رصيد الدائن الافتتاحي">
                        </div>
                    </div>
                    <div class="col-4">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="">الحد الائتماني</label>
                            <input type="float" id="limit" name="limit" class="form-control"
                                placeholder="  الحد الائتماني">
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
            <h3 class="card-title-rtl">جدول بيانات الحسابات</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>الرقم</th>
                        <th>اسم الحساب</th>
                        <th>العملة</th>
                        <th>المدين</th>
                        <th>الدائن</th>
                        <th>الرصيد</th>
                        <th>الحالة</th>
                        <th>الحد الائتماني</th>
                        <th>المستخدم</th>
                        <th>العمليات</th>
                    </tr>
                </thead>
                @php
                    $count = 1;
                @endphp
                <tbody>
                    @if (isset($account_currencies))
                        @php
                            $count = 1;
                        @endphp
                        @foreach ($account_currencies as $account_currency)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>
                                    @if (isset($accounts))
                                        @foreach ($accounts as $account)
                                            @if ($account->id == $account_currency->account_id)
                                                {{ $account->name }}
                                            @endif
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                    @if (isset($currencies))
                                        @foreach ($currencies as $currency)
                                            @if ($currency->id == $account_currency->currency_id)
                                                {{ $currency->name }}
                                            @endif
                                        @endforeach
                                    @endif
                                </td>
                                <td>{{ $account_currency->debtor }}</td>
                                <td>{{ $account_currency->creditor }}</td>
                                <td>{{ $account_currency->debtor - $account_currency->creditor }}</td>
                                @if ($account_currency->is_active == 1)
                                    <td style="color: darkgreen">مفعل</td>
                                @elseif ($account_currency->is_active == 0)
                                    <td style="color: red">غير مفعل</td>
                                @endif
                                <td>{{ $account_currency->limit }}</td>
                                <td>{{ auth()->user()->name }}</td>
                                <td>
                                    <a class="btn btn-success btn-sm"
                                        href="{{ route('account_currencies.edit', $account_currency->id) }}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        تعديل
                                    </a>
                                    <a class="btn btn-danger btn-sm"
                                        href="{{ route('account_currencies.destroy', $account_currency->id) }}">
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
