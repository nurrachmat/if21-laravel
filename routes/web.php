<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('welcome');
    return redirect()->route('login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Semua role bisa lihat data (index & show)
    Route::get('/fakultas', [FakultasController::class, 'index'])->name('fakultas.index');
    Route::get('/fakultas/{fakultas}', [FakultasController::class, 'show'])->whereNumber('fakultas')->name('fakultas.show');
    Route::get('/prodi', [ProdiController::class, 'index'])->name('prodi.index');
    Route::get('/prodi/{prodi}', [ProdiController::class, 'show'])->whereNumber('prodi')->name('prodi.show');
    Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
    Route::get('/mahasiswa/{mahasiswa}', [MahasiswaController::class, 'show'])->whereNumber('mahasiswa')->name('mahasiswa.show');

    // Hanya admin & dosen yang bisa CRUD (create/store/edit/update/destroy)
    Route::middleware('role:admin,dosen')->group(function () {
        Route::resource('/fakultas', FakultasController::class)->except(['index', 'show']);
        Route::resource('/prodi', ProdiController::class)->except(['index', 'show']);
        Route::resource('/mahasiswa', MahasiswaController::class)->except(['index', 'show']);
    });
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';
