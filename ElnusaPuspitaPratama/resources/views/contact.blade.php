@extends('layout.main')
@section('title', 'Contact Us - ')
@section('content')

    {{-- Sub-Hero --}}
    <section class="pt-32 pb-20 bg-slate-900 relative overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <img src="https://images.unsplash.com/photo-1423666639041-f56000c27a9a?w=1920" class="w-full h-full object-cover" alt="Contact Header">
        </div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
            <span class="inline-flex items-center rounded-full bg-emerald-500/10 px-3 py-1 text-xs font-medium text-emerald-400 ring-1 ring-inset ring-emerald-500/20 mb-6 uppercase tracking-wider">
                Get In Touch
            </span>
            <h1 class="text-4xl md:text-6xl font-bold mb-6 tracking-tight">Let's Build Together</h1>
            <p class="text-xl text-slate-300 max-w-2xl mx-auto font-light">
                We're here to help bring your vision to life with professional engineering and construction services.
            </p>
        </div>
    </section>

    {{-- Contact Section --}}
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16">
                {{-- Form Column --}}
                <div data-aos="fade-right">
                    <h2 class="text-3xl font-bold text-slate-900 mb-8">Send us a Message</h2>
                    @if(session('success'))
                        <div class="mb-8 p-6 rounded-2xl bg-emerald-50 border border-emerald-100 flex items-start" data-aos="fade-down">
                            <i class="bi bi-check-circle-fill text-emerald-500 text-xl mr-4 mt-0.5"></i>
                            <div>
                                <h4 class="font-bold text-emerald-900 mb-1">Message Sent!</h4>
                                <p class="text-emerald-700">{{ session('success') }}</p>
                            </div>
                        </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-wide">Full Name</label>
                                <input type="text" name="name" required class="w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-4 focus:border-emerald-500 focus:ring-emerald-500 transition-all" placeholder="John Doe">
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-wide">Email Address</label>
                                <input type="email" name="email" required class="w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-4 focus:border-emerald-500 focus:ring-emerald-500 transition-all" placeholder="john@example.com">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-wide">Subject</label>
                            <select name="subject" required class="w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-4 focus:border-emerald-500 focus:ring-emerald-500 transition-all">
                                <option value="Request Quotation">Request Quotation & Engineering Estimate</option>
                                <option value="New Project Inquiry">New Project Inquiry</option>
                                <option value="General Consultation">General Consultation</option>
                            </select>
                        </div>

                        {{-- 3 Data Inputs for Quotation Specification --}}
                        <div class="p-6 rounded-3xl bg-slate-50 border border-slate-200/80 space-y-5">
                            <div class="flex items-center space-x-2 pb-2 border-b border-slate-200">
                                <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 inline-block"></span>
                                <h3 class="text-xs font-bold uppercase tracking-wider text-slate-900">Spesifikasi Kebutuhan Quotation (3 Data Kebutuhan)</h3>
                            </div>

                            {{-- Data 1: Jenis Layanan --}}
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1.5 uppercase tracking-wide">1. Jenis Layanan (Service Type)</label>
                                <select name="service_type" required class="w-full rounded-xl border-slate-200 bg-white px-4 py-3 text-sm focus:border-emerald-500 focus:ring-emerald-500 transition-all">
                                    <option value="Konstruksi Bangunan Sipil & Komersial">Konstruksi Bangunan Sipil & Komersial</option>
                                    <option value="Mechanical, Electrical & Plumbing (MEP)">Mechanical, Electrical & Plumbing (MEP)</option>
                                    <option value="Perencanaan Desain Arsitektur & Interior">Perencanaan Desain Arsitektur & Interior</option>
                                    <option value="Renovasi & Rekayasa Struktur">Renovasi & Rekayasa Struktur</option>
                                </select>
                            </div>

                            {{-- Data 2: Skala Proyek / Anggaran --}}
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1.5 uppercase tracking-wide">2. Skala & Estimasi Anggaran (Project Scale & Budget)</label>
                                <select name="project_scale" required class="w-full rounded-xl border-slate-200 bg-white px-4 py-3 text-sm focus:border-emerald-500 focus:ring-emerald-500 transition-all">
                                    <option value="Skala Menengah (Rp 500 Juta - Rp 2 Miliar)">Skala Menengah (Rp 500 Juta - Rp 2 Miliar)</option>
                                    <option value="Skala Kecil (< Rp 500 Juta)">Skala Kecil (< Rp 500 Juta)</option>
                                    <option value="Skala Besar / Enterprise (> Rp 2 Miliar)">Skala Besar / Enterprise (> Rp 2 Miliar)</option>
                                    <option value="Konsultasi Kelayakan / Custom">Konsultasi Kelayakan / Custom</option>
                                </select>
                            </div>

                            {{-- Data 3: Target Timeline Pengerjaan --}}
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1.5 uppercase tracking-wide">3. Target Timeline Pengerjaan</label>
                                <select name="timeline" required class="w-full rounded-xl border-slate-200 bg-white px-4 py-3 text-sm focus:border-emerald-500 focus:ring-emerald-500 transition-all">
                                    <option value="Standar Operasional (3 - 6 Bulan)">Standar Operasional (3 - 6 Bulan)</option>
                                    <option value="Segera / Fast Track (1 - 3 Bulan)">Segera / Fast Track (1 - 3 Bulan)</option>
                                    <option value="Proyek Multi-Tahap (> 6 Bulan)">Proyek Multi-Tahap (> 6 Bulan)</option>
                                    <option value="Fleksibel / Sesuai Rekomendasi">Fleksibel / Sesuai Rekomendasi</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-wide">Deskripsi Kebutuhan Tambahan (Your Message)</label>
                            <textarea name="message" required rows="4" class="w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-4 focus:border-emerald-500 focus:ring-emerald-500 transition-all" placeholder="Ceritakan detail spesifikasi atau lokasi proyek..."></textarea>
                        </div>

                        <button type="submit" class="w-full bg-emerald-500 text-slate-950 font-bold py-5 rounded-2xl hover:bg-emerald-400 transition-all shadow-xl shadow-emerald-500/20 flex items-center justify-center space-x-2">
                            <span>KIRIM PERMINTAAN & DAPATKAN QUOTATION</span>
                            <i class="bi bi-send-fill text-sm"></i>
                        </button>
                    </form>
                </div>

                {{-- Info Column --}}
                <div data-aos="fade-left">
                    <h2 class="text-3xl font-bold text-slate-900 mb-8">Contact Information</h2>
                    <div class="space-y-8">
                        {{-- Office --}}
                        <div class="flex items-start p-8 rounded-3xl bg-slate-50 border border-slate-100">
                            <div class="flex-shrink-0 w-12 h-12 rounded-xl bg-emerald-500/10 flex items-center justify-center mr-6">
                                <i class="bi bi-geo-alt-fill text-emerald-600 text-xl"></i>
                            </div>
                            <div>
                                <h4 class="text-lg font-bold text-slate-900 mb-1">Head Office</h4>
                                <p class="text-slate-500 leading-relaxed">
                                    Jalan Manyar Kertoadi no 93<br>Surabaya, East Java, Indonesia
                                </p>
                            </div>
                        </div>

                        {{-- Connectivity --}}
                        <div class="grid sm:grid-cols-2 gap-6">
                            <div class="p-8 rounded-3xl bg-emerald-50 border border-emerald-100">
                                <i class="bi bi-telephone-fill text-2xl text-emerald-600 mb-4 block"></i>
                                <h4 class="font-bold text-slate-900 mb-1">Call Us</h4>
                                <a href="tel:+628811812904" class="text-emerald-600 font-semibold hover:underline">+62 88 1181 2904</a>
                            </div>
                            <div class="p-8 rounded-3xl bg-indigo-50 border border-indigo-100">
                                <i class="bi bi-envelope-fill text-2xl text-indigo-600 mb-4 block"></i>
                                <h4 class="font-bold text-slate-900 mb-1">Email Us</h4>
                                <a href="mailto:ivan@uccca.site" class="text-indigo-600 font-semibold hover:underline">ivan@uccca.site</a>
                            </div>
                        </div>

                        {{-- Hours --}}
                        <div class="p-8 rounded-3xl bg-slate-900 text-white">
                            <div class="flex items-center space-x-3 mb-4">
                                <i class="bi bi-clock-history text-emerald-400"></i>
                                <h4 class="font-bold uppercase tracking-widest text-xs">Operating Hours</h4>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-slate-400">Monday - Friday</span>
                                <span>08:00 AM - 05:00 PM</span>
                            </div>
                            <div class="flex justify-between text-sm mt-2">
                                <span class="text-slate-400">Saturday</span>
                                <span>08:00 AM - 12:00 PM</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Map Section --}}
    <section class="h-[500px] w-full relative">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d455.2231510277365!2d112.77185038652816!3d-7.280052460523613!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fa3129c99a4f%3A0x6d089073fc6ac2b6!2sJl.%20Manyar%20Kertoarjo%20No.93%2C%20RT.007%2FRW.11%2C%20Mojo%2C%20Kec.%20Gubeng%2C%20Surabaya%2C%20Jawa%20Timur%2060285!5e0!3m2!1sen!2sid!4v1760275044969!5m2!1sen!2sid"
            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy">
        </iframe>
    </section>

@endsection
