<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Factu;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\FactuExport;

class FactuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Factu::query();

        if ($request->ajax()) {
            if ($request->filled('fecha_inicio') && $request->filled('fecha_fin')) {
                $query->whereBetween('fecha', [$request->fecha_inicio, $request->fecha_fin]);
            }

            $factus = $query->get();

            return view('admin.factus.partials.table', compact('factus'));
        }

        $factus = $query->get();

        return view('admin.factus.index', compact('factus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.factus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'fecha' => 'required|date',
            'Concepto' => 'required|string|max:255',
            'Proveedor' => 'required|string|max:255',
            'No_Factura' => 'required|string|unique:factus,No_Factura',
            'Monto' => 'required|numeric',
            'Tipo' => 'required|string|max:255',
        ]);

        $data['fecha'] = Carbon::parse($data['fecha'])->format('Y-m-d');

        $factu = Factu::create($data);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Factura guardada',
            'text' => 'La factura se guardo correctamente.',
        ]);

        return redirect()->route('admin.factus.edit', $factu);
    }

    /**
     * Display the specified resource.
     */
    public function show(Factu $factu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Factu $factu)
    {
        return view('admin.factus.edit', compact('factu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Factu $factu)
    {
        $data = $request->validate([
            'fecha' => 'required|date',
            'Concepto' => 'required|string|max:255',
            'Proveedor' => 'required|string|max:255',
            'No_Factura' => 'required|string|unique:factus,No_Factura,' . $factu->id,
            'Monto' => 'required|numeric',
            'Tipo' => 'required|string|max:255',
        ]);

        $data['fecha'] = Carbon::parse($data['fecha'])->format('Y-m-d');

        $factu->update($data);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Factura actualizada',
            'text' => 'La factura se actualizo correctamente.',
        ]);

        return redirect()->route('admin.factus.edit', $factu);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Factu $factu)
    {
        $factu->delete();

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Factura eliminada',
            'text' => 'La factura se elimino correctamente.',
        ]);

        return redirect()->route('admin.factus.index');
    }

    /**
     * Generate PDF for the specified resource.
     */

     public function generatePdf(Request $request)
     {
         $query = Factu::query();

         // Filtrar por fechas si están presentes
         if ($request->filled('fecha_inicio') && $request->filled('fecha_fin')) {
             $query->whereBetween('fecha', [$request->fecha_inicio, $request->fecha_fin]);
         }

         $factus = $query->get();

         // Verifica si hay datos antes de generar el PDF
         if ($factus->isEmpty()) {
             return redirect()->back()->with('error', 'No se encontraron facturas en el rango de fechas seleccionado.');
         }

         $pdf = Pdf::loadView('admin.factus.pdf', compact('factus'));

         // Descargar el PDF con un nombre específico
         return $pdf->download('listado-de-facturas-' . now()->format('Y-m-d') . '.pdf');
     }

     public function exportExcel(Request $request)
     {
         return Excel::download(new FactuExport($request->all()), 'facturas_' . date('Ymd_His') . '.xlsx');
     }

}
