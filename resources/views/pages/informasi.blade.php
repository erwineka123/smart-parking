@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-red-500 to-white flex flex-col items-center justify-center p-8">
    <h1 class="text-2xl font-bold text-white mb-6">Smart Parking TULT BASEMENT</h1>

    <div class="bg-white rounded-xl shadow-xl w-full max-w-5xl p-8">
        <h2 class="text-xl font-bold text-gray-800 mb-6">Informasi Parkir Khusus</h2>

        <div class="flex gap-6 justify-center flex-wrap">
            @if(session('dosen_nama'))
                {{-- for user dosen login --}}
                <div class="{{ $izin ? 'bg-green-500' : 'bg-red-600' }} p-6 rounded-md shadow-md text-center w-48 text-white">
                    <p class="text-lg font-bold">{{ $dosen }}</p>
                    <p class="text-sm font-semibold mt-2">Status: {{ $izin ? 'Diizinkan' : 'Tidak diizinkan' }}</p>
                    <p class="text-sm">Tanggal: {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</p>
                    <p class="text-sm mt-1">Jam:
                        {{ $izin ? $izin->start_time . ' - ' . $izin->end_time : '-' }}
                    </p>
                    <p class="text-sm mt-1">Sekarang: {{ $now->format('H:i') }}</p>
                </div>
            @else
                {{-- for user guest --}}
                @foreach($izinList as $item)
                    <div class="{{ $item['izin'] ? 'bg-green-500' : 'bg-red-600' }} p-6 rounded-md shadow-md text-center w-48 text-white">
                        <p class="text-lg font-bold">{{ $item['nama'] }}</p>
                        <p class="text-sm font-semibold mt-2">Status: {{ $item['izin'] ? 'Diizinkan' : 'Tidak diizinkan' }}</p>
                        <p class="text-sm">Tanggal: {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</p>
                        <p class="text-sm mt-1">Jam:
                            {{ $item['izin'] ? $item['izin']->start_time . ' - ' . $item['izin']->end_time : '-' }}
                        </p>
                        <p class="text-sm mt-1">Sekarang: {{ $now->format('H:i') }}</p>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
@endsection
