<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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

Route::get('/', [ProductController::class, 'index'])->name('products.index');
Route::get('/product/{id}', [ProductController::class, 'detail'])->name('products.detail');
Route::get('/menu', [ProductController::class, 'menu'])->middleware('auth');
Route::get('/order', [ProductController::class, 'order'])->name('order')->middleware('auth'); //oute untuk menampilkan form order
Route::post('/order', [ProductController::class, 'processOrder'])->name('order.process')->middleware('auth'); // Route untuk melakukan proses pesanan
Route::get('/order/success', [ProductController::class, 'orderSuccess'])->name('order.success')->middleware('auth'); // Route untuk halaman sukses pesanan
Route::get('/order/form/{product_id}', [ProductController::class, 'showOrderForm'])->name('order.form')->middleware('auth');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');
// Menampilkan formulir login, hanya dapat diakses oleh tamu.
// Memberikan nama 'login' pada rute untuk referensi lebih mudah.
// Memerlukan pengguna untuk menjadi tamu (belum login).

Route::post('/login', [LoginController::class, 'authenticate']);
// Memproses permintaan login.

Route::post('/logout', [LoginController::class, 'logout']);
// Memproses permintaan logout.


