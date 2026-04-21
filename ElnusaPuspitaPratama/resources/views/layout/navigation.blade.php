<nav x-data="{ mobileMenuOpen: false }" 
     class="fixed top-0 z-50 w-full border-b border-white/10 bg-slate-900/80 backdrop-blur-md transition-all duration-300"
     id="mainNav">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-20 items-center justify-between">
            {{-- Logo --}}
            <div class="flex-shrink-0">
                <a href="/" class="group flex items-center space-x-2">
                    <span class="text-2xl font-bold tracking-tight text-white">
                        <span class="text-emerald-500 group-hover:text-emerald-400 transition-colors">ELNUSA</span>
                        <span class="font-light">Puspita Pratama</span>
                    </span>
                </a>
            </div>

            {{-- Desktop Navigation --}}
            <div class="hidden md:block">
                <div class="flex items-baseline space-x-1">
                    @foreach([
                        '/' => 'Home',
                        '/project' => 'Projects',
                        '/contact' => 'Contact Us',
                    ] as $url => $label)
                        <a href="{{ $url }}" 
                           class="rounded-lg px-4 py-2 text-sm font-medium transition-all duration-200 
                           {{ Request::is($url === '/' ? '/' : trim($url, '/').'*') 
                              ? 'bg-emerald-500/10 text-emerald-400 shadow-[inset_0_0_12px_rgba(16,185,129,0.1)]' 
                              : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">
                            {{ $label }}
                        </a>
                    @endforeach
                </div>
            </div>

            {{-- Mobile menu button --}}
            <div class="flex md:hidden">
                <button @click="mobileMenuOpen = !mobileMenuOpen" 
                        class="inline-flex items-center justify-center rounded-lg p-2 text-slate-400 hover:bg-white/5 hover:text-white focus:outline-none">
                    <span class="sr-only">Open main menu</span>
                    <i class="bi" :class="mobileMenuOpen ? 'bi-x-lg' : 'bi-list'" style="font-size: 1.5rem;"></i>
                </button>
            </div>
        </div>
    </div>

    {{-- Mobile menu --}}
    <div x-show="mobileMenuOpen" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         class="md:hidden border-t border-white/10 bg-slate-900/95 backdrop-blur-xl">
        <div class="space-y-1 px-4 py-6">
            @foreach([
                '/' => 'Home',
                '/project' => 'Projects',
                '/contact' => 'Contact Us',
            ] as $url => $label)
                <a href="{{ $url }}" 
                   class="block rounded-lg px-4 py-3 text-base font-medium transition-colors
                   {{ Request::is($url === '/' ? '/' : trim($url, '/').'*') 
                      ? 'bg-emerald-500/10 text-emerald-400' 
                      : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">
                    {{ $label }}
                </a>
            @endforeach
        </div>
    </div>
</nav>
