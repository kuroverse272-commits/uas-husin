@extends('layouts.admin')

@section('title', 'Kelola Testimoni - Hotel Starking')

@section('content')
    <div class="space-y-8" x-data="{ addModalOpen: false, editModalOpen: false, editTestimonialData: {} }">
        <!-- Header -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h1 class="text-2xl font-bold text-primary">Kelola Testimoni Pelanggan</h1>
                <p class="text-gray-500 text-sm mt-1">Kelola data ulasan atau testimoni pelanggan yang akan ditampilkan di halaman utama.</p>
            </div>
            <button @click="addModalOpen = true" class="px-5 py-2.5 bg-primary text-white font-bold text-sm rounded-xl hover:bg-primary/95 shadow-md flex items-center transition">
                <i class="fas fa-plus mr-2"></i> Tambah Testimoni Baru
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

        <!-- Testimonials Table Card -->
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-gray-500">
                    <thead class="text-xs text-gray-400 uppercase bg-gray-50/50 border-b border-gray-100">
                        <tr>
                            <th class="px-6 py-3 font-semibold">Foto</th>
                            <th class="px-6 py-3 font-semibold">Nama</th>
                            <th class="px-6 py-3 font-semibold">Pekerjaan</th>
                            <th class="px-6 py-3 font-semibold">Ulasan / Testimoni</th>
                            <th class="px-6 py-3 font-semibold text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($testimonials as $testimonial)
                            <tr class="hover:bg-gray-50/30 transition">
                                <td class="px-6 py-4">
                                    <div class="w-12 h-12 rounded-full overflow-hidden border border-gray-100 bg-gray-50">
                                        @if($testimonial->photo)
                                            <img src="{{ Str::startsWith($testimonial->photo, 'http') ? $testimonial->photo : asset($testimonial->photo) }}" alt="{{ $testimonial->name }}" class="w-full h-full object-cover">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center bg-primary/5 text-primary font-bold">
                                                {{ substr($testimonial->name, 0, 1) }}
                                            </div>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4 font-bold text-gray-700">
                                    {{ $testimonial->name }}
                                </td>
                                <td class="px-6 py-4 text-gray-600 font-medium">
                                    {{ $testimonial->job }}
                                </td>
                                <td class="px-6 py-4 text-gray-500 max-w-sm truncate" title="{{ $testimonial->message }}">
                                    {{ $testimonial->message }}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center space-x-3">
                                        <!-- Edit button -->
                                        <button @click="editTestimonialData = {
                                            id: '{{ $testimonial->id }}',
                                            name: '{{ addslashes($testimonial->name) }}',
                                            job: '{{ addslashes($testimonial->job) }}',
                                            message: '{{ addslashes($testimonial->message) }}'
                                        }; editModalOpen = true" class="text-blue-500 hover:text-blue-700 transition" title="Edit Testimoni">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <!-- Delete button -->
                                        <form action="{{ url('/admin/testimoni') }}/{{ $testimonial->id }}/delete" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus testimoni ini?')" class="inline-block">
                                            @csrf
                                            <button type="submit" class="text-red-400 hover:text-red-600 transition" title="Hapus Testimoni">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-8 text-center text-gray-400 italic">Belum ada data testimoni pelanggan. Silakan tambahkan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            @if($testimonials->hasPages())
                <div class="px-6 py-4 border-t border-gray-100">
                    {{ $testimonials->links() }}
                </div>
            @endif
        </div>

        <!-- ADD MODAL -->
        <div x-show="addModalOpen" class="fixed inset-0 z-50 overflow-y-auto flex items-center justify-center p-4 bg-black/50 backdrop-blur-sm" style="display: none;" x-transition>
            <div class="bg-white rounded-2xl max-w-lg w-full overflow-hidden shadow-2xl border border-gray-100">
                <div class="px-6 py-4 bg-primary text-white flex items-center justify-between">
                    <h3 class="font-bold">Tambah Testimoni Baru</h3>
                    <button @click="addModalOpen = false" class="text-white/80 hover:text-white"><i class="fas fa-times"></i></button>
                </div>
                
                <form action="{{ url('/admin/testimoni') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-4">
                    @csrf
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Nama Pelanggan</label>
                            <input type="text" name="name" required placeholder="Contoh: John Doe" class="w-full px-3 py-2 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Pekerjaan / Jabatan</label>
                            <input type="text" name="job" required placeholder="Contoh: Pengusaha, IT Manager" class="w-full px-3 py-2 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Foto Profil (Opsional)</label>
                        <input type="file" name="photo" class="w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-primary/5 file:text-primary hover:file:bg-primary/10">
                        <span class="text-xs text-gray-400 mt-1 block">Ukuran maksimal foto 2MB.</span>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Ulasan / Testimoni</label>
                        <textarea name="message" rows="4" required placeholder="Tuliskan pengalaman menyenangkan menginap di sini..." class="w-full px-3 py-2 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm"></textarea>
                    </div>

                    <div class="pt-4 border-t border-gray-100 flex justify-end space-x-2">
                        <button type="button" @click="addModalOpen = false" class="px-4 py-2 border border-gray-200 text-gray-600 font-semibold rounded-lg hover:bg-gray-50 text-xs">Batal</button>
                        <button type="submit" class="px-4 py-2 bg-primary text-white font-bold rounded-lg hover:bg-primary/95 text-xs">Simpan Testimoni</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- EDIT MODAL -->
        <div x-show="editModalOpen" class="fixed inset-0 z-50 overflow-y-auto flex items-center justify-center p-4 bg-black/50 backdrop-blur-sm" style="display: none;" x-transition>
            <div class="bg-white rounded-2xl max-w-lg w-full overflow-hidden shadow-2xl border border-gray-100">
                <div class="px-6 py-4 bg-primary text-white flex items-center justify-between">
                    <h3 class="font-bold">Edit Data Testimoni</h3>
                    <button @click="editModalOpen = false" class="text-white/80 hover:text-white"><i class="fas fa-times"></i></button>
                </div>
                
                <form :action="'{{ url('/admin/testimoni') }}/' + editTestimonialData.id + '/update'" method="POST" enctype="multipart/form-data" class="p-6 space-y-4">
                    @csrf
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Nama Pelanggan</label>
                            <input type="text" name="name" :value="editTestimonialData.name" required class="w-full px-3 py-2 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Pekerjaan / Jabatan</label>
                            <input type="text" name="job" :value="editTestimonialData.job" required class="w-full px-3 py-2 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Foto Profil (Opsional)</label>
                        <input type="file" name="photo" class="w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-primary/5 file:text-primary hover:file:bg-primary/10">
                        <span class="text-xs text-gray-400 mt-1 block">Biarkan kosong jika tidak ingin mengubah foto profil.</span>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Ulasan / Testimoni</label>
                        <textarea name="message" rows="4" :value="editTestimonialData.message" x-model="editTestimonialData.message" required class="w-full px-3 py-2 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm"></textarea>
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
