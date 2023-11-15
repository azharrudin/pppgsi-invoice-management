<?php

use App\Http\Controllers\complain\TicketListController;
use App\Http\Controllers\invoice\InvoiceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\language\LanguageController;
use App\Http\Controllers\pages\HomePage;
use App\Http\Controllers\pages\Page2;
use App\Http\Controllers\pages\MiscError;
use App\Http\Controllers\authentications\LoginBasic;
use App\Http\Controllers\authentications\RegisterBasic;
use App\Http\Controllers\pages\LaporanKerusakanController;
use App\Http\Controllers\pages\TandaTerimaController;
use App\Http\Controllers\pages\WorkOrderController;

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

// Main Page Route
Route::get('/', [HomePage::class, 'index'])->name('pages-home');
Route::get('/page-2', [Page2::class, 'index'])->name('pages-page-2');

// Invoice
Route::group(['prefix' => 'invoice'], function () {
    Route::get('/list-invoice', [InvoiceController::class, 'index'])->name('pages-list-invoice');
    Route::get('/add-invoice', [InvoiceController::class, 'add'])->name('pages-add-invoice');
    Route::get('/preview-invoice', [InvoiceController::class, 'preview'])->name('pages-preview-invoice');
});

// Complain
Route::group(['prefix' => 'complain'], function () {
    Route::get('/list-ticket', [TicketListController::class, 'index'])->name('pages-list-ticket');
    Route::get('/add-ticket', [TicketListController::class, 'add'])->name('pages-add-ticket');
    Route::get('/preview-ticket', [TicketListController::class, 'preview'])->name('pages-preview-ticket');
});


// locale
Route::get('lang/{locale}', [LanguageController::class, 'swap']);

// pages
Route::get('/pages/misc-error', [MiscError::class, 'index'])->name('pages-misc-error');


Route::prefix('laporan-kerusakan')->group(function () {
    Route::get('/', [LaporanKerusakanController::class, 'index'])->name('pages-list-laporan-kerusakan');
    Route::get('/add', [LaporanKerusakanController::class, 'create'])->name('pages-create-laporan-kerusakan');
    Route::get('/preview', [LaporanKerusakanController::class, 'preview'])->name('pages-preview-laporan-kerusakan');
});

Route::prefix('tanda-terima')->group(function () {
    Route::get('/', [TandaTerimaController::class, 'index'])->name('pages-list-tanda-terima');
    Route::get('/add', [TandaTerimaController::class, 'create'])->name('pages-create-tanda-terima');
    Route::get('/preview', [TandaTerimaController::class, 'preview'])->name('pages-preview-tanda-terima');
});

Route::prefix('work-order')->group(function () {
    Route::get('/', [WorkOrderController::class, 'index'])->name('pages-list-work-order');
    Route::get('/add', [WorkOrderController::class, 'create'])->name('pages-create-tanda-terima');
    Route::get('/preview', [TandaTerimaController::class, 'preview'])->name('pages-preview-tanda-terima');
});
// authentication
Route::get('/auth/login-basic', [LoginBasic::class, 'index'])->name('auth-login-basic');
Route::get('/auth/register-basic', [RegisterBasic::class, 'index'])->name('auth-register-basic');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
