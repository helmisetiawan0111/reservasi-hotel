@extends('layouts.app')

@section('title', 'Detail Pengguna ' . $user->name . ' - Admin')

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
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-3xl lg:text-4xl font-bold gradient-text leading-tight tracking-wide">Detail Pengguna</h1>
                            <p class="text-medium-contrast text-lg mt-1">{{ $user->name }}</p>
                        </div>
                    </div>
                </div>
                <div class="flex gap-4">
                    <a href="{{ route('admin.users.index') }}" class="btn-modern px-4 py-2 text-sm font-medium">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Kembali ke List
                    </a>
                </div>
            </div>
        </div>

        <!-- User Details -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- User Information Card -->
            <div class="modern-card">
                <div class="card-body p-0">
                    <div class="p-6 pb-0">
                        <h2 class="text-xl font-bold gradient-text leading-tight tracking-wide mb-6">Informasi Pengguna</h2>
                    </div>
                    <div class="px-6 pb-6">
                        <div class="space-y-4">
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                <div class="flex items-center space-x-3">
                                    <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    <span class="text-medium-contrast">Nama Lengkap</span>
                                </div>
                                <span class="font-semibold text-primary">{{ $user->name }}</span>
                            </div>

                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                <div class="flex items-center space-x-3">
                                    <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                    </svg>
                                    <span class="text-medium-contrast">Email</span>
                                </div>
                                <span class="font-semibold text-primary">{{ $user->email }}</span>
                            </div>

                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                <div class="flex items-center space-x-3">
                                    <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                    </svg>
                                    <span class="text-medium-contrast">Role</span>
                                </div>
                                <span class="inline-flex items-center px-3 py-1 text-sm font-medium rounded-full
                                    @if($user->hasRole('admin')) bg-red-100 text-red-800
                                    @elseif($user->hasRole('super_admin')) bg-purple-100 text-purple-800
                                    @elseif($user->hasRole('receptionist')) bg-blue-100 text-blue-800
                                    @else bg-green-100 text-green-800 @endif">
                                    {{ $user->roles->first()?->name ? ucfirst($user->roles->first()->name) : 'Customer' }}
                                </span>
                            </div>

                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                <div class="flex items-center space-x-3">
                                    <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="text-medium-contrast">Bergabung</span>
                                </div>
                                <span class="font-semibold text-primary">{{ $user->created_at->format('d M Y') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- User Avatar -->
            <div class="modern-card">
                <div class="card-body p-6 text-center">
                    <div class="w-24 h-24 bg-gradient-to-br from-primary to-accent rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-white font-bold text-3xl">{{ strtoupper(substr($user->name, 0, 1)) }}</span>
                    </div>
                    <h3 class="font-semibold text-primary text-lg mb-2">{{ $user->name }}</h3>
                    <p class="text-medium-contrast">{{ $user->email }}</p>
                    <div class="mt-4">
                        <span class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-full
                            @if($user->hasRole('admin')) bg-red-100 text-red-800
                            @elseif($user->hasRole('super_admin')) bg-purple-100 text-purple-800
                            @elseif($user->hasRole('receptionist')) bg-blue-100 text-blue-800
                            @else bg-green-100 text-green-800 @endif">
                            {{ $user->roles->first()?->name ? ucfirst($user->roles->first()->name) : 'Customer' }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="modern-card">
                <div class="card-body p-0">
                    <div class="p-6 pb-0">
                        <h3 class="text-lg font-bold gradient-text leading-tight tracking-wide mb-4">Aktivitas Terbaru</h3>
                    </div>
                    <div class="px-6 pb-6">
                        <div class="space-y-3">
                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                <div class="flex items-center space-x-3">
                                    <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="text-sm text-medium-contrast">Akun dibuat</span>
                                </div>
                                <span class="text-xs text-medium-contrast">{{ $user->created_at->diffForHumans() }}</span>
                            </div>

                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                <div class="flex items-center space-x-3">
                                    <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="text-sm text-medium-contrast">Terakhir login</span>
                                </div>
                                <span class="text-xs text-medium-contrast">{{ $user->updated_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- User Statistics -->
            <div class="modern-card">
                <div class="card-body p-0">
                    <div class="p-6 pb-0">
                        <h3 class="text-lg font-bold gradient-text leading-tight tracking-wide mb-4">Statistik Pengguna</h3>
                    </div>
                    <div class="px-6 pb-6">
                        <div class="space-y-3">
                            <div class="flex justify-between items-center">
                                <span class="text-medium-contrast">Total Reservasi</span>
                                <span class="font-semibold text-primary">{{ $user->reservations()->count() }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-medium-contrast">Reservasi Aktif</span>
                                <span class="font-semibold text-primary">{{ $user->reservations()->whereIn('status', ['confirmed', 'checked_in'])->count() }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-medium-contrast">Total Pembayaran</span>
                                <span class="font-semibold text-primary">Rp {{ number_format($user->reservations()->join('payments', 'reservations.id', '=', 'payments.reservation_id')->where('payments.status', 'completed')->sum('payments.amount')) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection