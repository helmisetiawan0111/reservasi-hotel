@extends('layouts.app')

@section('title', 'Detail Tipe Kamar: ' . $roomType->name . ' - Admin')

@section('content')
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Tipe Kamar - {{ $roomType->name }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Inter', 'Poppins', sans-serif;
        }

        .elegant-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.08);
            border-radius: 20px;
        }

        .soft-shadow {
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
        }

        .gradient-bg {
            background: linear-gradient(135deg, #f3f7ff 0%, #e8f2ff 100%);
        }

        .primary-green {
            background: linear-gradient(135deg, #16a34a 0%, #15803d 100%);
        }

        .hover-lift {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .hover-lift:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.12);
        }

        .facility-card {
            transition: all 0.3s ease;
        }

        .facility-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 16px 48px rgba(22, 163, 74, 0.15);
        }

        .room-card {
            transition: all 0.3s ease;
        }

        .room-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 16px 48px rgba(22, 163, 74, 0.1);
        }

        .stat-card {
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 32px rgba(22, 163, 74, 0.08);
        }

        @media (max-width: 768px) {
            .mobile-stack {
                flex-direction: column;
            }

            .mobile-full {
                width: 100%;
            }
        }
    </style>
</head>
<body class="gradient-bg">
    <div class="max-w-7xl mx-auto px-6 py-8 lg:px-8 lg:py-12">
        <!-- Header Section -->
        <div class="flex justify-between items-start mb-12">
            <div>
                <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-4 leading-tight">
                    Detail Tipe Kamar
                </h1>
                <p class="text-xl text-gray-600 font-medium">{{ $roomType->name }}</p>
                <div class="flex items-center gap-6 mt-6 text-sm text-gray-500">
                    <span class="flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                        </svg>
                        ID: #{{ $roomType->id }}
                    </span>
                    <span class="flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        {{ $roomType->capacity }} Tamu
                    </span>
                </div>
            </div>
            <div class="flex-shrink-0">
                <a href="{{ route('admin.room-types.index') }}"
                   class="inline-flex items-center gap-2 bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg font-medium text-sm shadow-lg hover-lift">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Kembali
                </a>
            </div>
        </div>

        <!-- Main Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-10 gap-8 lg:gap-12">
            <!-- Left Column - Main Content (70%) -->
            <div class="lg:col-span-7 space-y-8">
                <!-- Informasi Dasar Card -->
                <div class="elegant-card hover-lift">
                    <div class="p-6">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-10 h-10 primary-green rounded-xl flex items-center justify-center shadow-lg">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-xl font-bold text-gray-900">Informasi Dasar</h2>
                                <p class="text-gray-600 text-sm">Detail lengkap tipe kamar premium</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                            <div class="bg-gradient-to-r from-blue-50 to-blue-100/50 p-5 rounded-xl border border-blue-200/50">
                                <div class="flex items-center gap-3 mb-2">
                                    <div class="w-7 h-7 bg-blue-500 rounded-lg flex items-center justify-center">
                                        <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                        </svg>
                                    </div>
                                    <span class="text-xs font-semibold text-blue-700 uppercase tracking-wide">Nama Tipe Kamar</span>
                                </div>
                                <p class="text-base font-bold text-gray-900">{{ $roomType->name }}</p>
                            </div>

                            <div class="bg-gradient-to-r from-green-50 to-green-100/50 p-5 rounded-xl border border-green-200/50">
                                <div class="flex items-center gap-3 mb-2">
                                    <div class="w-7 h-7 bg-green-500 rounded-lg flex items-center justify-center">
                                        <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                        </svg>
                                    </div>
                                    <span class="text-xs font-semibold text-green-700 uppercase tracking-wide">Harga Base</span>
                                </div>
                                <p class="text-base font-bold text-green-600">Rp {{ number_format($roomType->base_price) }}</p>
                                <p class="text-xs text-green-600">per malam</p>
                            </div>

                            <div class="bg-gradient-to-r from-purple-50 to-purple-100/50 p-5 rounded-xl border border-purple-200/50">
                                <div class="flex items-center gap-3 mb-2">
                                    <div class="w-7 h-7 bg-purple-500 rounded-lg flex items-center justify-center">
                                        <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                        </svg>
                                    </div>
                                    <span class="text-xs font-semibold text-purple-700 uppercase tracking-wide">ID Tipe Kamar</span>
                                </div>
                                <p class="text-base font-bold text-gray-900">#{{ $roomType->id }}</p>
                            </div>

                            <div class="bg-gradient-to-r from-orange-50 to-orange-100/50 p-5 rounded-xl border border-orange-200/50">
                                <div class="flex items-center gap-3 mb-2">
                                    <div class="w-7 h-7 bg-orange-500 rounded-lg flex items-center justify-center">
                                        <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                                        </svg>
                                    </div>
                                    <span class="text-xs font-semibold text-orange-700 uppercase tracking-wide">Kapasitas</span>
                                </div>
                                <p class="text-base font-bold text-orange-600">{{ $roomType->capacity }} Tamu</p>
                            </div>
                        </div>

                        <div class="bg-gradient-to-r from-gray-50 to-gray-100/50 p-5 rounded-xl border border-gray-200/50">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-7 h-7 bg-gray-500 rounded-lg flex items-center justify-center">
                                    <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                                <span class="text-sm font-semibold text-gray-700">Deskripsi</span>
                            </div>
                            <p class="text-gray-700 leading-relaxed text-sm">{{ $roomType->description }}</p>
                        </div>
                    </div>
                </div>

                <!-- Room Image Card -->
                <div class="elegant-card hover-lift">
                    <div class="relative h-64 lg:h-72 overflow-hidden rounded-t-2xl">
                        <img src="{{ $roomType->image ? (filter_var($roomType->image, FILTER_VALIDATE_URL) ? $roomType->image : asset('storage/' . $roomType->image)) : 'https://picsum.photos/400/300?random=' . $roomType->id }}"
                             alt="{{ $roomType->name }}"
                             class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent"></div>
                        <div class="absolute bottom-4 left-4 right-4">
                            <h3 class="text-white text-lg font-bold mb-1">{{ $roomType->name }}</h3>
                            <p class="text-white/90 text-sm">Rp {{ number_format($roomType->base_price) }}/malam</p>
                        </div>
                    </div>
                    <div class="p-6">
                        <!-- Quick Stats -->
                        <div class="grid grid-cols-2 gap-3 mb-6">
                            <div class="stat-card bg-gradient-to-br from-blue-50 to-blue-100 p-4 rounded-xl text-center border border-blue-200/50">
                                <div class="text-xl font-bold text-blue-600 mb-1">{{ $roomType->rooms->count() }}</div>
                                <div class="text-xs font-medium text-blue-700">Total Kamar</div>
                            </div>
                            <div class="stat-card bg-gradient-to-br from-green-50 to-green-100 p-4 rounded-xl text-center border border-green-200/50">
                                <div class="text-xl font-bold text-green-600 mb-1">{{ $roomType->capacity }}</div>
                                <div class="text-xs font-medium text-green-700">Kapasitas</div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="space-y-3">
                            <a href="{{ route('admin.room-types.edit', $roomType) }}"
                               class="w-full bg-green-500 hover:bg-green-600 text-white py-3 px-4 rounded-xl font-semibold text-center block hover-lift shadow-lg text-sm">
                                <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                                Edit Tipe Kamar
                            </a>

                            <a href="{{ route('admin.rooms.create', ['room_type' => $roomType->id]) }}"
                               class="w-full bg-blue-500 hover:bg-blue-600 text-white py-3 px-4 rounded-xl font-semibold text-center block hover-lift shadow-lg text-sm">
                                <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Tambah Kamar
                            </a>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Right Column - Sidebar (30%) -->
            <div class="lg:col-span-3 space-y-6">
                <!-- Fasilitas Tersedia Card -->
                <div class="elegant-card hover-lift">
                    <div class="p-6">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-10 h-10 primary-green rounded-xl flex items-center justify-center shadow-lg">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-xl font-bold text-gray-900">Fasilitas Tersedia</h2>
                                <p class="text-gray-600 text-sm">{{ $roomType->facilities->count() }} fasilitas premium tersedia</p>
                            </div>
                        </div>

                        @if($roomType->facilities->count() > 0)
                            <div class="grid grid-cols-1 gap-3">
                                @foreach($roomType->facilities as $facility)
                                <div class="facility-card bg-gradient-to-br from-green-50 to-emerald-50 p-4 rounded-xl border border-green-200/50">
                                    <div class="flex items-start gap-3">
                                        <div class="w-9 h-9 bg-green-500 rounded-lg flex items-center justify-center flex-shrink-0 shadow-lg">
                                            @if($facility->icon)
                                                <i class="fas fa-{{ $facility->icon }} text-white text-sm"></i>
                                            @else
                                                <svg class="w-4.5 h-4.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            @endif
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <h3 class="font-bold text-gray-900 text-sm mb-1">{{ $facility->name }}</h3>
                                            @if($facility->description)
                                            <p class="text-xs text-gray-600">{{ $facility->description }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-6 bg-gradient-to-br from-gray-50 to-gray-100 rounded-xl border-2 border-dashed border-gray-300">
                                <div class="w-10 h-10 bg-gray-400 rounded-xl flex items-center justify-center mx-auto mb-3">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                </div>
                                <h3 class="text-sm font-semibold text-gray-600 mb-2">Belum Ada Fasilitas</h3>
                                <p class="text-gray-500 text-xs">Fasilitas premium akan ditampilkan di sini</p>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Statistics Card -->
                <div class="elegant-card hover-lift">
                    <div class="p-6">
                        <div class="flex items-center gap-3 mb-5">
                            <div class="w-10 h-10 primary-green rounded-xl flex items-center justify-center shadow-lg">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold text-gray-900">Statistik</h3>
                        </div>

                        <div class="space-y-4">
                            <div class="flex justify-between items-center py-2 border-b border-gray-100">
                                <span class="text-gray-600 text-sm">Total Reservasi</span>
                                <span class="font-bold text-gray-900">{{ \App\Models\Reservation::whereHas('room', function($q) use ($roomType) { $q->where('room_type_id', $roomType->id); })->count() }}</span>
                            </div>
                            <div class="flex justify-between items-center py-2 border-b border-gray-100">
                                <span class="text-gray-600 text-sm">Reservasi Aktif</span>
                                <span class="font-bold text-green-600">{{ \App\Models\Reservation::whereHas('room', function($q) use ($roomType) { $q->where('room_type_id', $roomType->id); })->whereIn('status', ['confirmed', 'checked_in'])->count() }}</span>
                            </div>
                            <div class="flex justify-between items-center py-2">
                                <span class="text-gray-600 text-sm">Rating Rata-rata</span>
                                <span class="font-bold text-yellow-600">
                                    @php
                                        $reviewCount = \App\Models\Review::whereHas('reservation.room', function($q) use ($roomType) {
                                            $q->where('room_type_id', $roomType->id);
                                        })->count();
                                        $avgRating = $reviewCount > 0 ? \App\Models\Review::whereHas('reservation.room', function($q) use ($roomType) {
                                            $q->where('room_type_id', $roomType->id);
                                        })->avg('rating') : 0;
                                    @endphp
                                    @if($reviewCount > 0)
                                        {{ number_format($avgRating, 1) }} ⭐
                                    @else
                                        -
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Delete Action Card -->
                <div class="elegant-card hover-lift border-red-200 flex-1">
                    <div class="p-6 h-full flex flex-col">
                        <div class="text-center flex-1 flex flex-col justify-center">
                            <div class="w-10 h-10 bg-red-500 rounded-xl flex items-center justify-center mx-auto mb-3 shadow-lg">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                            </div>
                            <h3 class="text-base font-bold text-gray-900 mb-2">Hapus Tipe Kamar</h3>
                            <p class="text-gray-600 text-xs mb-6">Tindakan ini tidak dapat dibatalkan</p>
                            <form method="POST" action="{{ route('admin.room-types.destroy', $roomType) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="w-full bg-red-500 hover:bg-red-600 text-white py-3 px-4 rounded-xl font-semibold transition-all duration-300 shadow-lg hover:shadow-xl text-sm"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus tipe kamar ini? Semua data terkait akan hilang.')">
                                    Hapus Tipe Kamar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Smooth scroll animations
        document.addEventListener('DOMContentLoaded', function() {
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, observerOptions);

            // Observe all cards
            document.querySelectorAll('.elegant-card').forEach(card => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                observer.observe(card);
            });
        });

        // Button hover effects
        document.querySelectorAll('.hover-lift').forEach(button => {
            button.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-2px)';
            });

            button.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
    </script>
</body>
</html>
@endsection