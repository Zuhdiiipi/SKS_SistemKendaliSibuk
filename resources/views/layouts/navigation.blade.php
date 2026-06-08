<nav x-data="{ open: false }" class="bg-white/80 backdrop-blur-md border-b border-slate-200/60 sticky top-0 z-50 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex items-center">
                <!-- Logo Futuristik -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-2 group">
                        <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center transition-transform group-hover:scale-105 shadow-sm">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        </div>
                        <span class="text-2xl font-extrabold tracking-tight text-slate-900 transition-colors group-hover:text-blue-600">SKS<span class="text-blue-600">.</span></span>
                    </a>
                </div>

                <!-- Navigation Links (Desktop) -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex h-full items-center">
                    @if (Auth::user()->role_level === 'admin')
                        <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                            {{ __('Command Center') }}
                        </x-nav-link>

                        <x-nav-link href="{{ url('/users') }}" :active="request()->is('users*')">
                            {{ __('Kelola Pengguna') }}
                        </x-nav-link>
                    @else
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            {{ __('Ruang Kerja') }}
                        </x-nav-link>

                        <x-nav-link href="{{ url('/categories') }}" :active="request()->is('categories*')">
                            {{ __('Kategori Peran') }}
                        </x-nav-link>

                        <x-nav-link href="{{ url('/tasks') }}" :active="request()->is('tasks*')">
                            {{ __('Manajemen Tugas') }}
                        </x-nav-link>
                    @endif
                </div>
            </div>

            <!-- User Menu & Dropdown (Desktop) -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 py-2 border border-slate-200 text-sm leading-4 font-bold rounded-xl text-slate-700 bg-white hover:bg-slate-50 hover:text-blue-600 focus:outline-none transition ease-in-out duration-150 shadow-sm group">
                            <div class="flex items-center gap-3">
                                <span>{{ Auth::user()->name }}</span>

                                <!-- Badges Eksklusif -->
                                @if (Auth::user()->role_level === 'premium')
                                    <span class="bg-gradient-to-r from-amber-200 to-yellow-400 text-yellow-900 text-[10px] font-extrabold px-2.5 py-1 rounded-md uppercase tracking-wider shadow-sm border border-yellow-300/50">Premium</span>
                                @elseif(Auth::user()->role_level === 'admin')
                                    <span class="bg-gradient-to-r from-purple-500 to-indigo-500 text-white text-[10px] font-extrabold px-2.5 py-1 rounded-md uppercase tracking-wider shadow-sm border border-purple-400">Admin</span>
                                @else
                                    <span class="bg-slate-100 text-slate-600 border border-slate-200 text-[10px] font-extrabold px-2.5 py-1 rounded-md uppercase tracking-wider">Basic</span>
                                @endif
                            </div>

                            <div class="ms-2 text-slate-400 group-hover:text-blue-500 transition-colors">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="font-medium text-slate-700 hover:text-blue-600 hover:bg-slate-50">
                            {{ __('Pengaturan Profil') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();" 
                                    class="font-medium text-rose-600 hover:text-rose-700 hover:bg-rose-50">
                                {{ __('Akhiri Sesi (Keluar)') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger Button (Mobile) -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2.5 rounded-xl text-slate-500 bg-slate-50 border border-slate-200 hover:text-blue-600 hover:bg-blue-50 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu (Mobile) -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden bg-white border-b border-slate-200 shadow-lg absolute w-full">
        <div class="pt-2 pb-3 space-y-1">
            @if (Auth::user()->role_level === 'admin')
                <x-responsive-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                    {{ __('Command Center') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link href="{{ url('/users') }}" :active="request()->is('users*')">
                    {{ __('Kelola Pengguna') }}
                </x-responsive-nav-link>
            @else
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Ruang Kerja') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link href="{{ url('/categories') }}" :active="request()->is('categories*')">
                    {{ __('Kategori Peran') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link href="{{ url('/tasks') }}" :active="request()->is('tasks*')">
                    {{ __('Manajemen Tugas') }}
                </x-responsive-nav-link>
            @endif
        </div>

        <!-- Responsive User Options (Mobile) -->
        <div class="pt-4 pb-4 border-t border-slate-100 bg-slate-50">
            <div class="px-4 flex items-center justify-between">
                <div>
                    <div class="font-bold text-base text-slate-900">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-slate-500">{{ Auth::user()->email }}</div>
                </div>
                
                <!-- Badge Mobile -->
                @if (Auth::user()->role_level === 'premium')
                    <span class="bg-gradient-to-r from-amber-200 to-yellow-400 text-yellow-900 text-[10px] font-extrabold px-2.5 py-1 rounded-md uppercase tracking-wider shadow-sm border border-yellow-300/50">Premium</span>
                @elseif(Auth::user()->role_level === 'admin')
                    <span class="bg-gradient-to-r from-purple-500 to-indigo-500 text-white text-[10px] font-extrabold px-2.5 py-1 rounded-md uppercase tracking-wider shadow-sm border border-purple-400">Admin</span>
                @else
                    <span class="bg-slate-200 text-slate-700 border border-slate-300 text-[10px] font-extrabold px-2.5 py-1 rounded-md uppercase tracking-wider">Basic</span>
                @endif
            </div>

            <div class="mt-4 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="font-medium text-slate-700">
                    {{ __('Pengaturan Profil') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();"
                            class="font-medium text-rose-600">
                        {{ __('Akhiri Sesi (Keluar)') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>