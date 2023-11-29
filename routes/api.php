<?php

use App\Http\Controllers\BankController;
use App\Http\Controllers\DamageReportController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\WorkOrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('tenant', TenantController::class);

Route::resource('bank', BankController::class);

Route::get("invoice/select", [InvoiceController::class, "select"]);
Route::resource('invoice', InvoiceController::class);

Route::resource('receipt', ReceiptController::class);

Route::resource('ticket', TicketController::class);

Route::get("damage-report/select", [DamageReportController::class, "select"]);
Route::resource('damage-report', DamageReportController::class);

Route::resource('work-order', WorkOrderController::class);
