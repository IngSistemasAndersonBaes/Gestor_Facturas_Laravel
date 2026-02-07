<x-layouts.app>

    @push('css')
        <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">
    @endpush

    <flux:breadcrumbs class="mb-4">
            <flux:breadcrumbs.item :href="route('dashboard')">
                Dashboard
            </flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="{{ route('admin.factus.index') }}">
                Facturas
            </flux:breadcrumbs.item>
            <flux:breadcrumbs.item>
                Editar
            </flux:breadcrumbs.item>
            <div class="flex items-center ml-auto">
                <flux:button
                    variant="primary"
                    href="{{ route('admin.factus.index') }}"
                    class="btn btn-red"
                >
                    Regresar
                </flux:button>

                <flux:button
                    variant="primary"
                    href="{{ route('admin.factus.create') }}"
                    class="ml-2 btn btn-blue"
                >
                    Nuevo
                </flux:button>
            </div>
    </flux:breadcrumbs>


    <form action="{{route('admin.factus.update', $factu)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')


        <div class="card space-y-4 p-4">
                <flux:input label="Fecha"
                type="date"
                id="fecha" name="fecha"
                value="{{old('fecha', $factu->fecha->format('Y-m-d'))}}"
                placeholder="Escribe la Fecha de la factura"/>

                <flux:input
                label="Concepto"
                id="Concepto"
                name="Concepto"
                value="{{old('Concepto', $factu->Concepto)}}"
                placeholder="Escribe el concepto de la factura" />

                <flux:input
                label="Proveedor"
                id="proveedor"
                name="Proveedor"
                value="{{old('Proveedor', $factu->Proveedor)}}"
                placeholder="Escribe el proveedor de la factura" />

                <flux:input
                label="No Factura"
                id="No_Factura"
                name="No_Factura"
                value="{{old('No_Factura', $factu->No_Factura)}}"
                placeholder="Escribe el número de la factura" />

                <flux:input
                label="Monto"
                id="Monto"
                name="Monto"
                value="{{old('Monto', $factu->Monto)}}"
                placeholder="Escribe el monto de la factura" />

                <flux:input
                label="Tipo"
                id="Tipo"
                name="Tipo"
                value="{{old('Tipo', $factu->Tipo)}}"
                placeholder="Escribe el tipo de la factura" />

                </div>


                <div class="flex justify-end mt-4">
                    <flux:button variant="primary" type="submit">
                    Enviar
                    </flux:button>
                </div>

            </div>
        </form>

</x-layouts.app>
