@extends('include.app')
@section('main')
@section('title')
    تعديل حجز باص
@endsection
<section class="content">
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">تعديل حجز باص</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i></button>
            </div>
        </div>
        <div class="card-body">
            <form role="form" action="{{ route('transporttickets.update') }}" method="POST">
                @csrf
                <div class="row">
                    <input type="hidden" id="id" name="id" value="{{ $transportTicket->id }}">
                    <div class="col-4">
                        <!-- text input -->
                        <div class="form-group">
                            <label for=""> اسم المسافر</label>
                            <input type="text" id="name" name="name" class="form-control"
                                placeholder="اسم المسافر" value="{{ $transportTicket->name }}">
                        </div>
                    </div>
                    <div class="col-4">
                        <!-- text input -->
                        <div class="form-group">
                            <label for=""> رقم التذكرة</label>
                            <input type="text" id="tkt" name="tkt" class="form-control"
                                placeholder="رقم التذكرة" value="{{ $transportTicket->tkt }}">
                        </div>
                    </div>
                    <div class="col-4">
                        <!-- text input -->
                        <div class="form-group">
                            <label for=""> من</label>
                            <input type="text" id="from" name="from" class="form-control"
                                placeholder=" جهة الانطلاق" value="{{ $transportTicket->from }}">
                        </div>
                    </div>
                    <div class="col-4">
                        <!-- text input -->
                        <div class="form-group">
                            <label for=""> الى</label>
                            <input type="text" id="to" name="to" class="form-control"
                                placeholder="جهة الوصول" value="{{ $transportTicket->to }}">
                        </div>
                    </div>
                    <div class="col-4">
                        <!-- text input -->
                        <div class="form-group">
                            <label for=""> التأريخ</label>
                            <input type="date" id="date" name="date" class="form-control"
                                placeholder="التأريخ" value="{{ $transportTicket->date }}">
                        </div>
                    </div>
                    <div class="col-4">
                        <!-- text input -->
                        <div class="form-group">
                            <label for=""> تأريخ الرحلة</label>
                            <input type="datetime-local" id="travel_date" name="travel_date" class="form-control"
                                placeholder=" تأريخ الرحلة" value="{{ $transportTicket->travel_date }}">
                        </div>
                    </div>
                    <div class="col-4">
                        <!-- text input -->
                        <div class="form-group">
                            <label for=""> سعر الشراء</label>
                            <input type="float" id="price" name="price" class="form-control"
                                placeholder=" سعر الشراء" value="{{ $transportTicket->price }}">
                        </div>
                    </div>
                    <div class="col-4">
                        <!-- text input -->
                        <div class="form-group">
                            <label for=""> سعر البيع</label>
                            <input type="float" id="sale" name="sale" class="form-control"
                                placeholder=" سعر البيع" value="{{ $transportTicket->sale }}">
                        </div>
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
                                            {{ $currency->id == $transportTicket->currency_id ? 'selected' : '' }}>
                                            {{ $currency->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                    </div>
                    <div class="col-4">
                        <!-- text input -->
                        @if (isset($suppliers))
                            <div class="form-group">
                                <label>المورد</label>
                                <select class="form-control" id="supplier_id" name="supplier_id" required>
                                    <option value="">اختر المورد</option>
                                    @foreach ($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}"
                                            {{ $supplier->id == $transportTicket->supplier_id ? 'selected' : '' }}>
                                            {{ $supplier->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                    </div>
                    <div class="col-4">
                        <!-- text input -->
                        @if (isset($customers))
                            <div class="form-group">
                                <label>العميل</label>
                                <select class="form-control" id="customer_id" name="customer_id" required>
                                    <option value="">اختر العميل</option>
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}"
                                            {{ $customer->id == $transportTicket->customer_id ? 'selected' : '' }}>
                                            {{ $customer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                    </div>
                    <div class="col-4">
                        <!-- text input -->
                        <div class="form-group">
                            <label>نوع الرحلة</label>
                            <select class="form-control" id="type" name="type" required>
                                <option value="">اختر نوع الرحلة</option>
                                <option value="oneway" {{ $transportTicket->type == 'oneway' ? 'selected' : '' }}>ذهاب
                                    فقط</option>
                                <option value="roundtrip"
                                    {{ $transportTicket->type == 'roundtrip' ? 'selected' : '' }}>ذهاب وعودة</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <!-- text input -->
                        <div class="form-group">
                            <label for=""> تأريخ العودة</label>
                            <input type="date" id="return" name="return" class="form-control"
                                placeholder="التأريخ" value="{{ $transportTicket->return }}">
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">تأكيد</button>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </form>
        </div>

</section>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var tripType = document.getElementById('type');
        var returnField = document.getElementById('return').closest('.col-4'); // يأخذ العمود كله

        function toggleReturnDate() {
            if (tripType.value === 'oneway') {
                returnField.style.display = 'none';
            } else {
                returnField.style.display = '';
            }
        }

        // عند تحميل الصفحة أول مرة
        toggleReturnDate();

        // عند تغيير نوع الرحلة
        tripType.addEventListener('change', toggleReturnDate);
    });
</script>
@endsection
