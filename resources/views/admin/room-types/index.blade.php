@extends('layouts.app')

@section('title', 'Kelola Tipe Kamar - Admin Dashboard')

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
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-3xl lg:text-4xl font-bold gradient-text leading-tight tracking-wide">Kelola Tipe Kamar</h1>
                            <p class="text-medium-contrast text-lg mt-1">Kelola kategori kamar hotel dengan mudah dan efisien</p>
                        </div>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <a href="{{ route('admin.dashboard') }}" class="bg-slate-500 hover:bg-slate-600 text-white px-4 py-2 rounded-xl text-sm font-medium hover:scale-105 transition-all duration-300">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Kembali ke Dashboard
                    </a>
                    <a href="{{ route('admin.room-types.create') }}" class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-xl text-base font-semibold transition-all duration-300 hover:shadow-lg hover:scale-105">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Tambah Tipe Kamar Baru
                    </a>
                </div>
            </div>
        </div>

        <!-- Enhanced Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 grid-spacing mb-6">
            <div class="dashboard-card group" data-aos="zoom-in" data-aos-delay="100">
                <div class="card-body text-center relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-20 h-20 bg-blue-100 rounded-full -translate-y-10 translate-x-10 opacity-50"></div>
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <div class="stat-value text-blue-600 mb-2">{{ $roomTypes->count() }}</div>
                    <div class="stat-label">Total Tipe Kamar</div>
                    <div class="text-xs text-medium-contrast mt-1">Kategori tersedia</div>
                </div>
            </div>

            <div class="dashboard-card group" data-aos="zoom-in" data-aos-delay="200">
                <div class="card-body text-center relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-20 h-20 bg-green-100 rounded-full -translate-y-10 translate-x-10 opacity-50"></div>
                    <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <div class="stat-value text-green-600 mb-2">{{ $roomTypes->sum('capacity') }}</div>
                    <div class="stat-label">Total Kapasitas</div>
                    <div class="text-xs text-medium-contrast mt-1">Tamu maksimal</div>
                </div>
            </div>

            <div class="dashboard-card group" data-aos="zoom-in" data-aos-delay="300">
                <div class="card-body text-center relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-20 h-20 bg-purple-100 rounded-full -translate-y-10 translate-x-10 opacity-50"></div>
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="stat-value text-purple-600 mb-2">Rp {{ number_format($roomTypes->avg('base_price')) }}</div>
                    <div class="stat-label">Harga Rata-rata</div>
                    <div class="text-xs text-medium-contrast mt-1">Per malam</div>
                </div>
            </div>

            <div class="dashboard-card group" data-aos="zoom-in" data-aos-delay="400">
                <div class="card-body text-center relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-20 h-20 bg-orange-100 rounded-full -translate-y-10 translate-x-10 opacity-50"></div>
                    <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-orange-600 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <div class="stat-value text-orange-600 mb-2">{{ $roomTypes->sum(fn($rt) => $rt->facilities->count()) }}</div>
                    <div class="stat-label">Total Fasilitas</div>
                    <div class="text-xs text-medium-contrast mt-1">Semua tipe kamar</div>
                </div>
            </div>
        </div>

        <!-- Modern Room Types Grid -->
        @if($roomTypes->count() > 0)
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 mb-6" data-aos="fade-up" data-aos-delay="400">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h2 class="text-2xl font-bold gradient-text leading-tight tracking-wide">Daftar Tipe Kamar</h2>
                        <p class="text-medium-contrast mt-1">Kelola semua kategori kamar hotel</p>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="text-right">
                            <div class="text-sm text-medium-contrast">Total Tipe Kamar</div>
                            <div class="text-2xl font-bold text-primary">{{ $roomTypes->count() }}</div>
                        </div>
                        <div class="w-12 h-12 bg-gradient-to-br from-primary to-accent rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
                @foreach($roomTypes as $roomType)
                <div class="modern-card group overflow-hidden" data-aos="zoom-in" data-aos-delay="{{ 200 + ($loop->index * 100) }}">
                    <!-- Room Image -->
                    <div class="relative h-48 overflow-hidden">
                        <img src="{{ $roomType->image ? (filter_var($roomType->image, FILTER_VALIDATE_URL) ? $roomType->image : asset('storage/' . $roomType->image)) : 'https://picsum.photos/400/300?random=' . $roomType->id }}"
                             alt="{{ $roomType->name }}"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent"></div>

                        <!-- Price Badge -->
                        <div class="absolute top-4 right-4 bg-white/95 backdrop-blur-sm px-3 py-1 rounded-full shadow-lg">
                            <span class="text-primary font-bold text-sm">Rp {{ number_format($roomType->base_price) }}</span>
                        </div>

                        <!-- Room Count Badge -->
                        <div class="absolute top-4 left-4 bg-primary/90 text-white px-3 py-1 rounded-full text-sm font-semibold">
                            {{ $roomType->rooms->count() }} Kamar
                        </div>
                    </div>

                    <!-- Room Details -->
                    <div class="p-6">
                        <h3 class="text-xl font-bold admin-text-dark mb-2 group-hover:text-primary transition-colors duration-300">
                            {{ $roomType->name }}
                        </h3>

                        <p class="text-medium-contrast text-sm mb-4 leading-relaxed">
                            {{ Str::limit($roomType->description, 100) }}
                        </p>

                        <!-- Room Stats -->
                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <div class="text-center p-3 bg-blue-50 rounded-lg">
                                <div class="text-lg font-bold text-blue-600">{{ $roomType->capacity }}</div>
                                <div class="text-xs text-blue-700">Kapasitas</div>
                            </div>
                            <div class="text-center p-3 bg-green-50 rounded-lg">
                                <div class="text-lg font-bold text-green-600">{{ $roomType->facilities->count() }}</div>
                                <div class="text-xs text-green-700">Fasilitas</div>
                            </div>
                        </div>

                        <!-- Facilities -->
                        @if($roomType->facilities->count() > 0)
                        <div class="mb-4">
                            <div class="flex flex-wrap gap-1">
                                @foreach($roomType->facilities->take(4) as $facility)
                                    <span class="inline-flex items-center px-2 py-1 text-xs font-medium bg-primary/10 text-primary rounded-full">
                                        {{ $facility->name }}
                                    </span>
                                @endforeach
                                @if($roomType->facilities->count() > 4)
                                    <span class="inline-flex items-center px-2 py-1 text-xs font-medium bg-gray-100 text-gray-600 rounded-full">
                                        +{{ $roomType->facilities->count() - 4 }}
                                    </span>
                                @endif
                            </div>
                        </div>
                        @endif

                        <!-- Action Buttons -->
                        <div class="flex gap-3 mt-4">
                            <a href="{{ route('admin.room-types.show', $roomType) }}"
                               class="flex-1 bg-blue-500 hover:bg-blue-600 text-white px-4 py-3 rounded-xl text-sm font-semibold transition-all duration-300 hover:scale-105 text-center no-underline">
                                <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                Lihat
                            </a>
                            <a href="{{ route('admin.room-types.edit', $roomType) }}"
                               class="flex-1 bg-green-500 hover:bg-green-600 text-white px-4 py-3 rounded-xl text-sm font-semibold transition-all duration-300 hover:scale-105 text-center no-underline">
                                <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                                Edit
                            </a>
                        </div>

                        <!-- Delete Button (Separate for better UX) -->
                        <form action="{{ route('admin.room-types.destroy', $roomType) }}" method="POST" style="margin-top: 12px;">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    style="background-color: #dc2626 !important; color: white !important; border: 2px solid #b91c1c !important; width: 100%; padding: 12px 16px; border-radius: 12px; font-size: 14px; font-weight: bold;"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus tipe kamar ini?')">
                                <svg style="width: 16px; height: 16px; margin-right: 8px; display: inline;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <!-- Empty State -->
            <div class="modern-card text-center py-16" data-aos="fade-up">
                <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold admin-text-dark mb-4">Belum Ada Tipe Kamar</h3>
                <p class="text-medium-contrast mb-8 max-w-md mx-auto">
                    Mulai kelola inventaris hotel Anda dengan membuat tipe kamar pertama. Setiap tipe kamar dapat memiliki harga, kapasitas, dan fasilitas berbeda.
                </p>
                <a href="{{ route('admin.room-types.create') }}" class="btn-modern px-8 py-3 text-lg font-semibold">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Buat Tipe Kamar Pertama
                </a>
            </div>
        @endif
    </div>
</div>
@endsection