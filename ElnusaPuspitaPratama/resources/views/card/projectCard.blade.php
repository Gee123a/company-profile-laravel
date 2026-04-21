<div class="group relative flex flex-col h-full overflow-hidden rounded-[2rem] bg-white border border-slate-200 hover:shadow-2xl hover:shadow-slate-200 transition-all duration-500" data-aos="fade-up">
    {{-- Image Container --}}
    <div class="relative h-64 overflow-hidden">
        <img src="{{ $project->display_image }}" 
             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" 
             alt="{{ $project->project_name }}">
        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 to-transparent"></div>
        <div class="absolute top-4 left-4">
            <span class="rounded-full px-4 py-1.5 text-[10px] font-bold uppercase tracking-widest backdrop-blur-md 
                @if($project->status === 'completed') bg-emerald-500/80 text-white @else bg-amber-500/80 text-white @endif">
                {{ $project->status }}
            </span>
        </div>
    </div>

    {{-- Content --}}
    <div class="flex flex-col flex-grow p-8 bg-white">
        <h3 class="text-xl font-bold text-slate-900 mb-3 group-hover:text-emerald-600 transition-colors">
            {{ $project->project_name }}
        </h3>
        <p class="text-slate-500 text-sm mb-6 line-clamp-2">
            {{ $project->description }}
        </p>

        <div class="space-y-4 mb-8">
            <div class="flex items-center text-sm text-slate-600">
                <div class="w-8 h-8 rounded-lg bg-slate-100 flex items-center justify-center mr-3">
                    <i class="bi bi-geo-alt-fill text-slate-400"></i>
                </div>
                {{ $project->address }}
            </div>
            <div class="flex items-center text-sm text-slate-600">
                <div class="w-8 h-8 rounded-lg bg-slate-100 flex items-center justify-center mr-3">
                    <i class="bi bi-building text-slate-400"></i>
                </div>
                {{ $project->client->nama }}
            </div>
        </div>

        <div class="mt-auto pt-6 border-t border-slate-100 flex items-center justify-between">
            <div class="text-xs uppercase tracking-widest text-slate-400 font-bold">
                Budget <span class="text-slate-900 ml-1">Rp {{ number_format($project->budget / 1000000, 0) }}M</span>
            </div>
            <a href="/project/{{ Str::slug($project->project_name) }}" class="text-emerald-500 hover:text-emerald-600 transition-all">
                <i class="bi bi-arrow-right-circle-fill text-3xl"></i>
            </a>
        </div>
    </div>
</div>