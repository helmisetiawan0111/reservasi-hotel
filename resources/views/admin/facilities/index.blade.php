@extends('layouts.app')

@section('title', 'Kelola Fasilitas - Admin Dashboard')

@section('content')
<div class="min-h-screen admin-panel">
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold admin-text-dark mb-2">Kelola Fasilitas</h1>
                <p class="text-medium-contrast">Kelola fasilitas yang tersedia di hotel</p>
            </div>
            <div class="flex items-center gap-4">
                <a href="{{ route('admin.dashboard') }}" class="group relative inline-flex items-center px-6 py-3 text-sm font-semibold text-gray-700 bg-gradient-to-r from-gray-100 to-gray-200 rounded-xl hover:from-gray-200 hover:to-gray-300 transition-all duration-300 hover:scale-105 hover:shadow-lg border-2 border-gray-300 hover:border-gray-400">
                    <svg class="w-4 h-4 mr-2 text-gray-600 group-hover:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Kembali ke Dashboard
                    <div class="absolute inset-0 rounded-xl bg-gradient-to-r from-gray-200/20 to-gray-300/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </a>
                <a href="{{ route('admin.facilities.create') }}" class="group relative inline-flex items-center px-8 py-3 text-base font-bold text-white bg-gradient-to-r from-green-500 to-green-600 rounded-xl hover:from-green-600 hover:to-green-700 transition-all duration-300 hover:scale-105 hover:shadow-xl shadow-green-500/25 border-2 border-green-500">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Tambah Fasilitas
                    <div class="absolute inset-0 rounded-xl bg-gradient-to-r from-white/20 to-white/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="absolute -inset-1 rounded-xl bg-gradient-to-r from-green-400 to-green-500 opacity-0 group-hover:opacity-50 blur transition-opacity duration-300 -z-10"></div>
                </a>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="dashboard-card hover:scale-[1.02] transition-all duration-300 shadow-xl hover:shadow-2xl" data-aos="fade-up" data-aos-delay="100">
                <div class="card-body text-center">
                    <div class="stat-value text-blue-600 mb-2">{{ \App\Models\Facility::count() }}</div>
                    <div class="stat-label">Total Fasilitas</div>
                </div>
            </div>
            <div class="dashboard-card hover:scale-[1.02] transition-all duration-300 shadow-xl hover:shadow-2xl" data-aos="fade-up" data-aos-delay="200">
                <div class="card-body text-center">
                    <div class="stat-value text-green-600 mb-2">{{ \App\Models\RoomType::whereHas('facilities')->count() }}</div>
                    <div class="stat-label">Tipe Kamar dengan Fasilitas</div>
                </div>
            </div>
            <div class="dashboard-card hover:scale-[1.02] transition-all duration-300 shadow-xl hover:shadow-2xl" data-aos="fade-up" data-aos-delay="300">
                <div class="card-body text-center">
                    <div class="stat-value text-purple-600 mb-2">{{ \App\Models\Facility::withCount('roomTypes')->get()->sum('room_types_count') }}</div>
                    <div class="stat-label">Total Penggunaan</div>
                </div>
            </div>
        </div>

        <!-- Facilities Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse(\App\Models\Facility::withCount('roomTypes')->get() as $facility)
            <div class="modern-card group" data-aos="zoom-in" data-aos-delay="{{ 200 + ($loop->index * 100) }}">
                <div class="card-body text-center">
                    <!-- Facility Icon -->
                    <div class="w-16 h-16 bg-gradient-to-br from-primary to-accent rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                        @if($facility->icon)
                            <i class="fas fa-{{ $facility->icon }} text-2xl text-white"></i>
                        @else
                            <!-- Default Icon -->
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        @endif
                    </div>

                    <!-- Facility Name -->
                    <h3 class="text-xl font-bold admin-text-dark mb-2">{{ $facility->name }}</h3>

                    <!-- Usage Stats -->
                    <div class="bg-gray-50 rounded-lg p-3 mb-4">
                        <div class="text-sm text-gray-600 mb-1">Digunakan oleh</div>
                        <div class="text-2xl font-bold text-primary">{{ $facility->room_types_count }}</div>
                        <div class="text-xs text-gray-500">tipe kamar</div>
                    </div>

                    <!-- Actions -->
                    <div class="flex justify-center space-x-3">
                        <!-- View Button -->
                        <a href="{{ route('admin.facilities.show', $facility) }}" class="btn btn-sm btn-outline btn-primary">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                            Lihat
                        </a>
                        <!-- Edit Button -->
                        <a href="{{ route('admin.facilities.edit', $facility) }}" class="btn btn-sm btn-outline btn-warning">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                            Edit
                        </a>
                        <!-- Delete Button -->
                        <form method="POST" action="{{ route('admin.facilities.destroy', $facility) }}" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus fasilitas ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline btn-error">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @empty
            <!-- Empty State -->
            <div class="col-span-full text-center py-16">
                <div class="text-gray-500">
                    <svg class="w-16 h-16 mx-auto mb-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                    <p class="text-xl font-medium">Belum ada fasilitas</p>
                    <p class="text-sm">Tambahkan fasilitas pertama untuk hotel Anda.</p>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection