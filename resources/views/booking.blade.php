@extends('layouts.app')

@section('title', 'Pesan Kamar Online - Hotel Starking')

@section('content')
    <!-- Page Header -->
    <div class="bg-primary text-white py-12 relative overflow-hidden">
        <div class="absolute inset-0 opacity-15">
            <img src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?auto=format&fit=crop&w=1920&q=80" alt="Banner" class="w-full h-full object-cover">
        </div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-2">
            <span class="text-xs font-bold tracking-wider text-secondary uppercase">Reservasi</span>
            <h1 class="text-3xl sm:text-4xl font-extrabold">Formulir Booking Online</h1>
        </div>
    </div>

    <!-- Booking Form Section -->
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16" x-data="bookingCalculator()">
        <div class="bg-white p-8 rounded-2xl border border-gray-100 shadow-xl">
            @if(session('success'))
                <div class="p-4 mb-6 bg-green-50 text-green-700 font-semibold rounded-xl border border-green-200">
                    <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
                    @if(session('booking_id'))
                        <div class="mt-2 text-xs font-normal text-green-600">ID Booking Anda: <span class="font-mono font-bold">#{{ session('booking_id') }}</span>. Simpan ID ini untuk check-in.</div>
                    @endif
                </div>
            @endif

            @if($errors->any())
                <div class="p-4 mb-6 bg-red-50 text-red-700 font-semibold rounded-xl border border-red-200 text-sm space-y-1">
                    <p class="font-bold">Terjadi kesalahan input:</p>
                    <ul class="list-disc pl-5 font-normal">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ url('/booking/store') }}" method="POST" class="space-y-8">
                @csrf
                
                <!-- 1. Kamar & Tanggal -->
                <div class="space-y-6">
                    <h3 class="text-lg font-bold text-primary border-b border-gray-100 pb-3 flex items-center">
                        <span class="w-6 h-6 rounded-full bg-secondary text-primary flex items-center justify-center text-xs font-bold mr-3">1</span>
                        Detail Akomodasi
                    </h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Pilih Kamar</label>
                            <div class="relative">
                                <select name="room_id" x-model="selectedRoomId" @change="updatePrice()" required class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm font-medium">
                                    <option value="">-- Pilih Kamar --</option>
                                    @foreach($rooms as $room)
                                        <option value="{{ $room->id }}" data-price="{{ $room->price }}">{{ $room->name }} (Rp {{ number_format($room->price, 0, ',', '.') }} / malam)</option>
                                    @endforeach
                                </select>
                                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                                    <i class="fas fa-bed"></i>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Kapasitas Tamu</label>
                            <div class="relative">
                                <select name="guest" x-model="guest" required class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm font-medium">
                                    <option value="1">1 Orang</option>
                                    <option value="2">2 Orang</option>
                                    <option value="3">3 Orang</option>
                                    <option value="4">4 Orang</option>
                                    <option value="5">5 Orang</option>
                                </select>
                                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Tanggal Check In</label>
                            <div class="relative">
                                <input type="date" name="check_in" x-model="checkIn" @change="calculateTotal()" min="{{ date('Y-m-d') }}" required class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm font-medium">
                                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                                    <i class="fas fa-sign-in-alt"></i>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Tanggal Check Out</label>
                            <div class="relative">
                                <input type="date" name="check_out" x-model="checkOut" @change="calculateTotal()" min="{{ date('Y-m-d', strtotime('+1 day')) }}" required class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm font-medium">
                                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                                    <i class="fas fa-sign-out-alt"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 2. Data Pelanggan -->
                <div class="space-y-6">
                    <h3 class="text-lg font-bold text-primary border-b border-gray-100 pb-3 flex items-center">
                        <span class="w-6 h-6 rounded-full bg-secondary text-primary flex items-center justify-center text-xs font-bold mr-3">2</span>
                        Data Diri Pemesan
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Nama Lengkap</label>
                            <div class="relative">
                                <input type="text" name="customer_name" required placeholder="Masukkan nama lengkap..." class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm font-medium">
                                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                                    <i class="fas fa-user"></i>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Nomor Telepon</label>
                            <div class="relative">
                                <input type="tel" name="phone" required placeholder="Contoh: 081234567890" class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm font-medium">
                                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                                    <i class="fas fa-phone-alt"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Alamat Email</label>
                        <div class="relative">
                            <input type="email" name="email" required placeholder="Contoh: name@example.com" class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm font-medium">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                                <i class="fas fa-envelope"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 3. Rincian Pembayaran -->
                <div class="bg-light p-6 rounded-2xl border border-gray-100 space-y-4">
                    <h4 class="font-bold text-primary text-sm flex items-center">
                        <i class="fas fa-receipt text-secondary mr-2"></i> Rincian Pembayaran
                    </h4>
                    
                    <div class="space-y-2 text-sm text-gray-600">
                        <div class="flex justify-between">
                            <span>Harga Kamar per Malam</span>
                            <span class="font-semibold text-primary" x-text="formatCurrency(roomPrice)">Rp 0</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Jumlah Malam Menginap</span>
                            <span class="font-semibold text-primary"><span x-text="days">0</span> Malam</span>
                        </div>
                        <hr class="border-gray-200/60 my-2">
                        <div class="flex justify-between text-base font-bold text-primary">
                            <span>Total Tagihan</span>
                            <span class="text-lg text-secondary" x-text="formatCurrency(totalPrice)">Rp 0</span>
                        </div>
                    </div>
                </div>

                <input type="hidden" name="total_price" :value="totalPrice">

                <button type="submit" class="w-full py-4 bg-primary text-white font-bold rounded-xl hover:bg-primary/95 shadow-lg shadow-primary/20 transition duration-150 text-sm">
                    <i class="fas fa-check mr-2"></i> Konfirmasi Booking Sekarang
                </button>
            </form>
        </div>
    </div>

    <!-- AlpineJS Booking Logic -->
    <script>
        function bookingCalculator() {
            return {
                selectedRoomId: '{{ $selected_room_id ?? "" }}',
                roomPrice: 0,
                checkIn: '',
                checkOut: '',
                guest: 1,
                days: 0,
                totalPrice: 0,
                
                init() {
                    this.$nextTick(() => {
                        this.updatePrice();
                    });
                },
                
                updatePrice() {
                    const select = document.querySelector('select[name="room_id"]');
                    if (select) {
                        const selectedOption = select.options[select.selectedIndex];
                        if (selectedOption && selectedOption.value) {
                            this.roomPrice = parseFloat(selectedOption.getAttribute('data-price')) || 0;
                        } else {
                            this.roomPrice = 0;
                        }
                    }
                    this.calculateTotal();
                },
                
                calculateTotal() {
                    if (this.checkIn && this.checkOut) {
                        const inDate = new Date(this.checkIn);
                        const outDate = new Date(this.checkOut);
                        
                        if (outDate > inDate) {
                            const diffTime = Math.abs(outDate - inDate);
                            this.days = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                            this.totalPrice = this.days * this.roomPrice;
                        } else {
                            this.days = 0;
                            this.totalPrice = 0;
                        }
                    } else {
                        this.days = 0;
                        this.totalPrice = 0;
                    }
                },
                
                formatCurrency(value) {
                    return new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR',
                        minimumFractionDigits: 0,
                        maximumFractionDigits: 0
                    }).format(value);
                }
            }
        }
    </script>
@endsection