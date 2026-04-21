<div class="relative p-8 rounded-[2.5rem] bg-white border border-slate-200 hover:shadow-2xl hover:shadow-slate-200 transition-all duration-500 group" data-aos="fade-up">
    {{-- Quotes Icon --}}
    <div class="absolute -top-4 left-8 transition-transform duration-500 group-hover:-translate-y-2">
        <div class="w-10 h-10 rounded-xl bg-emerald-500 flex items-center justify-center shadow-lg shadow-emerald-500/30">
            <i class="bi bi-quote text-white text-xl"></i>
        </div>
    </div>

    {{-- Content --}}
    <div class="flex flex-col h-full">
        <p class="text-slate-600 italic leading-relaxed mb-10 text-lg">
            "{{ $review->deskripsi }}"
        </p>

        <div class="mt-auto flex items-center space-x-4">
            <div class="w-12 h-12 rounded-full bg-slate-100 flex items-center justify-center border border-slate-200">
                <i class="bi bi-person-fill text-2xl text-slate-400"></i>
            </div>
            <div>
                <h5 class="font-bold text-slate-900 group-hover:text-emerald-600 transition-colors">
                    {{ $review->client->nama ?? 'Valued Client' }}
                </h5>
                <span class="text-xs font-bold text-slate-400 uppercase tracking-widest">
                    Verified Partner
                </span>
            </div>
        </div>
    </div>
</div>