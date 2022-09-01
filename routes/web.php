<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', function () {
    return view('frondend.index');
});


Route::middleware('auth', 'ceklogin:admin')->group(function () {
    Route::Resource('roles', 'App\Http\Controllers\RoleController');
    Route::Resource('users', 'App\Http\Controllers\UserController');
    Route::Resource('category', 'App\Http\Controllers\CategoryController');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
