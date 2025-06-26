@extends('layouts.app')

@section('content')
<div class="min-h-screen flex flex-col justify-center px-4">
    <div class="flex flex-col md:flex-row items-center justify-center gap-12 w-full max-w-6xl mx-auto">
        <div class="bg-white rounded-xl shadow-xl p-8 w-full max-w-md">
            <h2 class="text-center text-xl md:text-2xl font-extrabold text-gray-800 mb-6 uppercase">
                Masukkan Kata Sandi Anda
            </h2>
            <form method="POST" action="{{ url('/dosen/login') }}" class="space-y-5">
                @csrf
<div>
    @if($errors->any())
        <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </ul>
        </div>
    @endif

    <label for="nama" class="block font-semibold mb-1 text-gray-800">Select Lecturer :</label>
    <select name="nama" id="nama" required
            class="w-full px-3 py-2 border rounded focus:ring-2 focus:ring-red-400 text-gray-800">
        <option value="">-- Pilih Dosen --</option>
        @foreach($dosens as $dosen)
            <option value="{{ $dosen->nama }}">{{ $dosen->nama }}</option>
        @endforeach
    </select>
</div>

<div class="relative">
    <label for="password" class="block font-semibold mb-1 text-gray-800">Password :</label>
    <input type="password" name="password" id="password"
           class="w-full px-3 py-2 border rounded focus:ring-2 focus:ring-red-400 pr-10 text-gray-800" required>

                    <span onclick="togglePassword()" class="absolute right-3 top-9 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </span>
                </div>

                <div class="text-center pt-2">
                    <button type="submit"
                            class="bg-gradient-to-b from-red-600 to-red-800 text-white font-bold px-8 py-2 rounded-full shadow-md hover:opacity-90 transition">
                        Submit
                    </button>
                </div>
            </form>
        </div>

        <div class="hidden md:block max-w-xs">
            <img src="{{ asset('images/car.png') }}" alt="Mobil Merah" class="w-full h-auto" />
        </div>
    </div>
</div>

<script>
    function togglePassword() {
        const input = document.getElementById('password');
        input.type = input.type === 'password' ? 'text' : 'password';
    }
</script>
@endsection
