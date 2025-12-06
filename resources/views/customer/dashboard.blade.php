@extends('layouts.app')

@section('title', 'Dashboard Pelanggan - Hotel Reservation')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-base-100 via-blue-50/30 to-accent/10">
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-8" data-aos="fade-down" data-aos-delay="100">
            <div>
                <h1 class="text-3xl font-bold gradient-text leading-tight tracking-wide mb-2">Selamat datang kembali, {{ auth()->user()->name }}!</h1>
                <p class="text-medium-contrast">Kelola reservasi dan preferensi Anda dengan mudah</p>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8" data-aos="fade-up" data-aos-delay="200">
            <div class="dashboard-card" data-aos="zoom-in" data-aos-delay="300">
                <div class="card-body text-center">
                    <div class="stat-value text-primary mb-2">{{ auth()->user()->reservations()->count() }}</div>
                    <div class="stat-label">Total Reservasi</div>
                    <div class="w-12 h-12 bg-primary/10 rounded-full mx-auto flex items-center justify-center mt-2">
                        <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="dashboard-card" data-aos="zoom-in" data-aos-delay="400">
                <div class="card-body text-center">
                    <div class="stat-value text-secondary mb-2">{{ auth()->user()->reservations()->whereIn('status', ['confirmed', 'checked_in'])->count() }}</div>
                    <div class="stat-label">Reservasi Aktif</div>
                    <div class="w-12 h-12 bg-secondary/10 rounded-full mx-auto flex items-center justify-center mt-2">
                        <svg class="w-6 h-6 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="dashboard-card" data-aos="zoom-in" data-aos-delay="500">
                <div class="card-body text-center">
                    <div class="stat-value text-accent mb-2">{{ auth()->user()->reservations()->where('status', 'checked_out')->count() }}</div>
                    <div class="stat-label">Reservasi Selesai</div>
                    <div class="w-12 h-12 bg-accent/10 rounded-full mx-auto flex items-center justify-center mt-2">
                        <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Bookings -->
        <div class="modern-card" data-aos="fade-up" data-aos-delay="600">
            <div class="card-body p-0">
                <div class="p-6 pb-0">
                    <h2 class="text-2xl font-bold gradient-text leading-tight tracking-wide mb-6">Reservasi Terbaru Saya</h2>
                </div>

            @if(auth()->user()->reservations()->count() > 0)
                <div class="overflow-x-auto" data-aos="fade-in" data-aos-delay="700">
                    <table class="table table-zebra w-full bg-white rounded-lg shadow-sm">
                        <thead class="bg-gradient-to-r from-primary/10 to-accent/10">
                            <tr>
                                <th class="font-semibold text-primary">Kamar</th>
                                <th class="font-semibold text-primary">Check-in</th>
                                <th class="font-semibold text-primary">Check-out</th>
                                <th class="font-semibold text-primary">Status</th>
                                <th class="font-semibold text-primary">Total</th>
                                <th class="font-semibold text-primary">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(auth()->user()->reservations()->latest()->take(5)->get() as $reservation)
                            <tr>
                                <td>{{ $reservation->room->roomType->name }} - Room {{ $reservation->room->room_number }}</td>
                                <td>{{ $reservation->check_in_date->format('M d, Y') }}</td>
                                <td>{{ $reservation->check_out_date->format('M d, Y') }}</td>
                                <td>
                                    <span class="badge
                                        @if($reservation->status == 'pending') badge-warning
                                        @elseif($reservation->status == 'confirmed') badge-info
                                        @elseif($reservation->status == 'checked_in') badge-success
                                        @elseif($reservation->status == 'checked_out') badge-neutral
                                        @else badge-error
                                        @endif">
                                        {{ ucfirst($reservation->status) }}
                                    </span>
                                </td>
                                <td>Rp {{ number_format($reservation->total_price) }}</td>
                                <td>
                                    <div class="flex flex-col sm:flex-row gap-2">
                                        <a href="/customer/bookings/{{ $reservation->id }}" class="btn btn-sm btn-outline btn-primary btn-hover shadow-sm hover:shadow-md transition-all duration-200">Lihat Detail</a>
                                        @if($reservation->status == 'confirmed' && $reservation->check_in_date->isToday())
                                            <button onclick="checkIn({{ $reservation->id }})" class="btn btn-sm btn-success btn-hover shadow-sm hover:shadow-md transition-all duration-200">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                                                </svg>
                                                Check-in
                                            </button>
                                        @elseif($reservation->status == 'checked_in' && $reservation->check_out_date->isToday())
                                            <button onclick="checkOut({{ $reservation->id }})" class="btn btn-sm btn-warning btn-hover shadow-sm hover:shadow-md transition-all duration-200">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                                </svg>
                                                Check-out
                                            </button>
                                        @elseif($reservation->status == 'confirmed' && $reservation->check_in_date->isPast() && !$reservation->check_in_date->isToday())
                                            <span class="text-xs text-orange-600 font-medium">Menunggu Check-in</span>
                                        @elseif($reservation->status == 'checked_in')
                                            <span class="text-xs text-green-600 font-medium flex items-center">
                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                                Sudah Check-in
                                            </span>
                                        @elseif($reservation->status == 'checked_out')
                                            <span class="text-xs text-gray-600 font-medium flex items-center">
                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                                Sudah Check-out
                                            </span>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-8" data-aos="fade-in" data-aos-delay="800">
                    <div class="text-6xl mb-4">🏨</div>
                    <p class="text-neutral mb-4">Anda belum melakukan pemesanan apapun.</p>
                    <a href="{{ route('rooms.index') }}" class="btn btn-primary btn-hover shadow-lg hover:shadow-xl transition-all duration-300">Jelajahi Kamar</a>
                </div>
            @endif
        </div>
    </div>

        <!-- Quick Actions -->
        <div class="mt-8" data-aos="fade-up" data-aos-delay="900">
            <h2 class="text-2xl font-bold gradient-text leading-tight tracking-wide mb-6">Aksi Cepat</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <a href="{{ route('rooms.index') }}" class="modern-card group text-center" data-aos="zoom-in" data-aos-delay="1000">
                    <div class="w-16 h-16 mx-auto mb-4 bg-primary/10 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-primary mb-2">Jelajahi Kamar</h3>
                    <p class="text-medium-contrast text-sm">Temukan tempat menginap sempurna Anda</p>
                </a>

                <a href="{{ route('customer.profile') }}" class="modern-card group text-center" data-aos="zoom-in" data-aos-delay="1100">
                    <div class="w-16 h-16 mx-auto mb-4 bg-secondary/10 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-secondary mb-2">Profil Saya</h3>
                    <p class="text-medium-contrast text-sm">Perbarui informasi pribadi Anda</p>
                </a>

                <a href="{{ route('customer.help') }}" class="modern-card group text-center" data-aos="zoom-in" data-aos-delay="1200">
                    <div class="w-16 h-16 mx-auto mb-4 bg-accent/10 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-accent mb-2">Bantuan</h3>
                    <p class="text-medium-contrast text-sm">Dapatkan dukungan dan bantuan</p>
                </a>
            </div>
        </div>
    </div>
    
    <script>
    function checkIn(reservationId) {
        if (confirm('Apakah Anda yakin ingin melakukan check-in untuk reservasi ini? Pastikan Anda sudah tiba di hotel.')) {
            // Here you would typically make an AJAX request to update the reservation status
            // For now, we'll show a success message
            alert('Check-in berhasil! Selamat menikmati menginap di Grand Hotel.');
            // In a real application, you would:
            // 1. Send AJAX request to update reservation status to 'checked_in'
            // 2. Refresh the page or update the UI accordingly
            location.reload();
        }
    }
    
    function checkOut(reservationId) {
        if (confirm('Apakah Anda yakin ingin melakukan check-out? Terima kasih telah menginap di Grand Hotel.')) {
            // Here you would typically make an AJAX request to update the reservation status
            // For now, we'll show a success message
            alert('Check-out berhasil! Terima kasih telah menginap di Grand Hotel. Sampai jumpa lagi!');
            // In a real application, you would:
            // 1. Send AJAX request to update reservation status to 'checked_out'
            // 2. Refresh the page or update the UI accordingly
            location.reload();
        }
    }
    </script>
    @endsection