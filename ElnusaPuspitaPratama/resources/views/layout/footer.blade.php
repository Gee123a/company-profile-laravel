<footer class="bg-slate-950 text-white pt-24 pb-12 border-t border-white/5">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-16">
            {{-- Company Info --}}
            <div class="col-span-1 lg:col-span-1">
                <a href="/" class="group flex items-center space-x-2 mb-6">
                    <span class="text-2xl font-bold tracking-tight text-white">
                        <span class="text-emerald-500 group-hover:text-emerald-400 transition-colors">ELNUSA</span><br>
                        <span class="font-light">Puspita Pratama</span>
                    </span>
                </a>
                <p class="text-slate-400 text-sm leading-relaxed mb-8">
                    Your trusted partner in infrastructure and engineering. 
                    Building quality with integrity since 2018.
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center hover:bg-emerald-500 hover:text-slate-950 transition-all">
                        <i class="bi bi-linkedin"></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center hover:bg-emerald-500 hover:text-slate-950 transition-all">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center hover:bg-emerald-500 hover:text-slate-950 transition-all">
                        <i class="bi bi-envelope-fill"></i>
                    </a>
                </div>
            </div>

            {{-- Quick Links --}}
            <div>
                <h4 class="text-white font-bold mb-6 tracking-wider uppercase text-xs">Quick Navigation</h4>
                <ul class="space-y-4">
                    @foreach(['/' => 'Home', '/project' => 'Projects', '/contact' => 'Contact'] as $url => $label)
                        <li>
                            <a href="{{ $url }}" class="text-slate-400 hover:text-emerald-400 transition-colors text-sm flex items-center">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500/40 mr-3"></span>
                                {{ $label }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- Services --}}
            <div>
                <h4 class="text-white font-bold mb-6 tracking-wider uppercase text-xs">Expertise</h4>
                <ul class="space-y-4 text-slate-400 text-sm">
                    <li class="flex items-start">
                        <i class="bi bi-check2 text-emerald-500 mr-2"></i>
                        General Contracting
                    </li>
                    <li class="flex items-start">
                        <i class="bi bi-check2 text-emerald-500 mr-2"></i>
                        Structural Engineering
                    </li>
                    <li class="flex items-start">
                        <i class="bi bi-check2 text-emerald-500 mr-2"></i>
                        HVAC & MEP Systems
                    </li>
                    <li class="flex items-start">
                        <i class="bi bi-check2 text-emerald-500 mr-2"></i>
                        Interior Solutions
                    </li>
                </ul>
            </div>

            {{-- Contact --}}
            <div>
                <h4 class="text-white font-bold mb-6 tracking-wider uppercase text-xs">Office</h4>
                <div class="space-y-6 text-sm text-slate-400">
                    <div class="flex items-start space-x-3">
                        <i class="bi bi-geo-alt-fill text-emerald-500 text-lg"></i>
                        <span>Jalan Manyar Kertoadi no 93,<br>Surabaya, Indonesia</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <i class="bi bi-telephone-fill text-emerald-500 text-lg"></i>
                        <a href="tel:+628811812904" class="hover:text-white transition-colors">+62 88 1181 2904</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="pt-8 border-t border-white/5 flex flex-col md:flex-row justify-between items-center text-slate-500 text-xs tracking-widest uppercase">
            <p>&copy; {{ date('Y') }} Elnusa Puspita Pratama. All rights reserved.</p>
            <p class="mt-4 md:mt-0">Refined for Excellence</p>
        </div>
    </div>
</footer>
