@extends('layout.main')
@section('title', 'Our Team - ')
@section('content')

    {{-- Sub-Hero --}}
    <section class="pt-32 pb-20 bg-emerald-950 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <img src="https://images.unsplash.com/photo-1521737711867-e3b97375f902?w=1920" class="w-full h-full object-cover" alt="Team Header">
        </div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
            <span class="inline-flex items-center rounded-full bg-emerald-500/10 px-3 py-1 text-xs font-medium text-emerald-400 ring-1 ring-inset ring-emerald-500/20 mb-6 uppercase tracking-wider">
                Our Leadership
            </span>
            <h1 class="text-4xl md:text-6xl font-bold mb-6 tracking-tight">Meet the Experts</h1>
            <p class="text-xl text-slate-300 max-w-2xl mx-auto font-light">
                Leadership that drives innovation and engineering excellence in every project we undertake.
            </p>
        </div>
    </section>

    {{-- Team Grid --}}
    <section id="team-section" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-12">
                @foreach ($employees as $employee)
                    @include('card.teamCard', ['employee' => $employee])
                @endforeach
            </div>

            @if($employees->isEmpty())
                <div class="text-center py-20 bg-slate-50 rounded-[3rem] border border-dashed border-slate-300">
                    <p class="text-slate-500 font-medium italic text-lg tracking-wide">No team members listed yet.</p>
                </div>
            @endif
        </div>
    </section>

@endsection
