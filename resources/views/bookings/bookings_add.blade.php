@extends('include.app')
@section('main')
@section('title')
    اضافة حجز
@endsection

<section class="content">
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">اضافة حجز جديد</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>

        <div class="card-body">
            <form role="form" action="{{ route('bookings.store') }}" method="POST" outocomplete="off">
                @csrf
                <div class="row">
                    <!-- بيانات المورد، العميل والعملة -->
                    <div class="col-md-4">
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
                    <div class="col-md-4">
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
                        @if (isset($currencies))
                            <div class="form-group">
                                <label>العملة</label>
                                <select class="form-control" id="currency" name="currency" required>
                                    <option value="">اختر العملة</option>
                                    @foreach ($currencies as $currency)
                                        <option value="{{ $currency->id }}">{{ $currency->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                    </div>

                    <!-- بيانات الحجز الأساسية -->
                    <div class="col-3">
                        <div class="form-group">
                            <label for="">PNR</label>
                            <input type="text" id="pnr" name="pnr" class="form-control" placeholder="PNR" maxlength="6" required>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="">الرحلة:</label>
                            <select class="form-control" id="trip_type" name="trip_type" required>
                                <option value="one_way">ذهاب فقط</option>
                                <option value="round_trip">ذهاب وعودة</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="">تاريخ:</label>
                            <input type="date" id="date" name="date" class="form-control" placeholder="تاريخ الحجز" autocomplete="one" required value="<?php echo date('Y-m-d'); ?>">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="">ملاحظات</label>
                            <input type="text" id="notes" name="notes" class="form-control" placeholder="ملاحظات">
                        </div>
                    </div>

                    <!-- قسم الرحلات -->
                   <!-- قسم الرحلات -->
                  <div class="col-12">
                        <div style="border:1px solid #ddd; padding:10px; margin-bottom:20px;">
                            <h4 style="margin-bottom:15px;">تفاصيل الرحلات</h4>
                            <!-- رحلة الذهاب -->
                            <div id="travelRoutesContainer">
                                <div class="row">
                                    <div class="col-md-4">
                                        @if (isset($airports))
                                            <div class="form-group">
                                                <label>من:</label>
                                                <select class="form-control select2" style="width: 100%;" id="from" name="travel_routes[0][from]" required>
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
                                    <div class="col-md-4">
                                        @if (isset($airports))
                                            <div class="form-group">
                                                <label>إلى:</label>
                                                <select class="form-control select2" style="width: 100%;" id="to" name="travel_routes[0][to]" required>
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
                                     <div class="col-md-4">
                                        @if (isset($airlines))
                                            <div class="form-group">
                                                <label>الطيران:</label>
                                                <select class="form-control select2" style="width: 100%;" id="airlie_id" name="travel_routes[0][airline_id]" required>
                                                    <option value="">اختر</option>
                                                    @foreach ($airlines as $airline)
                                                        <option value="{{ $airline->id }}">
                                                            {{ $airline->name_ar }}-{{ $airline->code }}
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
                                                <select class="form-control select2" style="width: 100%;" id="stopover" name="travel_routes[0][stopover]">
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
                                            <input type="datetime-local" id="departure_time" name="travel_routes[0][departure_time]" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>وصول:</label>
                                            <input type="datetime-local" id="arrival_time" name="travel_routes[0][arrival_time]" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-4" style="display: none;">
                                        <div class="form-group">
                                            <label>نوع الرحلة:</label>
                                            <select class="form-control" id="trip_type_route" name="travel_routes[0][trip_type]" required >
                                                <option value="going">ذهاب</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

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
                                     <div class="col-md-4">
                                        @if (isset($airlines))
                                            <div class="form-group">
                                                <label>الطيران:</label>
                                                <select class="form-control select2" style="width: 100%;" id="airlie_id" name="travel_routes[1][airline_id]" required>
                                                    <option value="">اختر</option>
                                                    @foreach ($airlines as $airline)
                                                        <option value="{{ $airline->id }}">
                                                            {{ $airline->name_ar }}-{{ $airline->code }}
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
                                    <div class="col-4" style="display: none;">
                                        <div class="form-group">
                                            <label>نوع الرحلة:</label>
                                            <select class="form-control" id="return_trip_type" name="travel_routes[1][trip_type]" >
                                                <option value="back">عودة</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                  </div>

                    <!-- قسم التذاكر -->
                    <div class="col-12">
                        <div style="border:1px solid #ddd; padding:10px; margin-bottom:10px;">
                            <h4 style="margin-bottom:15px;">تفاصيل التذاكر</h4>
                            <!-- صف بيانات التذكرة الافتراضي -->
                            <div id="ticketsContainer">
                                <div class="row position-relative" id="ticketRow0" style="border:1px solid #ddd ;padding:0px;margin:0.5px;">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>اسم المسافر</label>
                                            <input type="text" name="tickets[0][name]" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>رقم التذكرة</label>
                                            <input type="text" name="tickets[0][tkt]" class="form-control" placeholder="" maxlength="6" required>
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
                                        <div class="form-group">
                                            <label>سعر الشراء</label>
                                            <input type="number" step="any" name="tickets[0][price]" class="form-control" placeholder="" maxlength="6" required>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>سعر البيع</label>
                                            <input type="number" step="any" name="tickets[0][sale]" class="form-control" placeholder="" maxlength="6" required>
                                        </div>
                                    </div>
                                    <!-- زر حذف الصف (معطل إذا كان الصف الوحيد) -->
                                    <div class="col-1">
                                        <label></label>
                                        <div class="form-group">
                                         <button type="button" class="btn btn-danger btn-delete-ticket" style="position: absolute; top: 5px; right: 5px;" onclick="deleteTicket(this)" disabled>حذف</button>

                                        </div>
                                    </div>
                                    
                                </div>
                            </div>

                            <!-- زر إضافة صف تذكرة جديد -->
                            <div class="mt-2">
                                <button type="button" id="addTicket" class="btn btn-secondary">إضافة تذكرة جديدة ➕</button>
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
</section>
<script>
    // إظهار أو إخفاء قسم رحلة العودة بناءً على قيمة trip_type
    document.getElementById('trip_type').addEventListener('change', function () {
        var returnContainer = document.getElementById('returnRouteContainer');
        if (this.value === 'round_trip') {
            returnContainer.style.display = 'block';
        } else {
            returnContainer.style.display = 'none';
        }
    });

    // دالة للتحقق مما إذا كانت جميع الحقول المطلوبة في صف التذكرة ممتلئة
    function isTicketRowComplete(row) {
        var inputs = row.querySelectorAll('input[required], select[required]');
        for (var i = 0; i < inputs.length; i++) {
            if (!inputs[i].value.trim()) {
                return false;
            }
        }
        return true;
    }

    // تحديث حالة أزرار حذف الصفوف: تعطيل زر الحذف إذا كان هناك صف واحد فقط
    function updateDeleteButtons() {
        var ticketContainer = document.getElementById('ticketsContainer');
        var ticketRows = ticketContainer.querySelectorAll('[id^="ticketRow"]');
        ticketRows.forEach(function(row) {
            var deleteBtn = row.querySelector('.btn-delete-ticket');
            if (ticketRows.length <= 1) {
                deleteBtn.disabled = true;
            } else {
                deleteBtn.disabled = false;
            }
        });
    }

    // زر إضافة صف جديد للتذكرة
    document.getElementById('addTicket').addEventListener('click', function () {
        var ticketContainer = document.getElementById('ticketsContainer');
        var ticketRows = ticketContainer.querySelectorAll('[id^="ticketRow"]');
        var ticketCount = ticketRows.length;
        var lastRow = ticketRows[ticketCount - 1];
        
        // التحقق من إكتمال الصف الأخير
        if (!isTicketRowComplete(lastRow)) {
            alert("يرجى إكمال بيانات الصف الحالي قبل إضافة صف جديد.");
            return;
        }
        if (ticketCount >= 9) {
            alert("يمكنك إضافة 9 تذاكر كحد أقصى!");
            return;
        }
        var newTicketRow = document.createElement('div');
        newTicketRow.className = 'row position-relative';
        newTicketRow.id = 'ticketRow ' + ticketCount;
        newTicketRow.style = "border:1px solid #ddd ;padding:0px;margin:1px;";
        newTicketRow.innerHTML = `
            <div class="col-md-5">
                <div class="form-group">
                    <label> اسم المسافر${ticketCount+1} </label>
                    <input type="text" name="tickets[${ticketCount}][name]" class="form-control" required>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label>رقم التذكرة</label>
                    <input type="text" name="tickets[${ticketCount}][tkt]" class="form-control" placeholder="" maxlength="6" required>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label>العمر</label>
                    <select class="form-control" name="tickets[${ticketCount}][age]" required>
                        <option value="">اختر</option>
                        <option value="adult">بالغ</option>
                        <option value="child">طفل</option>
                        <option value="infant">رضيع</option>
                    </select>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label>سعر الشراء</label>
                    <input type="number" step="any" name="tickets[${ticketCount}][price]" class="form-control" placeholder="" maxlength="6" required>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label>سعر البيع</label>
                    <input type="number" step="any" name="tickets[${ticketCount}][sale]" class="form-control" placeholder="" maxlength="6" required>
                </div>
            </div>
            <div class="col-1">
              <div class="form-group">
                  <button type="button" class="btn btn-danger btn-delete-ticket" style="position: absolute; top: 5px; right: 5px;" onclick="deleteTicket(this)" disabled>حذف</button>

                </div>
            </div>
        `;
        ticketContainer.appendChild(newTicketRow);
        updateDeleteButtons();
    });

    // دالة حذف صف التذكرة
    function deleteTicket(btn) {
        var ticketContainer = document.getElementById('ticketsContainer');
        var ticketRows = ticketContainer.querySelectorAll('[id^="ticketRow"]');
        if (ticketRows.length <= 1) {
            alert("لا يمكن حذف الصف الأخير.");
            return;
        }
        var row = btn.closest('.row');
        row.parentNode.removeChild(row);
        updateDeleteButtons();
    }

    // تحديث حالة أزرار الحذف عند تحميل الصفحة
    updateDeleteButtons();

    // عند تحميل الصفحة، نقوم بتحديث الخيارات لكل قوائم المطارات
     
   
//   document.addEventListener('DOMContentLoaded', function () {
//     function updateAirportOptions() {
//       const airportSelects = document.querySelectorAll('select.select2');
//       let selectedValues = [];
      
//       airportSelects.forEach(select => {
//         if (select.value.trim() !== '') {
//           selectedValues.push(select.value);
//         }
//       });
      
//       airportSelects.forEach(select => {
//         let currentValue = select.value;
//         Array.from(select.options).forEach(option => {
//           // الخيار الفارغ متاح دائمًا
//           if (option.value.trim() === "") {
//             option.disabled = false;
//             return;
//           }
//           // تعطيل الخيار إذا كان مختاراً في قائمة أخرى
//           if (option.value !== currentValue && selectedValues.includes(option.value)) {
//             option.disabled = true;
//           } else {
//             option.disabled = false;
//           }
//         });

//         // إذا كنت تستخدم select2 قد تحتاج إلى تحديثه بعدها
//         if (typeof $(select).select2 === "function") {
//           $(select).trigger('change.select2');
//         }
//       });
//     }
  
//     // إرفاق حدث التغيير لكل عنصر select يحمل الكلاس select2
//     const airportSelects = document.querySelectorAll('select.select2');
//     airportSelects.forEach(select => {
//       select.addEventListener('change', updateAirportOptions);
//     });
//     // استدعاء التحديث عند تحميل الصفحة
//     updateAirportOptions();
//   });

</script>

@endsection