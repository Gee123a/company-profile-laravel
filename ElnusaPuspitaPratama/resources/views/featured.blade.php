@extends('layout.main')

@section('title', 'Featured Projects | ')

@section('content')
<div class="relative min-h-screen bg-slate-950 text-slate-100 overflow-hidden">
    <!-- Blueprint Grid Background -->
    <div class="absolute inset-0 z-0 opacity-20" 
         style="background-image: 
            linear-gradient(rgba(59, 130, 246, 0.2) 1px, transparent 1px),
            linear-gradient(90deg, rgba(59, 130, 246, 0.2) 1px, transparent 1px);
            background-size: 40px 40px;">
    </div>
    
    <!-- Hero Section -->
    <div class="relative z-10 pt-32 pb-20 px-6 max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-8 mb-16">
            <div data-aos="fade-right">
                <span class="inline-block px-3 py-1 mb-4 text-xs font-mono tracking-widest uppercase border border-blue-500/50 text-blue-400 bg-blue-500/10">
                    Project Showcase v2.0
                </span>
                <h1 class="text-5xl md:text-7xl font-bold tracking-tight text-white mb-6">
                    Featured <span class="text-blue-500">Engineering</span><br>Excellence
                </h1>
                <p class="max-w-xl text-slate-400 text-lg leading-relaxed">
                    A curated selection of our most ambitious infrastructure and industrial projects, showcasing precision, safety, and technical mastery.
                </p>
            </div>
            <div class="hidden md:block text-right font-mono text-sm text-slate-500" data-aos="fade-left">
                <div>COORD: 06°12'S / 106°49'E</div>
                <div>ALTITUDE: 12.4m</div>
                <div>SYSTEM_ACTIVE: TRUE</div>
            </div>
        </div>

        <!-- Featured Projects Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            @foreach($featuredProjects as $index => $project)
            <div class="group relative" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                <!-- Project Dossier Card -->
                <div class="relative bg-slate-900/80 border border-slate-800 p-1 backdrop-blur-xl transition-all duration-500 group-hover:border-blue-500/50 overflow-hidden">
                    
                    <!-- Top Corner Accent -->
                    <div class="absolute top-0 right-0 w-16 h-16 border-t-2 border-r-2 border-blue-500/30 transition-all duration-500 group-hover:border-blue-500"></div>
                    
                    <!-- Project Image -->
                    <div class="relative aspect-[16/9] overflow-hidden grayscale group-hover:grayscale-0 transition-all duration-700">
                        <img src="{{ $project->display_image }}" alt="{{ $project->project_name }}" class="w-full h-full object-cover scale-105 group-hover:scale-100 transition-transform duration-700">
                        
                        <!-- Overlay Details (Hover) -->
                        <div class="absolute inset-0 bg-slate-950/60 opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex flex-col justify-end p-8">
                            <div class="translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                                <div class="flex items-center gap-4 mb-4">
                                    <span class="px-2 py-1 bg-orange-600 text-[10px] font-bold uppercase tracking-tighter">
                                        {{ $project->status }}
                                    </span>
                                    <span class="text-xs font-mono text-blue-400">
                                        REF: {{ str_pad($project->id, 4, '0', STR_PAD_LEFT) }}
                                    </span>
                                </div>
                                <p class="text-slate-300 text-sm line-clamp-2 mb-4">
                                    {{ $project->description }}
                                </p>
                                <a href="{{ route('projects.show', $project->id) }}" class="inline-flex items-center text-sm font-bold text-white hover:text-blue-400 transition-colors">
                                    VIEW FULL DOSSIER <i class="bi bi-arrow-right ml-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Bottom Info Bar -->
                    <div class="p-6 bg-slate-900 flex flex-col md:flex-row md:items-center justify-between gap-4">
                        <div>
                            <h3 class="text-2xl font-bold text-white group-hover:text-blue-400 transition-colors mb-1">
                                {{ $project->project_name }}
                            </h3>
                            <div class="text-xs font-mono text-slate-500 uppercase tracking-widest">
                                CLIENT: {{ $project->client->name ?? 'N/A' }}
                            </div>
                        </div>
                        <div class="flex items-center gap-6">
                            <div class="text-right">
                                <div class="text-[10px] font-mono text-slate-500 uppercase">Est. Budget</div>
                                <div class="text-lg font-bold text-orange-500 italic">
                                    Rp {{ number_format($project->budget, 0, ',', '.') }}
                                </div>
                            </div>
                            <div class="w-12 h-12 rounded-full border border-slate-700 flex items-center justify-center text-slate-400 group-hover:border-blue-500/50 group-hover:text-blue-400 transition-all">
                                <i class="bi bi-gear-fill animate-spin-slow"></i>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Background Shadow Glow -->
                <div class="absolute -inset-2 bg-blue-500/5 blur-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-700 -z-10"></div>
            </div>
            @endforeach
        </div>

        <!-- Pagination/Footer -->
        <div class="mt-24 pt-12 border-t border-slate-800/50 flex flex-col md:flex-row justify-between items-center gap-8 text-slate-500 font-mono text-xs">
            <div class="flex items-center gap-8">
                <span>VERSION: 4.12.0</span>
                <span>DB_SYNC: OK</span>
                <span class="flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
                    LIVE_CONNECTION
                </span>
            </div>
            <div class="flex items-center gap-4">
                <a href="{{ route('projects.index') }}" class="hover:text-white transition-colors">ALL PROJECTS</a>
                <span>/</span>
                <a href="#" class="hover:text-white transition-colors">TECHNICAL SPECS</a>
            </div>
        </div>
    </div>
</div>

<style>
    @keyframes spin-slow {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
    .animate-spin-slow {
        animation: spin-slow 8s linear infinite;
    }
</style>
@endsection
