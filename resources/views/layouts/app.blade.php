<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Parking TULT</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gradient-to-b from-red-500 to-white text-white font-sans">

    <header class="header flex justify-between items-center px-6 py-4 bg-gradient-to-b from-red-500 to-red-700">
        <div class="image">
            <img src="{{ asset('images/logo.png') }}" alt="Mobil" class="logo-image w-12 h-auto">
        </div>

        <nav class="flex items-center gap-6 text-white font-medium">
            <a href="{{ url('/') }}" class="hover:underline">Home</a>
            <a href="https://wa.me/6281267231499?text=Halo,%20saya%20pengguna%20website%20Anda%20dan%20ingin%20bertanya%20lebih%20lanjut." class="hover:underline">Hubungi kami</a>

            @if(session('dosen_nama'))
                <a href="{{ route('perizinan.form') }}" class="hover:underline">Perizinan</a>

                <span class="text-sm font-semibold text-white">
                    Hi, {{ session('dosen_nama') }}
                </span>

                <form method="POST" action="{{ route('dosen.logout') }}">
                    @csrf
                    <button type="submit"
                        class="bg-white text-red-600 font-bold px-4 py-1 rounded-full hover:bg-gray-200 transition">
                        Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="hover:underline">Dosen Login</a>
            @endif
        </nav>
    </header>

    @yield('content')

</body>
</html>
