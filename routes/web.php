<?php

use App\Http\Controllers\DokterController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PeriksaController;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\ProfileController;
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

Route::get('/adminDashboard', function () {
    return view('adminDashboard');
});

Route::get('/dokterDashboard', function () {
    return view('dokter.dokterDashboard');
});

Route::get('/pasienDashboard', function () {
    return view('pasienLayout.pasienDashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

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

