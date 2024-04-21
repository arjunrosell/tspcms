<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

use App\Livewire\Dashboard\Index as DashboardIndex;
use App\Livewire\UserManagement\User\Index as UserIndex;
use App\Livewire\UserManagement\Roles\Index as RolesIndex;
use App\Livewire\UserManagement\Position\Index as PositionIndex;
use App\Livewire\Analytics\Expenses\Index as ExpensesIndex;
use App\Livewire\Analytics\Events\Index as EventsIndex;
use App\Livewire\Appointments\Index as AppointmentsIndex;
use App\Livewire\SystemReferences\Expenses\Index as SysExpensesIndex;
use App\Livewire\SystemReferences\Events\Index as SysEventsIndex;
use App\Livewire\GeneralReport\Index as GeneralReportIndex;
use App\Livewire\Analytics\Events\FuneralMass\Add as FuneralMassAdd;
use App\Livewire\Analytics\Events\FuneralMass\Edit as FuneralMassEdit;
use App\Livewire\Analytics\Events\Baptism\Add as BaptismAdd;
use App\Livewire\Analytics\Events\Baptism\Edit as BaptismEdit;
use App\Livewire\Analytics\Events\Wedding\Add as WeddingAdd;
use App\Livewire\Analytics\Events\Wedding\Edit as WeddingEdit;
use App\Livewire\Analytics\Events\FuneralMass\Index as FuneralMassIndex;
use App\Livewire\Analytics\Events\Baptism\Index as BaptismIndex;
use App\Livewire\Analytics\Events\Wedding\Index as WeddingIndex;
use App\Livewire\Analytics\Donation\Index as DonationIndex;
use App\Livewire\SystemReferences\Donation\Index as SysDonationIndex;
use App\Livewire\Auth\Login\Index as LoginIndex;

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

Route::middleware(['auth'])->get('/', DashboardIndex::class)->name('index');
Route::get('/login', LoginIndex::class)->name('login');
Route::post('login-check', [AuthController::class, 'login'])->name('login.check');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->prefix('user-management')->name('user-management.')->group(function () {
    Route::get('/', UserIndex::class)->name('index');
    Route::get('/roles', RolesIndex::class)->name('roles');
    Route::get('/position', PositionIndex::class)->name('position');
});

Route::middleware(['auth'])->prefix('analytics')->name('analytics.')->group(function () {
    Route::get('/expenses', ExpensesIndex::class)->name('expenses');
    Route::get('/donations', DonationIndex::class)->name('donations');
    Route::get('/events', EventsIndex::class)->name('events');
});

Route::middleware(['auth'])->prefix('analytics-events-funeral-mass')->name('analytics-events-funeral-mass.')->group(function () {
    Route::get('/', FuneralMassIndex::class)->name('index');
    Route::get('/add-funeral-mass', FuneralMassAdd::class)->name('add-funeral-mass');
    Route::get('/edit-funeral-mass/{pkey}', FuneralMassEdit::class)->name('edit-funeral-mass');
});

Route::middleware(['auth'])->prefix('analytics-events-wedding')->name('analytics-events-wedding.')->group(function () {
    Route::get('/', WeddingIndex::class)->name('index');
    Route::get('/add-wedding', WeddingAdd::class)->name('add-wedding');
    Route::get('/edit-wedding/{pkey}', WeddingEdit::class)->name('edit-wedding');
});

Route::middleware(['auth'])->prefix('analytics-events-baptism')->name('analytics-events-baptism.')->group(function () {
    Route::get('/', BaptismIndex::class)->name('index');
    Route::get('/add-baptism', BaptismAdd::class)->name('add-baptism');
    Route::get('/edit-baptism', BaptismEdit::class)->name('edit-baptism');
});

Route::middleware(['auth'])->prefix('appointments')->name('appointments.')->group(function () {
    Route::get('/', AppointmentsIndex::class)->name('index');
});

Route::middleware(['auth'])->prefix('system-references')->name('system-references.')->group(function () {
    Route::get('/expenses', SysExpensesIndex::class)->name('expenses');
    Route::get('/donations', SysDonationIndex::class)->name('donations');
    Route::get('/events', SysEventsIndex::class)->name('events');
});

Route::middleware(['auth'])->prefix('general-reports')->name('general-reports.')->group(function () {
    Route::get('/', GeneralReportIndex::class)->name('index');
});


use App\Livewire\Counter;

Route::get('/counter', Counter::class);
