<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FactuController;
use App\Http\Controllers\Admin\InventarioController;

Route::resource('factus', FactuController::class);
Route::resource('inventarios', InventarioController::class);

// Define la ruta para generar el PDF DENTRO del grupo 'admin'

