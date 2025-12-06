@extends('layouts.app')

@section('title', 'Kelola Kamar - Admin Dashboard')

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
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v2H8V5z"></path>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-3xl lg:text-4xl font-bold gradient-text leading-tight tracking-wide">Kelola Kamar</h1>
                            <p class="text-medium-contrast text-lg mt-1">Kelola semua kamar hotel dalam sistem</p>
                        </div>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-600 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Kembali ke Dashboard
                    </a>
                    <a href="{{ route('admin.rooms.create') }}" class="inline-flex items-center px-6 py-3 text-base font-semibold text-white bg-green-600 rounded-xl hover:bg-green-700 transition-all duration-300 hover:scale-105 hover:shadow-lg border-2 border-green-600">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Tambah Kamar Baru
                    </a>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 grid-spacing mb-6">
            <div class="dashboard-card hover:scale-[1.02] transition-all duration-300 shadow-xl hover:shadow-2xl" data-aos="fade-up" data-aos-delay="100">
                <div class="card-body text-center">
                    <div class="stat-value text-blue-600 mb-2">{{ \App\Models\Room::count() }}</div>
                    <div class="stat-label">Total Kamar</div>
                </div>
            </div>
            <div class="dashboard-card hover:scale-[1.02] transition-all duration-300 shadow-xl hover:shadow-2xl" data-aos="fade-up" data-aos-delay="200">
                <div class="card-body text-center">
                    <div class="stat-value text-green-600 mb-2">{{ \App\Models\Room::where('status', 'available')->count() }}</div>
                    <div class="stat-label">Kamar Tersedia</div>
                </div>
            </div>
            <div class="dashboard-card hover:scale-[1.02] transition-all duration-300 shadow-xl hover:shadow-2xl" data-aos="fade-up" data-aos-delay="300">
                <div class="card-body text-center">
                    <div class="stat-value text-yellow-600 mb-2">{{ \App\Models\Room::where('status', 'occupied')->count() }}</div>
                    <div class="stat-label">Kamar Terisi</div>
                </div>
            </div>
            <div class="dashboard-card hover:scale-[1.02] transition-all duration-300 shadow-xl hover:shadow-2xl" data-aos="fade-up" data-aos-delay="400">
                <div class="card-body text-center">
                    <div class="stat-value text-red-600 mb-2">{{ \App\Models\Room::where('status', 'maintenance')->count() }}</div>
                    <div class="stat-label">Dalam Perbaikan</div>
                </div>
            </div>
        </div>

        <!-- Modern Rooms Card Gallery -->
        @if(\App\Models\Room::count() > 0)
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 mb-6" data-aos="fade-up" data-aos-delay="500">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h2 class="text-2xl font-bold gradient-text leading-tight tracking-wide">Galeri Kamar</h2>
                        <p class="text-medium-contrast mt-1">Kelola semua kamar dalam bentuk galeri modern</p>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="text-right">
                            <div class="text-sm text-medium-contrast">Total Kamar</div>
                            <div class="text-2xl font-bold text-primary">{{ \App\Models\Room::count() }}</div>
                        </div>
                        <div class="w-12 h-12 bg-gradient-to-br from-primary to-accent rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v2H8V5z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-10">
                @foreach($rooms as $room)
                <div class="modern-card group overflow-hidden hover:scale-[1.02] transition-all duration-300 shadow-xl hover:shadow-2xl" data-aos="zoom-in" data-aos-delay="{{ 100 + ($loop->index * 50) }}">
                    <!-- Room Header -->
                    <div class="relative p-6 pb-0">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-primary to-accent rounded-xl flex items-center justify-center">
                                <span class="text-white font-bold text-lg">{{ $room->room_number }}</span>
                            </div>
                            <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full
                                @if($room->status == 'available') bg-green-100 text-green-800
                                @elseif($room->status == 'occupied') bg-yellow-100 text-yellow-800
                                @elseif($room->status == 'maintenance') bg-red-100 text-red-800
                                @else bg-gray-100 text-gray-800
                                @endif">
                                {{ ucfirst($room->status) }}
                            </span>
                        </div>

                        <!-- Room Info -->
                        <div class="space-y-2">
                            <h3 class="text-lg font-bold admin-text-dark">{{ $room->roomType->name ?? 'N/A' }}</h3>
                            <div class="flex items-center text-sm text-medium-contrast">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                                Lantai {{ $room->floor }}
                            </div>
                        </div>
                    </div>

                    <!-- Room Details -->
                    <div class="px-6 pb-6">
                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <div class="text-center p-3 bg-blue-50 rounded-lg">
                                <div class="text-lg font-bold text-blue-600">{{ $room->roomType->capacity ?? 0 }}</div>
                                <div class="text-xs text-blue-700">Kapasitas</div>
                            </div>
                            <div class="text-center p-3 bg-green-50 rounded-lg">
                                <div class="text-lg font-bold text-green-600">Rp {{ number_format($room->roomType->base_price ?? 0) }}</div>
                                <div class="text-xs text-green-700">Harga</div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex gap-2">
                            <a href="{{ route('admin.rooms.show', $room) }}"
                               class="flex-1 inline-flex items-center justify-center py-3 px-4 text-sm font-medium text-blue-600 bg-blue-50 border border-blue-200 rounded-xl hover:bg-blue-100 hover:border-blue-300 transition-all duration-300 hover:scale-105 hover:shadow-lg">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                Lihat
                            </a>
                            <a href="{{ route('admin.rooms.edit', $room) }}"
                               class="flex-1 bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded-xl text-sm font-medium text-center transition-all duration-300 hover:shadow-lg">
                                <svg class="w-4 h-4 mr-1 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                                Edit
                            </a>
                        </div>

                        <!-- Delete Button -->
                        <form action="{{ route('admin.rooms.destroy', $room) }}" method="POST" class="mt-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="w-full bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-xl text-sm font-medium transition-all duration-300 hover:shadow-lg"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus kamar ini?')">
                                <svg class="w-4 h-4 mr-1 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="flex justify-center mt-8">
                {{ $rooms->links() }}
            </div>
        @else
            <!-- Empty State -->
            <div class="modern-card text-center py-16 hover:scale-[1.02] transition-all duration-300 shadow-xl hover:shadow-2xl" data-aos="fade-up">
                <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold admin-text-dark mb-4">Belum Ada Kamar</h3>
                <p class="text-medium-contrast mb-8 max-w-md mx-auto">
                    Mulai kelola inventaris kamar hotel Anda dengan membuat kamar pertama. Setiap kamar dapat dikaitkan dengan tipe kamar tertentu.
                </p>
                <a href="{{ route('admin.rooms.create') }}" class="btn-modern px-8 py-3 text-lg font-semibold">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Buat Kamar Pertama
                </a>
            </div>
        @endif
    </div>
</div>
@endsection