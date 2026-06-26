<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;

// Customer Controllers
use App\Http\Controllers\Customer\DashboardController as CustomerDashboardController;
use App\Http\Controllers\Customer\ProductController as CustomerProductController;
use App\Http\Controllers\Customer\InvoiceController as CustomerInvoiceController;
use App\Http\Controllers\Customer\WalletController as CustomerWalletController;
use App\Http\Controllers\Customer\TicketController as CustomerTicketController;
use App\Http\Controllers\Customer\AffiliateController as CustomerAffiliateController;

// Admin Controllers
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\UserProductController;
use App\Http\Controllers\Admin\UsageRecordController;
use App\Http\Controllers\Admin\InvoiceController as AdminInvoiceController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\WalletController;
use App\Http\Controllers\Admin\TicketController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\SlaPolicyController;
use App\Http\Controllers\Admin\AffiliateController;
use App\Http\Controllers\Admin\ActivityLogController;
use App\Http\Controllers\Admin\SettingController;

/*
|--------------------------------------------------------------------------
| Public
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Auth Routes (Breeze)
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {

    /*
    |----------------------------------------------------------
    | Dashboard
    |----------------------------------------------------------
    */
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    /*
    |----------------------------------------------------------
    | Profile
    |----------------------------------------------------------
    */
    Route::prefix('profile')->name('profile.')->group(function () {

        Route::get('/', [ProfileController::class, 'edit'])->name('edit');

        Route::patch('/', [ProfileController::class, 'update'])->name('update');

        Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
    });

    /*
    |----------------------------------------------------------
    | CUSTOMER PANEL
    |----------------------------------------------------------
    */
    Route::prefix('customer')->name('customer.')->group(function () {

        // Dashboard
        Route::get('/dashboard', [CustomerDashboardController::class, 'index'])
            ->name('dashboard');

        // Products / Services
        Route::get('/products', [CustomerProductController::class, 'index'])
            ->name('products.index');

        Route::get('/services', [CustomerProductController::class, 'services'])
            ->name('services.index');

        Route::get('/products/{id}', [CustomerProductController::class, 'show'])
            ->name('products.show');

        // Invoices
        Route::get('/invoices', [CustomerInvoiceController::class, 'index'])
            ->name('invoices.index');

        Route::get('/invoices/{id}', [CustomerInvoiceController::class, 'show'])
            ->name('invoices.show');

        Route::post('/invoices/{id}/pay', [CustomerInvoiceController::class, 'pay'])
            ->name('invoices.pay');

        // Wallet
        Route::get('/wallet', [CustomerWalletController::class, 'index'])
            ->name('wallet.index');

        Route::post('/wallet/deposit', [CustomerWalletController::class, 'deposit'])
            ->name('wallet.deposit');

        // Tickets
        Route::get('/tickets', [CustomerTicketController::class, 'index'])
            ->name('tickets.index');

        Route::get('/tickets/create', [CustomerTicketController::class, 'create'])
            ->name('tickets.create');

        Route::post('/tickets', [CustomerTicketController::class, 'store'])
            ->name('tickets.store');

        Route::get('/tickets/{id}', [CustomerTicketController::class, 'show'])
            ->name('tickets.show');

        // Affiliate
        Route::get('/affiliate', [CustomerAffiliateController::class, 'index'])
            ->name('affiliate.index');
    });

    /*
    |----------------------------------------------------------
    | ADMIN PANEL
    |----------------------------------------------------------
    */
    Route::prefix('admin')
        ->name('admin.')
        // ->middleware(['role:Super Admin'])
        ->group(function () {

            Route::get('/dashboard', [AdminDashboardController::class, 'index'])
                ->name('dashboard');

            // Users
            Route::resource('users', UserController::class);

            // Products
            Route::resource('products', AdminProductController::class);
            Route::resource('user-products', UserProductController::class);
            Route::resource('usage-records', UsageRecordController::class);

            // Billing
            Route::prefix('financial')
                ->name('financial.')
                ->group(function () {
                    Route::resource('invoices', AdminInvoiceController::class);
                    Route::resource('payments', PaymentController::class);
                    Route::resource('wallets', WalletController::class);
                });

            // Support
            Route::resource('tickets', TicketController::class);
            Route::resource('departments', DepartmentController::class);
            Route::resource('sla', SlaPolicyController::class);

            // Affiliate
            Route::resource('affiliates', AffiliateController::class);

            // Logs
            Route::get('logs', [ActivityLogController::class, 'index'])
                ->name('logs');

            // Settings
            Route::get('settings', [SettingController::class, 'index'])
                ->name('settings.index');

            Route::post('settings', [SettingController::class, 'update'])
                ->name('settings.update');
        });
});
