<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Dashboard\Index as DashboardIndex;
use App\Livewire\UserManagement\User\Index as UserIndex;
use App\Livewire\UserManagement\Roles\Index as RolesIndex;
use App\Livewire\UserManagement\Position\Index as PositionIndex;
use App\Livewire\Analytics\Expenses\Index as ExpensesIndex;
use App\Livewire\Analytics\Income\Index as IncomeIndex;
use App\Livewire\Analytics\Events\Index as EventsIndex;
use App\Livewire\Appointments\Index as AppointmentsIndex;
use App\Livewire\SystemReferences\Expenses\Index as SysExpensesIndex;
use App\Livewire\SystemReferences\Incomes\Index as SysIncomeIndex;
use App\Livewire\SystemReferences\Events\Index as SysEventsIndex;
use App\Livewire\GeneralReport\Index as GeneralReportIndex;
use App\Livewire\Analytics\Events\FuneralMass\Add as FuneralMassAdd;
use App\Livewire\Analytics\Events\Baptism\Add as BaptismAdd;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', DashboardIndex::class)->name('index');

Route::prefix('user-management')->name('user-management.')->group(function () {
    Route::get('/', UserIndex::class)->name('index');
    Route::get('/roles', RolesIndex::class)->name('roles');
    Route::get('/position', PositionIndex::class)->name('position');
});

Route::prefix('analytics')->name('analytics.')->group(function () {
    Route::get('/expenses', ExpensesIndex::class)->name('expenses');
    Route::get('/income', IncomeIndex::class)->name('income');
    Route::get('/events', EventsIndex::class)->name('events');
    Route::get('/add-funeral-mass', FuneralMassAdd::class)->name('add-funeral-mass');
    Route::get('/add-baptism', BaptismAdd::class)->name('add-baptism');
});

Route::prefix('appointments')->name('appointments.')->group(function () {
    Route::get('/', AppointmentsIndex::class)->name('index');
});

Route::prefix('system-references')->name('system-references.')->group(function () {
    Route::get('/expenses', SysExpensesIndex::class)->name('expenses');
    Route::get('/income', SysIncomeIndex::class)->name('income');
    Route::get('/events', SysEventsIndex::class)->name('events');
});

Route::prefix('general-reports')->name('general-reports.')->group(function () {
    Route::get('/', GeneralReportIndex::class)->name('index');
});


use App\Livewire\Counter;

Route::get('/counter', Counter::class);
