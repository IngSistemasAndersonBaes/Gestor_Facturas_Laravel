<x-layouts.app>
    <div class="mb-4 justify-between flex items-center">
        <flux:breadcrumbs>
            <flux:breadcrumbs.item :href="route('dashboard')">
                Dashboard
            </flux:breadcrumbs.item>
            <flux:breadcrumbs.item :href="route('admin.inventarios.index')">
                Inventario
            </flux:breadcrumbs.item>
            <flux:breadcrumbs.item>
                Editar Inventario
            </flux:breadcrumbs.item>

        </flux:breadcrumbs>
        <div class="flex items-center ml-auto">
                <flux:button
                    variant="primary"
                    href="{{ route('admin.inventarios.index') }}"
                    class="btn btn-red"
                >
                    Regresar
                </flux:button>

                <flux:button
                    variant="primary"
                    href="{{ route('admin.inventarios.create') }}"
                    class="ml-2 btn btn-blue"
                >
                    Nuevo
                </flux:button>
            </div>
    </div>

    <div class="card">
    <form action="{{ route('admin.inventarios.update', $inventario) }}" method="POST" class="space-y-4 p-4">
        @csrf
        @method('PUT')

        <div class="mb-4 grid grid-cols-2 gap-4">
            <flux:input
                label="Código"
                id="codigo"
                name="codigo"
                value="{{ old('codigo', $inventario->codigo) }}"
                placeholder="Escribe el código del producto"
                class="w-full"
            />

            <flux:input
                label="Descripción"
                id="descripcion"
                name="descripcion"
                value="{{ old('descripcion', $inventario->descripcion) }}"
                placeholder="Escribe la descripción del producto"
                class="w-full"
            />
        </div>

        <div class="mb-4 grid grid-cols-2 gap-4">
             <flux:input
                label="Cantidad"
                type="number"
                id="cantidad"
                name="cantidad"
                value="{{ old('cantidad', $inventario->cantidad) }}"
                placeholder="Escribe la cantidad del producto"
                class="w-full"
            />

            <flux:input
                label="Valor"
                type="number"
                id="valor"
                name="valor"
                value="{{ old('valor', $inventario->valor) }}"
                placeholder="Escribe el valor del producto"
                class="w-full"
            />

        </div>

        <div class="mb-4 grid grid-cols-3 gap-4">

            <div>
            <label for="tipo" class="block mb-1 font-medium">Tipo</label>
            <select id="tipo" name="tipo" class="w-full border rounded p-2">
                <option value="general" {{ old('tipo', $inventario->tipo) == 'general' ? 'selected' : '' }}>General</option>
                <option value="electrico" {{ old('tipo', $inventario->tipo) == 'electrico' ? 'selected' : '' }}>Eléctrico</option>
                <option value="mueble" {{ old('tipo', $inventario->tipo) == 'mueble' ? 'selected' : '' }}>Mueble</option>
                <option value="maquinaria" {{ old('tipo', $inventario->tipo) == 'maquinaria' ? 'selected' : '' }}>Maquinaria</option>
                <option value="herramienta" {{ old('tipo', $inventario->tipo) == 'herramienta' ? 'selected' : '' }}>Herramienta</option>
                <option value="otro" {{ old('tipo', $inventario->tipo) == 'otro' ? 'selected' : '' }}>Otro</option>
            </select>
            </div>

            <flux:input
                label="Marca"
                id="marca"
                name="marca"
                value="{{ old('marca', $inventario->marca) }}"
                placeholder="Escribe la marca del producto"
                class="w-full"
            />

            <flux:input
                label="Modelo"
                id="modelo"
                name="modelo"
                value="{{ old('modelo', $inventario->modelo) }}"
                placeholder="Escribe el modelo del producto"
                class="w-full"
            />

        </div>

        <div class="mb-4 grid grid-cols-2 gap-4">
            <div>
                <label for="condicion" class="block mb-1 font-medium">Condición</label>
                <select id="condicion" name="condicion" class="w-full border rounded p-2">
                    <option value="bueno" {{ old('condicion', $inventario->condicion) == 'bueno' ? 'selected' : '' }}>Bueno</option>
                    <option value="regular" {{ old('condicion', $inventario->condicion) == 'regular' ? 'selected' : '' }}>Regular</option>
                    <option value="descompuesto" {{ old('condicion', $inventario->condicion) == 'descompuesto' ? 'selected' : '' }}>Descompuesto</option>
                </select>
            </div>


            <flux:input
                label="Ubicación"
                id="ubicacion"
                name="ubicacion"
                value="{{ old('ubicacion', $inventario->ubicacion) }}"
                placeholder="Escribe la ubicación del producto"
                class="w-full"
            />

        </div>

        <div class="flex justify-end mt-4">
            <flux:button variant="primary" type="submit">
            Enviar
            </flux:button>
        </div>

    </form>
</div>

</x-layouts.app>
