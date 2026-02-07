<x-layouts.app>
    <div class="mb-4 flex justify-between items-center">
        <flux:breadcrumbs>
            <flux:breadcrumbs.item :href="route('dashboard')">
                Dashboard
            </flux:breadcrumbs.item>
            <flux:breadcrumbs.item>
                Facturas
            </flux:breadcrumbs.item>
        </flux:breadcrumbs>

        <div class="flex space-x-2">
            <input type="date" id="fecha_inicio" class="form-input" placeholder="Fecha inicio">
            <input type="date" id="fecha_fin" class="form-input" placeholder="Fecha fin">
            <button id="buscar" class="btn btn-blue text-xs">Buscar</button>
            <button id="limpiar" class="btn btn-green text-xs">Limpiar</button>
            <button id="generar-pdf" class="btn btn-red text-xs">Generar PDF</button>
            <button id="generar-excel" class="btn btn-green text-xs">
                Exportar Excel
            </button>
        </div>

        <a href="{{route('admin.factus.create')}}" class="btn btn-blue text-xs">
            Agregar
        </a>
    </div>

    <div class="relative overflow-x-auto" id="tabla-factus">
        {{-- Aquí se cargará la tabla de facturas dinámicamente --}}
        @include('admin.factus.partials.table', ['factus' => $factus])
    </div>

    @push('js')
<script>
    const buscarBtn = document.getElementById('buscar');
    const limpiarBtn = document.getElementById('limpiar');
    const generarPdfBtn = document.getElementById('generar-pdf');

    buscarBtn.addEventListener('click', function () {
        const fechaInicio = document.getElementById('fecha_inicio').value;
        const fechaFin = document.getElementById('fecha_fin').value;

        fetch(`{{ route('admin.factus.index') }}?fecha_inicio=${fechaInicio}&fecha_fin=${fechaFin}`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.text())
        .then(html => {
            document.getElementById('tabla-factus').innerHTML = html;
        })
        .catch(error => console.error('Error:', error));
    });

    limpiarBtn.addEventListener('click', function () {
        document.getElementById('fecha_inicio').value = '';
        document.getElementById('fecha_fin').value = '';

        // Recargar la tabla con todos los datos
        fetch(`{{ route('admin.factus.index') }}`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.text())
        .then(html => {
            document.getElementById('tabla-factus').innerHTML = html;
        })
        .catch(error => console.error('Error:', error));
    });

    generarPdfBtn.addEventListener('click', function () {
        const fechaInicio = document.getElementById('fecha_inicio').value;
        const fechaFin = document.getElementById('fecha_fin').value;

        const url = `/admin/factus/pdf?fecha_inicio=${fechaInicio}&fecha_fin=${fechaFin}`;
        console.log(url);
        window.location.href = url;
    });

    const generarExcelBtn = document.getElementById('generar-excel');
    generarExcelBtn.addEventListener('click', function (e) {
        e.preventDefault();
        const fechaInicio = document.getElementById('fecha_inicio').value;
        const fechaFin = document.getElementById('fecha_fin').value;
        let url = '/admin/factus/excel';
        const params = [];
        if (fechaInicio) params.push(`fecha_inicio=${encodeURIComponent(fechaInicio)}`);
        if (fechaFin) params.push(`fecha_fin=${encodeURIComponent(fechaFin)}`);
        if (params.length > 0) {
            url += '?' + params.join('&');
        }
        window.location.href = url;
    });
</script>
@endpush
</x-layouts.app>
