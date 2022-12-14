<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CetakController;
use App\Http\Controllers\OrderController;
use Kavist\RajaOngkir\Facades\RajaOngkir;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Frond\ShopController;
use App\Http\Controllers\Frond\BerandaController;
use App\Http\Controllers\Frond\HistoriController;

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

Route::get('/about', function () {
    return view('frondend.about');
});
// Route::get('/cek', function () {
//     $daftarProvinsi = RajaOngkir::provinsi()->all();
//     dd($daftarProvinsi);
//     return view('frondend.checkout');
// });

Route::get('/', [BerandaController::class, 'index'])->name('beranda');
// Route::get('/about-me', [BerandaController::class, 'index'])->name('about_me');
Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/shop-category/{id}', [ShopController::class, 'categories'])->name('shop.category');
Route::get('/product-detail/{id}', [ShopController::class, 'product_detail'])->name('product.detail');


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
    Route::Resource('user', 'App\Http\Controllers\UserController');
    Route::get('order', [OrderController::class, 'index'])->name('order.index');
    Route::post('order/{id}', [OrderController::class, 'store'])->name('order.store');
    Route::patch('order/{order}', [OrderController::class, 'update'])->name('order.update');
    Route::delete('order/{order}', [OrderController::class, 'destroy'])->name('order.destroy');
    Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::get('kota/{id}/city', [UserController::class, 'getCity'])->name('city');
    Route::get('cek/{code}/ongkir', [CheckoutController::class, 'hitungOngkir'])->name('ongkir');
    Route::put('checkout/', [CheckoutController::class, 'prosesBayar'])->name('checkout');
    Route::get('histori/', [HistoriController::class, 'index'])->name('histori.index');
});

Route::middleware('auth', 'ceklogin:admin')->group(function () {
    Route::Resource('role', 'App\Http\Controllers\RoleController');
    Route::Resource('category', 'App\Http\Controllers\CategoryController');
    Route::Resource('product', 'App\Http\Controllers\ProductController');
    Route::get('cetak/', [CetakController::class, 'index'])->name('cetak.index');
    Route::post('cetak/', [CetakController::class, 'cetak'])->name('cetak.store');
});



require __DIR__ . '/auth.php';
