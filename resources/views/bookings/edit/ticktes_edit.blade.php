@extends('include.app')
@section('main')
@section('title')
    تعديل حساب
@endsection
<section class="content">
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">تعديل تذكرة</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i></button>
            </div>
        </div>
        <div class="card-body">
            <form role="form" action="{{ route('tickets.update') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $tickets->id }}" required>
                <div class="row">
                    <div class="col-4">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="">اسم المسافر</label>
                            <input type="text" id="name" name="name" value="{{ $tickets->name }}"
                                class="form-control" placeholder="ادخل اسم المسافر" required>
                        </div>
                    </div>
                    <div class="col-4">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="">رقم التذكرة </label>
                            <input type="text" id="tkt" name="tkt" value="{{ $tickets->tkt }}"
                                class="form-control" placeholder="ادخل رقم التذكرة " required>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>العمر</label>
                            <select class="form-control" name="tickets[0][age]" required>
                                <option value="">اختر</option>
                                <option value="adult">بالغ</option>
                                <option value="child">طفل</option>
                                <option value="infant">رضيع</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="">سعر الشراء </label>
                            <input type="text" id="price" name="price" value="{{ $tickets->pricre }}"
                                class="form-control" placeholder="ادخل سعر الشراء  " required>
                        </div>
                    </div>
                    <div class="col-4">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="">سعر البيع </label>
                            <input type="text" id="sale" name="sale" value="{{ $tickets->sale }}"
                                class="form-control" placeholder="ادخل سعر البيع  " required>
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
</section>
@endsection
