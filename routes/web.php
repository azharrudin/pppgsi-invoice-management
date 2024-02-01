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
// tes
Route::get('/tes', function () {
    return view('desain_pdf.tes');
});
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
            Route::get('/add-invoice', [InvoiceController::class, 'add'])->name('pages-list-invoice');
            Route::get('/preview-invoice', [InvoiceController::class, 'preview'])->name('pages-list-invoice');
            Route::get('/data-invoice', [InvoiceController::class, 'datatable'])->name('data-invoice');
            Route::get('/edit/{id}', [InvoiceController::class, 'edit'])->name('pages-list-invoice');
            Route::get('/preview-invoice-edit/{id}', [InvoiceController::class, 'editPreview'])->name('pages-list-invoice');
            Route::get('/show/{id}', [InvoiceController::class, 'show'])->name('pages-list-invoice');
            Route::get('/print/{id}', [InvoiceController::class, 'print']);
        });

        Route::prefix('tanda-terima')->group(function () {
            Route::get('/', [TandaTerimaController::class, 'index'])->name('pages-list-tanda-terima');
            Route::get('/add', [TandaTerimaController::class, 'create'])->name('pages-list-tanda-terima');
            Route::get('/preview', [TandaTerimaController::class, 'show'])->name('pages-list-tanda-terima');
            Route::get('/edit/{id}', [TandaTerimaController::class, 'edit'])->name('pages-list-tanda-terima');
            Route::get('/show/{id}', [TandaTerimaController::class, 'preview'])->name('pages-list-tanda-terima');
            Route::get('/data-tanda-terima', [TandaTerimaController::class, 'datatable'])->name('data-tanda-terima');
            Route::get('/print/{id}', [TandaTerimaController::class, 'print']);
        });
    });

    // Complain
    Route::prefix('complain')->group(function () {
        // Ticket
        Route::prefix('/')->group(function () {
            Route::get('/list-ticket', [TicketListController::class, 'index'])->name('pages-list-ticket');
            Route::get('/add-ticket', [TicketListController::class, 'add'])->name('pages-list-ticket');
            Route::get('/preview-ticket', [TicketListController::class, 'preview'])->name('pages-list-ticket');
            Route::get('/data-ticket', [TicketListController::class, 'datatable'])->name('data-ticket');
            Route::get('/show-ticket/{id}', [TicketListController::class, 'show'])->name('pages-list-ticket');
            Route::get('/edit-ticket/{id}', [TicketListController::class, 'edit'])->name('pages-list-ticket');
            Route::get('/preview-edit-ticket/{id}', [TicketListController::class, 'editPreview'])->name('pages-edit-preview-ticket')->name('pages-list-ticket');
        });

        // Laporan Kerusakan
        Route::prefix('laporan-kerusakan')->group(function () {
            Route::get('/', [LaporanKerusakanController::class, 'index'])->name('pages-list-laporan-kerusakan');
            Route::get('/add', [LaporanKerusakanController::class, 'create'])->name('pages-list-laporan-kerusakan');
            Route::get('/preview', [LaporanKerusakanController::class, 'preview'])->name('pages-list-laporan-kerusakan');
            Route::get('/edit/{id}', [LaporanKerusakanController::class, 'edit'])->name('pages-list-laporan-kerusakan');
            Route::get('/show/{id}', [LaporanKerusakanController::class, 'show'])->name('pages-list-laporan-kerusakan');
            Route::get('/data-damage', [LaporanKerusakanController::class, 'datatable'])->name('data-damage');
            Route::get('/print/{id}', [LaporanKerusakanController::class, 'print']);
        });

        // Work Order
        Route::prefix('work-order')->group(function () {
            Route::get('/', [WorkOrderController::class, 'index'])->name('pages-list-work-order');
            Route::get('/add', [WorkOrderController::class, 'create'])->name('pages-list-work-order');
            Route::get('/preview', [WorkOrderController::class, 'preview'])->name('pages-list-work-order');
            Route::get('/edit/{id}', [WorkOrderController::class, 'edit'])->name('pages-list-work-order');
            Route::get('/show/{id}', [WorkOrderController::class, 'show'])->name('pages-list-work-order');
            Route::get('/data-work', [WorkOrderController::class, 'datatable'])->name('data-work');
            Route::get('/print/{id}', [WorkOrderController::class, 'print']);
        });
    });

    // Request
    Route::prefix('request')->group(function () {
        // Purchase Request
        Route::prefix('/')->group(function () {
            Route::get('/list-purchase-request', [PurchaseRequestController::class, 'index'])->name('pages-purchase-request');
            Route::get('/add-purchase-request', [PurchaseRequestController::class, 'add'])->name('pages-purchase-request');
            Route::get('/edit/{id}', [PurchaseRequestController::class, 'edit'])->name('pages-purchase-request');
            Route::get('/data-purchase-request', [PurchaseRequestController::class, 'datatable'])->name('data-purchase-request');
            Route::get('/preview/{id}', [PurchaseRequestController::class, 'preview'])->name('pages-purchase-request');
            Route::get('/print/{id}', [PurchaseRequestController::class, 'print']);
            Route::get('/show/{id}', [PurchaseRequestController::class, 'show'])->name('pages-purchase-request');
        });

        // Material Request
        Route::prefix('material-request')->group(function () {
            Route::get('/', [MaterialRequestController::class, 'index'])->name('pages-list-material-request');
            Route::get('/add', [MaterialRequestController::class, 'create'])->name('pages-list-material-request');
            Route::get('/data-material-request', [MaterialRequestController::class, 'datatable'])->name('data-material-reques');
            Route::get('/preview', [MaterialRequestController::class, 'preview'])->name('pages-list-material-request');
            Route::get('/show/{id}', [MaterialRequestController::class, 'show'])->name('pages-show-material-request');
            Route::get('/edit/{id}', [MaterialRequestController::class, 'edit'])->name('pages-list-material-request');
            Route::get('/print/{id}', [MaterialRequestController::class, 'print']);
        });

        // Request Order
        Route::prefix('purchase-order')->group(function () {
            Route::get('/', [PurchaseOrderController::class, 'index'])->name('pages-list-material-request');
            Route::get('/add', [PurchaseOrderController::class, 'create'])->name('pages-create-tanda-terima');
            Route::get('/preview', [PurchaseOrderController::class, 'preview'])->name('pages-preview-tanda-terima');
            Route::get('/data-purchase-order', [PurchaseOrderController::class, 'datatable'])->name('data-purchase-order');
            Route::get('/print/{id}', [PurchaseOrderController::class, 'print']);
        });
    });

    // Vendor
    Route::prefix('vendor')->group(function () {
        Route::get('/list-tagihan-vendor', [VendorController::class, 'index'])->name('pages-list-tagihan-vendor');
        Route::get('/show-tagihan-vendor/{id}', [VendorController::class, 'show'])->name('pages-list-tagihan-vendor');
        Route::get('/edit-tagihan-vendor/{id}', [VendorController::class, 'edit'])->name('pages-list-tagihan-vendor');
        Route::get('/add-tagihan-vendor', [VendorController::class, 'index'])->name('pages-list-tagihan-vendor');
        Route::get('/data-tagihan-vendor', [VendorController::class, 'datatable'])->name('data-tagihan-vendor');
        Route::get('/data-vendor', [VendorController::class, 'datatableVendor'])->name('data-vendor');
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
