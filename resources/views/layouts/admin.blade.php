<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel - Hotel Starking')</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- AlpineJS -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans bg-gray-50 text-dark flex min-h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-primary text-white flex-shrink-0 flex flex-col justify-between hidden md:flex border-r border-primary/20">
        <div>
            <!-- Sidebar Header -->
            <div class="h-20 flex items-center justify-center border-b border-white/10 px-6">
                <a href="{{ url('/admin/dashboard') }}" class="flex items-center space-x-2">
                    <span class="text-xl font-bold tracking-wider uppercase">STARKING <span class="text-secondary">ADMIN</span></span>
                </a>
            </div>

            <!-- Navigation Menu -->
            <nav class="mt-6 px-4 space-y-1">
                <a href="{{ url('/admin/dashboard') }}" class="flex items-center px-4 py-3 text-sm font-medium rounded-xl transition duration-150 {{ Request::is('admin/dashboard') ? 'bg-secondary text-primary' : 'text-gray-300 hover:bg-white/5 hover:text-white' }}">
                    <i class="fas fa-chart-line mr-3 text-base"></i> Dashboard
                </a>
                <a href="{{ url('/admin/kamar') }}" class="flex items-center px-4 py-3 text-sm font-medium rounded-xl transition duration-150 {{ Request::is('admin/kamar*') ? 'bg-secondary text-primary' : 'text-gray-300 hover:bg-white/5 hover:text-white' }}">
                    <i class="fas fa-bed mr-3 text-base"></i> Kelola Kamar
                </a>
                <a href="{{ url('/admin/booking') }}" class="flex items-center px-4 py-3 text-sm font-medium rounded-xl transition duration-150 {{ Request::is('admin/booking*') ? 'bg-secondary text-primary' : 'text-gray-300 hover:bg-white/5 hover:text-white' }}">
                    <i class="fas fa-calendar-check mr-3 text-base"></i> Kelola Booking
                </a>
                <a href="{{ url('/admin/fasilitas') }}" class="flex items-center px-4 py-3 text-sm font-medium rounded-xl transition duration-150 {{ Request::is('admin/fasilitas*') ? 'bg-secondary text-primary' : 'text-gray-300 hover:bg-white/5 hover:text-white' }}">
                    <i class="fas fa-concierge-bell mr-3 text-base"></i> Kelola Fasilitas
                </a>
                <a href="{{ url('/admin/galeri') }}" class="flex items-center px-4 py-3 text-sm font-medium rounded-xl transition duration-150 {{ Request::is('admin/galeri*') ? 'bg-secondary text-primary' : 'text-gray-300 hover:bg-white/5 hover:text-white' }}">
                    <i class="fas fa-images mr-3 text-base"></i> Kelola Galeri
                </a>
                <a href="{{ url('/admin/testimoni') }}" class="flex items-center px-4 py-3 text-sm font-medium rounded-xl transition duration-150 {{ Request::is('admin/testimoni*') ? 'bg-secondary text-primary' : 'text-gray-300 hover:bg-white/5 hover:text-white' }}">
                    <i class="fas fa-comment-dots mr-3 text-base"></i> Kelola Testimoni
                </a>
            </nav>
        </div>

        <!-- Sidebar Footer -->
        <div class="p-4 border-t border-white/10">
            <a href="{{ url('/home') }}" class="flex items-center px-4 py-3 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white rounded-xl transition duration-150 mb-2">
                <i class="fas fa-globe mr-3 text-base"></i> Lihat Website
            </a>
            <form action="{{ url('/logout') }}" method="POST" class="w-full">
                @csrf
                <button type="submit" class="w-full flex items-center px-4 py-3 text-sm font-medium text-red-400 hover:bg-red-500/10 hover:text-red-300 rounded-xl transition duration-150">
                    <i class="fas fa-sign-out-alt mr-3 text-base"></i> Keluar
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content Area -->
    <div class="flex-1 flex flex-col min-w-0 overflow-x-hidden">
        <!-- Top Nav Header -->
        <header class="h-20 bg-white border-b border-gray-100 flex items-center justify-between px-8 z-10 sticky top-0">
            <!-- Mobile Menu Toggle Button -->
            <div class="md:hidden flex items-center" x-data="{ open: false }">
                <button @click="open = !open" class="text-gray-500 hover:text-primary focus:outline-none">
                    <i class="fas fa-bars text-xl"></i>
                </button>
                
                <!-- Mobile Navigation Panel -->
                <div x-show="open" @click.away="open = false" class="absolute top-20 left-0 w-full bg-white border-b border-gray-200 shadow-xl py-4 px-6 space-y-2 z-50" style="display: none;">
                    <a href="{{ url('/admin/dashboard') }}" class="block py-2 text-sm font-semibold text-gray-700 hover:text-primary">Dashboard</a>
                    <a href="{{ url('/admin/kamar') }}" class="block py-2 text-sm font-semibold text-gray-700 hover:text-primary">Kelola Kamar</a>
                    <a href="{{ url('/admin/booking') }}" class="block py-2 text-sm font-semibold text-gray-700 hover:text-primary">Kelola Booking</a>
                    <a href="{{ url('/admin/fasilitas') }}" class="block py-2 text-sm font-semibold text-gray-700 hover:text-primary">Kelola Fasilitas</a>
                    <a href="{{ url('/admin/galeri') }}" class="block py-2 text-sm font-semibold text-gray-700 hover:text-primary">Kelola Galeri</a>
                    <a href="{{ url('/admin/testimoni') }}" class="block py-2 text-sm font-semibold text-gray-700 hover:text-primary">Kelola Testimoni</a>
                    <hr class="border-gray-100 my-2">
                    <a href="{{ url('/home') }}" class="block py-2 text-sm font-semibold text-primary">Lihat Website</a>
                    <form action="{{ url('/logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full text-left py-2 text-sm font-semibold text-red-600">Keluar</button>
                    </form>
                </div>
            </div>

            <!-- Page Title Placeholder / Welcome -->
            <div class="hidden sm:block">
                <h2 class="text-sm font-bold text-gray-400 uppercase tracking-widest">Selamat Datang</h2>
                <h1 class="text-lg font-bold text-primary">{{ Auth::user()->name }}</h1>
            </div>

            <!-- User Info / Quick Actions -->
            <div class="flex items-center space-x-6">
                <span class="text-xs text-gray-400 font-medium hidden lg:inline-block">
                    <i class="far fa-calendar-alt mr-2 text-secondary"></i> {{ date('d F Y') }}
                </span>
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 rounded-full bg-primary/5 flex items-center justify-center text-primary font-bold border border-primary/10">
                        {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                    </div>
                </div>
            </div>
        </header>

        <!-- Dynamic Content Body -->
        <main class="flex-grow p-8">
            @yield('content')
        </main>
    </div>

</body>
</html>
