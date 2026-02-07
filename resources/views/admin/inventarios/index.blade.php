<x-layouts.app>
        <div class="mb-4 flex justify-between items-center">
        <flux:breadcrumbs>
            <flux:breadcrumbs.item :href="route('dashboard')">
                Dashboard
            </flux:breadcrumbs.item>
            <flux:breadcrumbs.item>
                Inventario
            </flux:breadcrumbs.item>
        </flux:breadcrumbs>

        <div class="flex space-x-2 items-center">
            <select id="tipo_busqueda" class="form-input">
                <option value="descripcion">Buscar por descripción</option>
                <option value="ubicacion">Buscar por ubicación</option>
            </select>
            <input type="text" id="busqueda_descripcion" class="form-input" placeholder="Buscar por descripción">
            <input type="text" id="busqueda_ubicacion" class="form-input hidden" placeholder="Buscar por ubicación">
            <button id="buscar" class="btn btn-blue text-xs">Buscar</button>
            <button id="limpiar" class="btn btn-green text-xs">Limpiar</button>
        </div>
        <form id="export-forms" class="flex space-x-2 items-center" method="GET" style="display:inline;">
            <input type="hidden" name="descripcion" id="export_descripcion">
            <input type="hidden" name="ubicacion" id="export_ubicacion">
            <button type="submit" formaction="{{ route('admin.inventarios.excel') }}" class="btn btn-green text-xs">
                Exportar Excel
            </button>
            <button type="submit" formaction="{{ route('admin.inventarios.pdf') }}" class="btn btn-red text-xs" formtarget="_blank">Exportar PDF</button>
        </form>

        <a href="{{route('admin.inventarios.create')}}" class="btn btn-blue text-xs">
            Agregar
        </a>

@push('js')
<script>
    const tipoBusqueda = document.getElementById('tipo_busqueda');
    const inputDescripcion = document.getElementById('busqueda_descripcion');
    const inputUbicacion = document.getElementById('busqueda_ubicacion');
    const buscarBtn = document.getElementById('buscar');
    const limpiarBtn = document.getElementById('limpiar');
    // Inputs ocultos para exportar filtros
    const exportDescripcion = document.getElementById('export_descripcion');
    const exportUbicacion = document.getElementById('export_ubicacion');

    function syncExportInputs() {
        // Sincroniza los valores de los inputs de búsqueda con los de exportación
        exportDescripcion.value = inputDescripcion.value;
        exportUbicacion.value = inputUbicacion.value;
    }

    tipoBusqueda.addEventListener('change', function () {
        if (this.value === 'descripcion') {
            inputDescripcion.classList.remove('hidden');
            inputUbicacion.classList.add('hidden');
        } else {
            inputDescripcion.classList.add('hidden');
            inputUbicacion.classList.remove('hidden');
        }
        syncExportInputs();
    });

    [inputDescripcion, inputUbicacion].forEach(input => {
        input.addEventListener('input', syncExportInputs);
    });

    buscarBtn.addEventListener('click', function () {
        let descripcion = '';
        let ubicacion = '';
        if (tipoBusqueda.value === 'descripcion') {
            descripcion = inputDescripcion.value;
        } else {
            ubicacion = inputUbicacion.value;
        }
        // Sincroniza los filtros para exportar
        syncExportInputs();
        fetch(`{{ route('admin.inventarios.index') }}?descripcion=${encodeURIComponent(descripcion)}&ubicacion=${encodeURIComponent(ubicacion)}`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.text())
        .then(html => {
            document.getElementById('tabla-inventarios').innerHTML = html;
        })
        .catch(error => console.error('Error:', error));
    });

    limpiarBtn.addEventListener('click', function () {
        inputDescripcion.value = '';
        inputUbicacion.value = '';
        inputDescripcion.classList.remove('hidden');
        inputUbicacion.classList.add('hidden');
        tipoBusqueda.value = 'descripcion';
        syncExportInputs();
        // Recargar la tabla con todos los datos
        fetch(`{{ route('admin.inventarios.index') }}`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.text())
        .then(html => {
            document.getElementById('tabla-inventarios').innerHTML = html;
        })
        .catch(error => console.error('Error:', error));
    });

    // Inicializa los valores de exportación al cargar
    syncExportInputs();
</script>
@endpush
    </div>


    <div class="relative overflow-x-auto" id="tabla-inventarios">
        {{-- Aquí se cargará la tabla de inventarios dinámicamente --}}
        @include('admin.inventarios.partials.table', ['inventarios' => $inventarios])
    </div>


</x-layouts.app>
