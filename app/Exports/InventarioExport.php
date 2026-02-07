<?php

namespace App\Exports;

use App\Models\Inventario;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class InventarioExport implements FromCollection, WithHeadings
{
    protected $filters;

    public function __construct($filters = [])
    {
        $this->filters = $filters;
    }

    public function collection()
    {
        $query = Inventario::query();

    if (!empty($this->filters['descripcion'])) {
        $query->where('descripcion', 'like', '%' . $this->filters['descripcion'] . '%');
    }

    if (!empty($this->filters['ubicacion'])) {
        $query->where('ubicacion', 'like', '%' . $this->filters['ubicacion'] . '%');
    }

    return $query->get([
        'id', 'codigo', 'descripcion', 'cantidad', 'tipo', 'modelo', 'marca', 'valor', 'condicion', 'ubicacion'
    ]);
    }

    public function headings(): array
    {
        return [
            'ID',
        'Código',
        'Descripción',
        'Cantidad',
        'Tipo',
        'Modelo',
        'Marca',
        'Valor',
        'Condición',
        'Ubicación'
        ];
    }
}
