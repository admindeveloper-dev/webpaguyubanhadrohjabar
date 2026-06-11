<?php

use App\Http\Controllers\HadrohController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

// ==========================================
// 1. HALAMAN UTAMA / LANDING (Gambar 1)
// ==========================================
// Kita arahkan halaman utama langsung menampilkan form login resmi bawaan Breeze
Route::get('/', function () {
    return view('auth.login');
});

// ==========================================
// 2. ROUTE PENGUNJUNG ASLI (Gambar 4, 5, 6)
// ==========================================
Route::get('/pengunjung/list', [HadrohController::class, 'index'])->name('pengunjung.list');
Route::get('/pengunjung/hadroh/{id}', [HadrohController::class, 'show'])->name('pengunjung.detail');

// UPDATE: Route Baru Khusus untuk Halaman Galeri Dinamis sesuai konsep baru kita
Route::get('/pengunjung/hadroh/{id}/galeri', [HadrohController::class, 'galeri'])->name('pengunjung.galeri');

Route::get('/pengunjung/hadroh/{id}/order', [HadrohController::class, 'orderForm'])->name('pengunjung.order');
Route::post('/pengunjung/hadroh/{id}/order', [HadrohController::class, 'storeOrder'])->name('pengunjung.store-order');

// ==========================================
// 3. ROUTE ADMIN ASLI (Gambar 2 & 3) -> Wajib Login
// ==========================================
Route::middleware(['auth', 'verified'])->prefix('admin')->group(function () {
    // Halaman Dashboard Admin (Gambar 2)
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    // Halaman Form Tambah Data Grup (Gambar 3)
    Route::get('/hadroh/create', [AdminController::class, 'create'])->name('admin.hadroh.create');
    Route::post('/hadroh/store', [AdminController::class, 'store'])->name('admin.hadroh.store');
    
    // Fitur Tambahan: Edit & Hapus (CRUD Lengkap)
    Route::get('/hadroh/{id}/edit', [AdminController::class, 'edit'])->name('admin.hadroh.edit');
    Route::put('/hadroh/{id}/update', [AdminController::class, 'update'])->name('admin.hadroh.update');
    Route::delete('/hadroh/{id}/delete', [AdminController::class, 'destroy'])->name('admin.hadroh.delete');
});

// Memuat rute bawaan Laravel Breeze (Login, Register, Logout dll.)
require __DIR__.'/auth.php';

// ==========================================
// 4. RUTE TAMBAHAN (Solusi Error Redirect Breeze)
// ==========================================
Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->name('dashboard');