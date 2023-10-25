<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\MasakanController;
use App\Http\Controllers\UserkasController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\TransaksisController;
use App\Http\Controllers\DetailOrderController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomepageController::class, 'index'])->name('homepage.index');
Route::resource('homepage', HomepageController::class);
Route::get('detail/{id}', [App\Http\Controllers\HomepageController::class, 'detail']);
Route::get('detail', [App\Http\Controllers\HomepageController::class, 'detail'])->name('homepage.detail');
Route::resource('detailorder', DetailOrderController::class);
Route::resource('order', OrderController::class);

Route::group(['prefix' => 'admin','middleware' => ['auth', 'role:admin']], function() {
    Route::resource('masakan', MasakanController::class);
    Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('user', UserController::class);
    Route::resource('transaksi', TransaksiController::class);
    Route::get('selesai', [App\Http\Controllers\TransaksiController::class, 'selesai'])->name('transaksi.selesai');
    Route::patch('sukses/{id}', [App\Http\Controllers\TransaksiController::class, 'sukses'])->name('transaksi.sukses');
    Route::get('laporan', [App\Http\Controllers\TransaksiController::class, 'laporan'])->name('transaksi.laporan');
    Route::get('print{id}', [App\Http\Controllers\TransaksiController::class, 'print'])->name('transaksi.print');
});
Route::group(['prefix' => 'kasir','middleware' => ['auth', 'role:kasir']], function() {
    Route::get('/', [App\Http\Controllers\DashboardController::class, 'kasir'])->name('dashboard.kasir');
    Route::resource('kasir-user', UserkasController::class);
    Route::resource('kasir-transaksi', TransaksisController::class);
    Route::get('selesai', [App\Http\Controllers\TransaksisController::class, 'selesai'])->name('kasir-transaksi.selesai');
    Route::get('laporan', [App\Http\Controllers\TransaksisController::class, 'laporan'])->name('kasir-transaksi.laporan');
    Route::patch('sukses/{id}', [App\Http\Controllers\TransaksisController::class, 'sukses'])->name('kasir-transaksi.sukses');
    Route::get('print{id}', [App\Http\Controllers\TransaksisController::class, 'print'])->name('kasir-transaksi.print');


});
