@extends('layouts.admin')

@section('title', 'Dashboard Admin - Hotel Starking')

@section('content')
    <div class="space-y-8">
        <!-- Header -->
        <div>
            <h1 class="text-2xl font-bold text-primary">Dashboard Ringkasan</h1>
            <p class="text-gray-500 text-sm mt-1">Pantau perkembangan reservasi, pendapatan, dan hunian kamar Anda secara real-time.</p>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Total Kamar -->
            <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex items-center justify-between">
                <div class="space-y-1">
                    <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Total Kamar</span>
                    <h3 class="text-3xl font-extrabold text-primary">{{ $totalRooms }}</h3>
                </div>
                <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center text-xl">
                    <i class="fas fa-bed"></i>
                </div>
            </div>

            <!-- Total Booking -->
            <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex items-center justify-between">
                <div class="space-y-1">
                    <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Total Booking</span>
                    <h3 class="text-3xl font-extrabold text-primary">{{ $totalBookings }}</h3>
                </div>
                <div class="w-12 h-12 rounded-xl bg-green-50 text-green-600 flex items-center justify-center text-xl">
                    <i class="fas fa-calendar-alt"></i>
                </div>
            </div>

            <!-- Booking Hari Ini -->
            <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex items-center justify-between">
                <div class="space-y-1">
                    <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Booking Hari Ini</span>
                    <h3 class="text-3xl font-extrabold text-primary">{{ $bookingsToday }}</h3>
                </div>
                <div class="w-12 h-12 rounded-xl bg-orange-50 text-orange-600 flex items-center justify-center text-xl">
                    <i class="fas fa-clock"></i>
                </div>
            </div>

            <!-- Pendapatan -->
            <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex items-center justify-between">
                <div class="space-y-1">
                    <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Pendapatan Kotor</span>
                    <h3 class="text-2xl font-extrabold text-primary">Rp {{ number_format($revenue, 0, ',', '.') }}</h3>
                </div>
                <div class="w-12 h-12 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center text-xl">
                    <i class="fas fa-wallet"></i>
                </div>
            </div>
        </div>

        <!-- Recent Bookings Table -->
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
            <div class="px-6 py-5 border-b border-gray-100 flex items-center justify-between">
                <h3 class="font-bold text-primary">Pemesanan Terbaru</h3>
                <a href="{{ url('/admin/booking') }}" class="text-xs font-bold text-secondary hover:text-primary transition">Lihat Semua <i class="fas fa-arrow-right ml-1"></i></a>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-gray-500">
                    <thead class="text-xs text-gray-400 uppercase bg-gray-50/50 border-b border-gray-100">
                        <tr>
                            <th class="px-6 py-3 font-semibold">Tamu / Pemesan</th>
                            <th class="px-6 py-3 font-semibold">Kamar</th>
                            <th class="px-6 py-3 font-semibold">Check In - Out</th>
                            <th class="px-6 py-3 font-semibold">Total Tagihan</th>
                            <th class="px-6 py-3 font-semibold">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($recentBookings as $booking)
                            <tr class="hover:bg-gray-50/30 transition">
                                <td class="px-6 py-4">
                                    <div class="font-bold text-gray-700">{{ $booking->customer_name }}</div>
                                    <div class="text-xs text-gray-400">{{ $booking->email }} • {{ $booking->phone }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="font-semibold text-gray-700">{{ $booking->room->name ?? 'Kamar Dihapus' }}</div>
                                    <div class="text-xs text-gray-400">Kapasitas: {{ $booking->guest }} Tamu</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="font-semibold text-gray-600 text-xs">{{ date('d M Y', strtotime($booking->check_in)) }} - {{ date('d M Y', strtotime($booking->check_out)) }}</div>
                                </td>
                                <td class="px-6 py-4 font-bold text-primary">
                                    Rp {{ number_format($booking->total_price, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center px-2.5 py-1.5 rounded-full text-xs font-semibold
                                        @if($booking->status == 'Pending') bg-yellow-50 text-yellow-600 border border-yellow-100
                                        @elseif($booking->status == 'Confirmed') bg-blue-50 text-blue-600 border border-blue-100
                                        @elseif($booking->status == 'Check In') bg-green-50 text-green-600 border border-green-100
                                        @elseif($booking->status == 'Check Out') bg-gray-50 text-gray-600 border border-gray-100
                                        @else bg-red-50 text-red-600 border border-red-100
                                        @endif">
                                        {{ $booking->status }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-8 text-center text-gray-400 italic">Belum ada data booking masuk.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
