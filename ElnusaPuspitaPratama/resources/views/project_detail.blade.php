@extends('layout.main')
@section('title', $project->project_name . ' - ')
@section('content')

    {{-- Sub-Hero --}}
    <section class="pt-32 pb-20 bg-slate-900 relative overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <img src="{{ $project->display_image }}" class="w-full h-full object-cover" alt="{{ $project->project_name }}">
        </div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-white">
            <div class="flex flex-wrap items-center gap-3 mb-6">
                <span class="inline-flex items-center rounded-full bg-emerald-500/10 px-3 py-1 text-xs font-semibold text-emerald-400 ring-1 ring-inset ring-emerald-500/20 uppercase tracking-wider">
                    Project Detail
                </span>
                <span class="inline-flex items-center rounded-full px-3 py-1 text-xs font-semibold uppercase tracking-wider border {{ $project->status === 'completed' ? 'border-emerald-500 text-emerald-400 bg-emerald-500/10' : 'border-indigo-500 text-indigo-400 bg-indigo-500/10' }}">
                    {{ $project->status }}
                </span>
            </div>
            <h1 class="text-4xl md:text-6xl font-extrabold mb-6 tracking-tight leading-tight max-w-4xl">
                {{ $project->project_name }}
            </h1>
            <p class="text-xl text-slate-300 max-w-2xl font-light italic">
                <i class="bi bi-geo-alt-fill text-emerald-500 mr-2"></i> {{ $project->address }}
            </p>
        </div>
    </section>

    {{-- Project Content --}}
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-3 gap-16 items-start">
                
                {{-- Main Gallery & Desc --}}
                <div class="lg:col-span-2 space-y-12">
                    <div class="rounded-[3rem] overflow-hidden shadow-2xl group relative" data-aos="zoom-in" id="project-slider">
                        <!-- Image Container -->
                        <div class="flex transition-transform duration-700 ease-in-out h-[500px]" id="slider-track">
                            @foreach($project->all_display_images as $img)
                                <img src="{{ $img }}" class="w-full h-full object-cover shrink-0" alt="{{ $project->project_name }} Image">
                            @endforeach
                        </div>
                        
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/40 to-transparent pointer-events-none"></div>
                        
                        @if(count($project->all_display_images) > 1)
                        <!-- Controls -->
                        <button id="slider-prev" class="absolute top-1/2 -translate-y-1/2 left-4 w-12 h-12 bg-white/20 hover:bg-emerald-500 text-white rounded-full flex items-center justify-center backdrop-blur-md transition-all opacity-0 group-hover:opacity-100 z-10">
                            <i class="bi bi-chevron-left text-xl"></i>
                        </button>
                        <button id="slider-next" class="absolute top-1/2 -translate-y-1/2 right-4 w-12 h-12 bg-white/20 hover:bg-emerald-500 text-white rounded-full flex items-center justify-center backdrop-blur-md transition-all opacity-0 group-hover:opacity-100 z-10">
                            <i class="bi bi-chevron-right text-xl"></i>
                        </button>

                        <!-- Dots -->
                        <div class="absolute bottom-6 left-1/2 -translate-x-1/2 flex space-x-2 z-10">
                            @foreach($project->all_display_images as $idx => $img)
                                <button class="slider-dot h-2 rounded-full transition-all duration-300 {{ $idx === 0 ? 'bg-emerald-400 w-6' : 'bg-white/50 w-2' }}" data-index="{{ $idx }}"></button>
                            @endforeach
                        </div>
                        @endif
                    </div>

                    <div class="prose prose-slate lg:prose-xl max-w-none" data-aos="fade-up">
                        <h3 class="text-2xl font-bold text-slate-900 mb-6">About this Project</h3>
                        <p class="text-slate-600 leading-relaxed text-lg">
                            {{ $project->description }}
                        </p>
                    </div>
                </div>

                {{-- Sidebar Info --}}
                <aside class="space-y-8 sticky top-32" data-aos="fade-left">
                    <div class="p-8 rounded-[2.5rem] bg-slate-50 border border-slate-100 shadow-sm transition-all hover:shadow-xl hover:shadow-slate-200/50">
                        <h4 class="text-lg font-bold text-slate-900 mb-8 uppercase tracking-widest text-center border-b border-slate-200 pb-4">
                            Project Vitils
                        </h4>
                        
                        <div class="space-y-6">
                            <div class="flex items-center space-x-4">
                                <div class="w-10 h-10 rounded-xl bg-white shadow-sm border border-slate-200 flex items-center justify-center">
                                    <i class="bi bi-briefcase text-emerald-500"></i>
                                </div>
                                <div class="flex-1">
                                    <span class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest">Client</span>
                                    <span class="text-slate-900 font-bold">{{ $project->client->nama }}</span>
                                </div>
                            </div>

                            <div class="flex items-center space-x-4">
                                <div class="w-10 h-10 rounded-xl bg-white shadow-sm border border-slate-200 flex items-center justify-center">
                                    <i class="bi bi-person text-emerald-500"></i>
                                </div>
                                <div class="flex-1">
                                    <span class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest">Project Manager</span>
                                    <span class="text-slate-900 font-bold">{{ $project->projectManager->nama }}</span>
                                </div>
                            </div>

                            <div class="flex items-center space-x-4">
                                <div class="w-10 h-10 rounded-xl bg-white shadow-sm border border-slate-200 flex items-center justify-center">
                                    <i class="bi bi-calendar-event text-emerald-500"></i>
                                </div>
                                <div class="flex-1">
                                    <span class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest">Timeline</span>
                                    <span class="text-slate-900 font-bold">
                                        {{ $project->start_date ? \Carbon\Carbon::parse($project->start_date)->format('M Y') : 'TBA' }} — {{ $project->deadline ? \Carbon\Carbon::parse($project->deadline)->format('M Y') : 'TBA' }}
                                    </span>
                                </div>
                            </div>

                            <div class="flex items-center space-x-4">
                                <div class="w-10 h-10 rounded-xl bg-slate-900 flex items-center justify-center">
                                    <i class="bi bi-currency-dollar text-emerald-400"></i>
                                </div>
                                <div class="flex-1">
                                    <span class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest">Valuation</span>
                                    <span class="text-slate-900 font-black text-lg">
                                        Rp {{ number_format($project->budget, 0, ',', '.') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Contact CTA --}}
                    <div class="p-8 rounded-[2.5rem] bg-emerald-600 text-white shadow-2xl shadow-emerald-500/30 overflow-hidden relative group">
                        <div class="absolute -right-4 -bottom-4 opacity-10 transition-transform duration-700 group-hover:scale-110">
                            <i class="bi bi-lightning-fill text-[8rem]"></i>
                        </div>
                        <h4 class="text-xl font-bold mb-4 relative z-10">Have a similar project in mind?</h4>
                        <p class="text-emerald-100 text-sm mb-6 relative z-10">Let's discuss how our professional engineering team can help you achieve excellence.</p>
                        <a href="{{ route('contact') }}" class="inline-flex items-center justify-center px-6 py-3 bg-white text-emerald-600 font-bold rounded-xl hover:bg-emerald-50 transition-colors relative z-10">
                            CONTACT US NOW
                        </a>
                    </div>
                </aside>
            </div>
        </div>
    </section>

    {{-- Related Projects --}}
    @if(!$relatedProjects->isEmpty())
    <section class="py-24 bg-slate-50 border-t border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-slate-900 mb-4 tracking-tight">Related Explorations</h2>
                <div class="h-1 w-20 bg-emerald-500 mx-auto rounded-full"></div>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-12">
                @foreach ($relatedProjects as $relProject)
                    @include('card.projectCard', ['project' => $relProject])
                @endforeach
            </div>
        </div>
    </section>
    @endif

