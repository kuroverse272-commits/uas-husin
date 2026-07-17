@extends('layouts.app')

@section('title', 'Hotel Starking - Kemewahan & Kenyamanan Terbaik')

@section('content')
    <!-- Hero Banner & Search Form -->
    <div class="relative bg-primary text-white overflow-hidden min-h-[85vh] flex items-center">
        <!-- Background Image with Overlay -->
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?auto=format&fit=crop&w=1920&q=80" alt="Hotel Starking Banner" class="w-full h-full object-cover object-center transform scale-105 transition-all duration-1000">
            <div class="absolute inset-0 bg-gradient-to-r from-primary/90 via-primary/80 to-transparent"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 w-full">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                <!-- Text Content -->
                <div class="lg:col-span-7 space-y-6">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-secondary/20 text-secondary border border-secondary/30 tracking-wider uppercase">
                        ★ Hotel Bintang Premium
                    </span>
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight leading-none">
                        Kemewahan & Kenyamanan <br>
                        <span class="text-secondary">Terbaik di Bandung</span>
                    </h1>
                    <p class="text-lg text-gray-200 max-w-xl leading-relaxed">
                        Nikmati pengalaman menginap tak terlupakan dengan layanan berkelas dunia, kamar eksklusif dengan fasilitas premium, serta lokasi strategis di pusat kota Bandung.
                    </p>
                    <div class="flex flex-wrap gap-4 pt-2">
                        <a href="{{ url('/kamar') }}" class="px-6 py-3 rounded-lg bg-secondary text-primary font-bold hover:bg-secondary/90 transition shadow-lg shadow-secondary/10">
                            Lihat Kamar Kami
                        </a>
                        <a href="{{ url('/tentang') }}" class="px-6 py-3 rounded-lg border border-white/30 text-white font-semibold hover:bg-white/10 transition">
                            Pelajari Selengkapnya
                        </a>
                    </div>
                </div>

                <!-- Search Panel -->
                <div class="lg:col-span-5">
                    <div class="bg-white text-dark rounded-2xl p-6 sm:p-8 shadow-2xl border border-gray-100/50">
                        <h3 class="text-xl font-bold mb-6 flex items-center text-primary">
                            <i class="fas fa-calendar-alt text-secondary mr-2"></i> Reservasi Sekarang
                        </h3>
                        <form action="{{ url('/kamar') }}" method="GET" class="space-y-4">
                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Tipe Kamar</label>
                                <div class="relative">
                                    <select name="type" class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm font-medium">
                                        <option value="">Semua Tipe Kamar</option>
                                        <option value="Standard">Standard Room</option>
                                        <option value="Deluxe">Deluxe Room</option>
                                        <option value="Suite">Executive & Family Suite</option>
                                    </select>
                                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                                        <i class="fas fa-bed"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Check In</label>
                                    <div class="relative">
                                        <input type="date" name="check_in" min="{{ date('Y-m-d') }}" class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm font-medium">
                                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                                            <i class="fas fa-sign-in-alt"></i>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Check Out</label>
                                    <div class="relative">
                                        <input type="date" name="check_out" min="{{ date('Y-m-d', strtotime('+1 day')) }}" class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm font-medium">
                                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                                            <i class="fas fa-sign-out-alt"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Kapasitas Tamu</label>
                                <div class="relative">
                                    <select name="capacity" class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm font-medium">
                                        <option value="">Pilih Kapasitas</option>
                                        <option value="1">1 Orang</option>
                                        <option value="2">2 Orang</option>
                                        <option value="4">4 Orang</option>
                                        <option value="5">5+ Orang</option>
                                    </select>
                                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                                        <i class="fas fa-users"></i>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="w-full py-4 bg-primary text-white font-bold rounded-xl hover:bg-primary/95 shadow-lg shadow-primary/20 transition duration-150">
                                <i class="fas fa-search mr-2"></i> Cari Kamar Tersedia
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- About Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                <div class="lg:col-span-6 relative">
                    <img src="https://images.unsplash.com/photo-1566665797739-1674de7a421a?auto=format&fit=crop&w=800&q=80" alt="Tentang Hotel" class="rounded-2xl shadow-xl w-full object-cover aspect-[4/3] z-10 relative">
                    <div class="absolute -bottom-6 -right-6 w-48 h-48 bg-secondary/10 rounded-2xl -z-0"></div>
                </div>
                <div class="lg:col-span-6 space-y-6">
                    <span class="text-xs font-bold tracking-wider text-secondary uppercase">Tentang Kami</span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-primary">Sebuah Oasis Mewah Di Jantung Kota Bandung</h2>
                    <p class="text-gray-600 leading-relaxed">
                        Berdiri sejak tahun 2023, Hotel Starking telah menjadi simbol kemewahan dan pelayanan prima. Kami percaya bahwa kenyamanan tamu adalah prioritas utama kami. Mulai dari desain kamar yang elegan hingga keramahtamahan staf kami, setiap detail di Hotel Starking dikurasi untuk memberikan pengalaman tinggal terbaik.
                    </p>
                    <div class="grid grid-cols-2 gap-6 pt-4">
                        <div class="flex items-center space-x-3">
                            <div class="flex-shrink-0 w-12 h-12 rounded-lg bg-primary/5 flex items-center justify-center text-primary text-xl">
                                <i class="fas fa-shield-alt text-secondary"></i>
                            </div>
                            <div>
                                <h4 class="font-bold">Keamanan 24/7</h4>
                                <p class="text-xs text-gray-500">Sistem keamanan ketat</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="flex-shrink-0 w-12 h-12 rounded-lg bg-primary/5 flex items-center justify-center text-primary text-xl">
                                <i class="fas fa-concierge-bell text-secondary"></i>
                            </div>
                            <div>
                                <h4 class="font-bold">Pelayanan Kamar</h4>
                                <p class="text-xs text-gray-500">Layanan kamar 24 jam</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Popular Rooms Section -->
    <section class="py-20 bg-light">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-xs font-bold tracking-wider text-secondary uppercase">Kamar Pilihan</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-primary mt-2">Temukan Kamar Sempurna Anda</h2>
                <p class="text-gray-500 mt-4">Pilih berbagai kamar mewah kami yang dirancang dengan estetika tinggi dan kenyamanan maksimal.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($rooms as $room)
                    <div class="bg-white rounded-2xl overflow-hidden shadow-lg border border-gray-100 group transition hover:shadow-xl flex flex-col h-full">
                        <!-- Room Image -->
                        <div class="relative overflow-hidden aspect-[4/3] bg-gray-100">
                            <img src="{{ Str::startsWith($room->image, 'http') ? $room->image : asset($room->image) }}" alt="{{ $room->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-all duration-300">
                            <div class="absolute top-4 left-4">
                                <span class="px-3 py-1 text-xs font-semibold bg-primary text-white rounded-full">
                                    {{ $room->type }}
                                </span>
                            </div>
                        </div>
                        <!-- Room Info -->
                        <div class="p-6 flex-grow flex flex-col justify-between">
                            <div>
                                <h3 class="text-xl font-bold text-primary mb-2">{{ $room->name }}</h3>
                                <p class="text-gray-600 text-sm leading-relaxed line-clamp-3 mb-4">{{ $room->description }}</p>
                                
                                <div class="flex items-center space-x-4 mb-6 text-sm text-gray-500 font-medium">
                                    <span class="flex items-center"><i class="fas fa-users text-secondary mr-2"></i> {{ $room->capacity }} Tamu</span>
                                    <span class="flex items-center"><i class="fas fa-bed text-secondary mr-2"></i> King Size</span>
                                </div>
                            </div>
                            <div class="pt-4 border-t border-gray-100 flex items-center justify-between">
                                <div>
                                    <span class="text-xs text-gray-400 block">Mulai dari</span>
                                    <span class="text-lg font-bold text-primary">Rp {{ number_format($room->price, 0, ',', '.') }}<span class="text-xs text-gray-500 font-normal"> / malam</span></span>
                                </div>
                                <a href="{{ url('/booking') }}?room_id={{ $room->id }}" class="px-4 py-2 bg-secondary text-primary font-bold text-xs rounded-lg hover:bg-secondary/95 transition">
                                    Pesan Kamar
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <div class="text-center mt-12">
                <a href="{{ url('/kamar') }}" class="inline-flex items-center justify-center px-6 py-3 border-2 border-primary text-primary hover:bg-primary hover:text-white font-bold rounded-lg transition duration-200">
                    Lihat Semua Kamar <i class="fas fa-arrow-right ml-2 text-xs"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Facilities Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-xs font-bold tracking-wider text-secondary uppercase">Fasilitas Hotel</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-primary mt-2">Menyediakan Kenyamanan Terbaik</h2>
                <p class="text-gray-500 mt-4">Nikmati fasilitas mewah bintang 5 yang kami sediakan khusus untuk melengkapi liburan dan perjalanan bisnis Anda.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-8">
                @foreach($facilities as $fac)
                    <div class="bg-light p-6 rounded-2xl border border-gray-100 text-center hover:-translate-y-1 transition duration-200 flex flex-col items-center justify-center">
                        <div class="w-16 h-16 rounded-full bg-primary/5 flex items-center justify-center text-primary text-2xl mb-4">
                            <i class="fas {{ $fac->icon }} text-secondary"></i>
                        </div>
                        <h4 class="font-bold text-primary mb-2 text-sm">{{ $fac->name }}</h4>
                        <p class="text-xs text-gray-500 leading-relaxed">{{ $fac->description }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Testimonial Section -->
    <section class="py-20 bg-light">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-xs font-bold tracking-wider text-secondary uppercase">Ulasan Tamu</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-primary mt-2">Apa Kata Mereka Tentang Kami?</h2>
                <p class="text-gray-500 mt-4">Kami bangga dapat melayani ratusan tamu dengan pelayanan prima setiap harinya. Berikut tanggapan jujur mereka.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($testimonials as $testi)
                    <div class="bg-white p-8 rounded-2xl border border-gray-100 shadow-md relative flex flex-col justify-between h-full">
                        <div class="absolute top-8 right-8 text-secondary/20 text-6xl font-serif">“</div>
                        <div class="relative z-10">
                            <!-- Star Rating -->
                            <div class="flex text-yellow-400 mb-4 text-xs">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <p class="text-gray-600 text-sm leading-relaxed mb-6 italic">
                                "{{ $testi->message }}"
                            </p>
                        </div>
                        <div class="flex items-center pt-4 border-t border-gray-100">
                            @if($testi->photo)
                                <img src="{{ Str::startsWith($testi->photo, 'http') ? $testi->photo : asset($testi->photo) }}" alt="{{ $testi->name }}" class="w-12 h-12 rounded-full object-cover mr-4 border-2 border-secondary/20">
                            @else
                                <div class="w-12 h-12 rounded-full flex items-center justify-center bg-primary/5 text-primary font-bold mr-4 border-2 border-secondary/20">
                                    {{ substr($testi->name, 0, 1) }}
                                </div>
                            @endif
                            <div>
                                <h4 class="font-bold text-primary text-sm">{{ $testi->name }}</h4>
                                <span class="text-xs text-gray-500 block">{{ $testi->job }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-xs font-bold tracking-wider text-secondary uppercase">Galeri Foto</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-primary mt-2">Visualisasikan Kenyamanan Anda</h2>
                <p class="text-gray-500 mt-4">Lihat suasana dan kenyamanan di dalam serta luar Hotel Starking.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                @foreach($galleries as $gal)
                    <div class="relative overflow-hidden rounded-2xl aspect-square group shadow-md border border-gray-100">
                        <img src="{{ Str::startsWith($gal->image, 'http') ? $gal->image : asset($gal->image) }}" alt="{{ $gal->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                        <div class="absolute inset-0 bg-gradient-to-t from-primary/80 via-primary/20 to-transparent opacity-0 group-hover:opacity-100 transition duration-300 flex items-end p-6">
                            <span class="text-white font-bold text-sm">{{ $gal->title }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <div class="text-center mt-12">
                <a href="{{ url('/galeri') }}" class="inline-flex items-center justify-center px-6 py-3 border-2 border-primary text-primary hover:bg-primary hover:text-white font-bold rounded-lg transition duration-200">
                    Lihat Seluruh Galeri <i class="fas fa-images ml-2 text-xs"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="bg-primary text-white py-16 relative overflow-hidden">
        <div class="absolute inset-0 z-0 opacity-20">
            <img src="https://images.unsplash.com/photo-1564507592333-c60657eea523?auto=format&fit=crop&w=1920&q=80" alt="CTA BG" class="w-full h-full object-cover">
        </div>
        <div class="relative z-10 max-w-5xl mx-auto text-center px-4 sm:px-6 lg:px-8 space-y-6">
            <h2 class="text-3xl sm:text-4xl font-extrabold">Nikmati Menginap Bintang 5 Bersama Kami</h2>
            <p class="text-gray-300 max-w-xl mx-auto text-sm sm:text-base leading-relaxed">
                Pesan kamar Anda hari ini dan dapatkan penawaran harga terbaik. Kami menjamin liburan atau perjalanan Anda akan sangat menyenangkan di Hotel Starking.
            </p>
            <div class="pt-4">
                <a href="{{ url('/booking') }}" class="px-8 py-4 bg-secondary text-primary font-bold text-base rounded-xl hover:bg-secondary/95 shadow-xl transition inline-block">
                    Pesan Kamar Sekarang
                </a>
            </div>
        </div>
    </section>
@endsection