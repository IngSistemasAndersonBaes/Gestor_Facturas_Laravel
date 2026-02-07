<x-layouts.app :title="__('Dashboard')">
    <div class="max-w-5xl mx-auto mt-10 space-y-8">
        {{-- Saludo dinámico --}}
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-3xl font-extrabold mb-1 drop-shadow" id="greeting"></h2>
                <p class="text-base opacity-90 text-zinc-700 dark:text-zinc-200">
                    Bienvenido, <span class="font-semibold">{{ auth()->user()->name ?? 'Administrador' }}</span>.  
                    Usa este panel para gestionar y consultar información clave de tu empresa.
                </p>
            </div>
            {{-- Boton de recarga --}}
            <button id="reload-dashboard" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow transition">
                <svg class="w-5 h-5 inline mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582M20 20v-5h-.581M5.635 19A9 9 0 1021 12.35" />
                </svg>
                Recargar datos
            </button>
        </div>

        {{-- Accesos rápidos --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <a href="{{ route('admin.factus.index') }}" class="group bg-white dark:bg-zinc-800 rounded-xl shadow p-6 flex flex-col items-center hover:scale-105 transition cursor-pointer border border-transparent hover:border-blue-400">
                <span class="bg-green-100 text-green-600 rounded-full p-3 mb-2 group-hover:bg-green-200 transition">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 7h18M3 12h18M3 17h18" />
                    </svg>
                </span>
                <div class="font-semibold">Facturas</div>
                <div class="text-xs text-zinc-500">Consulta, crea y exporta facturas</div>
            </a>
            <a href="{{ route('admin.inventarios.index') }}" class="group bg-white dark:bg-zinc-800 rounded-xl shadow p-6 flex flex-col items-center hover:scale-105 transition cursor-pointer border border-transparent hover:border-yellow-400">
                <span class="bg-yellow-100 text-yellow-600 rounded-full p-3 mb-2 group-hover:bg-yellow-200 transition">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20 13V7a2 2 0 00-2-2H6a2 2 0 00-2 2v6M9 17h6M12 14v3" />
                    </svg>
                </span>
                <div class="font-semibold">Inventario</div>
                <div class="text-xs text-zinc-500">Control y seguimiento de productos</div>
            </a>
            <a href="{{ route('settings.profile') }}" class="group bg-white dark:bg-zinc-800 rounded-xl shadow p-6 flex flex-col items-center hover:scale-105 transition cursor-pointer border border-transparent hover:border-blue-400">
                <span class="bg-blue-100 text-blue-600 rounded-full p-3 mb-2 group-hover:bg-blue-200 transition">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 17v-2a4 4 0 018 0v2M12 7a4 4 0 100 8 4 4 0 000-8z" />
                    </svg>
                </span>
                <div class="font-semibold">Perfil</div>
                <div class="text-xs text-zinc-500">Gestiona tu cuenta y seguridad</div>
            </a>
        </div>

        {{-- Estadísticas rápidas --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-gradient-to-r from-blue-500 to-indigo-500 rounded-xl shadow p-6 text-white flex flex-col items-center">
                <div class="text-2xl font-bold" id="facturas-count">--</div>
                <div class="text-sm">Facturas registradas</div>
            </div>
            <div class="bg-gradient-to-r from-green-400 to-green-600 rounded-xl shadow p-6 text-white flex flex-col items-center">
                <div class="text-2xl font-bold" id="inventario-count">--</div>
                <div class="text-sm">Productos en inventario</div>
            </div>
            <div class="bg-gradient-to-r from-yellow-400 to-yellow-600 rounded-xl shadow p-6 text-white flex flex-col items-center">
                <div class="text-2xl font-bold" id="proveedores-count">--</div>
                <div class="text-sm">Proveedores activos</div>
            </div>
        </div>
    </div>

    @push('js')
    <script>
        // Saludo dinámico según la hora
        function setGreeting() {
            const h = new Date().getHours();
            let saludo = '¡Bienvenido!';
            if (h >= 6 && h < 12) saludo = '¡Buenos días!';
            else if (h >= 12 && h < 19) saludo = '¡Buenas tardes!';
            else saludo = '¡Buenas noches!';
            document.getElementById('greeting').textContent = saludo;
        }
        setGreeting();

        // Cargar estadísticas desde el backend
        function cargarEstadisticas() {
            fetch("{{ route('dashboard.stats') }}", {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                document.getElementById('facturas-count').textContent = data.facturas ?? '--';
                document.getElementById('inventario-count').textContent = data.inventario ?? '--';
                document.getElementById('proveedores-count').textContent = data.proveedores ?? '--';
            })
            .catch(() => {
                document.getElementById('facturas-count').textContent = '--';
                document.getElementById('inventario-count').textContent = '--';
                document.getElementById('proveedores-count').textContent = '--';
            });
        }
        cargarEstadisticas();

        document.getElementById('reload-dashboard').addEventListener('click', function() {
            cargarEstadisticas();
        });
    </script>
    @endpush
</x-layouts.app>
