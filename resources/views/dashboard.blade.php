<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Proyek Web - UTS & UAS</title>
    
    <!-- Google Fonts: Inter untuk tampilan modern & bersih -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Inter"', 'sans-serif']
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50 font-sans text-gray-800 min-h-screen flex flex-col justify-between">

    <!-- Header Sederhana -->
    <header class="bg-white border-b border-gray-200 py-5">
        <div class="max-w-6xl mx-auto px-6 flex flex-col sm:flex-row justify-between items-center gap-3">
            <div class="flex items-center space-x-3">
                <div class="w-9 h-9 rounded-lg bg-blue-600 flex items-center justify-center text-white font-bold text-lg">
                    P
                </div>
                <span class="font-bold text-gray-900 tracking-wide text-base">Portal Proyek Mandiri</span>
            </div>
            <div class="text-xs text-gray-500 font-semibold bg-gray-100 px-3 py-1.5 rounded-full">
                <i class="far fa-calendar-alt text-blue-600 mr-1.5"></i> {{ date('d F Y') }}
            </div>
        </div>
    </header>

    <!-- Konten Utama -->
    <main class="max-w-4xl mx-auto px-6 py-12 flex-grow flex flex-col justify-center">
        <!-- Judul Utama -->
        <div class="text-center max-w-xl mx-auto mb-12">
            <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight mb-3">
                Menu Pilihan Proyek
            </h1>
            <p class="text-gray-600 text-sm sm:text-base leading-relaxed">
                Silakan pilih salah satu proyek di bawah ini untuk melihat hasil pengerjaan aplikasi UTS atau UAS saya.
            </p>
        </div>

        <!-- Dua Kartu Sederhana -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- UTS CARD -->
            <div class="bg-white rounded-2xl border border-gray-200 p-8 flex flex-col justify-between shadow-sm hover:shadow-md transition-shadow duration-200">
                <div class="space-y-4">
                    <div class="w-12 h-12 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center text-xl border border-amber-100">
                        <i class="fas fa-ticket-alt"></i>
                    </div>
                    <div class="space-y-2">
                        <h2 class="text-xl font-bold text-gray-900">Proyek UTS</h2>
                        <h3 class="text-sm font-semibold text-amber-600 uppercase tracking-wider">Tiket Travel Online</h3>
                        <p class="text-gray-500 text-sm leading-relaxed">
                            Aplikasi pemesanan tiket travel sederhana. Memiliki fitur form pendaftaran, melihat daftar pendaftar, produk travel, serta halaman kontak.
                        </p>
                    </div>
                </div>

                <div class="pt-6 border-t border-gray-100 mt-6">
                    <a href="{{ url('/uts') }}" class="w-full py-3 bg-amber-500 hover:bg-amber-600 text-white font-bold text-sm rounded-xl text-center block transition-colors">
                        Buka Aplikasi UTS <i class="fas fa-arrow-right ml-1.5 text-xs"></i>
                    </a>
                </div>
            </div>

            <!-- UAS CARD -->
            <div class="bg-white rounded-2xl border border-gray-200 p-8 flex flex-col justify-between shadow-sm hover:shadow-md transition-shadow duration-200">
                <div class="space-y-4">
                    <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center text-xl border border-blue-100">
                        <i class="fas fa-hotel"></i>
                    </div>
                    <div class="space-y-2">
                        <h2 class="text-xl font-bold text-gray-900">Proyek UAS</h2>
                        <h3 class="text-sm font-semibold text-blue-600 uppercase tracking-wider">Hotel Starking - Booking</h3>
                        <p class="text-gray-500 text-sm leading-relaxed">
                            Aplikasi reservasi hotel modern. Memiliki fitur filter kamar, form booking, live kalkulasi harga, ulasan testimoni, serta halaman admin panel.
                        </p>
                    </div>
                </div>

                <div class="pt-6 border-t border-gray-100 mt-6">
                    <a href="{{ url('/uas') }}" class="w-full py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold text-sm rounded-xl text-center block transition-colors">
                        Buka Aplikasi UAS <i class="fas fa-arrow-right ml-1.5 text-xs"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Profil Singkat -->
        <div class="mt-12 bg-white p-5 rounded-xl border border-gray-200 max-w-sm mx-auto w-full shadow-sm text-center">
            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block mb-2">Identitas Pembuat</span>
            <p class="text-sm font-bold text-gray-800">Nama: <span class="font-normal text-gray-600">A. Hasan Fajrud Dhuha</span></p>
            <p class="text-xs text-gray-500 mt-0.5">Tugas Praktikum Pemrograman Web</p>
        </div>
    </main>

    <!-- Footer Sederhana -->
    <footer class="bg-white border-t border-gray-200 py-5 text-center text-xs text-gray-500">
        <p>&copy; {{ date('Y') }} A. Hasan Fajrud Dhuha. Seluruh Hak Cipta Dilindungi.</p>
    </footer>

</body>
</html>