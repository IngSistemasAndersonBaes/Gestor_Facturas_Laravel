<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inventario;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\InventarioExport;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Inventario::query();

        if ($request->filled('descripcion')) {
            $query->where('descripcion', 'like', '%' . $request->descripcion . '%');
        }

        if ($request->filled('ubicacion')) {
            $query->where('ubicacion', 'like', '%' . $request->ubicacion . '%');
        }

        $inventarios = $query->get();

        // Si es AJAX, solo retorna la tabla
        if ($request->ajax()) {
            return view('admin.inventarios.partials.table', compact('inventarios'))->render();
        }

        return view('admin.inventarios.index', compact('inventarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.inventarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'codigo' => 'required|string|unique:inventarios,codigo',
            'descripcion' => 'nullable|string|max:255',
            'cantidad' => 'required|integer|min:0',
            'tipo' => 'required|in:general,electrico,mueble,maquinaria,herramienta,otro',
            'modelo' => 'nullable|string|max:100',
            'marca' => 'nullable|string|max:100',
            'valor' => 'required|numeric|min:0',
            'condicion' => 'required|in:bueno,regular,descompuesto',
            'ubicacion' => 'nullable|string|max:100',
        ]);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Inventario creado exitosamente',
            'text' => 'El inventario ha sido registrado correctamente.'
        ]);

        $inventario = Inventario::create($data);

        return redirect()->route('admin.inventarios.index', $inventario);
    }

    /**
     * Display the specified resource.
     */
    public function show(Inventario $inventario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inventario $inventario)
    {
        return view('admin.inventarios.edit', compact('inventario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inventario $inventario)
    {
        $data = $request->validate([
            'codigo' => 'required|string|unique:inventarios,codigo,' . $inventario->id,
            'descripcion' => 'nullable|string|max:255',
            'cantidad' => 'required|float|min:0',
            'tipo' => 'required|in:general,electrico,mueble,maquinaria,herramienta,otro',
            'modelo' => 'nullable|string|max:100',
            'marca' => 'nullable|string|max:100',
            'valor' => 'required|numeric|min:0',
            'condicion' => 'required|in:bueno,regular,descompuesto',
            'ubicacion' => 'nullable|string|max:100',
        ]);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Inventario actualizado exitosamente',
            'text' => 'El inventario ha sido actualizado correctamente.'
        ]);

        $inventario->update($data);

        return redirect()->route('admin.inventarios.index', $inventario);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inventario $inventario)
    {
        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Inventario eliminado exitosamente',
            'text' => 'El inventario ha sido eliminado correctamente.'
        ]);

        $inventario->delete();

        return redirect()->route('admin.inventarios.index');
    }

    /**
     * Export the inventory to a CSV file.
     */
   public function exportExcel(Request $request)
    {
        return Excel::download(new InventarioExport($request->all()), 'inventarios_' . date('Ymd_His') . '.xlsx');
    }

    public function generatePdf(Request $request)
    {
        $query = Inventario::query();

        if ($request->filled('descripcion')) {
            $query->where('descripcion', 'like', '%' . $request->descripcion . '%');
        }

        if ($request->filled('ubicacion')) {
            $query->where('ubicacion', 'like', '%' . $request->ubicacion . '%');
        }

        $inventarios = $query->get();

        // Verifica si hay datos antes de generar el PDF
        if ($inventarios->isEmpty()) {
            return redirect()->back()->with('error', 'No se encontraron inventarios con los criterios seleccionados.');
        }

        $pdf = Pdf::loadView('admin.inventarios.pdf', compact('inventarios'));

        // Descargar el PDF con un nombre específico
        return $pdf->download('inventarios_' . date('Ymd_His') . '.pdf');
    }

}


