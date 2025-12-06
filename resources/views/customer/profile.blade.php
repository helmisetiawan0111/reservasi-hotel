@extends('layouts.app')

@section('title', 'Profil Saya - Hotel Reservation')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-emerald-50 via-blue-50 to-purple-50">
    <div class="container mx-auto px-4 py-8">
        <!-- Header -->
        <div class="flex justify-between items-center mb-8" data-aos="fade-down" data-aos-delay="100">
            <div>
                <h1 class="text-4xl font-bold gradient-text leading-tight tracking-wide mb-2">Profil Saya</h1>
                <p class="text-medium-contrast">Kelola informasi pribadi dan preferensi Anda</p>
            </div>
            <a href="{{ route('customer.dashboard') }}" class="btn btn-outline btn-primary btn-hover shadow-sm hover:shadow-md transition-all duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali ke Dashboard
            </a>
        </div>

        <!-- Profile Card -->
        <div class="max-w-4xl mx-auto" data-aos="fade-up" data-aos-delay="200">
            <div class="modern-card p-8">
                <div class="flex flex-col md:flex-row items-center md:items-start gap-8">
                    <!-- Profile Avatar -->
                    <div class="flex-shrink-0" data-aos="zoom-in" data-aos-delay="300">
                        <div class="w-32 h-32 bg-gradient-to-br from-emerald-500 to-blue-500 rounded-full flex items-center justify-center text-white text-5xl font-bold shadow-2xl">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>
                    </div>

                    <!-- Profile Info -->
                    <div class="flex-1 text-center md:text-left" data-aos="fade-left" data-aos-delay="400">
                        <h2 class="text-3xl font-bold text-gray-800 mb-2">{{ auth()->user()->name }}</h2>
                        <p class="text-lg text-medium-contrast mb-4">{{ auth()->user()->email }}</p>
                        <div class="flex flex-wrap justify-center md:justify-start gap-4 mb-6">
                            <div class="bg-emerald-100 text-emerald-800 px-4 py-2 rounded-full text-sm font-semibold">
                                <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Terverifikasi
                            </div>
                            <div class="bg-blue-100 text-blue-800 px-4 py-2 rounded-full text-sm font-semibold">
                                <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                Pelanggan
                            </div>
                        </div>
                        <p class="text-gray-600 leading-relaxed">
                            Bergabung sejak {{ auth()->user()->created_at->format('F Y') }}.
                            Terima kasih telah memilih Grand Hotel untuk pengalaman menginap Anda.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Account Statistics -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8" data-aos="fade-up" data-aos-delay="500">
                <div class="modern-card p-6 text-center">
                    <div class="text-3xl font-bold text-emerald-600 mb-2">{{ auth()->user()->reservations()->count() }}</div>
                    <div class="text-medium-contrast font-semibold">Total Reservasi</div>
                    <div class="w-12 h-12 bg-emerald-100 rounded-full mx-auto mt-3 flex items-center justify-center">
                        <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                </div>

                <div class="modern-card p-6 text-center">
                    <div class="text-3xl font-bold text-blue-600 mb-2">{{ auth()->user()->reservations()->where('status', 'checked_out')->count() }}</div>
                    <div class="text-medium-contrast font-semibold">Kunjungan Selesai</div>
                    <div class="w-12 h-12 bg-blue-100 rounded-full mx-auto mt-3 flex items-center justify-center">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                </div>

                <div class="modern-card p-6 text-center">
                    <div class="text-3xl font-bold text-purple-600 mb-2">{{ auth()->user()->reviews()->count() }}</div>
                    <div class="text-medium-contrast font-semibold">Ulasan Diberikan</div>
                    <div class="w-12 h-12 bg-purple-100 rounded-full mx-auto mt-3 flex items-center justify-center">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Account Settings -->
            <div class="modern-card p-8 mt-8" data-aos="fade-up" data-aos-delay="600">
                <h3 class="text-2xl font-bold gradient-text leading-tight tracking-wide mb-6">Pengaturan Akun</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
                            <div class="bg-gray-50 px-4 py-3 rounded-lg border">
                                <span class="text-gray-800">{{ auth()->user()->name }}</span>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                            <div class="bg-gray-50 px-4 py-3 rounded-lg border">
                                <span class="text-gray-800">{{ auth()->user()->email }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Bergabung Sejak</label>
                            <div class="bg-gray-50 px-4 py-3 rounded-lg border">
                                <span class="text-gray-800">{{ auth()->user()->created_at->format('d F Y') }}</span>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Status Akun</label>
                            <div class="bg-green-50 px-4 py-3 rounded-lg border border-green-200">
                                <span class="text-green-800 font-semibold">Aktif</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-8 pt-6 border-t border-gray-200">
                    <p class="text-sm text-gray-600 mb-4">
                        Untuk mengubah informasi profil atau pengaturan akun, silakan hubungi tim dukungan kami.
                    </p>
                    <a href="{{ route('customer.help') }}" class="btn btn-primary btn-hover shadow-lg hover:shadow-xl transition-all duration-300">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Hubungi Dukungan
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection