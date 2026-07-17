<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Login Admin - Hotel Starking">
    <title>Login Admin - Hotel Starking</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans bg-light text-dark min-h-screen flex items-center justify-center p-4">

    <div class="max-w-md w-full bg-white rounded-2xl border border-gray-100 shadow-2xl overflow-hidden">
        <!-- Header -->
        <div class="bg-primary text-white p-8 text-center relative overflow-hidden">
            <div class="absolute inset-0 opacity-15">
                <img src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?auto=format&fit=crop&w=800&q=80" alt="Hotel Banner" class="w-full h-full object-cover">
            </div>
            <div class="relative z-10 space-y-2">
                <span class="text-2xl font-bold tracking-wider">HOTEL <span class="text-secondary">STARKING</span></span>
                <p class="text-xs text-gray-200 uppercase tracking-widest font-semibold">Dashboard Admin Login</p>
            </div>
        </div>

        <!-- Form Body -->
        <div class="p-8">
            @if(session('error'))
                <div class="p-4 mb-6 bg-red-50 text-red-700 text-sm font-semibold rounded-xl border border-red-200">
                    <i class="fas fa-exclamation-circle mr-2"></i> {{ session('error') }}
                </div>
            @endif

            @if($errors->any())
                <div class="p-4 mb-6 bg-red-50 text-red-700 text-sm font-semibold rounded-xl border border-red-200 space-y-1">
                    <ul class="list-disc pl-5 font-normal">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ url('/login') }}" method="POST" class="space-y-6">
                @csrf
                
                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Email Admin</label>
                    <div class="relative">
                        <input type="email" name="email" required placeholder="admin@starking.com" value="{{ old('email') }}" class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm font-medium">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                            <i class="fas fa-envelope"></i>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="flex justify-between items-center mb-2">
                        <label class="block text-xs font-bold text-gray-500 uppercase">Kata Sandi</label>
                    </div>
                    <div class="relative">
                        <input type="password" name="password" required placeholder="••••••••" class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm font-medium">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                            <i class="fas fa-lock"></i>
                        </div>
                    </div>
                </div>

                <div class="flex items-center">
                    <input id="remember_me" name="remember" type="checkbox" class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded">
                    <label for="remember_me" class="ml-2 block text-xs font-semibold text-gray-600">Ingat Saya</label>
                </div>

                <button type="submit" class="w-full py-4 bg-primary text-white font-bold rounded-xl hover:bg-primary/95 shadow-lg shadow-primary/20 transition duration-150 text-sm">
                    <i class="fas fa-sign-in-alt mr-2"></i> Masuk ke Dashboard
                </button>
            </form>

            <div class="mt-8 pt-6 border-t border-gray-100 text-center">
                <a href="{{ url('/home') }}" class="text-xs font-semibold text-gray-500 hover:text-primary transition">
                    <i class="fas fa-arrow-left mr-2"></i> Kembali ke Beranda Utama
                </a>
            </div>
        </div>
    </div>

</body>
</html>