<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <title>{{ $title ?? config('app.name', 'Sistema de Inventario y Facturación') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        @stack('css')

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @fluxAppearance

        <style>
            body {
                background: linear-gradient(135deg, #f8fafc 0%, #e0e7ef 100%);
            }
            .hero {
                background: linear-gradient(120deg, #2563eb 0%, #38bdf8 100%);
                color: #fff;
                border-radius: 1.5rem;
                box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.15);
                padding: 3rem 2rem;
                margin-bottom: 2rem;
                text-align: center;
            }
            .hero-title {
                font-size: 2.5rem;
                font-weight: 700;
                margin-bottom: 1rem;
            }
            .hero-desc {
                font-size: 1.25rem;
                font-weight: 400;
                margin-bottom: 2rem;
            }
            .feature-card {
                background: #fff;
                border-radius: 1rem;
                box-shadow: 0 2px 8px 0 rgba(31, 38, 135, 0.07);
                padding: 2rem 1.5rem;
                text-align: center;
                transition: transform 0.2s;
            }
            .feature-card:hover {
                transform: translateY(-4px) scale(1.03);
                box-shadow: 0 8px 24px 0 rgba(31, 38, 135, 0.12);
            }
            .feature-icon {
                font-size: 2.5rem;
                margin-bottom: 1rem;
                color: #2563eb;
            }
            .feature-title {
                font-size: 1.2rem;
                font-weight: 600;
                margin-bottom: 0.5rem;
            }
            .feature-desc {
                font-size: 1rem;
                color: #64748b;
            }
        </style>
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
        <flux:header container class="border-b border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

            <a href="{{ route('dashboard') }}" class="ms-2 me-5 flex items-center space-x-2 rtl:space-x-reverse lg:ms-0" wire:navigate>
                <x-app-logo />
            </a>

            <flux:navbar class="-mb-px max-lg:hidden">

            </flux:navbar>

            <flux:spacer />

            <!-- Desktop & Mobile User Menu Mejorado -->
            <div class="flex items-center gap-4">
                @auth
                    <div class="hidden md:flex items-center gap-3">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=2563eb&color=fff&rounded=true&size=48" alt="Avatar" class="w-10 h-10 rounded-full shadow border-2 border-blue-200">
                        <div class="flex flex-col text-end">
                            <span class="font-semibold text-blue-900 dark:text-white">{{ auth()->user()->name }}</span>
                            <span class="text-xs text-blue-600 dark:text-blue-200">{{ auth()->user()->email }}</span>
                        </div>
                        <flux:dropdown position="top" align="end">
                            <flux:button class="ml-2 bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded transition shadow" icon="chevron-down">
                                Menú
                            </flux:button>
                            <flux:menu>
                                <flux:menu.radio.group>
                                    <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>Configuración</flux:menu.item>
                                </flux:menu.radio.group>
                                <flux:menu.separator />
                                @if(auth()->user()->isAdmin())
                                    <flux:menu.radio.group>
                                        <flux:menu.item :href="route('admin.factus.index')" icon="layout-grid" wire:navigate>Admin</flux:menu.item>
                                    </flux:menu.radio.group>
                                    <flux:menu.separator />
                                @endif
                                <form method="POST" action="{{ route('logout') }}" class="w-full">
                                    @csrf
                                    <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                                        Cerrar sesión
                                    </flux:menu.item>
                                </form>
                            </flux:menu>
                        </flux:dropdown>
                    </div>
                    <!-- Mobile User Menu -->
                    <div class="md:hidden flex items-center gap-2">
                        <flux:dropdown position="top" align="end">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=2563eb&color=fff&rounded=true&size=40" alt="Avatar" class="w-9 h-9 rounded-full shadow border-2 border-blue-200">
                            <flux:menu>
                                <flux:menu.radio.group>
                                    <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>Configuración</flux:menu.item>
                                </flux:menu.radio.group>
                                <flux:menu.separator />

                                    <flux:menu.radio.group>
                                        <flux:menu.item :href="route('admin.factus.index')" icon="layout-grid" wire:navigate>Admin</flux:menu.item>
                                    </flux:menu.radio.group>

                                    <flux:menu.separator />
                                <form method="POST" action="{{ route('logout') }}" class="w-full">
                                    @csrf
                                    <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                                        Cerrar sesión
                                    </flux:menu.item>
                                </form>
                            </flux:menu>
                        </flux:dropdown>
                    </div>
                @else
                    <div class="hidden md:flex items-center gap-2">
                        <a href="{{ route('login') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow transition flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6A2.25 2.25 0 005.25 5.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M18.75 12l-3-3m0 0l3 3m-3-3v6" />
                            </svg>
                            Iniciar sesión
                        </a>
                    </div>
                    <div class="md:hidden flex items-center gap-2">
                        <a href="{{ route('login') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1.5 rounded-lg shadow transition flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6A2.25 2.25 0 005.25 5.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M18.75 12l-3-3m0 0l3 3m-3-3v6" />
                            </svg>
                        </a>
                    </div>
                @endauth
            </div>
        </flux:header>

        <!-- Mobile Menu -->
        <flux:sidebar stashable sticky class="lg:hidden border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

            <a href="{{ route('dashboard') }}" class="ms-1 flex items-center space-x-2 rtl:space-x-reverse" wire:navigate>
                <x-app-logo />
            </a>

            <flux:navlist variant="outline">
                <flux:navlist.group :heading="__('Platform')">

                </flux:navlist.group>
            </flux:navlist>

            <flux:spacer />

            <flux:navlist variant="outline">
                <flux:navlist.item icon="folder-git-2" href="https://github.com/laravel/livewire-starter-kit" target="_blank">
                {{ __('Repository') }}
                </flux:navlist.item>

                <flux:navlist.item icon="book-open-text" href="https://laravel.com/docs/starter-kits" target="_blank">
                {{ __('Documentation') }}
                </flux:navlist.item>
            </flux:navlist>
        </flux:sidebar>


        <flux:main>
            <div class="max-w-4xl mx-auto mt-10">
                <div class="hero">
                    <div class="hero-title">Sistema de Inventario y Facturación</div>
                    <div class="hero-desc">
                        Administra tu inventario, controla tus productos y genera facturas de manera sencilla y eficiente.<br>
                        Optimiza la gestión de tu negocio con una plataforma moderna y fácil de usar.
                    </div>
                    <a href="{{ route('login') }}" class="inline-block bg-white text-blue-700 font-semibold px-6 py-2 rounded-lg shadow hover:bg-blue-100 transition">Iniciar sesión</a>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="feature-card">
                        <div class="feature-icon">📦</div>
                        <div class="feature-title">Gestión de Inventario</div>
                        <div class="feature-desc">Registra, edita y controla el stock de tus productos de forma centralizada y segura.</div>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">🧾</div>
                        <div class="feature-title">Facturación Rápida</div>
                        <div class="feature-desc">Genera facturas profesionales y lleva el control de tus ventas fácilmente.</div>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">📊</div>
                        <div class="feature-title">Reportes y Estadísticas</div>
                        <div class="feature-desc">Visualiza reportes claros sobre tu inventario y facturación para tomar mejores decisiones.</div>
                    </div>
                </div>
            </div>
            {{ $slot }}
        </flux:main>

        @fluxScripts

        @stack('js')


        @if (session('swal'))

            <script>
                Swal.fire(@json(session('swal')));
            </script>

        @endif
    </body>
</html>
