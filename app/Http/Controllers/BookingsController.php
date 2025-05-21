<?php

namespace App\Http\Controllers;

use App\Models\Account_currencies;
use App\Models\Airlines;
use App\Models\Airports;
use App\Models\Tickets;
use Illuminate\Support\Facades\DB;
use App\Models\Bookings;
use App\Models\Customers;
use App\Models\Suppliers;
use App\Models\Currencies;
use App\Models\Financialoperation;
use App\Models\Travelroutes;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

use function Symfony\Component\String\b;

class BookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $airports = Airports::all();
       $suppliers = Suppliers::all();
        $customers = Customers::all();
        $trips = Travelroutes::all();
        $currencies = Currencies::all();
        $bookings = Bookings::all();
        return view('bookings.bookings', compact('suppliers', 'customers', 'trips', 'currencies', 'bookings','airports'));}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $airlines = Airlines::all();
        $airports = Airports::all();
       $suppliers = Suppliers::all();
        $customers = Customers::all();
        $trips = Travelroutes::all();
        $currencies = Currencies::all();
        $bookings = Bookings::all();
        return view('bookings.bookings_add', compact('suppliers', 'customers', 'trips', 'currencies', 'bookings','airports','airlines'));
    }
 



    
  
     public function store(Request $request)
    {
        // يمكنك إزالة أي تحقق هنا لتجربة العملية بالكامل
        // dd('Store Called'); // تأكد أن الدالة تستدعى

        // الحصول على معرف المستخدم الحالي، أو null إذا لم يكن هناك مستخدم مسجل
        $userId = auth()->check() ? auth()->id() : null;

        DB::transaction(function () use ($request, $userId) {
            // إنشاء سجل الحجز بقيم السعر الابتدائية 0 وإضافة created_by و updated_by
            $booking = Bookings::create([
                'supplier_id' => $request->supplier_id,
                'customer_id' => $request->customer_id,
                'currency'    => $request->currency,  // سنستخدم حقل currency للموديل
                'pnr'         => $request->pnr,
                'trip_type'   => $request->trip_type,
                'date'        => $request->date,
                'notes'       => $request->notes,
                'price'       => 0,
                'sale_price'  => 0,
                'created_by'  => $userId,
                'updated_by'  => $userId,
            ]);
            Log::debug('Created Booking', ['booking_id' => $booking->id]);

            // إنشاء سجلات مسارات الرحلات
            if ($request->has('travel_routes')) {
                foreach ($request->travel_routes as $routeData) {
                    // نفترض أن الحقلين "from" و "to" موجودان في بيانات الرحلات
                    if (!empty($routeData['from']) && !empty($routeData['to'])) {
                        $route = Travelroutes::create([
                            'booking_id'     => $booking->id,
                            'from'           => $routeData['from'],
                            'to'             => $routeData['to'],
                            'stopover'       => isset($routeData['stopover']) ? $routeData['stopover'] : null,
                            'departure_time' => $routeData['departure_time'],
                            'arrival_time'   => $routeData['arrival_time'],
                            'airline_id'     => $routeData['airline_id'],
                            'trip_type'      => $routeData['trip_type'],
                            'status'         => 'confirmed',
                            'created_by'     => $userId,
                            'updated_by'     => $userId,
                        ]);
                        Log::debug('Created Travel Route', ['route_id' => $route->id]);
                    }
                }
            }

            $totalPrice = 0;
            $totalSalePrice = 0;
            $supplieraccount_id= Suppliers::where('id', $request->supplier_id)->value('account_id');       
            $customeraccount_id= Customers::where('id', $request->customer_id)->value('account_id');
            $acc_supplier =Account_currencies::where('account_id', $supplieraccount_id)
            ->where('currency_id',$request->currency)->value('id');
            $acc_customer =Account_currencies::where('account_id', $customeraccount_id)
            ->where('currency_id',$request->currency)->value('id');
            // حساب السعر الإجمالي وسعر البيع الإجمالي  

            // إنشاء سجلات التذاكر وحساب المجاميع

            if ($request->has('tickets')) {
                foreach ($request->tickets as $ticketData) {
                    $ticket = Tickets::create([
                        'booking_id' => $booking->id,
                        'name'       => $ticketData['name'],
                        'tkt'        => $ticketData['tkt'],
                        'age'        => $ticketData['age'],
                        'price'      => $ticketData['price'],
                        'sale'       => $ticketData['sale'],
                        'created_by' => $userId,
                        'updated_by' => $userId,
                    ]);
                    Log::debug('Created Ticket', ['ticket_id' => $ticket->id]);
                    $totalPrice += $ticketData['price'];
                    $totalSalePrice += $ticketData['sale'];
                    // إضافة عملية مالية للدائن
                    $financialOperation = Financialoperation::create([
                        'account_currency_id' => $acc_customer,
                        'debit'               => $ticketData['price'],
                        'credit'              => 0,
                        'operation_type'      => 'تذكرة',
                        'operation_reference' => $booking->id,
                        'date'                => $request->date,
                        'description'         => 'حجز تذكرة',
                        'created_by'          => $userId,
                        'updated_by'          => $userId,
                    ]);
                    Log::debug('Created Financial Operation', ['operation_id' => $financialOperation->id]);
                    // إضافة عملية مالية للمدين
                    

                    
                    // إضافة عملية مالية للمدين
                    $financialOperation = new Financialoperation();
                    $financialOperation->account_currency_id = $acc_supplier;
                    $financialOperation->debit = 0;
                    $financialOperation->credit = $ticketData['sale'];
                    $financialOperation->operation_type = 'تذكرة';
                    $financialOperation->operation_reference = $booking->id;
                    $financialOperation->date = $request->date;
                    $financialOperation->description = 'حجز تذكرة';
                    $financialOperation->created_by = $userId;
                    $financialOperation->updated_by = $userId;
                    $financialOperation->save();
                    Log::debug('Created Financial Operation', ['operation_id' => $financialOperation->id]);

                }
            }

            // تحديث سجل الحجز مع مجموع السعر وسعر البيع المحسوبين
            $booking->update([
                'price'      => $totalPrice,
                'sale_price' => $totalSalePrice,
                'updated_by' => $userId,
                $customer_acc=Account_currencies::find($acc_customer),
                $supplier_acc=Account_currencies::find($acc_supplier),
                $customer_acc->debtor = $totalSalePrice,
                $supplier_acc->creditor = $totalPrice,
                $customer_acc->save(),
                $supplier_acc->save(),
               
                
            ]);
            Log::debug('Updated Booking Totals', [
                'price'      => $totalPrice,
                'sale_price' => $totalSalePrice,
            ]);
        });

        return redirect()->route('bookings')->with('success', 'تم حفظ الحجز بنجاح!');
    }






    public function show(Bookings $bookings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $bookings = Bookings::find($id);
        
        // dd($travelRoutes);
        $tickets = Tickets::where('booking_id', $id)->get();
        $travelRoutes = Travelroutes::where('booking_id', $id)->get();
        // dd($travelRoutes);
        $airports = Airports::all();
       $suppliers = Suppliers::all();
        $customers = Customers::all();
        
        $currencies = Currencies::all();
        return view('bookings.edit.bookings_edit', compact('suppliers', 'customers', 'currencies', 'bookings','airports','tickets','travelRoutes'));}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $booking = Bookings::find($request->id);
        $booking->update([
            'supplier_id' => $request->supplier_id,
            'customer_id' => $request->customer_id,
            'currency'    => $request->currency,  // سنستخدم حقل currency للموديل
            'pnr'         => $request->pnr,
            'trip_type'   => $request->trip_type,
            'date'        => $request->date,
            'notes'       => $request->notes,
            'updated_by'       => auth()->id(),
        ]);
                foreach ($request->travel_routes as $routeData) {
                        $route = Travelroutes::where('booking_id', $request->id)
                            ->where('trip_type', $routeData['trip_type'])
                            ->first();
                        if ($route) {
                        $route->update([
                            'booking_id'     => $booking->id,
                            'from'           => $routeData['from'],
                            'to'             => $routeData['to'],
                            'stopover'       => isset($routeData['stopover']) ? $routeData['stopover'] : null,
                            'departure_time' => $routeData['departure_time'],
                            'arrival_time'   => $routeData['arrival_time'],
                            'trip_type'      => $routeData['trip_type'],
                            'status'         => 'confirmed',
                            'updated_by'     => auth()->id(),
                        ]);
                        Log::debug('updated Travel Route', ['route_id' => $route->id]);
                    }  else {
                        $route = Travelroutes::create([
                            'booking_id'     => $booking->id,
                            'from'           => $routeData['from'],
                            'to'             => $routeData['to'],
                            'stopover'       => isset($routeData['stopover']) ? $routeData['stopover'] : null,
                            'departure_time' => $routeData['departure_time'],
                            'arrival_time'   => $routeData['arrival_time'],
                            'trip_type'      => $routeData['trip_type'],
                            'status'         => 'confirmed',
                            'created_by'     => auth()->id(),
                            'updated_by'     => auth()->id(),
                        ]);
                        Log::debug('Created Travel Route', ['route_id' => $route->id]);
                    }
                }                         
            if ($request->trip_type == 'one_way') {
                Travelroutes::where('booking_id', $request->id)->where('trip_type', 'back')->delete();
            }
        return redirect()->route('bookings')->with('success', 'تم تعديل الحجز بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $booking = Bookings::find($id);
        $tickets = Tickets::where('booking_id', $id)->get();
        $travelRoutes = Travelroutes::where('booking_id', $id)->get();
        if ($tickets ->isEmpty()) {
            foreach ($travelRoutes as $route) {
                $route->delete();
            }
            $booking->delete();
                return redirect()->route('bookings')->with('success', 'تم حذف الحجز بنجاح');
        } else {
            return redirect()->route('bookings')->with('error', 'لا يمكن حذف الحجز لأنه يحتوي على تذاكر مرتبطة به');
        }
    }
}
