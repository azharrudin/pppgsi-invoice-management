<?php

use App\Http\Controllers\client\ListTenantController;
use App\Http\Controllers\complain\TicketListController;
use App\Http\Controllers\invoice\InvoiceController;
use App\Http\Controllers\pages\PurchaseOrderController;
use App\Http\Controllers\report\ReportInvoiceController;
use App\Http\Controllers\report\ReportTagihanController;
use App\Http\Controllers\report\ReportTandaTerimaController;
use App\Http\Controllers\request\PurchaseRequestController;
use App\Http\Controllers\settings\ListBankController;
use App\Http\Controllers\settings\ListUserController;
use App\Http\Controllers\settings\TaxRatesController;
use App\Http\Controllers\vendor\VendorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\language\LanguageController;
use App\Http\Controllers\pages\HomePage;
use App\Http\Controllers\pages\Page2;
use App\Http\Controllers\pages\MiscError;
use App\Http\Controllers\authentications\LoginBasic;
use App\Http\Controllers\authentications\RegisterBasic;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\pages\LaporanKerusakanController;
use App\Http\Controllers\pages\MaterialRequestController;
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
Route::get('/page-2', [Page2::class, 'index'])->name('pages-page-2');

Route::get('/', [LoginController::class, 'index'])->name('login');
// Route::get('login', [LoginController::class, 'index'])->name('login');
Route::get('logout', [LoginController::class, 'logout']);
Route::post('auth/login', [LoginController::class, 'login'])->name('auth.login');

// Invoice

