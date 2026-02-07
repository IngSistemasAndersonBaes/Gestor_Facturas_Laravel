<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factu extends Model
{
    /** @use HasFactory<\Database\Factories\FactuFactory> */
    use HasFactory;

    protected $fillable = [
        'fecha',
        'Concepto',
        'Proveedor',
        'No_Factura',
        'Monto',
        'Tipo',
    ];
    protected $casts = [
        'fecha' => 'date',
        'Monto' => 'float',
    ];

    public function getRouteKeyName()
    {
        return 'No_Factura';
    }
}
