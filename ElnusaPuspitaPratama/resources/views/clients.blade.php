@extends('layout.main')
@section('title', 'Our Clients - ')
@section('content')

    {{-- Sub-Hero --}}
    <section class="pt-32 pb-20 bg-slate-900 relative overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <img src="https://images.unsplash.com/photo-1560179707-f14e90ef3623?w=1920" class="w-full h-full object-cover" alt="Clients Header">
        </div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
            <span class="inline-flex items-center rounded-full bg-emerald-500/10 px-3 py-1 text-xs font-medium text-emerald-400 ring-1 ring-inset ring-emerald-500/20 mb-6 uppercase tracking-wider">
                Our Partners
            </span>
            <h1 class="text-4xl md:text-6xl font-bold mb-6 tracking-tight">Trusted by Industry Leaders</h1>
            <p class="text-xl text-slate-300 max-w-2xl mx-auto font-light">
                Building lasting partnerships through quality, reliability, and unwavering commitment.
            </p>
        </div>
    </section>

    {{-- Clients / Reviews Section --}}
    <section id="clients-section" class="py-24 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20">
                <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-4">Client Testimonials</h2>
                <div class="h-1.5 w-24 bg-emerald-500 mx-auto rounded-full"></div>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-12">
                @foreach ($reviews as $review)
                    @include('card.reviewCard', ['review' => $review])
                @endforeach
            </div>

            @if($reviews->isEmpty())
                <div class="text-center py-20 bg-white rounded-[3rem] border border-dashed border-slate-300 shadow-sm">
                    <p class="text-slate-500 font-medium italic text-lg tracking-wide">No testimonials shared yet.</p>
                </div>
            @endif
        </div>
    </section>

@endsection
