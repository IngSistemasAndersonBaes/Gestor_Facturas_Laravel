<?php

use App\Http\Controllers\Admin\FactuController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\Admin\InventarioController;

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

require __DIR__.'/auth.php';

// --- RUTA PARA VER USUARIOS REGISTRADOS ---
Route::get('/ver-usuarios', function() {
    try {
        // Busca todos los usuarios en la base de datos
        $usuarios = \App\Models\User::all();
        
        // Si la lista está vacía, avisa
        if ($usuarios->isEmpty()) {
            return "<h1>La tabla está vacía (0 usuarios)</h1>";
        }
        
        // Si hay datos, los muestra en formato JSON
        return $usuarios;
        
    } catch (\Exception $e) {
        return "Error al conectar con la BD: " . $e->getMessage();
    }
});

// --- RUTA PARA EJECUTAR SEEDERS MANUALMENTE ---
Route::get('/sembrar-ahora', function() {
    try {
        // Ejecutamos el comando db:seed a la fuerza
        \Illuminate\Support\Facades\Artisan::call('db:seed', ['--force' => true]);
        return "<h1>✅ ¡ÉXITO! Seeders ejecutados.</h1><p>Ahora intenta entrar al login.</p>";
    } catch (\Exception $e) {
        return "<h1>❌ Error:</h1><p>" . $e->getMessage() . "</p>";
    }
});