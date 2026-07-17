@extends('layouts.admin')

@section('title', 'Kelola Galeri - Hotel Starking')

@section('content')
    <div class="space-y-8" x-data="{ addModalOpen: false, editModalOpen: false, editGalleryData: {} }">
        <!-- Header -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h1 class="text-2xl font-bold text-primary">Kelola Galeri Hotel</h1>
                <p class="text-gray-500 text-sm mt-1">Kelola data galeri foto hotel, upload gambar-gambar menarik untuk menarik minat pengunjung.</p>
            </div>
            <button @click="addModalOpen = true" class="px-5 py-2.5 bg-primary text-white font-bold text-sm rounded-xl hover:bg-primary/95 shadow-md flex items-center transition">
                <i class="fas fa-plus mr-2"></i> Tambah Foto Baru
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

        <!-- Galleries Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($galleries as $gallery)
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden flex flex-col justify-between group transition hover:shadow-md">
                    <!-- Image Area -->
                    <div class="aspect-[4/3] w-full overflow-hidden bg-gray-100 relative">
                        <img src="{{ Str::startsWith($gallery->image, 'http') ? $gallery->image : asset($gallery->image) }}" alt="{{ $gallery->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    </div>

                    <!-- Details & Actions Area -->
                    <div class="p-4 space-y-3">
                        <h4 class="font-bold text-gray-700 text-sm line-clamp-1" title="{{ $gallery->title }}">{{ $gallery->title }}</h4>
                        
                        <div class="flex items-center justify-between border-t border-gray-50 pt-3">
                            <span class="text-xs text-gray-400">ID: {{ $gallery->id }}</span>
                            <div class="flex items-center space-x-2">
                                <!-- Edit Button -->
                                <button @click="editGalleryData = {
                                    id: '{{ $gallery->id }}',
                                    title: '{{ addslashes($gallery->title) }}'
                                }; editModalOpen = true" class="text-blue-500 hover:text-blue-700 text-xs font-bold transition flex items-center">
                                    <i class="fas fa-edit mr-1"></i> Edit
                                </button>
                                <!-- Delete Button -->
                                <form action="{{ url('/admin/galeri') }}/{{ $gallery->id }}/delete" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus gambar ini?')" class="inline-block">
                                    @csrf
                                    <button type="submit" class="text-red-400 hover:text-red-600 text-xs font-bold transition flex items-center">
                                        <i class="fas fa-trash mr-1"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full bg-white rounded-2xl border border-gray-100 shadow-sm p-8 text-center text-gray-400 italic">
                    Belum ada data galeri foto. Silakan unggah.
                </div>
            @endforelse
        </div>

        @if($galleries->hasPages())
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-4">
                {{ $galleries->links() }}
            </div>
        @endif

        <!-- ADD MODAL -->
        <div x-show="addModalOpen" class="fixed inset-0 z-50 overflow-y-auto flex items-center justify-center p-4 bg-black/50 backdrop-blur-sm" style="display: none;" x-transition>
            <div class="bg-white rounded-2xl max-w-lg w-full overflow-hidden shadow-2xl border border-gray-100">
                <div class="px-6 py-4 bg-primary text-white flex items-center justify-between">
                    <h3 class="font-bold">Unggah Gambar Galeri</h3>
                    <button @click="addModalOpen = false" class="text-white/80 hover:text-white"><i class="fas fa-times"></i></button>
                </div>
                
                <form action="{{ url('/admin/galeri') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-4">
                    @csrf
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Judul / Keterangan Gambar</label>
                        <input type="text" name="title" required placeholder="Contoh: Kamar Deluxe Pemandangan Kota" class="w-full px-3 py-2 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Pilih File Gambar</label>
                        <input type="file" name="image" required class="w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-primary/5 file:text-primary hover:file:bg-primary/10">
                        <span class="text-xs text-gray-400 mt-1 block">Rekomendasi format JPEG/PNG dengan ukuran maksimal 2MB.</span>
                    </div>

                    <div class="pt-4 border-t border-gray-100 flex justify-end space-x-2">
                        <button type="button" @click="addModalOpen = false" class="px-4 py-2 border border-gray-200 text-gray-600 font-semibold rounded-lg hover:bg-gray-50 text-xs">Batal</button>
                        <button type="submit" class="px-4 py-2 bg-primary text-white font-bold rounded-lg hover:bg-primary/95 text-xs">Simpan Gambar</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- EDIT MODAL -->
        <div x-show="editModalOpen" class="fixed inset-0 z-50 overflow-y-auto flex items-center justify-center p-4 bg-black/50 backdrop-blur-sm" style="display: none;" x-transition>
            <div class="bg-white rounded-2xl max-w-lg w-full overflow-hidden shadow-2xl border border-gray-100">
                <div class="px-6 py-4 bg-primary text-white flex items-center justify-between">
                    <h3 class="font-bold">Edit Keterangan / Gambar Galeri</h3>
                    <button @click="editModalOpen = false" class="text-white/80 hover:text-white"><i class="fas fa-times"></i></button>
                </div>
                
                <form :action="'{{ url('/admin/galeri') }}/' + editGalleryData.id + '/update'" method="POST" enctype="multipart/form-data" class="p-6 space-y-4">
                    @csrf
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Judul / Keterangan Gambar</label>
                        <input type="text" name="title" :value="editGalleryData.title" required class="w-full px-3 py-2 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Ganti Gambar (Opsional)</label>
                        <input type="file" name="image" class="w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-primary/5 file:text-primary hover:file:bg-primary/10">
                        <span class="text-xs text-gray-400 mt-1 block">Biarkan kosong jika tidak ingin mengubah gambar yang sudah ada.</span>
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
