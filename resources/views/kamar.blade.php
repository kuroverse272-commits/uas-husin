@extends('layouts.app')

@section('title', 'Kamar & Suite - Hotel Starking')

@section('content')
    <!-- Page Header -->
    <div class="bg-primary text-white py-12 relative overflow-hidden">
        <div class="absolute inset-0 opacity-15">
            <img src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?auto=format&fit=crop&w=1920&q=80" alt="Banner" class="w-full h-full object-cover">
        </div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-2">
            <span class="text-xs font-bold tracking-wider text-secondary uppercase">Akomodasi</span>
            <h1 class="text-3xl sm:text-4xl font-extrabold">Kamar & Suite Pilihan</h1>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            <!-- Filter Sidebar -->
            <div class="lg:col-span-1">
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-md sticky top-24">
                    <h3 class="text-lg font-bold text-primary mb-6 flex items-center">
                        <i class="fas fa-filter text-secondary mr-2"></i> Filter Kamar
                    </h3>
                    <form action="{{ url('/kamar') }}" method="GET" class="space-y-6">
                        <!-- Search Name -->
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Cari Kamar</label>
                            <input type="text" name="search" value="{{ request('search') }}" placeholder="Nama kamar..." class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm">
                        </div>

                        <!-- Room Type -->
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Tipe Kamar</label>
                            <select name="type" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary text-sm">
                                <option value="">Semua Tipe</option>
                                <option value="Standard" {{ request('type') == 'Standard' ? 'selected' : '' }}>Standard</option>
                                <option value="Deluxe" {{ request('type') == 'Deluxe' ? 'selected' : '' }}>Deluxe</option>
                                <option value="Suite" {{ request('type') == 'Suite' ? 'selected' : '' }}>Suite</option>
                            </select>
                        </div>

                        <!-- Capacity -->
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Kapasitas Minimal</label>
                            <select name="capacity" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary text-sm">
                                <option value="">Semua Kapasitas</option>
                                <option value="2" {{ request('capacity') == '2' ? 'selected' : '' }}>2 Orang</option>
                                <option value="4" {{ request('capacity') == '4' ? 'selected' : '' }}>4 Orang</option>
                                <option value="5" {{ request('capacity') == '5' ? 'selected' : '' }}>5+ Orang</option>
                            </select>
                        </div>

                        <!-- Price Range -->
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Harga Maksimal (Rp)</label>
                            <input type="number" name="max_price" value="{{ request('max_price') }}" placeholder="Contoh: 1000000" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm">
                        </div>

                        <!-- Buttons -->
                        <div class="pt-4 space-y-2">
                            <button type="submit" class="w-full py-3 bg-primary text-white font-bold rounded-xl hover:bg-primary/95 transition text-sm">
                                Terapkan Filter
                            </button>
                            <a href="{{ url('/kamar') }}" class="w-full py-3 block text-center border border-gray-200 text-gray-600 font-semibold rounded-xl hover:bg-gray-50 transition text-sm">
                                Reset Filter
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Rooms Grid -->
            <div class="lg:col-span-3">
                @if($rooms->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach($rooms as $room)
                            <div class="bg-white rounded-2xl overflow-hidden shadow-md border border-gray-100 group transition hover:shadow-lg flex flex-col justify-between">
                                <!-- Room Image -->
                                <div class="relative overflow-hidden aspect-[4/3] bg-gray-100">
                                    <img src="{{ Str::startsWith($room->image, 'http') ? $room->image : asset($room->image) }}" alt="{{ $room->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-all duration-300">
                                    <div class="absolute top-4 left-4">
                                        <span class="px-3 py-1 text-xs font-semibold bg-primary text-white rounded-full">
                                            {{ $room->type }}
                                        </span>
                                    </div>
                                    <div class="absolute top-4 right-4">
                                        <span class="px-3 py-1 text-xs font-semibold {{ $room->status == 'available' ? 'bg-green-500' : 'bg-red-500' }} text-white rounded-full">
                                            {{ $room->status == 'available' ? 'Tersedia' : 'Penuh' }}
                                        </span>
                                    </div>
                                </div>
                                <!-- Room Info -->
                                <div class="p-6 flex-grow flex flex-col justify-between">
                                    <div>
                                        <h3 class="text-xl font-bold text-primary mb-2">{{ $room->name }}</h3>
                                        <p class="text-gray-600 text-sm leading-relaxed mb-4 line-clamp-3">{{ $room->description }}</p>
                                        
                                        <div class="flex items-center space-x-4 mb-6 text-sm text-gray-500 font-medium">
                                            <span class="flex items-center"><i class="fas fa-users text-secondary mr-2"></i> {{ $room->capacity }} Tamu</span>
                                            <span class="flex items-center"><i class="fas fa-bed text-secondary mr-2"></i> King/Twin</span>
                                        </div>
                                    </div>
                                    <div class="pt-4 border-t border-gray-100 flex items-center justify-between">
                                        <div>
                                            <span class="text-xs text-gray-400 block">Harga / malam</span>
                                            <span class="text-lg font-bold text-primary">Rp {{ number_format($room->price, 0, ',', '.') }}</span>
                                        </div>
                                        @if($room->status == 'available')
                                            <a href="{{ url('/booking') }}?room_id={{ $room->id }}" class="px-4 py-2 bg-secondary text-primary font-bold text-xs rounded-lg hover:bg-secondary/95 transition">
                                                Pesan Sekarang
                                            </a>
                                        @else
                                            <button disabled class="px-4 py-2 bg-gray-200 text-gray-400 font-bold text-xs rounded-lg cursor-not-allowed">
                                                Tidak Tersedia
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="mt-12">
                        {{ $rooms->appends(request()->query())->links() }}
                    </div>
                @else
                    <div class="bg-white p-12 text-center rounded-2xl border border-gray-100 shadow-md">
                        <div class="w-16 h-16 rounded-full bg-primary/5 flex items-center justify-center text-primary text-3xl mx-auto mb-4">
                            <i class="fas fa-search"></i>
                        </div>
                        <h3 class="text-lg font-bold text-primary mb-2">Kamar Tidak Ditemukan</h3>
                        <p class="text-gray-500 text-sm max-w-md mx-auto">Kami tidak dapat menemukan kamar yang cocok dengan kriteria pencarian Anda. Coba ubah filter atau lakukan pencarian baru.</p>
                        <a href="{{ url('/kamar') }}" class="mt-6 inline-block px-6 py-2.5 bg-primary text-white font-bold rounded-xl text-sm hover:bg-primary/95 transition">
                            Reset Filter
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection