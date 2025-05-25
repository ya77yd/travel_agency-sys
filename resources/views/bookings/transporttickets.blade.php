@extends('include.app')
@section('main')
@section('title')
    حجوزات الباصات
@endsection
<section class="content">
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">اضافة حجز باص</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i></button>
            </div>
        </div>
        <div class="card-body">
            <form role="form" action="{{ route('transporttickets.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-5">
                        <!-- text input -->
                        <div class="form-group">
                            <label for=""> اسم المسافر</label>
                            <input type="text" id="name" name="name" class="form-control"
                                placeholder="اسم المسافر">
                        </div>
                    </div>
                    <div class="col-3">
                        <!-- text input -->
                        <div class="form-group">
                            <label for=""> رقم التذكرة</label>
                            <input type="text" id="tkt" name="tkt" class="form-control"
                                placeholder="رقم التذكرة">
                        </div>
                    </div>
                    <div class="col-2">
                        <!-- text input -->
                        <div class="form-group">
                            <label for=""> من</label>
                            <input type="text" id="from" name="from" class="form-control"
                                placeholder=" جهة الانطلاق">
                        </div>
                    </div>
                    <div class="col-2">
                        <!-- text input -->
                        <div class="form-group">
                            <label for=""> الى</label>
                            <input type="text" id="to" name="to" class="form-control"
                                placeholder="جهة الوصول">
                        </div>
                    </div>
                    <div class="col-3">
                        <!-- text input -->
                        <div class="form-group">
                            <label for=""> التأريخ</label>
                            <input type="date" id="date" name="date" class="form-control"
                                placeholder="التأريخ">
                        </div>
                    </div>
                    <div class="col-3">
                        <!-- text input -->
                        <div class="form-group">
                            <label for=""> تأريخ الرحلة</label>
                            <input type="datetime-local" id="travel_date" name="travel_date" class="form-control"
                                placeholder=" تأريخ الرحلة">
                        </div>
                    </div>
                    <div class="col-2">
                        <!-- text input -->
                        <div class="form-group">
                            <label for=""> سعر الشراء</label>
                            <input type="float" id="price" name="price" class="form-control"
                                placeholder=" سعر الشراء">
                        </div>
                    </div>
                    <div class="col-2">
                        <!-- text input -->
                        <div class="form-group">
                            <label for=""> سعر البيع</label>
                            <input type="float" id="sale" name="sale" class="form-control"
                                placeholder=" سعر البيع">
                        </div>
                    </div>
                    <div class="col-2">
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
                    <div class="col-3">
                        <!-- text input -->
                        @if (isset($suppliers))
                            <div class="form-group">
                                <label>المورد</label>
                                <select class="form-control" id="supplier_id" name="supplier_id" required>
                                    <option value="">اختر المورد</option>
                                    @foreach ($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                    </div>
                    <div class="col-3">
                        <!-- text input -->
                        @if (isset($customers))
                            <div class="form-group">
                                <label>العميل</label>
                                <select class="form-control" id="customer_id" name="customer_id" required>
                                    <option value="">اختر العميل</option>
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                    </div>
                    <div class="col-2">
                        <!-- text input -->
                        <div class="form-group">
                            <label>نوع الرحلة</label>
                            <select class="form-control" id="type" name="type" required>
                                <option value="">اختر نوع الرحلة</option>
                                <option value="oneway">ذهاب فقط</option>
                                <option value="roundtrip">ذهاب وعودة</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <!-- text input -->
                        <div class="form-group">
                            <label for=""> تأريخ العودة</label>
                            <input type="date" id="return" name="return" class="form-control"
                                placeholder="التأريخ">
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
        <div class="card">
            <div class="card-header">
                <h3 class="card-title-rtl">جدول بيانات حجوزات الباصات</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>م</th>
                            <th> المسافر</th>
                            
                            <th> التذكرة</th>
                            <th> الرخلة</th>
                            
                            <th>التاريخ</th>
                            <th>تأريخ الرحلة</th>
                            <th> الشراء</th>
                            <th> البيع</th>
                            <th>العملة</th>
                            <th>المورد</th>
                            <th>العميل</th>
                            
                            <th> العودة</th>
                            <th>اسم المستخدم</th>
                            <th>.</th>
                        </tr>
                    </thead>
                    @php
                        $count = 1;
                    @endphp
                    <tbody>
                        @if (isset($transportTickets))
                            @foreach ($transportTickets as $transportticket)
                                <tr>
                                    <td>{{ $count++ }}</td>
                                    <td>{{ $transportticket->name }}</td>
                                    <td>{{ $transportticket->tkt }}</td>
                                    <td>{{ $transportticket->from }}-{{ $transportticket->to }}</td>
                                    <td>{{ $transportticket->date }}</td>
                                    <td>{{ $transportticket->travel_date }}</td>
                                    <td>{{ $transportticket->price }}</td>
                                    <td>{{ $transportticket->sale }}</td>
                                    @if (isset($currencies))
                                        @foreach ($currencies as $currency)
                                            @if ($currency->id == $transportticket->currency)
                                                <td>{{ $currency->code }}</td>
                                            @endif
                                        @endforeach
                                    @endif
                                    @if (isset($suppliers))
                                        @foreach ($suppliers as $supplier)
                                            @if ($supplier->id == $transportticket->supplier_id)
                                                <td>{{ $supplier->name }}</td>
                                            @endif
                                        @endforeach
                                    @endif
                                    @if (isset($customers))
                                        @foreach ($customers as $customer)
                                            @if ($customer->id == $transportticket->customer_id)
                                                <td>{{ $customer->name }}</td>
                                            @endif
                                        @endforeach
                                    @endif
                                    
                                    <td>{{ $transportticket->return }}</td>
                                    <td>{{ auth()->user()->name }}</td>
                                    <td>
                                        <a class="btn btn-success btn-sm"
                                            href="{{ route('transporttickets.edit', $transportticket->id) }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            
                                        </a>
                                        <a class="btn btn-danger btn-sm"
                                            href="{{ route('transporttickets.destroy', $transportticket->id) }}">
                                            <i class="fas fa-trash">
                                            </i>
                                          
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
