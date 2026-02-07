<?php

use App\Http\Controllers\Admin\FactuController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\Admin\InventarioController;
use Illuminate\Support\Facades\Artisan;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/factus', [FactuController::class, 'index'])->name('factus.index');

/* Ruta para el pdf */
Route::get('/admin/factus/pdf', [App\Http\Controllers\Admin\FactuController::class, 'generatePdf'])->name('admin.factus.pdf.test');


Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');

    Route::get('/dashboard/stats', function () {
        return response()->json([
            'facturas' => \App\Models\Factu::count(),
            'inventario' => \App\Models\Inventario::count(),
        ]);
    })->name('dashboard.stats');
});

/* ruta para archivo excel  */
Route::get('admin/inventarios/excel', [InventarioController::class, 'exportExcel'])->name('admin.inventarios.excel');

// Ruta para exportar PDF de inventario
Route::get('admin/inventarios/pdf', [InventarioController::class, 'generatePdf'])->name('admin.inventarios.pdf');

Route::get('/admin/factus/excel', [FactuController::class, 'exportExcel'])->name('admin.factus.excel');

// --- 1. RUTA DE EMERGENCIA (Para arreglar el error 404) ---
Route::get('/fix-404', function() {
    Artisan::call('optimize:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('config:clear');
    return "<h1>✅ SISTEMA REPARADO: Caché borrada. Intenta entrar al Login ahora.</h1>";
});

// --- 2. RUTA MANUAL DE LOGIN (Para asegurar que funcione) ---
Route::middleware('guest')->group(function () {
    // Apuntamos directamente a 'auth.login' que es tu carpeta real
    Volt::route('login', 'auth.login')->name('login');
});

require __DIR__.'/auth.php';