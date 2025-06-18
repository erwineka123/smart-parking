@extends('layouts.app')

@section('content')
    <div class="hero">
        <div class="hero-content">
            <div class="text">
                <p class="welcome-text">Selamat datang di</p>
                <h1 class="title">Smart Parking<br>TULT BASEMENT</h1>
                <p class="description">
                    Website ini dirancang untuk memberikan informasi tentang ketersediaan parkir khusus petinggi di basement TULT,
                    sehingga memudahkan Anda mengetahui aksesibilitasnya
                </p>
                <a href="{{ route('perizinan.informasi') }}" class="info-button">Informasi Parkir Khusus</a>

            </div>
            <div class="image">
                <img src="{{ asset('images/car.png') }}" alt="Mobil" class="car-image">
            </div>
        </div>
    </div>
@endsection
