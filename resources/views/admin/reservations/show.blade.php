@extends('layouts.app')

@section('title', 'Detail Reservasi ' . $reservation->reservation_code . ' - Admin')

@section('content')
<div class="min-h-screen admin-panel">
    <div class="page-container">
        <!-- Header Section -->
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 mb-6" data-aos="fade-down">
            <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-6">
                <div class="flex-1">
                    <div class="flex items-center gap-4 mb-3">
                        <div class="w-12 h-12 bg-gradient-to-br from-primary to-accent rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-3xl lg:text-4xl font-bold gradient-text leading-tight tracking-wide">Detail Reservasi</h1>
                            <p class="text-medium-contrast text-lg mt-1">{{ $reservation->reservation_code }}</p>
                        </div>
                    </div>
                </div>
                <div class="flex gap-4">
                    <a href="{{ route('admin.reservations.index') }}" class="btn-modern px-4 py-2 text-sm font-medium">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Kembali ke List
                    </a>
                </div>
            </div>
        </div>

        <!-- Reservation Details -->
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-6 mb-6">
            <!-- Main Details -->
            <div class="xl:col-span-2 space-y-6">
                <!-- Reservation Info -->
                <div class="modern-card">
                    <div class="card-body p-0">
                        <div class="p-6 pb-0">
                            <h2 class="text-xl font-bold gradient-text leading-tight tracking-wide mb-6">Informasi Reservasi</h2>
                        </div>
                        <div class="px-6 pb-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="space-y-4">
                                    <div>
                                        <label class="text-sm font-medium text-medium-contrast">Kode Reservasi</label>
                                        <p class="text-lg font-bold text-primary">{{ $reservation->reservation_code }}</p>
                                    </div>
                                    <div>
                                        <label class="text-sm font-medium text-medium-contrast">Status</label>
                                        <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full
                                            @if($reservation->status == 'pending') bg-yellow-100 text-yellow-800
                                            @elseif($reservation->status == 'confirmed') bg-blue-100 text-blue-800
                                            @elseif($reservation->status == 'checked_in') bg-green-100 text-green-800
                                            @elseif($reservation->status == 'checked_out') bg-gray-100 text-gray-800
                                            @else bg-red-100 text-red-800
                                            @endif">
                                            {{ ucfirst(str_replace('_', ' ', $reservation->status)) }}
                                        </span>
                                    </div>
                                    <div>
                                        <label class="text-sm font-medium text-medium-contrast">Total Harga</label>
                                        <p class="text-lg font-bold text-green-600">Rp {{ number_format($reservation->total_price) }}</p>
                                    </div>
                                </div>
                                <div class="space-y-4">
                                    <div>
                                        <label class="text-sm font-medium text-medium-contrast">Check-in</label>
                                        <p class="text-lg font-bold">{{ $reservation->check_in_date->format('d/m/Y') }}</p>
                                    </div>
                                    <div>
                                        <label class="text-sm font-medium text-medium-contrast">Check-out</label>
                                        <p class="text-lg font-bold">{{ $reservation->check_out_date->format('d/m/Y') }}</p>
                                    </div>
                                    <div>
                                        <label class="text-sm font-medium text-medium-contrast">Jumlah Tamu</label>
                                        <p class="text-lg font-bold">{{ $reservation->total_guests }}</p>
                                    </div>
                                </div>
                            </div>
                            @if($reservation->special_requests)
                            <div class="mt-6">
                                <label class="text-sm font-medium text-medium-contrast">Permintaan Khusus</label>
                                <p class="mt-2 p-4 bg-gray-50 rounded-lg text-gray-700">{{ $reservation->special_requests }}</p>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Guest Information -->
                @if($reservation->guests->count() > 0)
                <div class="modern-card">
                    <div class="card-body p-0">
                        <div class="p-6 pb-0">
                            <h2 class="text-xl font-bold gradient-text leading-tight tracking-wide mb-6">Informasi Tamu</h2>
                        </div>
                        <div class="px-6 pb-6">
                            <div class="space-y-4">
                                @foreach($reservation->guests as $guest)
                                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                    <div>
                                        <p class="font-semibold">{{ $guest->name }}</p>
                                        <p class="text-sm text-medium-contrast">{{ $guest->email }} | {{ $guest->phone }}</p>
                                        <p class="text-xs text-gray-500">{{ $guest->identity_type }}: {{ $guest->identity_number }}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Customer Info -->
                <div class="modern-card">
                    <div class="card-body p-0">
                        <div class="p-6 pb-0">
                            <h3 class="text-lg font-bold gradient-text leading-tight tracking-wide mb-4">Informasi Pelanggan</h3>
                        </div>
                        <div class="px-6 pb-6">
                            <div class="flex items-center gap-4 mb-4">
                                <div class="w-12 h-12 bg-gradient-to-br from-primary to-accent rounded-full flex items-center justify-center">
                                    <span class="text-white font-bold text-lg">{{ strtoupper(substr($reservation->user->name, 0, 1)) }}</span>
                                </div>
                                <div>
                                    <p class="font-semibold text-primary">{{ $reservation->user->name }}</p>
                                    <p class="text-sm text-medium-contrast">{{ $reservation->user->email }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Room Info -->
                <div class="modern-card">
                    <div class="card-body p-0">
                        <div class="p-6 pb-0">
                            <h3 class="text-lg font-bold gradient-text leading-tight tracking-wide mb-4">Informasi Kamar</h3>
                        </div>
                        <div class="px-6 pb-6">
                            <div class="space-y-3">
                                <div>
                                    <label class="text-sm font-medium text-medium-contrast">Tipe Kamar</label>
                                    <p class="font-semibold">{{ $reservation->room->roomType->name ?? 'N/A' }}</p>
                                </div>
                                <div>
                                    <label class="text-sm font-medium text-medium-contrast">Nomor Kamar</label>
                                    <p class="font-semibold">{{ $reservation->room->room_number }}</p>
                                </div>
                                <div>
                                    <label class="text-sm font-medium text-medium-contrast">Lantai</label>
                                    <p class="font-semibold">{{ $reservation->room->floor }}</p>
                                </div>
                                <div>
                                    <label class="text-sm font-medium text-medium-contrast">Kapasitas</label>
                                    <p class="font-semibold">{{ $reservation->room->roomType->capacity ?? 0 }} tamu</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Payment Info -->
                @if($reservation->payments->count() > 0)
                <div class="modern-card">
                    <div class="card-body p-0">
                        <div class="p-6 pb-0">
                            <h3 class="text-lg font-bold gradient-text leading-tight tracking-wide mb-4">Informasi Pembayaran</h3>
                        </div>
                        <div class="px-6 pb-6">
                            <div class="space-y-3">
                                @foreach($reservation->payments as $payment)
                                <div class="p-3 bg-gray-50 rounded-lg">
                                    <div class="flex justify-between items-center mb-2">
                                        <span class="text-sm font-medium">{{ $payment->payment_method }}</span>
                                        <span class="text-sm font-bold text-green-600">Rp {{ number_format($payment->amount) }}</span>
                                    </div>
                                    <div class="flex justify-between text-xs text-medium-contrast">
                                        <span>{{ $payment->created_at->format('d/m/Y H:i') }}</span>
                                        <span class="capitalize">{{ $payment->status }}</span>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection