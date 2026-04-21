@extends('layout.main')
@section('title', 'Our Projects - ')
@section('content')

    {{-- Sub-Hero --}}
    <section class="pt-32 pb-20 bg-slate-950 relative overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <img src="https://images.unsplash.com/photo-1503387762-592deb58ef4e?w=1920" class="w-full h-full object-cover" alt="Projects Header">
        </div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
            <h1 class="text-4xl md:text-6xl font-bold mb-6">Our Portfolio</h1>
            <p class="text-xl text-slate-400 max-w-2xl mx-auto">
                Transforming visions into remarkable architectural achievements through technical excellence.
            </p>
        </div>
    </section>

    {{-- Featured Projects --}}
    @if($featuredProjects->isNotEmpty())
    <section class="py-24 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-end justify-between mb-12">
                <div>
                    <h2 class="text-indigo-600 font-bold tracking-widest text-sm mb-2 uppercase">Selection</h2>
                    <h3 class="text-3xl md:text-4xl font-bold text-slate-900">Featured Projects</h3>
                </div>
            </div>

            <div class="grid lg:grid-cols-2 gap-8">
                @foreach($featuredProjects as $featuredProject)
                    <div class="relative group h-[500px] rounded-[3rem] overflow-hidden shadow-2xl transition-all duration-700" data-aos="fade-up">
                        <img src="{{ $featuredProject->display_image }}" 
                             class="absolute inset-0 w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110" 
                             alt="{{ $featuredProject->project_name }}">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/40 to-transparent"></div>
                        
                        <div class="absolute bottom-0 left-0 right-0 p-10 transform transition-transform duration-500">
                            <div class="flex items-center space-x-2 mb-4">
                                <span class="bg-emerald-500 text-slate-950 text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-widest">
                                    Featured
                                </span>
                                <span class="bg-white/20 backdrop-blur-md text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-widest ring-1 ring-white/20">
                                    {{ $featuredProject->status }}
                                </span>
                            </div>
                            <h4 class="text-3xl font-bold text-white mb-4 group-hover:text-emerald-400 transition-colors">
                                {{ $featuredProject->project_name }}
                            </h4>
                            <p class="text-slate-300 text-sm mb-6 line-clamp-2 max-w-lg">
                                {{ $featuredProject->description }}
                            </p>
                            <a href="/project/{{ Str::slug($featuredProject->project_name) }}" 
                               class="inline-flex items-center space-x-2 text-white font-bold group/btn transition-all">
                                <span>VIEW PROJECT</span>
                                <i class="bi bi-arrow-right text-emerald-500 group-hover/btn:translate-x-2 transition-transform"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- All Projects Grid --}}
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-4">Complete Portfolio</h2>
                <p class="text-slate-500">A detailed lookup at our extensive history of successful builds.</p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($allProjects as $project)
                    @include('card.projectCard', ['project' => $project])
                @endforeach
            </div>

            @if($allProjects->isEmpty())
                <div class="text-center py-20 bg-slate-50 rounded-[3rem] border border-dashed border-slate-300">
                    <i class="bi bi-folder2-open text-5xl text-slate-300 mb-4 block"></i>
                    <p class="text-slate-500 font-medium italic text-lg">No projects recorded yet.</p>
                </div>
            @endif
        </div>
    </section>

@endsection