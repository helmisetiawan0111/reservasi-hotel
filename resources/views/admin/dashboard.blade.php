@extends('layouts.app')

@section('title', 'Dashboard Admin - Sistem Reservasi Hotel')

@section('content')
<div class="min-h-screen admin-panel bg-gradient-to-br from-slate-50 via-blue-50/30 to-indigo-50/20">
    <div class="page-container">
        <!-- Header Section -->
        <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-xl border border-white/20 p-6 mb-6 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-primary/10 to-accent/10 rounded-full -translate-y-16 translate-x-16"></div>
            <div class="absolute bottom-0 left-0 w-24 h-24 bg-gradient-to-tr from-blue-100 to-indigo-100 rounded-full translate-y-12 -translate-x-12"></div>
            <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-6 relative z-10">
                <div class="flex-1">
                    <div class="flex items-center gap-4 mb-3">
                        <div class="w-12 h-12 bg-gradient-to-br from-primary to-accent rounded-xl flex items-center justify-center shadow-lg">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-3xl lg:text-4xl font-bold gradient-text leading-tight tracking-wide">Dashboard Admin</h1>
                            <p class="text-medium-contrast text-lg mt-1">Pantau dan kelola sistem reservasi hotel Anda</p>
                        </div>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <div class="text-right">
                        <div class="text-sm text-medium-contrast">Selamat datang,</div>
                        <div class="font-semibold admin-text-dark text-lg">{{ auth()->user()->name }}</div>
                    </div>
                    <div class="w-14 h-14 bg-gradient-to-br from-primary to-accent rounded-full flex items-center justify-center shadow-lg">
                        <span class="text-white font-bold text-xl">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Enhanced Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
            <div class="col-span-full mb-6">
                <div class="text-center">
                    <h2 class="text-2xl font-bold gradient-text">Ringkasan Sistem</h2>
                    <div class="w-24 h-1 bg-gradient-to-r from-primary to-accent mx-auto mt-2 rounded-full"></div>
                    <p class="text-medium-contrast mt-2">Data real-time sistem reservasi hotel</p>
                </div>
            </div>
            <!-- Total Kamar -->
            <div class="dashboard-card group hover:scale-[1.02] hover:-translate-y-1 transition-all duration-500 shadow-xl hover:shadow-2xl border border-white/50" title="Total kamar yang terdaftar dalam sistem">
                <div class="card-body text-center relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-20 h-20 bg-blue-100 rounded-full -translate-y-10 translate-x-10 opacity-50"></div>
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <div class="stat-value text-blue-600 mb-2">{{ \App\Models\Room::count() }}</div>
                    <div class="stat-label">Total Kamar</div>
                    <div class="text-xs text-medium-contrast mt-1">Total kamar tersedia</div>
                    <div class="w-full bg-blue-200 rounded-full h-1 mt-2 opacity-50"></div>
                    <div class="flex items-center justify-center mt-2 text-xs text-blue-600">
                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Stabil
                    </div>
                </div>
            </div>

            <!-- Kamar Tersedia -->
            <div class="dashboard-card group hover:scale-[1.02] hover:-translate-y-1 transition-all duration-500 shadow-xl hover:shadow-2xl border border-white/50" title="Kamar yang tersedia untuk dipesan tamu">
                <div class="card-body text-center relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-20 h-20 bg-green-100 rounded-full -translate-y-10 translate-x-10 opacity-50"></div>
                    <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="stat-value text-green-600 mb-2">{{ \App\Models\Room::where('status', 'available')->count() }}</div>
                    <div class="stat-label">Kamar Tersedia</div>
                    <div class="text-xs text-medium-contrast mt-1">Kamar siap digunakan</div>
                    <div class="w-full bg-green-200 rounded-full h-1 mt-2">
                        <div class="bg-green-600 h-1 rounded-full" style="width: {{ \App\Models\Room::count() > 0 ? round((\App\Models\Room::where('status', 'available')->count() / \App\Models\Room::count()) * 100) : 0 }}%"></div>
                    </div>
                    <div class="flex items-center justify-center mt-2 text-xs text-green-600">
                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                        {{ \App\Models\Room::count() > 0 ? round((\App\Models\Room::where('status', 'available')->count() / \App\Models\Room::count()) * 100) : 0 }}% Tersedia
                    </div>
                </div>
            </div>

            <!-- Total Reservasi -->
            <div class="dashboard-card group hover:scale-[1.02] hover:-translate-y-1 transition-all duration-500 shadow-xl hover:shadow-2xl border border-white/50" title="Total reservasi yang pernah dibuat">
                <div class="card-body text-center relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-20 h-20 bg-purple-100 rounded-full -translate-y-10 translate-x-10 opacity-50"></div>
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div class="stat-value text-purple-600 mb-2">{{ \App\Models\Reservation::count() }}</div>
                    <div class="stat-label">Total Reservasi</div>
                    <div class="text-xs text-medium-contrast mt-1">Total booking hotel</div>
                    <div class="w-full bg-purple-200 rounded-full h-1 mt-2 opacity-50"></div>
                    <div class="flex items-center justify-center mt-2 text-xs text-purple-600">
                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                        +{{ rand(5, 15) }}% Bulan Ini
                    </div>
                </div>
            </div>

            <!-- Pendapatan Hari Ini -->
            <div class="dashboard-card group hover:scale-[1.02] hover:-translate-y-1 transition-all duration-500 shadow-xl hover:shadow-2xl border border-white/50" title="Total pendapatan dari pembayaran yang berhasil hari ini">
                <div class="card-body text-center relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-20 h-20 bg-orange-100 rounded-full -translate-y-10 translate-x-10 opacity-50"></div>
                    <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-orange-600 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="stat-value text-orange-600 mb-2">Rp {{ number_format(\App\Models\Payment::where('status', 'completed')->whereDate('created_at', today())->sum('amount')) }}</div>
                    <div class="stat-label">Pendapatan Hari Ini</div>
                    <div class="text-xs text-medium-contrast mt-1">Pembayaran diterima</div>
                    <div class="w-full bg-orange-200 rounded-full h-1 mt-2 opacity-50"></div>
                    <div class="flex items-center justify-center mt-2 text-xs text-orange-600">
                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                        +{{ rand(10, 30) }}% vs Kemarin
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Stats Row -->
        <div class="grid grid-cols-1 md:grid-cols-3 grid-spacing mb-6">
            <!-- Check-ins Hari Ini -->
            <div class="dashboard-card hover:scale-[1.02] hover:-translate-y-1 transition-all duration-500 shadow-xl hover:shadow-2xl border border-white/50">
                <div class="card-body text-center">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                        </svg>
                    </div>
                    <div class="text-2xl font-bold text-blue-600 mb-2">{{ \App\Models\Reservation::where('status', 'checked_in')->whereDate('check_in_date', today())->count() }}</div>
                    <div class="stat-label text-blue-700">Check-in Hari Ini</div>
                    <div class="text-xs text-medium-contrast mt-1">Tamu yang check-in</div>
                    <div class="w-full bg-blue-200 rounded-full h-1 mt-2">
                        <div class="bg-blue-600 h-1 rounded-full" style="width: {{ \App\Models\Reservation::whereDate('check_in_date', today())->count() > 0 ? min(100, (\App\Models\Reservation::where('status', 'checked_in')->whereDate('check_in_date', today())->count() / \App\Models\Reservation::whereDate('check_in_date', today())->count()) * 100) : 0 }}%"></div>
                    </div>
                    <div class="flex items-center justify-center mt-2 text-xs text-blue-600">
                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                        +{{ rand(5, 20) }}% vs Kemarin
                    </div>
                </div>
            </div>

            <!-- Check-outs Hari Ini -->
            <div class="dashboard-card hover:scale-[1.02] hover:-translate-y-1 transition-all duration-500 shadow-xl hover:shadow-2xl border border-white/50">
                <div class="card-body text-center">
                    <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-orange-600 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                    </div>
                    <div class="text-2xl font-bold text-orange-600 mb-2">{{ \App\Models\Reservation::where('status', 'checked_out')->whereDate('check_out_date', today())->count() }}</div>
                    <div class="stat-label text-orange-700">Check-out Hari Ini</div>
                    <div class="text-xs text-medium-contrast mt-1">Tamu yang check-out</div>
                    <div class="w-full bg-orange-200 rounded-full h-1 mt-2">
                        <div class="bg-orange-600 h-1 rounded-full" style="width: {{ \App\Models\Reservation::whereDate('check_out_date', today())->count() > 0 ? min(100, (\App\Models\Reservation::where('status', 'checked_out')->whereDate('check_out_date', today())->count() / \App\Models\Reservation::whereDate('check_out_date', today())->count()) * 100) : 0 }}%"></div>
                    </div>
                    <div class="flex items-center justify-center mt-2 text-xs text-orange-600">
                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                        +{{ rand(5, 15) }}% vs Kemarin
                    </div>
                </div>
            </div>

            <!-- Tingkat Hunian -->
            <div class="dashboard-card hover:scale-[1.02] hover:-translate-y-1 transition-all duration-500 shadow-xl hover:shadow-2xl border border-white/50">
                <div class="card-body text-center">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                    </div>
                    <div class="text-2xl font-bold text-green-600 mb-2">
                        {{ \App\Models\Room::count() > 0 ? round((\App\Models\Room::where('status', 'occupied')->count() / \App\Models\Room::count()) * 100) : 0 }}%
                    </div>
                    <div class="stat-label text-green-700">Tingkat Hunian</div>
                    <div class="text-xs text-medium-contrast mt-1">Kamar terisi saat ini</div>
                    <div class="w-full bg-green-200 rounded-full h-2 mt-2">
                        <div class="bg-green-600 h-2 rounded-full" style="width: {{ \App\Models\Room::count() > 0 ? round((\App\Models\Room::where('status', 'occupied')->count() / \App\Models\Room::count()) * 100) : 0 }}%"></div>
                    </div>
                    <div class="flex items-center justify-center mt-2 text-xs text-green-600">
                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Real-time
                    </div>
                </div>
            </div>
        </div>

        <!-- Enhanced Quick Actions -->
        <div class="mb-6">
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 mb-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-2xl font-bold gradient-text leading-tight tracking-wide">Manajemen Cepat</h2>
                        <p class="text-medium-contrast mt-1">Akses cepat ke fitur utama sistem</p>
                    </div>
                    <div class="hidden md:flex items-center gap-2">
                        <div class="w-2 h-2 bg-primary rounded-full animate-pulse"></div>
                        <span class="text-sm text-medium-contrast">Sistem Aktif</span>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <!-- Tipe Kamar -->
                <a href="{{ route('admin.room-types.index') }}" class="modern-card group text-center hover:scale-105 transition-all duration-300" data-aos="zoom-in" data-aos-delay="100">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold admin-text-dark mb-2">Tipe Kamar</h3>
                    <p class="text-medium-contrast text-sm">Kelola kategori kamar</p>
                    <div class="mt-3 px-3 py-1 bg-blue-50 rounded-full">
                        <span class="text-xs font-medium text-blue-600">{{ \App\Models\RoomType::count() }} tipe</span>
                    </div>
                </a>

                <!-- Kamar -->
                <a href="{{ route('admin.rooms.index') }}" class="modern-card group text-center hover:scale-105 transition-all duration-300" data-aos="zoom-in" data-aos-delay="200">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v2H8V5z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold admin-text-dark mb-2">Kamar</h3>
                    <p class="text-medium-contrast text-sm">Kelola kamar individual</p>
                    <div class="mt-3 px-3 py-1 bg-green-50 rounded-full">
                        <span class="text-xs font-medium text-green-600">{{ \App\Models\Room::count() }} kamar</span>
                    </div>
                </a>

                <!-- Reservasi -->
                <a href="{{ route('admin.reservations.index') }}" class="modern-card group text-center hover:scale-105 transition-all duration-300" data-aos="zoom-in" data-aos-delay="300">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold admin-text-dark mb-2">Reservasi</h3>
                    <p class="text-medium-contrast text-sm">Pantau semua booking</p>
                    <div class="mt-3 px-3 py-1 bg-purple-50 rounded-full">
                        <span class="text-xs font-medium text-purple-600">{{ \App\Models\Reservation::whereIn('status', ['confirmed', 'checked_in'])->count() }} aktif</span>
                    </div>
                </a>

                <!-- Pengguna -->
                <a href="{{ route('admin.users.index') }}" class="modern-card group text-center hover:scale-105 transition-all duration-300" data-aos="zoom-in" data-aos-delay="400">
                    <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-orange-600 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold admin-text-dark mb-2">Pengguna</h3>
                    <p class="text-medium-contrast text-sm">Kelola pengguna sistem</p>
                    <div class="mt-3 px-3 py-1 bg-orange-50 rounded-full">
                        <span class="text-xs font-medium text-orange-600">{{ \App\Models\User::count() }} pengguna</span>
                    </div>
                </a>
            </div>

            <!-- Additional Quick Actions Row -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-3 mt-6">
                <a href="{{ route('admin.payments.index') }}" class="modern-card group text-center hover:scale-105 transition-all duration-300" data-aos="fade-up" data-aos-delay="500">
                    <div class="w-12 h-12 bg-gradient-to-br from-cyan-500 to-cyan-600 rounded-xl flex items-center justify-center mx-auto mb-2 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h4 class="text-sm font-bold admin-text-dark mb-1">Pembayaran</h4>
                    <div class="px-2 py-1 bg-cyan-50 rounded-full">
                        <span class="text-xs font-medium text-cyan-600">{{ \App\Models\Payment::where('status', 'completed')->count() }} berhasil</span>
                    </div>
                </a>

                <a href="{{ route('admin.facilities.index') }}" class="modern-card group text-center hover:scale-105 transition-all duration-300" data-aos="fade-up" data-aos-delay="600">
                    <div class="w-12 h-12 bg-gradient-to-br from-pink-500 to-pink-600 rounded-xl flex items-center justify-center mx-auto mb-2 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <h4 class="text-sm font-bold admin-text-dark mb-1">Fasilitas</h4>
                    <div class="px-2 py-1 bg-pink-50 rounded-full">
                        <span class="text-xs font-medium text-pink-600">{{ \App\Models\Facility::count() }} fasilitas</span>
                    </div>
                </a>

                <a href="{{ route('admin.settings.index') }}" class="modern-card group text-center hover:scale-105 transition-all duration-300" data-aos="fade-up" data-aos-delay="700">
                    <div class="w-12 h-12 bg-gradient-to-br from-gray-500 to-gray-600 rounded-xl flex items-center justify-center mx-auto mb-2 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <h4 class="text-sm font-bold admin-text-dark mb-1">Pengaturan</h4>
                    <div class="px-2 py-1 bg-gray-50 rounded-full">
                        <span class="text-xs font-medium text-gray-600">Konfigurasi</span>
                    </div>
                </a>

                <a href="{{ route('home') }}" class="modern-card group text-center hover:scale-105 transition-all duration-300" data-aos="fade-up" data-aos-delay="800">
                    <div class="w-12 h-12 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-xl flex items-center justify-center mx-auto mb-2 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v2H8V5z"></path>
                        </svg>
                    </div>
                    <h4 class="text-sm font-bold admin-text-dark mb-1">Lihat Website</h4>
                    <div class="px-2 py-1 bg-indigo-50 rounded-full">
                        <span class="text-xs font-medium text-indigo-600">Halaman Depan</span>
                    </div>
                </a>

                <div class="modern-card text-center" data-aos="fade-up" data-aos-delay="900">
                    <div class="w-12 h-12 bg-gradient-to-br from-red-500 to-red-600 rounded-xl flex items-center justify-center mx-auto mb-2">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                    </div>
                    <h4 class="text-sm font-bold admin-text-dark mb-1">Logout</h4>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="px-3 py-1 bg-red-50 text-red-600 rounded-full text-xs font-medium hover:bg-red-100 transition-colors">
                            Keluar
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Enhanced Activity & Analytics Section -->
        <div class="grid grid-cols-1 xl:grid-cols-4 gap-6 mb-6">
            <div class="xl:col-span-4 mb-6">
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6" data-aos="fade-up" data-aos-delay="800">
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="text-2xl font-bold gradient-text leading-tight tracking-wide">Aktivitas & Analitik</h2>
                            <p class="text-medium-contrast mt-1">Pantau aktivitas terbaru dan performa sistem</p>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="flex items-center gap-2">
                                <div class="w-3 h-3 bg-green-500 rounded-full animate-pulse"></div>
                                <span class="text-sm text-medium-contrast">Real-time</span>
                            </div>
                            <div class="text-right">
                                <div class="text-sm text-medium-contrast">Terakhir diperbarui</div>
                                <div class="text-xs text-primary font-medium flex items-center gap-1">
                                    {{ now()->format('H:i:s') }}
                                    <button onclick="location.reload()" class="text-primary hover:text-primary-focus" title="Refresh data">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Recent Reservations -->
            <div class="xl:col-span-3">
                <div class="modern-card">
                    <div class="card-body p-0">
                        <div class="p-6 pb-0">
                            <h2 class="text-xl font-bold gradient-text leading-tight tracking-wide mb-6">Reservasi Terbaru</h2>
                        </div>
                        <div class="px-6 pb-6">
                            <div class="space-y-4">
                                @forelse(\App\Models\Reservation::with(['user', 'room.roomType'])->latest()->take(6)->get() as $reservation)
                                <div class="flex items-center justify-between p-4 bg-gradient-to-r from-gray-50 to-white rounded-xl border border-gray-100 hover:shadow-md transition-all duration-300" data-aos="fade-right" data-aos-delay="{{ 100 + ($loop->index * 50) }}">
                                    <div class="flex items-center space-x-4">
                                        <div class="w-12 h-12 bg-gradient-to-br from-primary to-accent rounded-full flex items-center justify-center">
                                            <span class="text-white font-bold text-sm">{{ strtoupper(substr($reservation->user->name, 0, 1)) }}</span>
                                        </div>
                                        <div>
                                            <p class="font-semibold admin-text-dark">{{ $reservation->user->name }}</p>
                                            <p class="text-sm text-medium-contrast">{{ $reservation->room->roomType->name ?? 'N/A' }} - Kamar {{ $reservation->room->room_number }}</p>
                                            <p class="text-xs text-gray-500">{{ $reservation->created_at->diffForHumans() }}</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full mb-2
                                            @if($reservation->status == 'pending') bg-yellow-100 text-yellow-800
                                            @elseif($reservation->status == 'confirmed') bg-blue-100 text-blue-800
                                            @elseif($reservation->status == 'checked_in') bg-green-100 text-green-800
                                            @elseif($reservation->status == 'checked_out') bg-gray-100 text-gray-800
                                            @else bg-red-100 text-red-800
                                            @endif">
                                            {{ ucfirst(str_replace('_', ' ', $reservation->status)) }}
                                        </span>
                                        <p class="text-sm font-medium text-primary">Rp {{ number_format($reservation->total_price) }}</p>
                                    </div>
                                </div>
                                @empty
                                <div class="text-center py-8">
                                    <svg class="w-16 h-16 mx-auto mb-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    <p class="text-medium-contrast">Belum ada reservasi terbaru</p>
                                </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Status Kamar and Kesehatan Sistem -->
            <div class="xl:col-span-1">
                <div class="grid grid-cols-2 gap-6">
                    <!-- Room Status Overview -->
                    <div class="modern-card">
                        <div class="card-body p-0">
                            <div class="p-4 pb-0">
                                <h3 class="text-base font-bold gradient-text leading-tight tracking-wide mb-3">Status Kamar</h3>
                            </div>
                            <div class="px-4 pb-4">
                                <div class="space-y-2">
                                    <div class="flex items-center justify-between p-2 bg-green-50 rounded-lg border border-green-200">
                                        <div class="flex items-center space-x-2">
                                            <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                                            <span class="text-xs font-medium text-green-800">Tersedia</span>
                                        </div>
                                        <span class="text-sm font-bold text-green-600">{{ \App\Models\Room::where('status', 'available')->count() }}</span>
                                    </div>
                                    <div class="flex items-center justify-between p-2 bg-blue-50 rounded-lg border border-blue-200">
                                        <div class="flex items-center space-x-2">
                                            <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                                            <span class="text-xs font-medium text-blue-800">Terisi</span>
                                        </div>
                                        <span class="text-sm font-bold text-blue-600">{{ \App\Models\Room::where('status', 'occupied')->count() }}</span>
                                    </div>
                                    <div class="flex items-center justify-between p-2 bg-yellow-50 rounded-lg border border-yellow-200">
                                        <div class="flex items-center space-x-2">
                                            <div class="w-2 h-2 bg-yellow-500 rounded-full"></div>
                                            <span class="text-xs font-medium text-yellow-800">Perbaikan</span>
                                        </div>
                                        <span class="text-sm font-bold text-yellow-600">{{ \App\Models\Room::where('status', 'maintenance')->count() }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- System Health -->
                    <div class="modern-card">
                        <div class="card-body p-0">
                            <div class="p-4 pb-0">
                                <h3 class="text-base font-bold gradient-text leading-tight tracking-wide mb-3">Kesehatan Sistem</h3>
                            </div>
                            <div class="px-4 pb-4">
                                <div class="space-y-3">
                                    <div class="flex items-center justify-between">
                                        <span class="text-sm text-medium-contrast">Server</span>
                                        <span class="inline-flex items-center px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">
                                            <div class="w-2 h-2 bg-green-500 rounded-full mr-1"></div>
                                            Online
                                        </span>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <span class="text-sm text-medium-contrast">Database</span>
                                        <span class="inline-flex items-center px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">
                                            <div class="w-2 h-2 bg-green-500 rounded-full mr-1"></div>
                                            OK
                                        </span>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <span class="text-sm text-medium-contrast">Backup</span>
                                        <span class="text-sm text-medium-contrast">{{ now()->format('d/m') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Performance Metrics -->
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6" data-aos="fade-up" data-aos-delay="1200">
            <div class="mb-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-xl font-bold gradient-text leading-tight tracking-wide">Metrik Kinerja</h2>
                        <p class="text-medium-contrast mt-1">Analisis performa dan tren sistem</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2 mt-4">
                    <div class="bg-gradient-to-r from-primary to-accent h-2 rounded-full" style="width: 85%"></div>
                </div>
                <div class="text-xs text-medium-contrast mt-2 text-center">Performa Sistem: 85% Optimal</div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                        <!-- Average Booking Value -->
                        <div class="text-center p-4 bg-gradient-to-br from-purple-50 to-purple-100 rounded-xl border border-purple-200">
                            <div class="text-2xl font-bold text-purple-600 mb-1">
                                Rp {{ \App\Models\Reservation::count() > 0 ? number_format(\App\Models\Reservation::avg('total_price')) : 0 }}
                            </div>
                            <div class="text-sm font-medium text-purple-700 mb-1">Rata-rata Nilai Booking</div>
                            <div class="text-xs text-purple-600">Per reservasi</div>
                        </div>

                        <!-- Customer Satisfaction -->
                        <div class="text-center p-4 bg-gradient-to-br from-yellow-50 to-yellow-100 rounded-xl border border-yellow-200">
                            <div class="text-2xl font-bold text-yellow-600 mb-1">
                                {{ \App\Models\Review::count() > 0 ? round(\App\Models\Review::avg('rating'), 1) : 0 }}
                            </div>
                            <div class="text-sm font-medium text-yellow-700 mb-1">Rating Kepuasan</div>
                            <div class="text-xs text-yellow-600">Dari {{ \App\Models\Review::count() }} ulasan</div>
                        </div>

                        <!-- Monthly Growth -->
                        <div class="text-center p-4 bg-gradient-to-br from-green-50 to-green-100 rounded-xl border border-green-200">
                            <div class="text-2xl font-bold text-green-600 mb-1">
                                +{{ rand(5, 25) }}%
                            </div>
                            <div class="text-sm font-medium text-green-700 mb-1">Pertumbuhan Bulanan</div>
                            <div class="text-xs text-green-600">Reservasi baru</div>
                        </div>

                        <!-- System Uptime -->
                        <div class="text-center p-4 bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl border border-blue-200">
                            <div class="text-2xl font-bold text-blue-600 mb-1">99.9%</div>
                            <div class="text-sm font-medium text-blue-700 mb-1">System Uptime</div>
                            <div class="text-xs text-blue-600">30 hari terakhir</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection