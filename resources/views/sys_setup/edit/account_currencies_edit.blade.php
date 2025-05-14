@extends('include.app')
@section('main')
@section('title')
    تعديل حساب
@endsection
<section class="content">
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">تعديل حساب</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i></button>
            </div>
        </div>
        <div class="card-body">
            <form role="form" action="{{ route('account_currencies.update') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $account_currency->id }}">
                <div class="row">
                    <div class="col-4">
                        <!-- text input -->
                        @if (isset($accounts))
                            <div class="form-group">
                                <label>الحساب</label>
                                <select class="form-control" id="account_id" name="account_id" required>
                                    <option value="">اختر الحساب</option>
                                    @foreach ($accounts as $account)
                                        @if ($account->id == $account_currency->account_id)
                                            <option value="{{ $account->id }}" selected>{{ $account->name }}</option>
                                        @else
                                            <option value="{{ $account->id }}">{{ $account->name }}</option>
                                        @endif
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
                                        @if ($currency->id == $account_currency->currency_id)
                                            <option value="{{ $currency->id }}" selected>{{ $currency->name }}</option>
                                        @else
                                            <option value="{{ $currency->id }}">{{ $currency->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        @endif
                    </div>
                    <div class="col-4">
                        <!-- text input -->
                        <div class="form-group">
                            <label for=""> المدين</label>
                            <input type="float" id="debtor" name="debtor" value="{{ $account_currency->debtor }}"
                                class="form-control" placeholder="  رصيد المدين الافتتاحي">
                        </div>
                    </div>
                    <div class="col-4">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="">الدائن</label>
                            <input type="float" id="creditor" name="creditor"
                                value="{{ $account_currency->creditor }}" class="form-control"
                                placeholder="  رصيد الدائن الافتتاحي">
                        </div>
                    </div>
                    <div class="col-4">
                        <!-- text input -->
                        <div class="form-group">
                            <label>حالة الحساب</label>
                            <select class="form-control" id="status" name="status">
                                @if ($account_currency->status == 1)
                                    <option value="1">مفعل</option>
                                    <option value="0">غير مفعل</option>
                                @else
                                    <option value="0">غير مفعل</option>
                                    <option value="1">مفعل</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="">الحد الائتماني</label>
                            <input type="float" id="limit" name="limit" value="{{ $account_currency->limit }}"
                                class="form-control" placeholder="  الحد الائتماني">
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
</section>
@endsection
