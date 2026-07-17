@extends('layouts.admin')

@section('title', 'Kelola Kamar - Hotel Starking')

@section('content')
    <div class="space-y-8" x-data="{ addModalOpen: false, editModalOpen: false, editRoomData: {} }">
        <!-- Header -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h1 class="text-2xl font-bold text-primary">Kelola Kamar Hotel</h1>
                <p class="text-gray-500 text-sm mt-1">Kelola data kamar hotel, harga, kapasitas, tipe, status ketersediaan, dan gambar kamar.</p>
            </div>
            <button @click="addModalOpen = true" class="px-5 py-2.5 bg-primary text-white font-bold text-sm rounded-xl hover:bg-primary/95 shadow-md flex items-center transition">
                <i class="fas fa-plus mr-2"></i> Tambah Kamar Baru
            </button>
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

        <!-- Rooms Table Card -->
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-gray-500">
                    <thead class="text-xs text-gray-400 uppercase bg-gray-50/50 border-b border-gray-100">
                        <tr>
                            <th class="px-6 py-3 font-semibold">Foto</th>
                            <th class="px-6 py-3 font-semibold">Nama Kamar</th>
                            <th class="px-6 py-3 font-semibold">Tipe</th>
                            <th class="px-6 py-3 font-semibold">Kapasitas</th>
                            <th class="px-6 py-3 font-semibold">Harga / Malam</th>
                            <th class="px-6 py-3 font-semibold">Status</th>
                            <th class="px-6 py-3 font-semibold text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($rooms as $room)
                            <tr class="hover:bg-gray-50/30 transition">
                                <td class="px-6 py-4">
                                    <img src="{{ Str::startsWith($room->image, 'http') ? $room->image : asset($room->image) }}" alt="{{ $room->name }}" class="w-16 h-12 object-cover rounded-lg border border-gray-100">
                                </td>
                                <td class="px-6 py-4 font-bold text-gray-700">
                                    {{ $room->name }}
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 text-xs font-semibold bg-gray-100 text-gray-600 rounded-md">
                                        {{ $room->type }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-600">
                                    {{ $room->capacity }} Orang
                                </td>
                                <td class="px-6 py-4 font-bold text-primary">
                                    Rp {{ number_format($room->price, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold {{ $room->status == 'available' ? 'bg-green-50 text-green-600 border border-green-100' : 'bg-red-50 text-red-600 border border-red-100' }}">
                                        {{ $room->status == 'available' ? 'Tersedia' : 'Penuh' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center space-x-3">
                                        <!-- Edit button -->
                                        <button @click="editRoomData = {
                                            id: '{{ $room->id }}',
                                            name: '{{ addslashes($room->name) }}',
                                            type: '{{ $room->type }}',
                                            capacity: '{{ $room->capacity }}',
                                            price: '{{ $room->price }}',
                                            status: '{{ $room->status }}',
                                            description: '{{ addslashes($room->description) }}'
                                        }; editModalOpen = true" class="text-blue-500 hover:text-blue-700 transition" title="Edit Kamar">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <!-- Delete button -->
                                        <form action="{{ url('/admin/kamar') }}/{{ $room->id }}/delete" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kamar ini?')" class="inline-block">
                                            @csrf
                                            <button type="submit" class="text-red-400 hover:text-red-600 transition" title="Hapus Kamar">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-8 text-center text-gray-400 italic">Belum ada data kamar hotel. Silakan tambahkan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            @if($rooms->hasPages())
                <div class="px-6 py-4 border-t border-gray-100">
                    {{ $rooms->links() }}
                </div>
            @endif
        </div>

        <!-- ADD MODAL -->
        <div x-show="addModalOpen" class="fixed inset-0 z-50 overflow-y-auto flex items-center justify-center p-4 bg-black/50 backdrop-blur-sm" style="display: none;" x-transition>
            <div class="bg-white rounded-2xl max-w-lg w-full overflow-hidden shadow-2xl border border-gray-100">
                <div class="px-6 py-4 bg-primary text-white flex items-center justify-between">
                    <h3 class="font-bold">Tambah Kamar Baru</h3>
                    <button @click="addModalOpen = false" class="text-white/80 hover:text-white"><i class="fas fa-times"></i></button>
                </div>
                
                <form action="{{ url('/admin/kamar') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-4">
                    @csrf
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Nama Kamar</label>
                            <input type="text" name="name" required class="w-full px-3 py-2 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Tipe Kamar</label>
                            <select name="type" required class="w-full px-3 py-2 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm">
                                <option value="Standard">Standard</option>
                                <option value="Deluxe">Deluxe</option>
                                <option value="Suite">Suite</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Kapasitas (Orang)</label>
                            <input type="number" name="capacity" required min="1" class="w-full px-3 py-2 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Harga Per Malam (Rp)</label>
                            <input type="number" name="price" required min="0" class="w-full px-3 py-2 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Status</label>
                            <select name="status" required class="w-full px-3 py-2 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm">
                                <option value="available">Tersedia</option>
                                <option value="booked">Penuh / Booked</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Foto Kamar</label>
                            <input type="file" name="image" class="w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-primary/5 file:text-primary hover:file:bg-primary/10">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Deskripsi Kamar</label>
                        <textarea name="description" rows="4" required class="w-full px-3 py-2 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm"></textarea>
                    </div>

                    <div class="pt-4 border-t border-gray-100 flex justify-end space-x-2">
                        <button type="button" @click="addModalOpen = false" class="px-4 py-2 border border-gray-200 text-gray-600 font-semibold rounded-lg hover:bg-gray-50 text-xs">Batal</button>
                        <button type="submit" class="px-4 py-2 bg-primary text-white font-bold rounded-lg hover:bg-primary/95 text-xs">Simpan Kamar</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- EDIT MODAL -->
        <div x-show="editModalOpen" class="fixed inset-0 z-50 overflow-y-auto flex items-center justify-center p-4 bg-black/50 backdrop-blur-sm" style="display: none;" x-transition>
            <div class="bg-white rounded-2xl max-w-lg w-full overflow-hidden shadow-2xl border border-gray-100">
                <div class="px-6 py-4 bg-primary text-white flex items-center justify-between">
                    <h3 class="font-bold">Edit Data Kamar</h3>
                    <button @click="editModalOpen = false" class="text-white/80 hover:text-white"><i class="fas fa-times"></i></button>
                </div>
                
                <form :action="'{{ url('/admin/kamar') }}/' + editRoomData.id + '/update'" method="POST" enctype="multipart/form-data" class="p-6 space-y-4">
                    @csrf
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Nama Kamar</label>
                            <input type="text" name="name" :value="editRoomData.name" required class="w-full px-3 py-2 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Tipe Kamar</label>
                            <select name="type" :value="editRoomData.type" x-model="editRoomData.type" required class="w-full px-3 py-2 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm">
                                <option value="Standard">Standard</option>
                                <option value="Deluxe">Deluxe</option>
                                <option value="Suite">Suite</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Kapasitas (Orang)</label>
                            <input type="number" name="capacity" :value="editRoomData.capacity" required min="1" class="w-full px-3 py-2 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Harga Per Malam (Rp)</label>
                            <input type="number" name="price" :value="editRoomData.price" required min="0" class="w-full px-3 py-2 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Status</label>
                            <select name="status" :value="editRoomData.status" x-model="editRoomData.status" required class="w-full px-3 py-2 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm">
                                <option value="available">Tersedia</option>
                                <option value="booked">Penuh / Booked</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Foto Kamar (Opsional)</label>
                            <input type="file" name="image" class="w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-primary/5 file:text-primary hover:file:bg-primary/10">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Deskripsi Kamar</label>
                        <textarea name="description" rows="4" :value="editRoomData.description" x-model="editRoomData.description" required class="w-full px-3 py-2 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm"></textarea>
                    </div>

                    <div class="pt-4 border-t border-gray-100 flex justify-end space-x-2">
                        <button type="button" @click="editModalOpen = false" class="px-4 py-2 border border-gray-200 text-gray-600 font-semibold rounded-lg hover:bg-gray-50 text-xs">Batal</button>
                        <button type="submit" class="px-4 py-2 bg-primary text-white font-bold rounded-lg hover:bg-primary/95 text-xs">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
