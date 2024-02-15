<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::middleware('guest')->group(function() {
Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::get('register', [App\Http\Controllers\Auth\RegisterController::class, 'create']);
});

Route::post('register', [App\Http\Controllers\Auth\RegisterController::class, 'store']);
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'auth']);
Route::get('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function() {
Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

Route::get('dashboard/customers', [App\Http\Controllers\CustomerController::class, 'index'])->name('dashboard.customers');
Route::get('dashboard/customers/details/{customer}', [App\Http\Controllers\CustomerController::class, 'detail'])->name('dashboard.customers.details');
Route::get('dashboard/customers/create', [App\Http\Controllers\CustomerController::class, 'create'])->name('dashboard.customers.create');
Route::post('dashboard/customers/store', [App\Http\Controllers\CustomerController::class, 'store'])->name('dashboard.customers.store');
Route::get('dashboard/customers/{customer}', [App\Http\Controllers\CustomerController::class, 'edit'])->name('dashboard.customers.edit');
Route::put('dashboard/customers/{customer}', [App\Http\Controllers\CustomerController::class, 'update'])->name('dashboard.customers.update');
Route::post('dashboard/customers/details/status/{customer}', [App\Http\Controllers\CustomerController::class, 'status'])->name('dashboard.customers.details.status');
Route::post('dashboard/customers/details/service/{customer}', [App\Http\Controllers\CustomerController::class, 'service'])->name('dashboard.customers.details.service');
Route::delete('dashboard/customers/{customer}', [App\Http\Controllers\CustomerController::class, 'destroy'])->name('dashboard.customers.delete');

Route::get('dashboard/infrastructures', [App\Http\Controllers\InfrastrukturController::class, 'index'])->name('dashboard.infrastructures');
Route::get('dashboard/infrastructures/details/{infrastructure}', [App\Http\Controllers\InfrastrukturController::class, 'detail'])->name('dashboard.infrastructures.details');
Route::get('dashboard/infrastructures/create', [App\Http\Controllers\InfrastrukturController::class, 'create'])->name('dashboard.infrastructures.create');
Route::post('dashboard/infrastructures/store', [App\Http\Controllers\InfrastrukturController::class, 'store'])->name('dashboard.infrastructures.store');
Route::get('dashboard/infrastructures/{infrastructure}', [App\Http\Controllers\InfrastrukturController::class, 'edit'])->name('dashboard.infrastructures.edit');
Route::put('dashboard/infrastructures/{infrastructure}', [App\Http\Controllers\InfrastrukturController::class, 'update'])->name('dashboard.infrastructures.update');
Route::delete('dashboard/infrastructures/{infrastructure}', [App\Http\Controllers\InfrastrukturController::class, 'destroy'])->name('dashboard.infrastructures.delete');

Route::get('dashboard/bts', [App\Http\Controllers\BtsController::class, 'index'])->name('dashboard.bts');
Route::get('dashboard/bts/details/{bts}', [App\Http\Controllers\BtsController::class, 'detail'])->name('dashboard.bts.details');
Route::get('dashboard/bts/create', [App\Http\Controllers\BtsController::class, 'create'])->name('dashboard.bts.create');
Route::post('dashboard/bts/store', [App\Http\Controllers\BtsController::class, 'store'])->name('dashboard.bts.store');
Route::get('dashboard/bts/{bts}', [App\Http\Controllers\BtsController::class, 'edit'])->name('dashboard.bts.edit');
Route::put('dashboard/bts/{bts}', [App\Http\Controllers\BtsController::class, 'update'])->name('dashboard.bts.update');
Route::delete('dashboard/bts/{bts}', [App\Http\Controllers\BtsController::class, 'destroy'])->name('dashboard.bts.delete');

Route::get('dashboard/services', [App\Http\Controllers\ServiceController::class, 'index'])->name('dashboard.services');
Route::get('dashboard/services/create', [App\Http\Controllers\ServiceController::class, 'create'])->name('dashboard.services.create');
Route::post('dashboard/services/store', [App\Http\Controllers\ServiceController::class, 'store'])->name('dashboard.services.store');
Route::get('dashboard/services/{service}', [App\Http\Controllers\ServiceController::class, 'edit'])->name('dashboard.services.edit');
Route::put('dashboard/services/{service}', [App\Http\Controllers\ServiceController::class, 'update'])->name('dashboard.services.update');
Route::delete('dashboard/services/{service}', [App\Http\Controllers\ServiceController::class, 'destroy'])->name('dashboard.services.delete');

Route::get('dashboard/providers', [App\Http\Controllers\ProviderController::class, 'index'])->name('dashboard.providers');
Route::get('dashboard/providers/create', [App\Http\Controllers\ProviderController::class, 'create'])->name('dashboard.providers.create');
Route::post('dashboard/providers/create', [App\Http\Controllers\ProviderController::class, 'store'])->name('dashboard.providers.store');
Route::get('dashboard/providers/{provider}', [App\Http\Controllers\ProviderController::class, 'edit'])->name('dashboard.providers.edit');
Route::put('dashboard/providers/{provider}', [App\Http\Controllers\ProviderController::class, 'update'])->name('dashboard.providers.update');
Route::delete('dashboard/providers/{provider}', [App\Http\Controllers\ProviderController::class, 'destroy'])->name('dashboard.providers.delete');
});
