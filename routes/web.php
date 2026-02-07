<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Admin\FactuController;
use App\Http\Controllers\Admin\InventarioController;

/* |--------------------------------------------------------------------------
| HERRAMIENTA DE REPARACIÓN (Ejecuta esto si algo falla)
|--------------------------------------------------------------------------
*/
Route::get('/reparar-sistema', function() {
    // 1. Limpiar todas las cachés
    Artisan::call('optimize:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    
    // 2. Publicar archivos de Livewire (para arreglar el error de livewire.js)
    Artisan::call('livewire:publish', ['--assets' => true]);
    
    // 3. Ejecutar migraciones de base de datos
    Artisan::call('migrate', ['--force' => true]);

    return "<h1>✅ SISTEMA REPARADO EXITOSAMENTE</h1><p>Caché borrada, Assets publicados, BD migrada.</p><a href='/login'>IR AL LOGIN</a>";
});

/* |--------------------------------------------------------------------------
| RUTAS DE AUTENTICACIÓN (Definidas manualmente para asegurar carga)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    // Apuntamos DIRECTAMENTE a tu archivo: resources/views/livewire/auth/login.blade.php
    // Usamos 'auth.login' porque tu carpeta es 'livewire/auth'
    Volt::route('login', 'auth.login')->name('login');
});

/* |--------------------------------------------------------------------------
| TUS RUTAS PRINCIPALES
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Tus controladores (tal como los tenías)
Route::get('/factus', [FactuController::class, 'index'])->name('factus.index');
Route::get('admin/inventarios/excel', [InventarioController::class, 'exportExcel'])->name('admin.inventarios.excel');
Route::get('admin/inventarios/pdf', [InventarioController::class, 'generatePdf'])->name('admin.inventarios.pdf');
Route::get('/admin/factus/excel', [FactuController::class, 'exportExcel'])->name('admin.factus.excel');

// Mantenemos esto por si acaso, pero la ruta manual de arriba tiene prioridad
require __DIR__.'/auth.php';