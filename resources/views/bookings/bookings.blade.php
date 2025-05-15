@extends('include.app')
@section('main')
@section('title')
     اضافةحجز
@endsection
<section class="content">
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">اضافة حجز جديد</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i></button>
            </div>
        </div>
        <div class="card-body">
            <form role="form" action="{{ route('bookings.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-4">
                        <!-- text input -->
                        @if (isset($suppliers))
                            <div class="form-group">
                                <label>المورد:</label>
                                <select class="form-control" id="supplier_id" name="supplier_id" required>
                                    <option value="">اختر المورد</option>
                                    @foreach ($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                    </div>
                    <div class="col-4">
                        <!-- text input -->
                        @if (isset($customers))
                            <div class="form-group">
                                <label>العميل:</label>
                                <select class="form-control" id="customer_id" name="customer_id" required>
                                    <option value="">اختر العميل</option>
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                    </div>


                    <div class="col-4">
                        <!-- text input -->
                        @if (isset($currencies))
                            <div class="form-group">
                                <label>العملة</label>
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
                        <div class="form-group">
                            <label for=""> PNR </label>
                            <input type="text" id="debtor" name="pnr" class="form-control"
                                placeholder="  PNR" maxlength="6" required>  
                        </div>
                    </div>
                   <div class="col-3">
                        <!-- text input -->
                        <div class="form-group">
                            <label for=""> الرحلة: </label>
                            <select class="form-control" id="trip_type" name="trip_type" required>   
                                <option value="">اختر الرحلة</option>
                                <option value="one_way">ذهاب فقط</option>
                                <option value="round_trip">ذهاب وعودة</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="">تاريخ: </label>
                            <input type="date" id="date" name="date" class="form-control"
                                placeholder="  تاريخ الحجز" autocomplete="one" required>
                        </div>
                    </div>

                     <div class="col-3">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="">ملاحظات</label>
                            <input type="text" id="notes" name="notes" class="form-control"
                                placeholder="  ملاحظات" >  
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
            <h3 class="card-title-rtl">جدول بيانات الحجوزات</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>م</th>
                        <th>PNR </th>
                        <th>العميل</th>
                        <th>المورد</th>
                        <th>العمله</th>
                        <th>الشراء</th>
                        <th>البيع</th>
                        <th>الرحلة </th>
                        <th>تاريخ الحجز</th>
                        <th>الملاحظات</th>
                        <th>المستخدم</th>

                        <th>العمليات</th>
                    </tr>
                </thead>
                @php
                    $count = 1;
                @endphp
                <tbody>
                    @if (isset($bookings))
                        @foreach ($bookings as $booking)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $booking->pnr }}</td>
                                <td>
                                    @if (isset($customers))
                                        @foreach ($customers as $customer)
                                            @if ($customer->id == $booking->customer_id)
                                                {{ $customer->name }}
                                            @endif
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                    @if (isset($suppliers))
                                        @foreach ($suppliers as $supplier)
                                            @if ($supplier->id == $booking->supplier_id)
                                                {{ $supplier->name }}
                                            @endif
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                    @if (isset($currencies))
                                        @foreach ($currencies as $currency)
                                            @if ($currency->id == $booking->currency)
                                                {{ $currency->code }}
                                            @endif
                                        @endforeach
                                    @endif
                                </td>
                                <td>{{ $booking->price }}</td>
                                <td>{{ $booking->sale_price }}</td>
                                <td>{{ $booking->trip_type }}</td>
                                <td>{{ $booking->date }}</td>
                                <td>{{ $booking->notes }}</td>
                                <td>{{ auth()->user()->name }}</td>

                                <td>
                                    <a class="btn btn-success btn-sm"
                                        href="{{ route('bookings.edit', $booking->id) }}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        
                                    </a>
                                    <a class="btn btn-danger btn-sm"
                                        href="{{ route('bookings.destroy', $booking->id) }}">
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
@endsection
