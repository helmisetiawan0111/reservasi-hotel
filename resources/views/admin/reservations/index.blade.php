@extends('layouts.app')

@section('title', 'Kelola Reservasi - Admin Dashboard')

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
                            <h1 class="text-3xl lg:text-4xl font-bold gradient-text leading-tight tracking-wide">Kelola Reservasi</h1>
                            <p class="text-medium-contrast text-lg mt-1">Pantau dan kelola semua reservasi tamu</p>
                        </div>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <a href="{{ route('admin.dashboard') }}" class="group relative inline-flex items-center px-6 py-3 text-sm font-semibold text-gray-700 bg-gradient-to-r from-gray-100 to-gray-200 rounded-xl hover:from-gray-200 hover:to-gray-300 transition-all duration-300 hover:scale-105 hover:shadow-lg border-2 border-gray-300 hover:border-gray-400">
                        <svg class="w-4 h-4 mr-2 text-gray-600 group-hover:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Kembali ke Dashboard
                        <div class="absolute inset-0 rounded-xl bg-gradient-to-r from-gray-200/20 to-gray-300/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </a>
                    <a href="{{ route('admin.reservations.create') }}" class="group relative inline-flex items-center px-8 py-3 text-base font-bold text-white bg-gradient-to-r from-green-500 to-green-600 rounded-xl hover:from-green-600 hover:to-green-700 transition-all duration-300 hover:scale-105 hover:shadow-xl shadow-green-500/25 border-2 border-green-500">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Tambah Reservasi
                        <div class="absolute inset-0 rounded-xl bg-gradient-to-r from-white/20 to-white/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="absolute -inset-1 rounded-xl bg-gradient-to-r from-green-400 to-green-500 opacity-0 group-hover:opacity-50 blur transition-opacity duration-300 -z-10"></div>
                    </a>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 grid-spacing mb-6">
            <div class="dashboard-card hover:scale-[1.02] transition-all duration-300 shadow-xl hover:shadow-2xl" data-aos="fade-up" data-aos-delay="100">
                <div class="card-body text-center">
                    <div class="stat-value text-blue-600 mb-2">{{ \App\Models\Reservation::count() }}</div>
                    <div class="stat-label">Total Reservasi</div>
                </div>
            </div>
            <div class="dashboard-card hover:scale-[1.02] transition-all duration-300 shadow-xl hover:shadow-2xl" data-aos="fade-up" data-aos-delay="200">
                <div class="card-body text-center">
                    <div class="stat-value text-yellow-600 mb-2">{{ \App\Models\Reservation::where('status', 'pending')->count() }}</div>
                    <div class="stat-label">Menunggu Konfirmasi</div>
                </div>
            </div>
            <div class="dashboard-card hover:scale-[1.02] transition-all duration-300 shadow-xl hover:shadow-2xl" data-aos="fade-up" data-aos-delay="300">
                <div class="card-body text-center">
                    <div class="stat-value text-green-600 mb-2">{{ \App\Models\Reservation::where('status', 'confirmed')->count() }}</div>
                    <div class="stat-label">Dikonfirmasi</div>
                </div>
            </div>
            <div class="dashboard-card hover:scale-[1.02] transition-all duration-300 shadow-xl hover:shadow-2xl" data-aos="fade-up" data-aos-delay="400">
                <div class="card-body text-center">
                    <div class="stat-value text-purple-600 mb-2">{{ \App\Models\Reservation::where('status', 'checked_in')->count() }}</div>
                    <div class="stat-label">Check-in</div>
                </div>
            </div>
        </div>

        <!-- Reservations Table Section -->
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 mb-6" data-aos="fade-up" data-aos-delay="500">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h2 class="text-2xl font-bold gradient-text leading-tight tracking-wide">Daftar Reservasi</h2>
                    <p class="text-medium-contrast mt-1">Pantau semua booking dan status reservasi</p>
                </div>
                <div class="flex items-center gap-4">
                    <div class="text-right">
                        <div class="text-sm text-medium-contrast">Total Reservasi</div>
                        <div class="text-2xl font-bold text-primary">{{ \App\Models\Reservation::count() }}</div>
                    </div>
                    <div class="w-12 h-12 bg-gradient-to-br from-primary to-accent rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <div class="modern-card hover:scale-[1.02] transition-all duration-300 shadow-xl hover:shadow-2xl" data-aos="fade-up" data-aos-delay="600">
            <div class="card-body p-0">
                <div class="overflow-x-auto">
                    <table class="table table-zebra w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Kode Reservasi</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Tamu</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Kamar</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Check-in</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Check-out</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <!-- Table Body -->
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse(\App\Models\Reservation::with(['user', 'room.roomType'])->latest()->get() as $reservation)
                            <tr class="hover:bg-gray-50 transition-colors duration-200">
                                <!-- Reservation Code -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $reservation->reservation_code }}</div>
                                </td>
                                <!-- Guest Info -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $reservation->user->name }}</div>
                                    <div class="text-xs text-gray-500">{{ $reservation->user->email }}</div>
                                </td>
                                <!-- Room Info -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $reservation->room->roomType->name ?? 'N/A' }}</div>
                                    <div class="text-xs text-gray-500">Kamar {{ $reservation->room->room_number }}</div>
                                </td>
                                <!-- Check-in Date -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ \Carbon\Carbon::parse($reservation->check_in_date)->format('d/m/Y') }}</div>
                                </td>
                                <!-- Check-out Date -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ \Carbon\Carbon::parse($reservation->check_out_date)->format('d/m/Y') }}</div>
                                </td>
                                <!-- Status Badge -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <!-- Status Badge -->
                                    <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full
                                        @if($reservation->status == 'pending') bg-yellow-100 text-yellow-800
                                        @elseif($reservation->status == 'confirmed') bg-green-100 text-green-800
                                        @elseif($reservation->status == 'checked_in') bg-blue-100 text-blue-800
                                        @elseif($reservation->status == 'checked_out') bg-gray-100 text-gray-800
                                        @elseif($reservation->status == 'cancelled') bg-red-100 text-red-800
                                        @else bg-gray-100 text-gray-800
                                        @endif">
                                        {{ ucfirst(str_replace('_', ' ', $reservation->status)) }}
                                    </span>
                                </td>
                                <!-- Actions -->
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex space-x-2">
                                        <!-- View Button -->
                                        <a href="{{ route('admin.reservations.show', $reservation) }}" class="text-blue-600 hover:text-blue-900 transition-colors duration-200">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                        </a>
                                        <!-- Edit Button -->
                                        <a href="{{ route('admin.reservations.edit', $reservation) }}" class="text-yellow-600 hover:text-yellow-900 transition-colors duration-200">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg>
                                        </a>
                                        <!-- Delete Button -->
                                        <form method="POST" action="{{ route('admin.reservations.destroy', $reservation) }}" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus reservasi ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900 transition-colors duration-200">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="px-6 py-12 text-center">
                                    <div class="text-gray-500">
                                        <svg class="w-12 h-12 mx-auto mb-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                        <p class="text-lg font-medium">Belum ada reservasi</p>
                                        <p class="text-sm">Reservasi tamu akan muncul di sini.</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection