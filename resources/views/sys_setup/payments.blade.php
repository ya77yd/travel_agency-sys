@extends('include.app')
@section('main')
@section('title')
    اضافة قيد
@endsection
<section class="content">
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">اضافة قيد</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i></button>
            </div>
        </div>
        <div class="card-body">
            <form role="form" action="{{ route('payments.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-4">
                        <!-- text input -->
                        @if (isset($accounts))
                            <div class="form-group">
                                <label>حساب المدين</label>
                                <select class="form-control" id="account_debt" name="account_debt" required>
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
                        @if (isset($accounts))
                            <div class="form-group">
                                <label>حساب الدائن</label>
                                <select class="form-control" id="account_credit" name="account_credit" required>
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
                            <label for=""> المبلغ</label>
                            <input type="float" id="amount" name="amount" class="form-control"
                                placeholder="  المبلغ">
                        </div>
                    </div>
                    <div class="col-4">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="">نوع السند</label>
                            <select class="form-control" id="type" name="type" required>
                                <option value="">اختر نوع السند</option>
                                <option value="سند قبض">سند قبض</option>
                                <option value="سند صرف">سند صرف</option>
                                <option value="سند قيد">سند قيد</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <!-- text input -->
                        <div class="form-group">
                            <label for=""> التفاصيل</label>
                            <input type="text" id="details" name="details" class="form-control"
                                placeholder="  التفاصيل">
                        </div>
                    </div>
                    <div class="col-4">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="">تاريخ السند</label>
                            <input type="date" id="date" name="date" class="form-control"
                                placeholder="  تاريخ السند">
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
            <h3 class="card-title-rtl">جدول بيانات السندات</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>الرقم</th>
                        <th>الحساب المدين</th>
                        <th>الحساب الدائن</th>
                        <th>العملة</th>
                        <th>المبلغ</th>
                        <th>نوع السند</th>
                        <th>التفصيل</th>
                        <th>التأريخ</th>
                        <th>المستخدم</th>
                        <th>العمليات</th>
                    </tr>
                </thead>
                @php
                    $count = 1;
                @endphp
                <tbody>
                    @if (isset($payments))
                        @foreach ($payments as $payment)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>
                                    @if (isset($accounts))
                                        @foreach ($accounts as $account)
                                            @if ($account->id == $payment->account_debt)
                                                {{ $account->name }}
                                            @endif
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                    @if (isset($accounts))
                                        @foreach ($accounts as $account)
                                            @if ($account->id == $payment->account_credit)
                                                {{ $account->name }}
                                            @endif
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                    @if (isset($currencies))
                                        @foreach ($currencies as $currency)
                                            @if ($currency->id == $payment->currency_id)
                                                {{ $currency->name }}
                                            @endif
                                        @endforeach
                                    @endif
                                </td>
                                <td>{{ $payment->amount }}</td>
                                <td>{{ $payment->type }}</td>
                                <td>{{ $payment->details }}</td>
                                <td>{{ $payment->date }}</td>
                                <td>{{ auth()->user()->name }}</td>
                                <td>
                                    <a class="btn btn-success btn-sm"
                                        href="{{ route('payments.edit', $payment->id) }}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        تعديل
                                    </a>
                                    <a class="btn btn-danger btn-sm"
                                        href="{{ route('payments.destroy', $payment->id) }}">
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
