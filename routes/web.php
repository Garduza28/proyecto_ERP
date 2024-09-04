<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\MaterialController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\admin\InvoiceController;
use App\Http\Controllers\admin\ClienteController;
use App\Http\Controllers\admin\DoctorController;
use App\Http\Controllers\admin\ProveedorController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
		Route::get('icons', ['as' => 'pages.icons', 'uses' => 'App\Http\Controllers\PageController@icons']);
		Route::get('maps', ['as' => 'pages.maps', 'uses' => 'App\Http\Controllers\PageController@maps']);
		Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'App\Http\Controllers\PageController@notifications']);
		Route::get('tables', ['as' => 'pages.tables', 'uses' => 'App\Http\Controllers\PageController@tables']);
		Route::get('typography', ['as' => 'pages.typography', 'uses' => 'App\Http\Controllers\PageController@typography']);
		Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'App\Http\Controllers\PageController@upgrade']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

// Rutas Clientes
Route::middleware(['auth'])->prefix('admin')->name('admin.')->controller(ClienteController::class)->group(function () {
    Route::get('clientes/', 'index')->name('clientes.index');
    Route::get('clientes/create', 'create')->name('clientes.create');
    Route::post('clientes/store', 'store')->name('clientes.store');
    Route::get('clientes/{clientes}/edit', 'edit')->name('clientes.edit');
    Route::get('clientes/{clientes}/info', 'info')->name('clientes.info');
    Route::get('clientes/{clientes}/info', 'show')->name('clientes.show');
    Route::put('clientes/{clientes}/update', 'update')->name('clientes.update');
    Route::delete('clientes/{clientes}/destroy', 'destroy')->name('clientes.destroy');
    Route::post('clienteses/store', [ClienteController::class, 'store'])->name('clienteses.store');

});

// Rutas Proveedor
Route::middleware(['auth'])->prefix('admin')->name('admin.')->controller(ProveedorController::class)->group(function () {
    Route::get('proveedor/', 'index')->name('proveedor.index');
    Route::get('proveedor/create', 'create')->name('proveedor.create');
    Route::post('proveedor/store', 'store')->name('proveedor.store');
    Route::get('proveedor/{proveedor}/edit', 'edit')->name('proveedor.edit');
    Route::get('proveedor/{proveedor}/info', 'info')->name('proveedor.info');
    Route::get('proveedor/{proveedor}/info', 'show')->name('proveedor.show');
    Route::put('proveedor/{proveedor}/update', 'update')->name('proveedor.update');
    Route::delete('proveedor/{proveedor}/destroy', 'destroy')->name('proveedor.destroy');
    Route::post('proveedores/store', [ProveedorController::class, 'store'])->name('proveedores.store');

});

// Rutas Material
Route::middleware(['auth'])->prefix('admin')->name('admin.')->controller(MaterialController::class)->group(function () {
    Route::get('material/', 'index')->name('material.index');
    Route::get('material/create', 'create')->name('material.create');
    Route::post('material/store', 'store')->name('material.store');
    Route::get('material/{material}/edit', 'edit')->name('material.edit');
    Route::get('material/{material}/info', 'info')->name('material.info');
    Route::get('material/{material}/info', 'show')->name('material.show');
    Route::put('material/{material}/update', 'update')->name('material.update');
    Route::delete('material/{material}/destroy', 'destroy')->name('material.destroy');
});

// Rutas Invoice
Route::middleware(['auth'])->prefix('admin')->name('admin.')->controller(InvoiceController::class)->group(function () {
    Route::get('invoice/', 'index')->name('invoice.index');
    Route::get('invoice/create', 'create')->name('invoice.create');
    Route::post('invoice/store', 'store')->name('invoice.store');
    Route::get('invoice/{invoice}/edit', 'edit')->name('invoice.edit');
    Route::get('invoice/{invoice}/info', 'info')->name('invoice.info');
    Route::get('invoice/{invoice}/info', 'show')->name('invoice.show');
    Route::put('invoice/{invoice}/update', 'update')->name('invoice.update');
    Route::delete('invoice/{invoice}/destroy', 'destroy')->name('invoice.destroy');
    
});
Route::get('/invoice/{invoice}/pdf', [InvoiceController::class, 'generarPDF'])->name('admin.invoice.pdf');

// Rutas Doctor
Route::middleware(['auth'])->prefix('admin')->name('admin.')->controller(DoctorController::class)->group(function () {
    Route::get('doctor/', 'index')->name('doctor.index');
    Route::get('doctor/create', 'create')->name('doctor.create');
    Route::post('doctor/store', 'store')->name('doctor.store');
    Route::get('doctor/{doctor}/edit', 'edit')->name('doctor.edit');
    Route::get('doctor/{doctor}/info', 'info')->name('doctor.info');
    Route::get('doctor/{doctor}/info', 'show')->name('doctor.show');
    Route::put('doctor/{doctor}/update', 'update')->name('doctor.update');
    Route::delete('doctor/{doctor}/destroy', 'destroy')->name('doctor.destroy');
});

// Rutas STATUS
Route::middleware(['auth'])->prefix('admin')->name('admin.')->controller(StatusController::class)->group(function () {
    Route::get('status/', 'index')->name('status.index');
    Route::get('status/create', 'create')->name('status.create');
    Route::post('status/store', 'store')->name('status.store');
    Route::get('status/edit', 'edit')->name('status.edit');
    Route::get('status/info', 'info')->name('status.info');
    Route::get('status/info', 'show')->name('status.show');
    Route::put('status/update', 'update')->name('status.update');
    Route::delete('status/destroy', 'destroy')->name('status.destroy');
});





