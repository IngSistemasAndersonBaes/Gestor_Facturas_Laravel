<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    /** @use HasFactory<\Database\Factories\InventarioFactory> */
    use HasFactory;

    protected $fillable = [
        'codigo',
        'descripcion',
        'cantidad',
        'tipo',
        'modelo',
        'marca',
        'valor',
        'condicion',
        'ubicacion',
    ];

    protected $casts = [
        'cantidad' => 'integer',
        'valor' => 'integer',
    ];

    public function getRouteKeyName()
    {
        return 'codigo';
    }

}