<script>
document.addEventListener('DOMContentLoaded', () => {
    const track = document.getElementById('slider-track');
    if (!track) return;
    
    const slides = track.children;
    if (slides.length <= 1) return;

    const prevBtn = document.getElementById('slider-prev');
    const nextBtn = document.getElementById('slider-next');
    const dots = document.querySelectorAll('.slider-dot');
    const sliderContainer = document.getElementById('project-slider');

    let currentIndex = 0;
    let autoPlayInterval;

    function goToSlide(index) {
        currentIndex = index;
        if (currentIndex < 0) currentIndex = slides.length - 1;
        if (currentIndex >= slides.length) currentIndex = 0;
        
        track.style.transform = `translateX(-${currentIndex * 100}%)`;
        
        dots.forEach((dot, idx) => {
            if (idx === currentIndex) {
                dot.classList.remove('bg-white/50', 'w-2');
                dot.classList.add('bg-emerald-400', 'w-6');
            } else {
                dot.classList.remove('bg-emerald-400', 'w-6');
                dot.classList.add('bg-white/50', 'w-2');
            }
        });
    }

    function nextSlide() { goToSlide(currentIndex + 1); }
    function prevSlide() { goToSlide(currentIndex - 1); }

    function startAutoPlay() {
        autoPlayInterval = setInterval(nextSlide, 3000);
    }
    function stopAutoPlay() {
        clearInterval(autoPlayInterval);
    }

    prevBtn.addEventListener('click', () => { prevSlide(); stopAutoPlay(); startAutoPlay(); });
    nextBtn.addEventListener('click', () => { nextSlide(); stopAutoPlay(); startAutoPlay(); });
    
    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => { goToSlide(index); stopAutoPlay(); startAutoPlay(); });
    });

    sliderContainer.addEventListener('mouseenter', stopAutoPlay);
    sliderContainer.addEventListener('mouseleave', startAutoPlay);

    // Initial Start
    startAutoPlay();
});
</script>

@endsection
