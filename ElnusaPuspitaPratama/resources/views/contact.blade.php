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

                    <form action="{{ route('contact') }}" method="POST" class="space-y-6">
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
                                <option>New Project Inquiry</option>
                                <option>General Consultation</option>
                                <option>Request Quote</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-wide">Your Message</label>
                            <textarea name="message" required rows="6" class="w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-4 focus:border-emerald-500 focus:ring-emerald-500 transition-all" placeholder="Tell us about your project..."></textarea>
                        </div>
                        <button type="submit" class="w-full bg-emerald-500 text-slate-950 font-bold py-5 rounded-2xl hover:bg-emerald-400 transition-all shadow-xl shadow-emerald-500/20">
                            SEND MESSAGE
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
                                <a href="mailto:hrd.elnusaapp@gmail.com" class="text-indigo-600 font-semibold hover:underline">hrd.elnusaapp@gmail.com</a>
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
