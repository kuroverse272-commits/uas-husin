@extends('layouts.admin')

@section('title', 'Kelola Booking - Hotel Starking')

@section('content')
    <div class="space-y-8" x-data="{ statusModalOpen: false, activeBooking: {} }">
        <!-- Header -->
        <div>
            <h1 class="text-2xl font-bold text-primary">Kelola Booking & Reservasi</h1>
            <p class="text-gray-500 text-sm mt-1">Kelola data pemesanan kamar hotel, perbarui status check-in/check-out, atau batalkan pesanan.</p>
        </div>

        @if(session('success'))
            <div class="p-4 bg-green-50 text-green-700 font-semibold rounded-xl border border-green-200">
                <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="p-4 bg-red-50 text-red-700 font-semibold rounded-xl border border-red-200 text-sm space-y-1">
                <p class="font-bold">Kesalahan input data:</p>
                <ul class="list-disc pl-5 font-normal">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Bookings Table Card -->
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-gray-500">
                    <thead class="text-xs text-gray-400 uppercase bg-gray-50/50 border-b border-gray-100">
                        <tr>
                            <th class="px-6 py-3 font-semibold">Tamu / Pemesan</th>
                            <th class="px-6 py-3 font-semibold">Kamar</th>
                            <th class="px-6 py-3 font-semibold">Check In & Out</th>
                            <th class="px-6 py-3 font-semibold">Tamu</th>
                            <th class="px-6 py-3 font-semibold">Total Tagihan</th>
                            <th class="px-6 py-3 font-semibold">Status</th>
                            <th class="px-6 py-3 font-semibold text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($bookings as $booking)
                            <tr class="hover:bg-gray-50/30 transition">
                                <td class="px-6 py-4">
                                    <div class="font-bold text-gray-700">{{ $booking->customer_name }}</div>
                                    <div class="text-xs text-gray-400">{{ $booking->email }}</div>
                                    <div class="text-xs text-gray-400">{{ $booking->phone }}</div>
                                </td>
                                <td class="px-6 py-4 font-semibold text-gray-700">
                                    {{ $booking->room->name ?? 'Kamar Dihapus' }}
                                    <div class="text-xs text-gray-400 font-normal">{{ $booking->room->type ?? '' }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="font-semibold text-gray-600 text-xs">
                                        Check-In: {{ date('d M Y', strtotime($booking->check_in)) }}
                                    </div>
                                    <div class="font-semibold text-gray-600 text-xs">
                                        Check-Out: {{ date('d M Y', strtotime($booking->check_out)) }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-600">
                                    {{ $booking->guest }} Orang
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
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center space-x-3">
                                        <!-- Update status button -->
                                        <button @click="activeBooking = {
                                            id: '{{ $booking->id }}',
                                            customer_name: '{{ addslashes($booking->customer_name) }}',
                                            status: '{{ $booking->status }}'
                                        }; statusModalOpen = true" class="text-blue-500 hover:text-blue-700 transition" title="Ubah Status">
                                            <i class="fas fa-edit"></i> Status
                                        </button>
                                        <!-- Delete button -->
                                        <form action="{{ url('/admin/booking') }}/{{ $booking->id }}/delete" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus booking ini?')" class="inline-block">
                                            @csrf
                                            <button type="submit" class="text-red-400 hover:text-red-600 transition" title="Hapus Booking">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-8 text-center text-gray-400 italic">Belum ada data reservasi kamar hotel.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            @if($bookings->hasPages())
                <div class="px-6 py-4 border-t border-gray-100">
                    {{ $bookings->links() }}
                </div>
            @endif
        </div>

        <!-- STATUS MODAL -->
        <div x-show="statusModalOpen" class="fixed inset-0 z-50 overflow-y-auto flex items-center justify-center p-4 bg-black/50 backdrop-blur-sm" style="display: none;" x-transition>
            <div class="bg-white rounded-2xl max-w-md w-full overflow-hidden shadow-2xl border border-gray-100">
                <div class="px-6 py-4 bg-primary text-white flex items-center justify-between">
                    <h3 class="font-bold">Ubah Status Booking</h3>
                    <button @click="statusModalOpen = false" class="text-white/80 hover:text-white"><i class="fas fa-times"></i></button>
                </div>
                
                <form :action="'{{ url('/admin/booking') }}/' + activeBooking.id + '/update-status'" method="POST" class="p-6 space-y-4">
                    @csrf
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Nama Pemesan</label>
                        <input type="text" :value="activeBooking.customer_name" disabled class="w-full px-3 py-2 bg-gray-100 border border-gray-200 rounded-lg text-sm text-gray-500 font-medium cursor-not-allowed">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Status Booking</label>
                        <select name="status" :value="activeBooking.status" x-model="activeBooking.status" required class="w-full px-3 py-2 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm">
                            <option value="Pending">Pending</option>
                            <option value="Confirmed">Confirmed</option>
                            <option value="Check In">Check In</option>
                            <option value="Check Out">Check Out</option>
                            <option value="Cancelled">Cancelled</option>
                        </select>
                    </div>

                    <div class="pt-4 border-t border-gray-100 flex justify-end space-x-2">
                        <button type="button" @click="statusModalOpen = false" class="px-4 py-2 border border-gray-200 text-gray-600 font-semibold rounded-lg hover:bg-gray-50 text-xs">Batal</button>
                        <button type="submit" class="px-4 py-2 bg-primary text-white font-bold rounded-lg hover:bg-primary/95 text-xs">Simpan Status</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
