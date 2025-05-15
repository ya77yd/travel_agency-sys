@extends('include.app')
@section('main')
@section('title')
ادارة الحجوزت
@endsection

<section class="content">
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