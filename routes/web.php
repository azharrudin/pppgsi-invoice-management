<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\language\LanguageController;
use App\Http\Controllers\pages\HomePage;
use App\Http\Controllers\pages\Page2;
use App\Http\Controllers\pages\MiscError;
use App\Http\Controllers\authentications\LoginBasic;
use App\Http\Controllers\authentications\RegisterBasic;
use App\Http\Controllers\pages\LaporanKerusakanController;
use App\Http\Controllers\pages\MaterialRequestController;
use App\Http\Controllers\pages\PurchaseOrderController;
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

// locale
Route::get('lang/{locale}', [LanguageController::class, 'swap']);

// pages
Route::get('/pages/misc-error', [MiscError::class, 'index'])->name('pages-misc-error');


Route::prefix('invoice')->group(function () {
    Route::prefix('tanda-terima')->group(function () {
        Route::get('/', [TandaTerimaController::class, 'index'])->name('pages-list-tanda-terima');
        Route::get('/add', [TandaTerimaController::class, 'create']);
        Route::get('/preview', [TandaTerimaController::class, 'preview'])->name('pages-preview-tanda-terima');
    });
});

Route::prefix('complain')->group(function () {
    Route::prefix('laporan-kerusakan')->group(function () {
        Route::get('/', [LaporanKerusakanController::class, 'index'])->name('pages-list-laporan-kerusakan');
        Route::get('/add', [LaporanKerusakanController::class, 'create']);
        Route::get('/preview', [LaporanKerusakanController::class, 'preview'])->name('pages-preview-laporan-kerusakan');
    });

    Route::prefix('work-order')->group(function () {
        Route::get('/', [WorkOrderController::class, 'index'])->name('pages-list-work-order');
        Route::get('/add', [WorkOrderController::class, 'create'])->name('pages-create-tanda-terima');
        Route::get('/preview', [WorkOrderController::class, 'preview'])->name('pages-preview-tanda-terima');
    });
});


Route::prefix('request')->group(function () {
    Route::prefix('material-request')->group(function () {
        Route::get('/', [MaterialRequestController::class, 'index'])->name('pages-list-material-request');
        Route::get('/add', [MaterialRequestController::class, 'create'])->name('pages-create-tanda-terima');
        Route::get('/preview', [MaterialRequestController::class, 'preview'])->name('pages-preview-tanda-terima');
    });
    Route::prefix('purchase-order')->group(function () {
        Route::get('/', [PurchaseOrderController::class, 'index'])->name('pages-list-material-request');
        Route::get('/add', [PurchaseOrderController::class, 'create'])->name('pages-create-tanda-terima');
        Route::get('/preview', [PurchaseOrderController::class, 'preview'])->name('pages-preview-tanda-terima');
    });
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
