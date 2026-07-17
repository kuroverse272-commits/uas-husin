@extends('layouts.admin')

@section('title', 'Kelola Fasilitas - Hotel Starking')

@section('content')
    <div class="space-y-8" x-data="{ addModalOpen: false, editModalOpen: false, editFacilityData: {} }">
        <!-- Header -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h1 class="text-2xl font-bold text-primary">Kelola Fasilitas Hotel</h1>
                <p class="text-gray-500 text-sm mt-1">Kelola data fasilitas yang disediakan oleh hotel, lengkap dengan ikon visual dan deskripsi singkat.</p>
            </div>
            <button @click="addModalOpen = true" class="px-5 py-2.5 bg-primary text-white font-bold text-sm rounded-xl hover:bg-primary/95 shadow-md flex items-center transition">
                <i class="fas fa-plus mr-2"></i> Tambah Fasilitas Baru
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

        <!-- Facilities Grid/Table Card -->
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-gray-500">
                    <thead class="text-xs text-gray-400 uppercase bg-gray-50/50 border-b border-gray-100">
                        <tr>
                            <th class="px-6 py-3 font-semibold">Ikon</th>
                            <th class="px-6 py-3 font-semibold">Nama Fasilitas</th>
                            <th class="px-6 py-3 font-semibold">Deskripsi</th>
                            <th class="px-6 py-3 font-semibold text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($facilities as $facility)
                            <tr class="hover:bg-gray-50/30 transition">
                                <td class="px-6 py-4">
                                    <div class="w-10 h-10 rounded-lg bg-primary/5 text-primary flex items-center justify-center text-lg">
                                        <i class="{{ $facility->icon }}"></i>
                                    </div>
                                </td>
                                <td class="px-6 py-4 font-bold text-gray-700">
                                    {{ $facility->name }}
                                </td>
                                <td class="px-6 py-4 text-gray-500 max-w-xs truncate">
                                    {{ $facility->description ?? '-' }}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center space-x-3">
                                        <!-- Edit button -->
                                        <button @click="editFacilityData = {
                                            id: '{{ $facility->id }}',
                                            name: '{{ addslashes($facility->name) }}',
                                            icon: '{{ $facility->icon }}',
                                            description: '{{ addslashes($facility->description) }}'
                                        }; editModalOpen = true" class="text-blue-500 hover:text-blue-700 transition" title="Edit Fasilitas">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <!-- Delete button -->
                                        <form action="{{ url('/admin/fasilitas') }}/{{ $facility->id }}/delete" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus fasilitas ini?')" class="inline-block">
                                            @csrf
                                            <button type="submit" class="text-red-400 hover:text-red-600 transition" title="Hapus Fasilitas">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-8 text-center text-gray-400 italic">Belum ada data fasilitas hotel. Silakan tambahkan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            @if($facilities->hasPages())
                <div class="px-6 py-4 border-t border-gray-100">
                    {{ $facilities->links() }}
                </div>
            @endif
        </div>

        <!-- ADD MODAL -->
        <div x-show="addModalOpen" class="fixed inset-0 z-50 overflow-y-auto flex items-center justify-center p-4 bg-black/50 backdrop-blur-sm" style="display: none;" x-transition>
            <div class="bg-white rounded-2xl max-w-lg w-full overflow-hidden shadow-2xl border border-gray-100">
                <div class="px-6 py-4 bg-primary text-white flex items-center justify-between">
                    <h3 class="font-bold">Tambah Fasilitas Baru</h3>
                    <button @click="addModalOpen = false" class="text-white/80 hover:text-white"><i class="fas fa-times"></i></button>
                </div>
                
                <form action="{{ url('/admin/fasilitas') }}" method="POST" class="p-6 space-y-4">
                    @csrf
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Nama Fasilitas</label>
                        <input type="text" name="name" required placeholder="Contoh: Kolam Renang, WiFi Gratis" class="w-full px-3 py-2 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Ikon FontAwesome Class</label>
                        <input type="text" name="icon" required placeholder="Contoh: fas fa-wifi, fas fa-swimming-pool" class="w-full px-3 py-2 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm">
                        <span class="text-xs text-gray-400 mt-1 block">Gunakan class ikon FontAwesome 6 (e.g. `fas fa-wifi`).</span>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Deskripsi</label>
                        <textarea name="description" rows="4" class="w-full px-3 py-2 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm" placeholder="Jelaskan secara singkat fasilitas ini..."></textarea>
                    </div>

                    <div class="pt-4 border-t border-gray-100 flex justify-end space-x-2">
                        <button type="button" @click="addModalOpen = false" class="px-4 py-2 border border-gray-200 text-gray-600 font-semibold rounded-lg hover:bg-gray-50 text-xs">Batal</button>
                        <button type="submit" class="px-4 py-2 bg-primary text-white font-bold rounded-lg hover:bg-primary/95 text-xs">Simpan Fasilitas</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- EDIT MODAL -->
        <div x-show="editModalOpen" class="fixed inset-0 z-50 overflow-y-auto flex items-center justify-center p-4 bg-black/50 backdrop-blur-sm" style="display: none;" x-transition>
            <div class="bg-white rounded-2xl max-w-lg w-full overflow-hidden shadow-2xl border border-gray-100">
                <div class="px-6 py-4 bg-primary text-white flex items-center justify-between">
                    <h3 class="font-bold">Edit Data Fasilitas</h3>
                    <button @click="editModalOpen = false" class="text-white/80 hover:text-white"><i class="fas fa-times"></i></button>
                </div>
                
                <form :action="'{{ url('/admin/fasilitas') }}/' + editFacilityData.id + '/update'" method="POST" class="p-6 space-y-4">
                    @csrf
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Nama Fasilitas</label>
                        <input type="text" name="name" :value="editFacilityData.name" required class="w-full px-3 py-2 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Ikon FontAwesome Class</label>
                        <input type="text" name="icon" :value="editFacilityData.icon" required class="w-full px-3 py-2 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm">
                        <span class="text-xs text-gray-400 mt-1 block">Gunakan class ikon FontAwesome 6 (e.g. `fas fa-wifi`).</span>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Deskripsi</label>
                        <textarea name="description" rows="4" :value="editFacilityData.description" x-model="editFacilityData.description" class="w-full px-3 py-2 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm"></textarea>
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
