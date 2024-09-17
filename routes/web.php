<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\ReturBarangController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
    if(Auth::check()){
        if (Auth::User()->role == 'staf_gudang') {
            $users = User::all();
            return view('dashboard_staf-gudang', compact('users'));
        }
        else if (Auth::User()->role == 'kasir') {
            $users = User::all();
            return view('dashboard_kasir', compact('users'));
        }
        else if (Auth::User()->role == 'kepala_toko') {
            $users = User::all();
            return view('dashboard_kepala-toko', compact('users'));
        }
    }
    return view('welcome');

})->name('dashboard');
Auth::routes();
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
// Route::get('/login', [AuthController::class, 'login'])->name('auth.login');


Route::middleware(['auth'])->group(function () {
    Route::resource('barang', BarangController::class);
    Route::resource('barang_masuk', BarangMasukController::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('retur_barang', ReturBarangController::class);
    Route::resource('jenis', JenisController::class);
    Route::resource('user', UserController::class);
    Route::resource('pemasukan', PemasukanController::class);
    Route::resource('transaksi', TransaksiController::class);
    Route::get('kasir/transaksi/baru', [App\Http\Controllers\Kasir\TransaksiController::class, 'new'])->name('kasir.transaksi.new');
    Route::get('kasir/transaksi/{transaksi}', [App\Http\Controllers\Kasir\TransaksiController::class, 'index'])->name('kasir.transaksi.index');
    Route::post('kasir/transaksi', [App\Http\Controllers\Kasir\TransaksiController::class, 'store'])->name('kasir.transaksi.store');
    Route::delete('kasir/transaksi/{transaksi}', [App\Http\Controllers\Kasir\TransaksiController::class, 'destroy'])->name('kasir.transaksi.destroy');
    Route::post('kasir/transaksi/bayar', [App\Http\Controllers\Kasir\TransaksiController::class, 'bayar'])->name('kasir.transaksi.bayar');
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

