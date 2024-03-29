<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\App\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\App\Admin\EmployeeController as AdminEmployee;
use App\Http\Controllers\App\Admin\ReceiptController as AdminReceipt;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\App\Admin\FeeController as AdminFee;
use App\Http\Controllers\App\Admin\EmployeeFeeController as AdminEmployeeFee;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[HomepageController::class, 'index'])->name('homepage.index');
Route::get('/about-us',[HomepageController::class, 'aboutus'])->name('homepage.aboutus');
Route::get('/products',[HomepageController::class, 'products'])->name('homepage.products');
Route::get('/contact-us',[HomepageController::class, 'contactus'])->name('homepage.contactus');


Auth::routes();
Auth::routes(['register' => true]);

Route::get('/app/admin', [AdminDashboard::class, 'index'])->name('app.admin.index');
Route::get('/fees/{fee}', [App\Http\Controllers\FeeController::class, 'show'])->name('home.show');

Route::get('/app/admin/employees', [AdminEmployee::class, 'index'])->name('app.admin.employees.index');
Route::get('/app/admin/employees/create', [AdminEmployee::class, 'create'])->name('app.admin.employees.create');
Route::post('/app/admin/employees', [AdminEmployee::class, 'store'])->name('app.admin.employees.store');
Route::delete('/app/admin/employees/{employee}', [AdminEmployee::class, 'destroy'])->name('app.admin.employees.destroy');
Route::get('/app/admin/employees/{employee}', [AdminEmployee::class, 'modify'])->name('app.admin.employees.modify');
Route::put('/app/admin/employees/{employee}', [AdminEmployee::class, 'update'])->name('app.admin.employees.update');

Route::get('/app/admin/receipts', [AdminReceipt::class, 'index'])->name('app.admin.receipts.index');
Route::get('/app/admin/receipts/create', [AdminReceipt::class, 'create'])->name('app.admin.receipts.create');
Route::post('/app/admin/receipts', [AdminReceipt::class, 'store'])->name('app.admin.receipts.store');
Route::get('/app/admin/receipts/{receipt}', [AdminReceipt::class, 'show'])->name('app.admin.receipts.show');
Route::delete('/app/admin/receipts/{receipt}', [AdminReceipt::class, 'destroy'])->name('app.admin.receipts.destroy');
Route::get('/app/admin/receipts/{receipt}', [AdminReceipt::class, 'modify'])->name('app.admin.receipts.modify');
Route::put('/app/admin/receipts/{receipt}', [AdminReceipt::class, 'update'])->name('app.admin.receipts.update');

    Route::middleware(['admin'])->group(function() {
        Route::get('app/admin/users', [App\Http\Controllers\AdminUserController::class, 'index'])->name('admin.users.index');
        Route::get('app/admin/users/create', [App\Http\Controllers\AdminUserController::class, 'create'])->name('admin.users.create');
        Route::post('app/admin/users', [App\Http\Controllers\AdminUserController::class, 'store'])->name('admin.users.store');
        Route::get('app/admin/users/{user}', [App\Http\Controllers\AdminUserController::class, 'modify'])->name('admin.users.modify');
        Route::put('app/admin/users/{user}', [App\Http\Controllers\AdminUserController::class, 'update'])->name('admin.users.update');
        Route::get('app/admin/users/{user}/delete', [App\Http\Controllers\AdminUserController::class, 'delete'])->name('admin.users.delete');
        Route::delete('app/admin/users/{user}', [App\Http\Controllers\AdminUserController::class, 'destroy'])->name('admin.users.destroy');
        Route::get('app/admin/users/{user}/reset', [App\Http\Controllers\AdminUserController::class, 'reset'])->name('admin.users.reset');
        Route::patch('app/admin/users/{user}', [App\Http\Controllers\AdminUserController::class, 'resetOk'])->name('admin.users.resetOk');
    });

Route::get('/app/admin/fees', [AdminFee::class, 'index'])->name('app.admin.fees.index');
Route::get('/app/admin/fees/create', [AdminFee::class, 'create'])->name('app.admin.fees.create');
Route::post('/app/admin/fees', [AdminFee::class, 'store'])->name('app.admin.fees.store');
Route::delete('/app/admin/fees/{fee}', [AdminFee::class, 'destroy'])->name('app.admin.fees.destroy');
Route::get('/app/admin/fees/{fee}', [AdminFee::class, 'modify'])->name('app.admin.fees.modify');
Route::put('/app/admin/fees/{fee}', [AdminFee::class, 'update'])->name('app.admin.fees.update');

Route::get('/app/admin/employeefees', [AdminEmployeeFee::class, 'index'])->name('app.admin.employeefees.index');