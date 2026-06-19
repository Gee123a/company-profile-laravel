@extends('layout.main')
@section('title', 'Home - ')
@section('content')

    {{-- Hero Section --}}
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden bg-slate-950">
        {{-- Background Image --}}
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-slate-950/60 z-10"></div>
            <img src="https://images.unsplash.com/photo-1541888946425-d81bb19240f5?w=1920" 
                 class="w-full h-full object-cover" 
                 alt="Construction Site">
        </div>

        {{-- Content --}}
        <div class="relative z-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div data-aos="fade-right">
                    <span class="inline-flex items-center rounded-full bg-emerald-500/10 px-3 py-1 text-sm font-medium text-emerald-400 ring-1 ring-inset ring-emerald-500/20 mb-6 uppercase tracking-wider">
                        ESTABLISHED 2018
                    </span>
                    <h1 class="text-5xl md:text-7xl font-bold text-white leading-tight mb-8">
                        Building the <span class="text-emerald-500">Future</span> with Precision
                    </h1>
                    <p class="text-xl text-slate-300 mb-10 max-w-xl">
                        General Contractor & Engineering Services focused on high-quality delivery, 
                        technical excellence, and unwavering trust.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <a href="#about" class="rounded-full bg-emerald-500 px-8 py-4 text-sm font-bold text-slate-950 hover:bg-emerald-400 transition-all shadow-lg shadow-emerald-500/20">
                            START A PROJECT
                        </a>
                        <a href="/project" class="rounded-full bg-white/10 px-8 py-4 text-sm font-bold text-white hover:bg-white/20 transition-all backdrop-blur-md">
                            VIEW PORTFOLIO
                        </a>
                    </div>
                </div>

                {{-- Visual Card --}}
                <div class="hidden lg:block" data-aos="fade-left" data-aos-delay="200">
                    <div class="relative p-1 rounded-[2.5rem] bg-gradient-to-br from-emerald-500/30 to-slate-900/10 backdrop-blur-2xl ring-1 ring-white/20">
                        <div class="bg-slate-950/80 rounded-[2.3rem] overflow-hidden p-8 border border-white/5">
                            <h2 class="text-3xl font-bold text-white mb-4">Elnusa Puspita Pratama</h2>
                            <p class="text-slate-400 mb-8">Professional Construction & Engineering Excellence.</p>
                            
                            <div class="space-y-6">
                                <div class="flex items-center space-x-4 p-4 rounded-2xl bg-white/5 border border-white/10">
                                    <div class="flex-shrink-0 w-12 h-12 rounded-xl bg-emerald-500/20 flex items-center justify-center">
                                        <i class="bi bi-shield-check text-emerald-400 text-xl"></i>
                                    </div>
                                    <div>
                                        <h4 class="text-white font-semibold">Safety First</h4>
                                        <p class="text-sm text-slate-500">Zero accidents, top tier protocols.</p>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-4 p-4 rounded-2xl bg-white/5 border border-white/10">
                                    <div class="flex-shrink-0 w-12 h-12 rounded-xl bg-blue-500/20 flex items-center justify-center">
                                        <i class="bi bi-clock-history text-blue-400 text-xl"></i>
                                    </div>
                                    <div>
                                        <h4 class="text-white font-semibold">On-Time Delivery</h4>
                                        <p class="text-sm text-slate-500">Reliable project management.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Scroll Down --}}
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce">
            <a href="#about" class="text-white/30 hover:text-white transition-colors">
                <i class="bi bi-chevron-down text-3xl"></i>
            </a>
        </div>
    </section>

    {{-- About / Stats Section --}}
    <section id="about" class="py-24 bg-white relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div data-aos="fade-up">
                    <h2 class="text-indigo-600 font-bold tracking-widest text-sm mb-4">WHO WE ARE</h2>
                    <h3 class="text-4xl md:text-5xl font-bold text-slate-900 mb-8 leading-tight">
                        5 Years of Excellence in Modern Infrastructure
                    </h3>
                    <p class="text-lg text-slate-600 mb-8">
                        We are more than just a contractor. We are a team of dedicated professionals 
                        committed to bringing architectural visions to life with safety, precision, 
                        and sustainable practices.
                    </p>
                    
                    <div class="grid grid-cols-2 gap-8">
                        <div>
                            <div class="text-4xl font-bold text-slate-900 mb-2">10+</div>
                            <div class="text-sm text-slate-500 uppercase tracking-widest">Active Projects</div>
                        </div>
                        <div>
                            <div class="text-4xl font-bold text-slate-900 mb-2">100%</div>
                            <div class="text-sm text-slate-500 uppercase tracking-widest">Success Rate</div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4" data-aos="fade-left">
                    <img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=800" 
                         class="w-full h-64 object-cover rounded-3xl" alt="Construction detail">
                    <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?w=800" 
                         class="w-full h-64 object-cover rounded-3xl mt-8" alt="Engineer at work">
                </div>
            </div>
        </div>
    {{-- Featured Projects Section --}}
    @if(isset($featuredProjects) && $featuredProjects->isNotEmpty())
    <section class="py-24 bg-slate-50 border-t border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-emerald-600 font-bold tracking-widest text-sm mb-4 uppercase">Portfolio</h2>
                <h3 class="text-4xl font-bold text-slate-900 mb-4">Featured Projects</h3>
                <p class="text-slate-500 max-w-xl mx-auto">Explore some of our largest and most complex construction and engineering achievements.</p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($featuredProjects as $project)
                    @include('card.projectCard', ['project' => $project])
                @endforeach
            </div>

            <div class="text-center mt-12">
                <a href="/project" class="inline-flex items-center space-x-2 rounded-full bg-emerald-500 px-8 py-4 text-sm font-bold text-slate-950 hover:bg-emerald-400 transition-all shadow-lg shadow-emerald-500/10">
                    <span>VIEW ALL PROJECTS</span>
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>
    @endif

    {{-- Client Testimonials Section --}}
    @if(isset($reviews) && $reviews->isNotEmpty())
    <section class="py-24 bg-slate-900 text-white relative overflow-hidden">
        <div class="absolute inset-0 z-0 opacity-10">
            <img src="https://images.unsplash.com/photo-1541976590-713941681591?w=1920" class="w-full h-full object-cover" alt="Background">
        </div>
        
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-emerald-400 font-bold tracking-widest text-sm mb-4 uppercase">Testimonials</h2>
                <h3 class="text-4xl font-bold text-white mb-4">What Our Clients Say</h3>
                <p class="text-slate-400 max-w-xl mx-auto">We build relationships based on transparency, consistency, and professional execution.</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($reviews as $review)
                    <div class="p-8 rounded-[2rem] bg-white/5 border border-white/10 backdrop-blur-md flex flex-col justify-between" data-aos="fade-up">
                        <div>
                            <div class="text-emerald-400 text-3xl mb-4">“</div>
                            <p class="text-slate-300 italic mb-8 leading-relaxed">
                                {{ $review->deskripsi }}
                            </p>
                        </div>
                        <div class="flex items-center space-x-4 border-t border-white/10 pt-6">
                            <div class="w-10 h-10 rounded-full bg-emerald-500/20 flex items-center justify-center text-emerald-400 font-bold uppercase">
                                {{ substr($review->nama_client, 0, 1) }}
                            </div>
                            <div>
                                <h4 class="font-bold text-white text-sm">{{ $review->nama_client }}</h4>
                                <p class="text-xs text-slate-400">{{ $review->jabatan }}, {{ $review->perusahaan }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

@endsection
