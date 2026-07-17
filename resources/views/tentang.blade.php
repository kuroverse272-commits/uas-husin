@extends('layouts.app')

@section('title', 'Tentang Kami - Hotel Starking')

@section('content')
    <!-- Page Header -->
    <div class="bg-primary text-white py-12 relative overflow-hidden">
        <div class="absolute inset-0 opacity-15">
            <img src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?auto=format&fit=crop&w=1920&q=80" alt="Banner" class="w-full h-full object-cover">
        </div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-2">
            <span class="text-xs font-bold tracking-wider text-secondary uppercase">Profil</span>
            <h1 class="text-3xl sm:text-4xl font-extrabold">Tentang Hotel Starking</h1>
        </div>
    </div>

    <!-- Intro Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="space-y-6">
                <span class="text-xs font-bold text-secondary tracking-wider uppercase">Sejarah & Visi</span>
                <h2 class="text-3xl font-bold text-primary">Sejarah Berdirinya Hotel Starking</h2>
                <p class="text-gray-600 leading-relaxed">
                    Hotel Starking didirikan pada awal tahun 2023 di kawasan Dago yang sejuk dan asri di Bandung. Kami menggabungkan konsep arsitektur modern minimalis dengan sentuhan budaya lokal untuk menciptakan suasana penginapan yang hangat namun tetap berkelas.
                </p>
                <p class="text-gray-600 leading-relaxed">
                    Visi kami adalah menjadi pionir penyedia jasa perhotelan bintang 5 terbaik yang memprioritaskan personalisasi pelayanan dan kenyamanan ramah lingkungan bagi para pelancong lokal maupun internasional.
                </p>
                <div class="border-l-4 border-secondary pl-4 italic text-gray-500">
                    "Kenyamanan Anda adalah dedikasi utama kami. Kami ada untuk melayani dengan ketulusan hati."
                </div>
            </div>
            <div>
                <img src="https://images.unsplash.com/photo-1564507592333-c60657eea523?auto=format&fit=crop&w=800&q=80" alt="Tentang Hotel Starking" class="rounded-2xl shadow-lg w-full object-cover aspect-video">
            </div>
        </div>
    </div>

    <!-- Facilities List Section -->
    <div class="bg-light py-16 border-t border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-12">
                <h2 class="text-2xl font-bold text-primary">Fasilitas Hotel Lengkap</h2>
                <p class="text-gray-500 mt-2">Seluruh fasilitas dirancang khusus untuk memenuhi standar kenyamanan bintang 5.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($facilities as $fac)
                    <div class="bg-white p-6 rounded-2xl border border-gray-100/50 shadow-sm flex items-start space-x-4">
                        <div class="flex-shrink-0 w-12 h-12 rounded-xl bg-primary/5 flex items-center justify-center text-primary text-xl">
                            <i class="fas {{ $fac->icon }} text-secondary"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-primary mb-1 text-sm">{{ $fac->name }}</h4>
                            <p class="text-xs text-gray-500 leading-relaxed">{{ $fac->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Milestones / Stats -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            <div class="space-y-2">
                <span class="text-4xl font-extrabold text-primary">50+</span>
                <p class="text-sm font-semibold text-gray-500">Kamar Eksklusif</p>
            </div>
            <div class="space-y-2">
                <span class="text-4xl font-extrabold text-primary">15k+</span>
                <p class="text-sm font-semibold text-gray-500">Tamu Puas</p>
            </div>
            <div class="space-y-2">
                <span class="text-4xl font-extrabold text-primary">5★</span>
                <p class="text-sm font-semibold text-gray-500">Layanan Bintang 5</p>
            </div>
            <div class="space-y-2">
                <span class="text-4xl font-extrabold text-primary">100%</span>
                <p class="text-sm font-semibold text-gray-500">Ulasan Positif</p>
            </div>
        </div>
    </div>
@endsection