@extends('layouts.app')

@section('title', 'Detail Fasilitas ' . $facility->name . ' - Admin')

@section('content')
<div class="min-h-screen admin-panel">
    <div class="page-container">
        <!-- Header Section -->
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 mb-6" data-aos="fade-down">
            <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-6">
                <div class="flex-1">
                    <div class="flex items-center gap-4 mb-3">
                        <div class="w-12 h-12 bg-gradient-to-br from-primary to-accent rounded-xl flex items-center justify-center">
                            @if($facility->icon)
                                <i class="fas fa-{{ $facility->icon }} text-white text-xl"></i>
                            @else
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                            @endif
                        </div>
                        <div>
                            <h1 class="text-3xl lg:text-4xl font-bold gradient-text leading-tight tracking-wide">Detail Fasilitas</h1>
                            <p class="text-medium-contrast text-lg mt-1">{{ $facility->name }}</p>
                        </div>
                    </div>
                </div>
                <div class="flex gap-4">
                    <a href="{{ route('admin.facilities.index') }}" class="btn-modern px-4 py-2 text-sm font-medium">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Kembali ke List
                    </a>
                </div>
            </div>
        </div>

        <!-- Facility Details -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Facility Information Card -->
            <div class="modern-card">
                <div class="card-body p-0">
                    <div class="p-6 pb-0">
                        <h2 class="text-xl font-bold gradient-text leading-tight tracking-wide mb-6">Informasi Fasilitas</h2>
                    </div>
                    <div class="px-6 pb-6">
                        <div class="space-y-4">
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                <div class="flex items-center space-x-3">
                                    <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                    </svg>
                                    <span class="text-medium-contrast">Nama Fasilitas</span>
                                </div>
                                <span class="font-semibold text-primary">{{ $facility->name }}</span>
                            </div>

                            @if($facility->icon)
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                <div class="flex items-center space-x-3">
                                    <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                    </svg>
                                    <span class="text-medium-contrast">Ikon</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <i class="fas fa-{{ $facility->icon }} text-primary text-lg"></i>
                                    <span class="font-semibold text-primary">{{ $facility->icon }}</span>
                                </div>
                            </div>
                            @endif

                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                <div class="flex items-center space-x-3">
                                    <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="text-medium-contrast">Dibuat</span>
                                </div>
                                <span class="font-semibold text-primary">{{ $facility->created_at->format('d M Y') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Facility Description Card -->
            <div class="modern-card">
                <div class="card-body p-0">
                    <div class="p-6 pb-0">
                        <h2 class="text-xl font-bold gradient-text leading-tight tracking-wide mb-6">Deskripsi</h2>
                    </div>
                    <div class="px-6 pb-6">
                        @if($facility->description)
                            <p class="text-medium-contrast leading-relaxed">{{ $facility->description }}</p>
                        @else
                            <div class="text-center py-8">
                                <svg class="w-12 h-12 mx-auto mb-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                <p class="text-medium-contrast">Tidak ada deskripsi untuk fasilitas ini</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Room Types with This Facility -->
            <div class="modern-card md:col-span-2">
                <div class="card-body p-0">
                    <div class="p-6 pb-0">
                        <h2 class="text-xl font-bold gradient-text leading-tight tracking-wide mb-6">Tipe Kamar yang Memiliki Fasilitas Ini</h2>
                    </div>
                    <div class="px-6 pb-6">
                        @if($facility->roomTypes->count() > 0)
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                @foreach($facility->roomTypes as $roomType)
                                <div class="flex items-center justify-between p-4 bg-gradient-to-r from-blue-50 to-white rounded-lg border border-blue-200">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center">
                                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="font-semibold text-primary">{{ $roomType->name }}</p>
                                            <p class="text-xs text-medium-contrast">Rp {{ number_format($roomType->base_price) }}/malam</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
                                            {{ $roomType->capacity }} tamu
                                        </span>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-8">
                                <svg class="w-12 h-12 mx-auto mb-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                                <p class="text-medium-contrast">Fasilitas ini belum digunakan di tipe kamar manapun</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection