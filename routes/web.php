<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AirportsController;
use App\Http\Controllers\AccountsController;
use App\Http\Controllers\Account_currenciesController;
use App\Http\Controllers\AirlinesController;
use App\Http\Controllers\BookingsController;
use App\Http\Controllers\CurrenciesController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\ExchangesController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\SuppliersController;
use App\Http\Controllers\TicketsController;
use App\Http\Controllers\TransportticketsController;
use App\Http\Controllers\TravelroutesController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Airports Routes
    Route::get('/airports', [AirportsController::class, 'index'])->name('airports');
    Route::post('/airports/store', [AirportsController::class, 'store'])->name('airports.store');
    Route::get('/airports/edit/{id}', [AirportsController::class, 'edit'])->name('airports.edit');
    Route::post('/airports/update/', [AirportsController::class, 'update'])->name('airports.update');
    Route::get('/airports/destroy/{id}', [AirportsController::class, 'destroy'])->name('airports.destroy');
    // Accounts Routes
    Route::get('/accounts', [AccountsController::class, 'index'])->name('accounts');
    Route::post('/accounts/store', [AccountsController::class, 'store'])->name('accounts.store');
    Route::get('/accounts/edit/{id}', [AccountsController::class, 'edit'])->name('accounts.edit');
    Route::post('/accounts/update/', [AccountsController::class, 'update'])->name('accounts.update');
    Route::get('/accounts/destroy/{id}', [AccountsController::class, 'destroy'])->name('accounts.destroy');
    // Account Currencies Routes
    Route::get('/account_currencies', [Account_currenciesController::class, 'index'])->name('account_currencies');
    Route::post('/account_currencies/store', [Account_currenciesController::class, 'store'])->name('account_currencies.store');
    Route::get('/account_currencies/edit/{id}', [Account_currenciesController::class, 'edit'])->name('account_currencies.edit');
    Route::post('/account_currencies/update/', [Account_currenciesController::class, 'update'])->name('account_currencies.update');
    Route::get('/account_currencies/destroy/{id}', [Account_currenciesController::class, 'destroy'])->name('account_currencies.destroy');
    // Airlines Routes
    Route::get('/airlines', [AirlinesController::class, 'index'])->name('airlines');
    Route::post('/airlines/store', [AirlinesController::class, 'store'])->name('airlines.store');
    Route::get('/airlines/edit/{id}', [AirlinesController::class, 'edit'])->name('airlines.edit');
    Route::post('/airlines/update/', [AirlinesController::class, 'update'])->name('airlines.update');
    Route::get('/airlines/destroy/{id}', [AirlinesController::class, 'destroy'])->name('airlines.destroy');
    // Bookings Routes
    Route::get('/bookings/add', [BookingsController::class, 'add'])->name('bookings.add');
    Route::get('/bookings', [BookingsController::class, 'index'])->name('bookings');
    Route::post('/bookings/store', [BookingsController::class, 'store'])->name('bookings.store');
    Route::get('/bookings/edit/{id}', [BookingsController::class, 'edit'])->name('bookings.edit');
    Route::post('/bookings/update/', [BookingsController::class, 'update'])->name('bookings.update');
    Route::get('/bookings/destroy/{id}', [BookingsController::class, 'destroy'])->name('bookings.destroy');
    // Currencies Routes
    Route::get('/currencies', [CurrenciesController::class, 'index'])->name('currencies');
    Route::post('/currencies/store', [CurrenciesController::class, 'store'])->name('currencies.store');
    Route::get('/currencies/edit/{id}', [CurrenciesController::class, 'edit'])->name('currencies.edit');
    Route::post('/currencies/update/', [CurrenciesController::class, 'update'])->name('currencies.update');
    Route::get('/currencies/destroy/{id}', [CurrenciesController::class, 'destroy'])->name('currencies.destroy');
    // Customers Routes
    Route::get('/customers', [CustomersController::class, 'index'])->name('customers');
    Route::post('/customers/store', [CustomersController::class, 'store'])->name('customers.store');
    Route::get('/customers/edit/{id}', [CustomersController::class, 'edit'])->name('customers.edit');
    Route::post('/customers/update/', [CustomersController::class, 'update'])->name('customers.update');
    Route::get('/customers/destroy/{id}', [CustomersController::class, 'destroy'])->name('customers.destroy');
    // Exchanges Routes
    Route::get('/exchanges', [ExchangesController::class, 'index'])->name('exchanges');
    Route::post('/exchanges/store', [ExchangesController::class, 'store'])->name('exchanges.store');
    Route::get('/exchanges/edit/{id}', [ExchangesController::class, 'edit'])->name('exchanges.edit');
    Route::post('/exchanges/update/', [ExchangesController::class, 'update'])->name('exchanges.update');
    Route::get('/exchanges/destroy/{id}', [ExchangesController::class, 'destroy'])->name('exchanges.destroy');
    // Payments Routes
    Route::get('/payments', [PaymentsController::class, 'index'])->name('payments');
    Route::post('/payments/store', [PaymentsController::class, 'store'])->name('payments.store');
    Route::get('/payments/edit/{id}', [PaymentsController::class, 'edit'])->name('payments.edit');
    Route::post('/payments/update/', [PaymentsController::class, 'update'])->name('payments.update');
    Route::get('/payments/destroy/{id}', [PaymentsController::class, 'destroy'])->name('payments.destroy');
    // Suppliers Routes
    Route::get('/suppliers', [SuppliersController::class, 'index'])->name('suppliers');
    Route::post('/suppliers/store', [SuppliersController::class, 'store'])->name('suppliers.store');
    Route::get('/suppliers/edit/{id}', [SuppliersController::class, 'edit'])->name('suppliers.edit');
    Route::post('/suppliers/update/', [SuppliersController::class, 'update'])->name('suppliers.update');
    Route::get('/suppliers/destroy/{id}', [SuppliersController::class, 'destroy'])->name('suppliers.destroy');
    // Tickets Routes
    Route::get('/tickets', [TicketsController::class, 'index'])->name('tickets');
    Route::post('/tickets/store', [TicketsController::class, 'store'])->name('tickets.store');
    Route::get('/tickets/edit/{id}', [TicketsController::class, 'edit'])->name('tickets.edit');
    Route::post('/tickets/update/', [TicketsController::class, 'update'])->name('tickets.update');
    Route::get('/tickets/destroy/{id}', [TicketsController::class, 'destroy'])->name('tickets.destroy');
    // Transport Tickets Routes
    Route::get('/transporttickets', [TransportticketsController::class, 'index'])->name('transporttickets');
    Route::post('/transporttickets/store', [TransportticketsController::class, 'store'])->name('transporttickets.store');
    Route::get('/transporttickets/edit/{id}', [TransportticketsController::class, 'edit'])->name('transporttickets.edit');
    Route::post('/transporttickets/update/', [TransportticketsController::class, 'update'])->name('transporttickets.update');
    Route::get('/transporttickets/destroy/{id}', [TransportticketsController::class, 'destroy'])->name('transporttickets.destroy');
    // Travel Routes
    Route::get('/travelroutes', [TravelroutesController::class, 'index'])->name('travelroutes');
    Route::post('/travelroutes/store', [TravelroutesController::class, 'store'])->name('travelroutes.store');
    Route::get('/travelroutes/edit/{id}', [TravelroutesController::class, 'edit'])->name('travelroutes.edit');
    Route::post('/travelroutes/update/', [TravelroutesController::class, 'update'])->name('travelroutes.update');
    Route::get('/travelroutes/destroy/{id}', [TravelroutesController::class, 'destroy'])->name('travelroutes.destroy');      
});

require __DIR__.'/auth.php';
