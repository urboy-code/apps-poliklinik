<?php

use App\Http\Controllers\DaftarPasienController;
use App\Http\Controllers\DaftarPoliController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PeriksaController;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PasienDaftarController;
use App\Http\Controllers\RiwayatController;
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
    return view('index');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', [HomeController::class, 'index']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


Route::group(['middleware' => 'auth'], function () {
    Route::get('/adminDashboard', function () {
        return view('adminDashboard');
    });

    Route::get('/dokterDashboard', function () {
        return view('dokter.dokterDashboard');
    });

    Route::get('/pasienDashboard', function () {
        return view('pasienLayout.pasienDashboard');
    });

    // Dokter Route
    Route::resource('dokter', DokterController::class);

    // Pasien Route
    Route::resource('pasien', PasienController::class);

    // Poli Route
    Route::resource('poli', PoliController::class);

    // Obat Route
    Route::resource('obat', ObatController::class);

    // Periksa Route
    Route::resource('jadwal_periksa', PeriksaController::class);

    // Daftar Poli Rote
    Route::resource('daftarPoli', DaftarPoliController::class);

    // Daftar Pasien Route
    Route::resource('daftarPasien', DaftarPasienController::class);

    // Pasien Daftar Route
    Route::resource('daftar', PasienDaftarController::class);

    // Riwayat Pasien Route
    Route::resource('riwayat', RiwayatController::class);
});
