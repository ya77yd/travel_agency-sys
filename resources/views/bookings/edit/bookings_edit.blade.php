@extends('include.app')
@section('main')
@section('title')
تعديل حجز
@endsection

<section class="content">
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title"> تعديل بيانات الحجز </h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>

        <div class="card-body">
            <form role="form" action="{{ route('bookings.update') }}" method="POST">
                @csrf
                <div class="row">
                    <!-- بيانات المورد، العميل والعملة -->
                    <div class="col-4">
                        <!-- text input -->
                        @if (isset($suppliers))
                            <div class="form-group">
                                <label>المورد</label>
                                <select class="form-control select2" style="width: 100%;" id="supplier_id" name="supplier_id" required>
                                    <option value="">اختر المورد</option>
                                    @foreach ($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}"
                                            {{ $supplier->id == $bookings->supplier_id ? 'selected' : '' }}>
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
                                <select class="form-control select2" style="width: 100%;" id="customer_id" name="customer_id" required>
                                    <option value="">اختر المورد</option>
                                    @foreach ($customers as $customer)
                                        <option value="{{ $supplier->id }}"
                                            {{ $customer->id == $bookings->customer_id ? 'selected' : '' }}>
                                            {{ $customer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                    </div>
                     <div class="col-4">
                        <!-- text input -->
                        @if (isset($currencies))
                            <div class="form-group">
                                <label>العملع</label>
                                <select class="form-control" id="currency" name="currency" required>
                                    <option value="">اختر العملة</option>
                                    @foreach ($currencies as $currency)
                                        <option value="{{ $currency->id }}"
                                            {{ $currency->id == $bookings->currency ? 'selected' : '' }}>
                                            {{ $currency->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                    </div>

                    <!-- بيانات الحجز الأساسية -->
                    <div class="col-3">
                        <div class="form-group">
                            <label for="">PNR</label>
                            <input type="text" id="pnr" name="pnr" class="form-control" placeholder="PNR" maxlength="6" minlength="6" required value="{{ $bookings->pnr }}">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="">الرحلة:</label>
                            <select class="form-control" id="trip_type" name="trip_type" required >
                                @if ($bookings->trip_type == 'one_way')
                                    <option value="one_way" selected>ذهاب فقط</option>
                                     <option value="round_trip">ذهاب وعودة</option>
                                    @elseif ($bookings->trip_type == 'round_trip')
                                    <option value="round_trip" selected>ذهاب وعودة</option>
                                    <option value="one_way">ذهاب فقط</option>
                                @endif
                               
                                
                               
                            </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="">تاريخ:</label>
                            <input type="date" id="date" name="date" class="form-control" placeholder="تاريخ الحجز" autocomplete="one" required value="{{ $bookings->date }}">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="">ملاحظات</label>
                            <input type="text" id="notes" name="notes" class="form-control" placeholder="ملاحظات" value="{{$bookings->notes}}">
                        </div>
                    </div>

                    <!-- قسم الرحلات -->
                   <!-- قسم الرحلات -->
                  <div class="col-12">
                        <div style="border:1px solid #ddd; padding:10px; margin-bottom:20px;">
                            <h4 style="margin-bottom:15px;">تفاصيل الرحلات</h4>
                            <!-- رحلة الذهاب -->
                          @foreach ($travelRoutes as $travel_route)
                          @if ($travel_route->trip_type == 'going')  

                            <div id="travelRoutesContainer">
                                <div class="row">
                                    <div class="col-4">
                                        @if (isset($airports))
                            <div class="form-group">
                                <label>من</label>
                                <select class="form-control select2" style="width: 100%;" id="customer_id" name="travel_routes[0][from]" required >
                                    <option value="">اختر مطار</option>
                                    @foreach ($airports as $airport)
                                        <option value="{{ $airport->id }}"
                                            {{ $airport->id == $travel_route->from ? 'selected' : '' }}>
                                            {{ $airport->name_ar }}-{{$airport->code}}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                                    </div>
                                   {{-- الى --}}
                                   <div class="col-4">
                                        @if (isset($airports))
                            <div class="form-group">
                                <label>الى:</label>
                                <select class="form-control select2" style="width: 100%;" id="customer_id" name="travel_routes[0][to]" required >
                                    <option value="">اختر مطار الوصول</option>
                                    @foreach ($airports as $airport)
                                        <option value="{{ $airport->id }}"
                                            {{ $airport->id == $travel_route->to ? 'selected' : '' }}>
                                            {{ $airport->name_ar }}-{{$airport->code}}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                                    </div>
                                     <div class="col-4">
                                        @if (isset($airports))
                            <div class="form-group">
                                <label>الى:</label>
                                <select class="form-control select2" style="width: 100%;" id="customer_id" name="travel_routes[0][stopover]" required >
                       
                                    <option value="">اختر مطار التوقف  </option>
                                    @foreach ($airports as $airport)
                                        <option value="{{ $airport->id }}"
                                            {{ $airport->id == $travel_route->stopover ? 'selected' : '' }}>
                                            {{ $airport->name_ar }}-{{$airport->code}}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>اقلاع:</label>
                                            <input type="datetime-local" id="departure_time" name="travel_routes[0][departure_time]" class="form-control" required value="{{ $travel_route->departure_time }}">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>وصول:</label>
                                            <input type="datetime-local" id="arrival_time" name="" class="form-control" required value="{{ $travel_route->arrival_time }}">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>نوع الرحلة:</label>
                                            <select class="form-control" id="trip_type" name="" required>
                                                <option value="going">ذهاب</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                           @endforeach
                            <!-- قسم رحلة العودة يظهر فقط عند اختيار "ذهاب وعودة" -->
                            <div id="returnRouteContainer" style="display: none;">
                                <div class="row">
                                    <div class="col-4">
                                        @if (isset($airports))
                                            <div class="form-group">
                                                <label>عودة من:</label>
                                                <select class="form-control select2" style="width: 100%;" id="return_from" name="travel_routes[1][from]">
                                                    <option value="">اختر</option>
                                                    @foreach ($airports as $airport)
                                                        <option value="{{ $airport->id }}">
                                                            {{ $airport->name_ar }}-{{ $airport->code }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-4">
                                        @if (isset($airports))
                                            <div class="form-group">
                                                <label>عودة إلى:</label>
                                                <select class="form-control select2" style="width: 100%;" id="return_to" name="travel_routes[1][to]">
                                                    <option value="">اختر</option>
                                                    @foreach ($airports as $airport)
                                                        <option value="{{ $airport->id }}">
                                                            {{ $airport->name_ar }}-{{ $airport->code }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-4">
                                        @if (isset($airports))
                                            <div class="form-group">
                                                <label>توقف:</label>
                                                <select class="form-control select2" style="width: 100%;" id="return_stopover" name="travel_routes[1][stopover]">
                                                    <option value="">اختر</option>
                                                    @foreach ($airports as $airport)
                                                        <option value="{{ $airport->id }}">
                                                            {{ $airport->name_ar }}-{{ $airport->code }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>اقلاع:</label>
                                            <input type="datetime-local" id="return_departure_time" name="travel_routes[1][departure_time]" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>وصول:</label>
                                            <input type="datetime-local" id="return_arrival_time" name="travel_routes[1][arrival_time]" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>نوع الرحلة:</label>
                                            <select class="form-control" id="return_trip_type" name="travel_routes[1][trip_type]">
                                                <option value="">اختر</option>
                                                <option value="back">عودة</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                  </div>

                    
                    

                    <!-- زر التأكيد -->
                    <div class="col-1">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">تأكيد</button>
                        </div>
                    </div>
                </div><!-- نهاية .row -->
            </form>
        </div>
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
                        <th>الاسم</th>
                        <th> TKT</th>
                        <th>العمر</th>
                        <th>PNR</th>
                        <th>شراء</th>
                        <th>بيع</th>
                        <th>العمولة</th>
                        
                        
                        <th>العمليات</th>
                    </tr>
                </thead>
                @php
                    $count = 1;
                @endphp
                <tbody>
                    @if (isset($tickets))
                        @foreach ($tickets as $tiket)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $tiket->name }}</td>
                                 <td>{{ $tiket->tkt }}</td>
                                <td>{{ $tiket->age }}</td>

                                <td>
                                @if ($bookings->id == $tiket->booking_id)
                                    {{ $bookings->pnr }}
                                    
                                @endif 
                                </td>
                                <td>{{ $tiket->price }}</td>
                                <td>{{ $tiket->sale }}</td>
                                <td>{{  $tiket->sale - $tiket->price}}</td>

                                <td>
                                    <a class="btn btn-success btn-sm"
                                        href="{{ route('bookings.edit', $tiket->id) }}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        
                                    </a>
                                    <a class="btn btn-danger btn-sm"
                                        href="{{ route('bookings.destroy', $tiket->id) }}">
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
    // إظهار أو إخفاء قسم رحلة العودة بناءً على قيمة trip_type
    document.addEventListener('DOMContentLoaded', function () {
    var tripType = document.getElementById('trip_type');
    var returnContainer = document.getElementById('returnRouteContainer');

    // فحص الخيار المحدد عند تحميل الصفحة
    returnContainer.style.display = (tripType.value === 'round_trip') ? 'block' : 'none';

    tripType.addEventListener('change', function () {
        returnContainer.style.display = (this.value === 'round_trip') ? 'block' : 'none';
    });
});
    </script>

@endsection