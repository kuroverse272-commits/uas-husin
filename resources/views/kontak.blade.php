@extends('layouts.app')

@section('title', 'Hubungi Kami - Hotel Starking')

@section('content')
    <!-- Page Header -->
    <div class="bg-primary text-white py-12 relative overflow-hidden">
        <div class="absolute inset-0 opacity-15">
            <img src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?auto=format&fit=crop&w=1920&q=80" alt="Banner" class="w-full h-full object-cover">
        </div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-2">
            <span class="text-xs font-bold tracking-wider text-secondary uppercase">Hubungi Kami</span>
            <h1 class="text-3xl sm:text-4xl font-extrabold">Hubungi Hotel Starking</h1>
        </div>
    </div>

    <!-- Contact Form & Details -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            <!-- Contact Details -->
            <div class="lg:col-span-5 space-y-8">
                <div>
                    <h2 class="text-2xl font-bold text-primary mb-4">Informasi Kontak</h2>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        Kami selalu senang mendengar dari Anda. Silakan hubungi kami untuk pertanyaan tentang reservasi, fasilitas, acara, atau masukan berharga Anda.
                    </p>
                </div>

                <div class="space-y-6">
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-12 h-12 rounded-xl bg-primary/5 flex items-center justify-center text-primary text-xl">
                            <i class="fas fa-map-marker-alt text-secondary"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-sm text-primary mb-1">Lokasi Kami</h4>
                            <p class="text-xs text-gray-500 leading-relaxed">Jl. Starking No. 99, Dago, Bandung, Jawa Barat, Indonesia</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-12 h-12 rounded-xl bg-primary/5 flex items-center justify-center text-primary text-xl">
                            <i class="fas fa-phone-alt text-secondary"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-sm text-primary mb-1">Telepon & WhatsApp</h4>
                            <p class="text-xs text-gray-500 leading-relaxed">+62 22 1234567 / +62 812 3456 7890</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-12 h-12 rounded-xl bg-primary/5 flex items-center justify-center text-primary text-xl">
                            <i class="fas fa-envelope text-secondary"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-sm text-primary mb-1">Email Resmi</h4>
                            <p class="text-xs text-gray-500 leading-relaxed">info@hotelstarking.com / reservation@hotelstarking.com</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="lg:col-span-7 bg-white p-8 rounded-2xl border border-gray-100 shadow-md">
                <h3 class="text-xl font-bold text-primary mb-6">Kirim Pesan</h3>
                
                @if(session('success'))
                    <div class="p-4 mb-6 bg-green-50 text-green-700 text-sm font-semibold rounded-xl border border-green-200">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ url('/kontak') }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Nama Lengkap</label>
                            <input type="text" name="name" required class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Alamat Email</label>
                            <input type="email" name="email" required class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Subjek</label>
                        <input type="text" name="subject" required class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Pesan Anda</label>
                        <textarea name="message" rows="5" required class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm"></textarea>
                    </div>

                    <button type="submit" class="w-full py-4 bg-primary text-white font-bold rounded-xl hover:bg-primary/95 shadow-lg shadow-primary/20 transition duration-150 text-sm">
                        Kirim Pesan Sekarang
                    </button>
                </form>
            </div>
        </div>

        <!-- Google Maps Mock Frame -->
        <div class="mt-16 rounded-2xl overflow-hidden shadow-md border border-gray-100 h-96 bg-gray-100 relative flex items-center justify-center">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.034509539221!2d107.6146059758752!3d-6.886470093112521!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e657388cf631%3A0xc3cb7ec87b9607eb!2sJl.%20Ir.%20H.%20Juanda%20No.99%2C%20Lebakgede%2C%20Kecamatan%20Coblong%2C%20Kota%20Bandung%2C%20Jawa%20Barat%2040132!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid" 
                class="w-full h-full border-0 absolute inset-0" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
@endsection