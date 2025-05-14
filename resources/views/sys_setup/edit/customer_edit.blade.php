@extends('include.app')
@section('main')
@section('title')
    تعديل مورد
@endsection
<section class="content">
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">تعديل بيانات عميل</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i></button>
            </div>
        </div>
        <div class="card-body">
            <form role="form" action="{{ route('customers.update') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $customer->id }}">
                <div class="row">
                    <div class="col-4">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="">الاسم</label>
                            <input type="text" id="name" name="name" value="{{ $customer->name }}"
                                class="form-control" placeholder="ادخل اسم العميل">
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
                                        @if ($account->id == $customer->account_id)
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
                        <div class="form-group">
                            <label for="">رقم الجوال</label>
                            <input type="phone" id="phone" name="phone" value="{{ $customer->phone }}"
                                class="form-control" placeholder="ادخل رقم الجوال">
                        </div>
                    </div>
                    <div class="col-4">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="">الهوية</label>
                            <input type="text" id="id_card" name="id_card" value="{{ $customer->id_card }}"
                                class="form-control" placeholder="ادخل الهوية ">
                        </div>
                    </div>
                    <div class="col-4">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="">العنوان</label>
                            <input type="text" id="address" name="address" value="{{ $customer->address }}"
                                class="form-control" placeholder="ادخل العنوان">
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