Route::group(['middleware' => 'cekauth'], function () {
    Route::get('/dashboard', [HomePage::class, 'index'])->name('pages-home');

    Route::prefix('invoice')->group(function () {
        Route::prefix('/')->group(function () {
            Route::get('/list-invoice', [InvoiceController::class, 'index'])->name('pages-list-invoice');
            Route::get('/add-invoice', [InvoiceController::class, 'add'])->name('pages-add-invoice');
            Route::get('/preview-invoice', [InvoiceController::class, 'preview'])->name('pages-preview-invoice');
            Route::get('/data-invoice', [InvoiceController::class, 'datatable'])->name('data-invoice');
            Route::get('/edit/{id}', [InvoiceController::class, 'edit'])->name('pages-edit-invoice');
            Route::get('/preview-invoice-edit/{id}', [InvoiceController::class, 'editPreview'])->name('pages-edit-invoice');
            Route::get('/show/{id}', [InvoiceController::class, 'show'])->name('pages-show-invoice');
            Route::get('/print/{id}', [InvoiceController::class, 'print']);
        });

        Route::prefix('tanda-terima')->group(function () {
            Route::get('/', [TandaTerimaController::class, 'index'])->name('pages-list-tanda-terima');
            Route::get('/add', [TandaTerimaController::class, 'create']);
            Route::get('/preview', [TandaTerimaController::class, 'show']);
            Route::get('/edit/{id}', [TandaTerimaController::class, 'edit']);
            Route::get('/preview/{id}', [TandaTerimaController::class, 'preview'])->name('pages-preview-tanda-terima');
            Route::get('/data-tanda-terima', [TandaTerimaController::class, 'datatable'])->name('data-tanda-terima');
            Route::get('/print/{id}', [TandaTerimaController::class, 'print']);
        });
    });

    // Complain
    Route::prefix('complain')->group(function () {
        // Ticket
        Route::prefix('/')->group(function () {
            Route::get('/list-ticket', [TicketListController::class, 'index'])->name('pages-list-ticket');
            Route::get('/add-ticket', [TicketListController::class, 'add'])->name('pages-add-ticket');
            Route::get('/preview-ticket', [TicketListController::class, 'preview'])->name('pages-preview-ticket');
            Route::get('/data-ticket', [TicketListController::class, 'datatable'])->name('data-ticket');
            Route::get('/show-ticket/{id}', [TicketListController::class, 'show'])->name('pages-show-ticket');
            Route::get('/edit-ticket/{id}', [TicketListController::class, 'edit'])->name('pages-edit-ticket');
            Route::get('/preview-edit-ticket/{id}', [TicketListController::class, 'editPreview'])->name('pages-edit-preview-ticket');
        });

        // Laporan Kerusakan
        Route::prefix('laporan-kerusakan')->group(function () {
            Route::get('/', [LaporanKerusakanController::class, 'index'])->name('pages-list-laporan-kerusakan');
            Route::get('/add', [LaporanKerusakanController::class, 'create'])->name('pages-create-laporan-kerusakan');
            Route::get('/show', [LaporanKerusakanController::class, 'show'])->name('pages-show-laporan-kerusakan');
            Route::get('/edit/{id}', [LaporanKerusakanController::class, 'edit'])->name('pages-edit-laporan-kerusakan');
            Route::get('/preview/{id}', [LaporanKerusakanController::class, 'preview'])->name('pages-preview-laporan-kerusakan');
            Route::get('/data-damage', [LaporanKerusakanController::class, 'datatable'])->name('data-damage');
        });

        // Work Order
        Route::prefix('work-order')->group(function () {
            Route::get('/', [WorkOrderController::class, 'index'])->name('pages-list-work-order');
            Route::get('/add', [WorkOrderController::class, 'create'])->name('pages-create-tanda-terima');
            Route::get('/preview', [WorkOrderController::class, 'show'])->name('pages-show-tanda-terima');
            Route::get('/edit/{id}', [WorkOrderController::class, 'edit'])->name('pages-edit-tanda-terima');
            Route::get('/preview/{id}', [WorkOrderController::class, 'preview'])->name('pages-preview-tanda-terima');
            Route::get('/data-work', [WorkOrderController::class, 'datatable'])->name('data-work');
        });
    });

    // Request
    Route::prefix('request')->group(function () {
        // Purchase Request
        Route::prefix('/')->group(function () {
            Route::get('/list-purchase-request', [PurchaseRequestController::class, 'index'])->name('pages-purchase-request');
            Route::get('/add-purchase-request', [PurchaseRequestController::class, 'add'])->name('pages-add-purchase-request');
            Route::get('/edit/{id}', [PurchaseRequestController::class, 'edit'])->name('pages-edit-purchase-request');
            Route::get('/data-purchase-request', [PurchaseRequestController::class, 'datatable'])->name('data-purchase-request');
            Route::get('/preview/{id}', [PurchaseRequestController::class, 'preview'])->name('pages-preview-purchase-request');
            Route::get('/preview', [PurchaseRequestController::class, 'show'])->name('pages-show-purchase-request');
        });

        // Material Request
        Route::prefix('material-request')->group(function () {
            Route::get('/', [MaterialRequestController::class, 'index'])->name('pages-list-material-request');
            Route::get('/add', [MaterialRequestController::class, 'create'])->name('pages-create-tanda-terima');
            Route::get('/data-material-request', [MaterialRequestController::class, 'datatable'])->name('data-material-reques');
            Route::get('/preview', [MaterialRequestController::class, 'preview'])->name('pages-preview-material-request');
        });

        // Request Order
        Route::prefix('purchase-order')->group(function () {
            Route::get('/', [PurchaseOrderController::class, 'index'])->name('pages-list-material-request');
            Route::get('/add', [PurchaseOrderController::class, 'create'])->name('pages-create-tanda-terima');
            Route::get('/preview', [PurchaseOrderController::class, 'preview'])->name('pages-preview-tanda-terima');
            Route::get('/data-purchase-order', [PurchaseOrderController::class, 'datatable'])->name('data-purchase-order');
        });
    });

    // Vendor
    Route::prefix('vendor')->group(function () {
        Route::prefix('/list-tagihan-vendor')->group(function () {
            Route::get('/', [VendorController::class, 'index'])->name('pages-list-tagihan-vendor');
        });
    });

    // Client
    Route::prefix('client')->group(function () {
        // List Tenant
        Route::prefix('/list-tenant')->group(function () {
            Route::get('/', [ListTenantController::class, 'index'])->name('pages-list-tenant');
            Route::get('/data-tenant', [ListTenantController::class, 'datatable'])->name('data-tenant');
        });
    });

    // Report
    Route::prefix('report')->group(function () {
        // Report Invoice
        Route::prefix('/report-invoice')->group(function () {
            Route::get('/', [ReportInvoiceController::class, 'index'])->name('pages-report-invoice');
        });

        // Report Tanda Terima
        Route::prefix('/report-tanda-terima')->group(function () {
            Route::get('/', [ReportTandaTerimaController::class, 'index'])->name('pages-report-tenda-terima');
        });

        // Report Tagihan
        Route::prefix('/report-tagihan')->group(function () {
            Route::get('/', [ReportTagihanController::class, 'index'])->name('pages-report-tagihan');
        });
    });

    // Settings
    Route::prefix('settings')->group(function () {
        // List Tenant
        Route::prefix('/')->group(function () {
            Route::get('/list-bank', [ListBankController::class, 'index'])->name('pages-list-bank');
            Route::get('/data-bank', [ListBankController::class, 'datatable'])->name('data-bank');
        });

        // List User
        Route::prefix('/list-user')->group(function () {
            Route::get('/', [ListUserController::class, 'index'])->name('pages-list-user');
            Route::get('/data-user', [ListUserController::class, 'datatable'])->name('data-user');
        });

        // Tax Rates
        Route::prefix('/tax-rates')->group(function () {
            Route::get('/', [TaxRatesController::class, 'index'])->name('pages-tax-rates');
            Route::get('/add', [TaxRatesController::class, 'create'])->name('pages-create-tax-rates');
            Route::get('/data-tax', [TaxRatesController::class, 'datatable'])->name('data-tax');
            Route::get('/preview-tax', [TaxRatesController::class, 'preview'])->name('pages-tax-rates-preview');
            Route::get('/show/{id}', [TaxRatesController::class, 'show'])->name('pages-show-tax');
        });
    });

    // locale
    Route::get('lang/{locale}', [LanguageController::class, 'swap']);

    // pages
    Route::get('/pages/misc-error', [MiscError::class, 'index'])->name('pages-misc-error');
});

// authentication
// Route::get('/auth/login-basic', [LoginBasic::class, 'index'])->name('auth-login-basic');
// Route::get('/auth/register-basic', [RegisterBasic::class, 'index'])->name('auth-register-basic');

// Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
