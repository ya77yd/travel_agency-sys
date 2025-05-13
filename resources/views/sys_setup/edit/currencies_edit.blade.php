@extends('include.app')
@section('main')
@section('title')
    تعديل عملة
@endsection
<section class="content">
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">تعديل عملة</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i></button>
            </div>
        </div>
        <div class="card-body">
            <form role="form" action="{{ route('currencies.update') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $currency->id }}">
                <div class="row">
                    <div class="col-3">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="">كود العملة</label>
                            <input type="text" id="code" name="code" value="{{ $currency->code }}"
                                class="form-control" placeholder=" ادخل كود مكون من 3 احرف " maxlength="3">
                        </div>
                    </div>
                    <div class="col-4">
                        <!-- text input -->
                        <div class="form-group">
                            <label>اسم العملة</label>
                            <input type="text" id="name" name="name" value="{{ $currency->name }}"
                                class="form-control" placeholder="  ادخل اسم العملة">
                        </div>
                    </div>
                    <div class="col-5">
                        <!-- text input -->
                        <div class="form-group">
                            <label>سعر الصرف</label>
                            <input type="float" id="exchange_rate" name="exchange_rate"
                                value="{{ $currency->exchange_rate }}" class="form-control"
                                placeholder="ادخل سعر الصرف">
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
</section>
@endsection
