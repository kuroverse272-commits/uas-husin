<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Hotel Starking - Booking kamar hotel mewah secara online dengan layanan bintang 5 terbaik.">
    <title>@yield('title', 'Hotel Starking - Kemewahan & Kenyamanan Terbaik')</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- AlpineJS for interactive components -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans bg-light text-dark selection:bg-secondary selection:text-white flex flex-col min-h-screen">

    <!-- Header / Navbar -->
    <header class="bg-white/80 backdrop-blur-md sticky top-0 z-50 border-b border-gray-100 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="{{ url('/home') }}" class="flex items-center space-x-2">
                        <span class="text-2xl font-bold tracking-wider text-primary">HOTEL <span class="text-secondary">STARKING</span></span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <nav class="hidden md:flex space-x-8 text-sm font-medium items-center">
                    <a href="{{ url('/') }}" class="text-secondary hover:text-primary py-2 px-1 transition duration-150 flex items-center font-bold mr-2"><i class="fas fa-arrow-left mr-1.5 text-xs"></i> Portal Utama</a>
                    <a href="{{ url('/home') }}" class="{{ Request::is('home') ? 'text-primary border-b-2 border-primary' : 'text-gray-500 hover:text-primary' }} py-2 px-1 transition duration-150">Beranda</a>
                    <a href="{{ url('/kamar') }}" class="{{ Request::is('kamar') ? 'text-primary border-b-2 border-primary' : 'text-gray-500 hover:text-primary' }} py-2 px-1 transition duration-150">Kamar</a>
                    <a href="{{ url('/galeri') }}" class="{{ Request::is('galeri') ? 'text-primary border-b-2 border-primary' : 'text-gray-500 hover:text-primary' }} py-2 px-1 transition duration-150">Galeri</a>
                    <a href="{{ url('/tentang') }}" class="{{ Request::is('tentang') ? 'text-primary border-b-2 border-primary' : 'text-gray-500 hover:text-primary' }} py-2 px-1 transition duration-150">Tentang Kami</a>
                    <a href="{{ url('/kontak') }}" class="{{ Request::is('kontak') ? 'text-primary border-b-2 border-primary' : 'text-gray-500 hover:text-primary' }} py-2 px-1 transition duration-150">Kontak</a>
                </nav>

                <!-- Actions -->
                <div class="hidden md:flex items-center space-x-4">
                    @auth
                        <a href="{{ url('/admin/dashboard') }}" class="text-sm font-medium text-primary hover:text-primary/80">Dashboard Admin</a>
                        <form action="{{ url('/logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="text-sm font-medium text-red-600 hover:text-red-500">Keluar</button>
                        </form>
                    @else
                        <a href="{{ url('/login') }}" class="text-sm font-medium text-gray-500 hover:text-primary transition duration-150">Login Admin</a>
                    @endauth
                    <a href="{{ url('/booking') }}" class="inline-flex items-center justify-center px-5 py-2.5 border border-transparent text-sm font-semibold rounded-lg text-white bg-primary hover:bg-primary/95 shadow-md shadow-primary/10 hover:shadow-lg hover:shadow-primary/20 transform hover:-translate-y-0.5 transition-all duration-150">
                        Pesan Sekarang
                    </a>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center" x-data="{ open: false }">
                    <button @click="open = !open" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-primary hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Buka menu</span>
                        <svg class="h-6 w-6" :class="{'hidden': open, 'block': !open }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg class="h-6 w-6" :class="{'block': open, 'hidden': !open }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>

                    <!-- Mobile Menu panel -->
                    <div x-show="open" @click.away="open = false" class="absolute top-20 right-0 w-full bg-white border-b border-gray-200 shadow-xl py-4 px-6 space-y-3 z-50" style="display: none;">
                        <a href="{{ url('/') }}" class="block text-base font-bold text-secondary hover:text-primary py-2 border-b border-gray-50"><i class="fas fa-arrow-left mr-2"></i> Portal Utama</a>
                        <a href="{{ url('/home') }}" class="block text-base font-semibold text-gray-700 hover:text-primary py-2">Beranda</a>
                        <a href="{{ url('/kamar') }}" class="block text-base font-semibold text-gray-700 hover:text-primary py-2">Kamar</a>
                        <a href="{{ url('/galeri') }}" class="block text-base font-semibold text-gray-700 hover:text-primary py-2">Galeri</a>
                        <a href="{{ url('/tentang') }}" class="block text-base font-semibold text-gray-700 hover:text-primary py-2">Tentang Kami</a>
                        <a href="{{ url('/kontak') }}" class="block text-base font-semibold text-gray-700 hover:text-primary py-2">Kontak</a>
                        <div class="pt-4 border-t border-gray-100 flex flex-col space-y-3">
                            @auth
                                <a href="{{ url('/admin/dashboard') }}" class="block text-base font-semibold text-primary">Dashboard Admin</a>
                                <form action="{{ url('/logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="w-full text-left text-base font-semibold text-red-600">Keluar</button>
                                </form>
                            @else
                                <a href="{{ url('/login') }}" class="block text-base font-semibold text-gray-600 hover:text-primary py-2">Login Admin</a>
                            @endauth
                            <a href="{{ url('/booking') }}" class="w-full text-center py-3 px-4 rounded-lg bg-primary text-white font-semibold shadow-md">
                                Pesan Sekarang
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-primary text-white pt-16 pb-8 border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-12">
                <!-- About / Logo -->
                <div class="col-span-1 md:col-span-1">
                    <span class="text-2xl font-bold tracking-wider text-white">HOTEL <span class="text-secondary">STARKING</span></span>
                    <p class="mt-4 text-gray-300 text-sm leading-relaxed">
                        Rasakan kemewahan menginap berkelas bintang 5 dengan pelayanan istimewa, kenyamanan kamar yang tak tertandingi, serta fasilitas modern untuk perjalanan Anda.
                    </p>
                    <div class="mt-6 flex space-x-4 text-gray-300">
                        <a href="#" class="hover:text-secondary transition"><i class="fab fa-facebook-f text-lg"></i></a>
                        <a href="#" class="hover:text-secondary transition"><i class="fab fa-instagram text-lg"></i></a>
                        <a href="#" class="hover:text-secondary transition"><i class="fab fa-twitter text-lg"></i></a>
                        <a href="#" class="hover:text-secondary transition"><i class="fab fa-youtube text-lg"></i></a>
                    </div>
                </div>

                <!-- Navigation Links -->
                <div>
                    <h3 class="text-lg font-bold text-secondary mb-4">Navigasi</h3>
                    <ul class="space-y-2 text-sm text-gray-300">
                        <li><a href="{{ url('/home') }}" class="hover:text-white transition">Beranda</a></li>
                        <li><a href="{{ url('/kamar') }}" class="hover:text-white transition">Daftar Kamar</a></li>
                        <li><a href="{{ url('/galeri') }}" class="hover:text-white transition">Galeri Foto</a></li>
                        <li><a href="{{ url('/tentang') }}" class="hover:text-white transition">Tentang Kami</a></li>
                        <li><a href="{{ url('/kontak') }}" class="hover:text-white transition">Hubungi Kami</a></li>
                    </ul>
                </div>

                <!-- Facilities (Quick links) -->
                <div>
                    <h3 class="text-lg font-bold text-secondary mb-4">Fasilitas Utama</h3>
                    <ul class="space-y-2 text-sm text-gray-300">
                        <li><i class="fas fa-wifi text-secondary mr-2"></i> Free Wi-Fi 24 Jam</li>
                        <li><i class="fas fa-swimming-pool text-secondary mr-2"></i> Kolam Renang Outdoor</li>
                        <li><i class="fas fa-utensils text-secondary mr-2"></i> Restoran Fine Dining</li>
                        <li><i class="fas fa-dumbbell text-secondary mr-2"></i> Pusat Kebugaran</li>
                        <li><i class="fas fa-spa text-secondary mr-2"></i> Spa & Relaksasi</li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h3 class="text-lg font-bold text-secondary mb-4">Kontak Kami</h3>
                    <ul class="space-y-3 text-sm text-gray-300">
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt text-secondary mt-1 mr-3"></i>
                            <span>Jl. Starking No. 99, Dago, Bandung, Jawa Barat, Indonesia</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone-alt text-secondary mr-3"></i>
                            <span>+62 22 1234567</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope text-secondary mr-3"></i>
                            <span>info@hotelstarking.com</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Bottom Footer -->
            <div class="pt-8 border-t border-gray-800 text-center text-xs text-gray-400">
                <p>&copy; {{ date('Y') }} Hotel Starking. Hak Cipta Dilindungi. Dibuat untuk Proyek UAS.</p>
                <div class="mt-2">
                    <a href="{{ url('/uas') }}" class="text-gray-500 hover:text-gray-300 transition mr-4">Website UAS</a>
                    <a href="{{ url('/') }}" class="text-gray-500 hover:text-gray-300 transition">Dashboard UTS/UAS</a>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
