@extends('layouts.app')

@section('title', 'Welcome - Hotel Reservation')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-indigo-50">
    <div class="container mx-auto px-4 py-8">
        <div class="text-center">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">Selamat Datang di Sistem Reservasi Hotel</h1>
            <p class="text-lg text-gray-600 mb-8">Penginapan sempurna Anda menanti dengan layanan dan fasilitas kelas dunia.</p>
            <div class="space-x-4">
                <a href="{{ route('customer.home') }}" class="btn btn-primary">Jelajahi Kamar</a>
                <a href="{{ route('login') }}" class="btn btn-outline">Masuk</a>
            </div>
        </div>
    </div>
</div>
@endsection
