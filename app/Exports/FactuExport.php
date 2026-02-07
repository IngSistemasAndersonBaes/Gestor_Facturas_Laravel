<?php

namespace App\Exports;


use App\Models\Factu;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class FactuExport implements FromCollection, WithHeadings
{
    protected $filters;

    public function __construct($filters = [])
    {
        $this->filters = $filters;
    }

    public function collection()
    {
        $query = Factu::query();

        if (!empty($this->filters['fecha_inicio']) && !empty($this->filters['fecha_fin'])) {
            $query->whereBetween('fecha', [$this->filters['fecha_inicio'], $this->filters['fecha_fin']]);
        }

        return $query->get([
            'id', 'fecha', 'Concepto', 'Proveedor', 'No_Factura', 'Monto', 'Tipo'
        ]);
    }

    public function headings(): array
    {
        return [
            'ID',
            'Fecha',
            'Concepto',
            'Proveedor',
            'No. Factura',
            'Monto',
            'Tipo'
        ];
    }
}
