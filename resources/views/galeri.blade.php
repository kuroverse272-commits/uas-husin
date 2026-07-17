@extends('layouts.app')

@section('title', 'Galeri Foto - Hotel Starking')

@section('content')
    <!-- Page Header -->
    <div class="bg-primary text-white py-12 relative overflow-hidden">
        <div class="absolute inset-0 opacity-15">
            <img src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?auto=format&fit=crop&w=1920&q=80" alt="Banner" class="w-full h-full object-cover">
        </div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-2">
            <span class="text-xs font-bold tracking-wider text-secondary uppercase">Dokumentasi</span>
            <h1 class="text-3xl sm:text-4xl font-extrabold">Galeri Foto</h1>
        </div>
    </div>

    <!-- Gallery Grid -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <h2 class="text-2xl font-bold text-primary">Sudut Estetik Hotel Starking</h2>
            <p class="text-gray-500 mt-2">Setiap sudut didesain dengan tingkat kenyamanan dan keindahan maksimal.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            @foreach($galleries as $gal)
                <div class="relative overflow-hidden rounded-2xl aspect-4/3 group shadow-md border border-gray-100/50 bg-gray-100">
                    <img src="{{ Str::startsWith($gal->image, 'http') ? $gal->image : asset($gal->image) }}" alt="{{ $gal->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-all duration-300">
                    <div class="absolute inset-0 bg-gradient-to-t from-primary/90 via-primary/30 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300 flex flex-col justify-end p-6">
                        <span class="text-secondary text-xs font-bold tracking-wider uppercase mb-1">Galeri Foto</span>
                        <h4 class="text-white font-bold text-lg">{{ $gal->title }}</h4>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection