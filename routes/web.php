<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\Admin\FactuController;
use App\Http\Controllers\Admin\InventarioController;

// 1. Redirección inicial
Route::get('/', function () {
    return view('welcome');
})->name('home');

// 2. Dashboard
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// 3. Tus Controladores
Route::get('/factus', [FactuController::class, 'index'])->name('factus.index');
Route::get('admin/inventarios/excel', [InventarioController::class, 'exportExcel'])->name('admin.inventarios.excel');
Route::get('admin/inventarios/pdf', [InventarioController::class, 'generatePdf'])->name('admin.inventarios.pdf');
Route::get('/admin/factus/excel', [FactuController::class, 'exportExcel'])->name('admin.factus.excel');

// --- 4. RUTAS DE AUTENTICACIÓN (PEGADAS DIRECTAMENTE AQUÍ) ---
// Esto elimina cualquier error de lectura de archivo
Route::middleware('guest')->group(function () {
    Volt::route('login', 'auth.login')->name('login');
    Volt::route('register', 'auth.register')->name('register');
    Volt::route('forgot-password', 'auth.forgot-password')->name('password.request');
    Volt::route('reset-password/{token}', 'auth.reset-password')->name('password.reset');
});

Route::middleware('auth')->group(function () {
    Volt::route('verify-email', 'auth.verify-email')->name('verification.notice');
    Volt::route('confirm-password', 'auth.confirm-password')->name('password.confirm');
});
