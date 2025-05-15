@extends('include.app')
@section('main')
@section('title')
    تعديل قيد
@endsection
<section class="content">
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">تعديل قيد</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i></button>
            </div>
        </div>
        <div class="card-body">
            <form role="form" action="{{ route('payments.update') }}" method="POST">
                @csrf
                <div class="row">
                    <input type="hidden" name="id" value="{{ $payment->id }}">
                    <div class="col-4">
                        <!-- text input -->
                        @if (isset($accounts))
                            <div class="form-group">
                                <label>حساب المدين</label>
                                <select class="form-control" id="account_debt" name="account_debt" required>
                                    <option value="">اختر الحساب</option>
                                    @foreach ($accounts as $account)
                                        <option value="{{ $account->id }}"
                                            @if ($account->id == $payment->account_debt) selected @endif>{{ $account->name }}
                                        </option>
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
                                        <option value="{{ $account->id }}"
                                            @if ($account->id == $payment->account_credit) selected @endif>{{ $account->name }}
                                        </option>
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
                                        <option value="{{ $currency->id }}"
                                            @if ($currency->id == $payment->currency_id) selected @endif>{{ $currency->name }}
                                        </option>
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
                                placeholder="  المبلغ" value="{{ $payment->amount }}">
                        </div>
                    </div>
                    <div class="col-4">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="">نوع السند</label>
                            <select class="form-control" id="type" name="type" required>
                                <option value="">اختر نوع السند</option>
                                <option value="سند قبض" @if ($payment->type == 'سند قبض') selected @endif>سند قبض
                                </option>
                                <option value="سند صرف" @if ($payment->type == 'سند صرف') selected @endif>سند صرف
                                </option>
                                <option value="سند قيد" @if ($payment->type == 'سند قيد') selected @endif>سند قيد
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <!-- text input -->
                        <div class="form-group">
                            <label for=""> التفاصيل</label>
                            <input type="text" id="details" name="details" class="form-control"
                                placeholder="  التفاصيل" value="{{ $payment->details }}">
                        </div>
                    </div>
                    <div class="col-4">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="">تاريخ السند</label>
                            <input type="date" id="date" name="date" class="form-control"
                                placeholder="  تاريخ السند" value="{{ $payment->date }}">
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
