@extends('layouts.app')

@section('content')
<div class="min-h-screen flex flex-col justify-center px-4">

    <div class="flex flex-col md:flex-row items-center justify-center gap-12 w-full max-w-6xl mx-auto">
        <div class="bg-white rounded-xl shadow-xl p-8 w-full max-w-2xl">
            <h2 class="text-center text-2xl font-extrabold text-gray-800 mb-6 uppercase">
                Masukkan Data Perizinan Anda
            </h2>

            <form method="POST" action="{{ route('perizinan.submit') }}">
                @csrf

                <div class="mb-4">
                    <label class="block text-gray-800 font-semibold mb-1">Lecturer</label>
                    <input type="text" name="nama" value="{{ $dosenNama }}" readonly
                           class="w-full px-3 py-2 border rounded text-gray-800 bg-gray-100">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-800 font-semibold mb-1">Open the parking on</label>
                    <div class="flex gap-4">
                        <input type="date" name="start_date" class="px-3 py-2 border rounded text-gray-800 w-1/2">
                        <input type="time" name="start_time" class="px-3 py-2 border rounded text-gray-800 w-1/2">
                    </div>
                </div>

                <div class="mb-6">
                    <label class="block text-gray-800 font-semibold mb-1">Close the parking on</label>
                    <div class="flex gap-4">
                        <input type="date" name="end_date" class="px-3 py-2 border rounded text-gray-800 w-1/2">
                        <input type="time" name="end_time" class="px-3 py-2 border rounded text-gray-800 w-1/2">
                    </div>
                </div>

                <div class="text-center">
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
@endsection
