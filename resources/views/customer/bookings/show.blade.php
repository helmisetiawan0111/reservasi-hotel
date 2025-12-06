@extends('layouts.app')

@section('title', 'Detail Reservasi - ' . $reservation->reservation_code)

@section('content')
<div class="min-h-screen bg-gradient-to-br from-base-100 via-blue-50/30 to-accent/10">
    <div class="container mx-auto px-4 py-8">
        <!-- Header -->
        <div class="flex justify-between items-center mb-8" data-aos="fade-down" data-aos-delay="100">
            <div>
                <h1 class="text-3xl font-bold gradient-text leading-tight tracking-wide mb-2">Detail Reservasi</h1>
                <p class="text-medium-contrast">Kode Reservasi: <span class="font-bold text-primary">{{ $reservation->reservation_code }}</span></p>
            </div>
            <a href="/customer/dashboard" class="btn btn-outline btn-primary btn-hover shadow-sm hover:shadow-md transition-all duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali ke Dashboard
            </a>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success mb-8" data-aos="fade-down">
                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <!-- Reservation Timeline -->
        <div class="modern-card p-6 mb-8" data-aos="fade-up" data-aos-delay="300">
            <h3 class="text-xl font-bold text-primary mb-6 text-center">Proses Reservasi</h3>
            <div class="flex items-center justify-center">
                <div class="flex items-center space-x-4 md:space-x-8">
                    <div class="flex flex-col items-center">
                        <div class="w-12 h-12 rounded-full flex items-center justify-center bg-primary text-white shadow-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <span class="text-sm font-medium mt-2 text-center">Dipesan</span>
                    </div>
                    <div class="hidden md:block flex-1 h-0.5 min-w-8
                        @if(in_array($reservation->status, ['confirmed', 'checked_in', 'checked_out'])) bg-primary
                        @else bg-gray-300 @endif"></div>
                    <div class="md:hidden text-primary font-bold">→</div>
                    <div class="flex flex-col items-center">
                        <div class="w-12 h-12 rounded-full flex items-center justify-center
                            @if(in_array($reservation->status, ['confirmed', 'checked_in', 'checked_out'])) bg-primary text-white
                            @else bg-gray-300 text-gray-500 @endif shadow-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <span class="text-sm font-medium mt-2 text-center">Pembayaran</span>
                    </div>
                    <div class="hidden md:block flex-1 h-0.5 min-w-8
                        @if(in_array($reservation->status, ['confirmed', 'checked_in', 'checked_out'])) bg-primary
                        @else bg-gray-300 @endif"></div>
                    <div class="md:hidden text-primary font-bold">→</div>
                    <div class="flex flex-col items-center">
                        <div class="w-12 h-12 rounded-full flex items-center justify-center
                            @if(in_array($reservation->status, ['confirmed', 'checked_in', 'checked_out'])) bg-primary text-white
                            @else bg-gray-300 text-gray-500 @endif shadow-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <span class="text-sm font-medium mt-2 text-center">Dikonfirmasi</span>
                    </div>
                    <div class="hidden md:block flex-1 h-0.5 min-w-8
                        @if(in_array($reservation->status, ['checked_in', 'checked_out'])) bg-primary
                        @else bg-gray-300 @endif"></div>
                    <div class="md:hidden text-primary font-bold">→</div>
                    <div class="flex flex-col items-center">
                        <div class="w-12 h-12 rounded-full flex items-center justify-center
                            @if($reservation->status == 'checked_in' || $reservation->status == 'checked_out') bg-primary text-white
                            @else bg-gray-300 text-gray-500 @endif shadow-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                            </svg>
                        </div>
                        <span class="text-sm font-medium mt-2 text-center">Check-in</span>
                    </div>
                    <div class="hidden md:block flex-1 h-0.5 min-w-8
                        @if($reservation->status == 'checked_out') bg-primary
                        @else bg-gray-300 @endif"></div>
                    <div class="md:hidden text-primary font-bold">→</div>
                    <div class="flex flex-col items-center">
                        <div class="w-12 h-12 rounded-full flex items-center justify-center
                            @if($reservation->status == 'checked_out') bg-primary text-white
                            @else bg-gray-300 text-gray-500 @endif shadow-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                            </svg>
                        </div>
                        <span class="text-sm font-medium mt-2 text-center">Check-out</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Reservation Details -->
        <div class="space-y-8" data-aos="fade-up" data-aos-delay="200">
            <!-- Main Details -->
            <div class="space-y-6">
                <!-- Status and Booking Details Row -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Reservation Status -->
                    <div class="modern-card p-6">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-xl font-bold text-primary">Status Reservasi</h3>
                            <span class="badge
                                @if($reservation->status == 'pending') badge-warning
                                @elseif($reservation->status == 'confirmed') badge-info
                                @elseif($reservation->status == 'checked_in') badge-success
                                @elseif($reservation->status == 'checked_out') badge-neutral
                                @else badge-error
                                @endif px-4 py-2 text-sm">
                                {{ ucfirst($reservation->status) }}
                            </span>
                        </div>

                        <div class="space-y-4 mb-6">
                            <div class="flex justify-between items-center py-2 border-b border-gray-100">
                                <span class="text-medium-contrast font-medium">Kode Reservasi:</span>
                                <span class="font-semibold text-primary">{{ $reservation->reservation_code }}</span>
                            </div>
                            <div class="flex justify-between items-center py-2 border-b border-gray-100">
                                <span class="text-medium-contrast font-medium">Tanggal Pesan:</span>
                                <span class="font-semibold text-primary">{{ $reservation->created_at->format('d M Y H:i') }}</span>
                            </div>
                            <div class="flex justify-between items-center py-2">
                                <span class="text-medium-contrast font-medium">Nama Tamu:</span>
                                <span class="font-semibold text-primary">{{ $reservation->user->name ?? 'N/A' }}</span>
                            </div>
                        </div>

                        <div class="bg-gradient-to-r from-primary/5 to-secondary/5 rounded-lg p-4">
                            <p class="text-medium-contrast text-sm leading-relaxed">
                                @if($reservation->status == 'pending')
                                    Reservasi Anda sedang diproses. Kami akan mengirim konfirmasi segera melalui email atau WhatsApp.
                                @elseif($reservation->status == 'confirmed')
                                    Reservasi Anda telah dikonfirmasi. Silakan lakukan check-in sesuai tanggal yang dijadwalkan. Tunjukkan kode reservasi di meja resepsionis.
                                @elseif($reservation->status == 'checked_in')
                                    Anda telah check-in. Selamat menikmati menginap di Grand Hotel! Jika ada keperluan, hubungi resepsionis kapan saja.
                                @elseif($reservation->status == 'checked_out')
                                    Terima kasih telah menginap di Grand Hotel. Kami berharap Anda puas dengan pelayanan kami. Sampai jumpa lagi!
                                @endif
                            </p>
                        </div>
                    </div>

                    <!-- Booking Details -->
                    <div class="modern-card p-8">
                        <h3 class="text-xl font-bold text-primary mb-6">Detail Pemesanan</h3>
                        <div class="space-y-6">
                            <div class="space-y-4 text-sm">
                                <div class="flex justify-between items-center py-2">
                                    <span class="text-medium-contrast font-medium">Check-in:</span>
                                    <span class="font-semibold text-primary">{{ $reservation->check_in_date->format('d M Y') }}</span>
                                </div>
                                <div class="flex justify-between items-center py-2">
                                    <span class="text-medium-contrast font-medium">Check-out:</span>
                                    <span class="font-semibold text-primary">{{ $reservation->check_out_date->format('d M Y') }}</span>
                                </div>
                                <div class="flex justify-between items-center py-2">
                                    <span class="text-medium-contrast font-medium">Malam:</span>
                                    <span class="font-semibold text-primary">{{ $reservation->check_in_date->diffInDays($reservation->check_out_date) }}</span>
                                </div>
                                <div class="flex justify-between items-center py-2">
                                    <span class="text-medium-contrast font-medium">Tamu:</span>
                                    <span class="font-semibold text-primary">{{ $reservation->total_guests }}</span>
                                </div>
                                <div class="flex justify-between items-center py-4 border-t-2 border-primary/20 mt-4">
                                    <span class="text-medium-contrast font-bold text-base">Total:</span>
                                    <span class="font-bold text-primary text-xl">Rp {{ number_format($reservation->total_price) }}</span>
                                </div>
                            </div>
                        </div>

                        @if($reservation->special_requests)
                            <div class="mt-8 p-4 bg-gradient-to-r from-amber-50 to-yellow-50 rounded-lg border border-amber-200">
                                <h4 class="font-semibold text-amber-800 mb-2 flex items-center text-sm">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                    Catatan Khusus
                                </h4>
                                <p class="text-amber-700 italic">{{ $reservation->special_requests }}</p>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Room Details -->
                <div class="modern-card p-6">
                    <h3 class="text-xl font-bold text-primary mb-6">Detail Kamar</h3>
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                        <div class="lg:col-span-1">
                            <img src="{{ $reservation->room->roomType->image ?? 'https://picsum.photos/400/300?random=' . $reservation->room->roomType->id }}"
                                 alt="{{ $reservation->room->roomType->name }}"
                                 class="modern-image w-full h-48 lg:h-32 rounded-lg shadow-md" />
                        </div>
                        <div class="lg:col-span-2 space-y-4">
                            <div>
                                <h4 class="font-bold text-xl text-primary mb-2">{{ $reservation->room->roomType->name }}</h4>
                                <p class="text-medium-contrast leading-relaxed">{{ $reservation->room->roomType->description }}</p>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                                    <svg class="w-5 h-5 mr-3 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                    <div>
                                        <p class="text-sm text-neutral">Nomor Kamar</p>
                                        <p class="font-semibold text-primary">{{ $reservation->room->room_number }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                                    <svg class="w-5 h-5 mr-3 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                                    </svg>
                                    <div>
                                        <p class="text-sm text-neutral">Kapasitas</p>
                                        <p class="font-semibold text-primary">Hingga {{ $reservation->room->roomType->capacity }} tamu</p>
                                    </div>
                                </div>
                                <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                                    <svg class="w-5 h-5 mr-3 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                    <div>
                                        <p class="text-sm text-neutral">Lantai</p>
                                        <p class="font-semibold text-primary">{{ $reservation->room->floor }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                                    <svg class="w-5 h-5 mr-3 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                    </svg>
                                    <div>
                                        <p class="text-sm text-neutral">Harga per Malam</p>
                                        <p class="font-semibold text-primary">Rp {{ number_format($reservation->room->roomType->base_price) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Payment Status -->
                <div class="modern-card p-6">
                    <h3 class="text-lg font-bold text-primary mb-4">Status Pembayaran</h3>
                    <div class="text-center">
                        @if($reservation->status == 'pending')
                            <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-3">
                                <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <p class="text-orange-600 font-semibold mb-2">Menunggu Pembayaran</p>
                            <p class="text-sm text-neutral">Silakan selesaikan pembayaran untuk mengkonfirmasi reservasi.</p>
                        @elseif(in_array($reservation->status, ['confirmed', 'checked_in', 'checked_out']))
                            <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-3">
                                <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <p class="text-green-600 font-semibold mb-2">Pembayaran Lunas</p>
                            <p class="text-sm text-neutral">Reservasi Anda telah dikonfirmasi.</p>
                        @endif
                    </div>
                </div>

                <!-- Contact Support -->
                <div class="modern-card p-6">
                    <h3 class="text-lg font-bold text-primary mb-4">Butuh Bantuan?</h3>
                    <div class="space-y-3">
                        <a href="tel:+622112345678" class="flex items-center p-3 bg-primary/10 rounded-lg hover:bg-primary/20 transition-colors">
                            <svg class="w-5 h-5 text-primary mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            <div>
                                <p class="font-semibold text-primary">Telepon</p>
                                <p class="text-sm text-neutral">+62 21 12345678</p>
                            </div>
                        </a>
                        <a href="mailto:support@grandhotel.com" class="flex items-center p-3 bg-secondary/10 rounded-lg hover:bg-secondary/20 transition-colors">
                            <svg class="w-5 h-5 text-secondary mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <div>
                                <p class="font-semibold text-secondary">Email</p>
                                <p class="text-sm text-neutral">support@grandhotel.com</p>
                            </div>
                        </a>
                        <a href="/customer/help" class="flex items-center p-3 bg-accent/10 rounded-lg hover:bg-accent/20 transition-colors">
                            <svg class="w-5 h-5 text-accent mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <div>
                                <p class="font-semibold text-accent">Bantuan</p>
                                <p class="text-sm text-neutral">FAQ & Panduan</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection