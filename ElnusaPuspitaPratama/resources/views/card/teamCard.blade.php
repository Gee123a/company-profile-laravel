<div class="group relative flex flex-col h-full items-center p-8 rounded-[2.5rem] bg-white border border-slate-200 hover:shadow-2xl hover:shadow-slate-200 transition-all duration-500" data-aos="fade-up">
    {{-- Avatar --}}
    <div class="relative w-32 h-32 mb-8">
        <div class="absolute inset-0 rounded-full bg-gradient-to-tr from-emerald-500 to-indigo-600 animate-pulse opacity-20 group-hover:opacity-40 transition-opacity"></div>
        <div class="relative w-full h-full rounded-full overflow-hidden border-4 border-white shadow-xl">
            @if($employee->image_url)
                <img src="{{ asset($employee->image_url) }}" class="w-full h-full object-cover" alt="{{ $employee->nama }}">
            @else
                <div class="w-full h-full bg-slate-100 flex items-center justify-center">
                    <i class="bi bi-person-fill text-4xl text-slate-300"></i>
                </div>
            @endif
        </div>
    </div>

    {{-- Info --}}
    <div class="text-center">
        <h5 class="text-xl font-bold text-slate-900 mb-1 tracking-tight">{{ $employee->nama }}</h5>
        <span class="text-emerald-500 font-bold text-[10px] uppercase tracking-widest">{{ $employee->position }}</span>
        
        <div class="mt-8 space-y-3">
            <div class="flex items-center justify-center space-x-2 text-slate-500 text-sm">
                <i class="bi bi-envelope text-emerald-500"></i>
                <span>{{ $employee->email }}</span>
            </div>
            <div class="flex items-center justify-center space-x-2 text-slate-500 text-sm">
                <i class="bi bi-telephone text-emerald-500"></i>
                <span>{{ $employee->phone }}</span>
            </div>
        </div>
    </div>
</div>