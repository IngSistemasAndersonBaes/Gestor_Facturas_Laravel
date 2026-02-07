<x-layouts.app>
    <div class="mb-4 flex justify-between items-center">
        <flux:breadcrumbs>
            <flux:breadcrumbs.item :href="route('dashboard')">
                Dashboard
            </flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="{{ route('admin.factus.index') }}">
                Facturas
            </flux:breadcrumbs.item>
            <flux:breadcrumbs.item>
                Agregar Factura
            </flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </div>

    {{-- Mostrar mensajes de sesión --}}
    @if(session('swal'))
        <div class="alert alert-success">
            {{ session('swal.text') }}
        </div>
    @endif

    <div class="card">
        <form action="{{ route('admin.factus.store') }}" method="POST" class="space-y-4 p-4">
            @csrf

            <div class="mb-4">
                <flux:input
                    label="Fecha"
                    type="date"
                    id="fecha"
                    name="fecha"
                    value="{{ old('fecha') }}"
                />

                <flux:input
                    label="Concepto"
                    id="Concepto"
                    name="Concepto"
                    value="{{ old('Concepto') }}"
                    placeholder="Escribe el concepto de la Factura"
                />

                <flux:input
                    label="Proveedor"
                    id="Proveedor"
                    name="Proveedor"
                    value="{{ old('Proveedor') }}"
                    placeholder="Escribe el nombre del Proveedor"
                />

                <flux:input
                    label="No. Factura"
                    type="text"
                    id="No_Factura"
                    name="No_Factura"
                    value="{{ old('No_Factura') }}"
                    placeholder="Escribe el número de la Factura"
                />

                <flux:input
                    label="Monto"
                    type="text"
                    id="Monto"
                    name="Monto"
                    value="{{ old('Monto') }}"
                    placeholder="Escribe el monto de la Factura"
                />

                <flux:input
                    label="Tipo"
                    type="text"
                    id="Tipo"
                    name="Tipo"
                    value="{{ old('Tipo') }}"
                    placeholder="Escribe el tipo de la Factura"
                />

                <div class="flex justify-end mt-4 space-x-5">

                    <flux:button class="btn-red" variant="primary">
                        <a href="{{ route('admin.factus.index') }}" class="text-white ">Cancelar</a>
                    </flux:button>

                    <flux:button variant="primary" type="submit">
                    Enviar
                    </flux:button>
                </div>
            </div>
        </form>
    </div>
</x-layouts.app>
