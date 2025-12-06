@extends('layouts.app')

@section('title', 'Detail Kamar ' . $room->room_number . ' - Admin')

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
                            <h1 class="text-3xl lg:text-4xl font-bold gradient-text leading-tight tracking-wide">Detail Kamar {{ $room->room_number }}</h1>
                            <p class="text-medium-contrast text-lg mt-1">{{ $room->roomType->name ?? 'N/A' }} - Lantai {{ $room->floor }}</p>
                        </div>
                    </div>
                </div>
                <div class="flex gap-4">
                    <a href="{{ route('admin.rooms.edit', $room) }}" class="btn-modern px-4 py-2 text-sm font-medium">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        Edit Kamar
                    </a>
                    <a href="{{ route('admin.rooms.index') }}" class="btn-modern px-4 py-2 text-sm font-medium">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Kembali ke List
                    </a>
                </div>
            </div>
        </div>

        <!-- Room Details -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Room Status Card -->
            <div class="modern-card">
                <div class="card-body p-0">
                    <div class="p-6 pb-0">
                        <h2 class="text-xl font-bold gradient-text leading-tight tracking-wide mb-6">Status Kamar</h2>
                    </div>
                    <div class="px-6 pb-6">
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-medium-contrast">Status Saat Ini:</span>
                            <span class="inline-flex items-center px-3 py-1 text-sm font-medium rounded-full
                                @if($room->status == 'available') bg-green-100 text-green-800
                                @elseif($room->status == 'occupied') bg-red-100 text-red-800
                                @elseif($room->status == 'maintenance') bg-yellow-100 text-yellow-800
                                @else bg-gray-100 text-gray-800 @endif">
                                {{ ucfirst($room->status) }}
                            </span>
                        </div>
                        <div class="grid grid-cols-2 gap-4 text-sm">
                            <div class="bg-gray-50 rounded-lg p-3">
                                <div class="text-medium-contrast">Tipe Kamar</div>
                                <div class="font-semibold text-primary">{{ $room->roomType->name ?? 'N/A' }}</div>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-3">
                                <div class="text-medium-contrast">Lantai</div>
                                <div class="font-semibold text-primary">{{ $room->floor }}</div>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-3">
                                <div class="text-medium-contrast">Kapasitas</div>
                                <div class="font-semibold text-primary">{{ $room->roomType->capacity ?? 0 }} tamu</div>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-3">
                                <div class="text-medium-contrast">Harga per Malam</div>
                                <div class="font-semibold text-primary">Rp {{ number_format($room->roomType->base_price ?? 0) }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Room Image -->
            <div class="modern-card">
                <div class="card-body p-0">
                    <img src="{{ $room->roomType ? ($room->roomType->image ? (filter_var($room->roomType->image, FILTER_VALIDATE_URL) ? $room->roomType->image : asset('storage/' . $room->roomType->image)) : 'https://picsum.photos/400/300?random=' . $room->roomType->id) : 'https://picsum.photos/400/300?random=0' }}"
                         alt="{{ $room->roomType->name ?? 'Room' }}"
                         class="w-full h-48 object-cover rounded-t-xl">
                    <div class="p-4">
                        <h3 class="font-semibold text-primary mb-2">{{ $room->roomType->name ?? 'N/A' }}</h3>
                        <p class="text-sm text-medium-contrast">{{ $room->roomType ? Str::limit($room->roomType->description, 100) : 'No description' }}</p>
                    </div>
                </div>
            </div>

            <!-- Room Facilities -->
            @if($room->roomType && $room->roomType->facilities->count() > 0)
            <div class="modern-card">
                <div class="card-body p-0">
                    <div class="p-6 pb-0">
                        <h2 class="text-xl font-bold gradient-text leading-tight tracking-wide mb-6">Fasilitas Kamar</h2>
                    </div>
                    <div class="px-6 pb-6">
                        <div class="grid grid-cols-2 gap-4">
                            @foreach($room->roomType->facilities as $facility)
                            <div class="flex items-center p-3 bg-gradient-to-r from-gray-50 to-white rounded-lg border border-gray-200">
                                <div class="w-8 h-8 bg-gradient-to-br from-primary to-accent rounded-lg flex items-center justify-center mr-3">
                                    @if($facility->icon)
                                        <i class="fas fa-{{ $facility->icon }} text-white text-sm"></i>
                                    @else
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    @endif
                                </div>
                                <span class="font-medium text-medium-contrast">{{ $facility->name }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="modern-card">
                <div class="card-body p-6 text-center">
                    <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                    <h3 class="font-semibold text-gray-600 mb-2">Tidak Ada Fasilitas</h3>
                    <p class="text-sm text-gray-500">Fasilitas belum ditambahkan ke tipe kamar ini</p>
                </div>
            </div>
            @endif

            <!-- Quick Actions -->
            <div class="modern-card">
                <div class="card-body p-0">
                    <div class="p-6 pb-0">
                        <h3 class="text-lg font-bold gradient-text leading-tight tracking-wide mb-4">Aksi Cepat</h3>
                    </div>
                    <div class="px-6 pb-6 space-y-3">
                        <a href="{{ $room->roomType ? route('admin.room-types.show', $room->roomType) : '#' }}"
                            class="flex items-center p-3 bg-blue-50 hover:bg-blue-100 rounded-lg transition-colors group {{ !$room->roomType ? 'opacity-50 cursor-not-allowed' : '' }}">
                            <svg class="w-5 h-5 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                            <span class="text-blue-700 group-hover:text-blue-800 font-medium">Lihat Tipe Kamar</span>
                        </a>

                        <a href="{{ route('admin.reservations.create') }}?room_id={{ $room->id }}"
                           class="flex items-center p-3 bg-green-50 hover:bg-green-100 rounded-lg transition-colors group">
                            <svg class="w-5 h-5 text-green-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            <span class="text-green-700 group-hover:text-green-800 font-medium">Buat Reservasi</span>
                        </a>

                        <button onclick="changeRoomStatus('{{ $room->id }}', '{{ $room->status == 'available' ? 'maintenance' : 'available' }}')"
                                class="flex items-center p-3 bg-orange-50 hover:bg-orange-100 rounded-lg transition-colors group w-full text-left">
                            <svg class="w-5 h-5 text-orange-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span class="text-orange-700 group-hover:text-orange-800 font-medium">
                                {{ $room->status == 'available' ? 'Set Maintenance' : 'Set Available' }}
                            </span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Recent Reservations -->
            @if($room->reservations->count() > 0)
            <div class="modern-card">
                <div class="card-body p-0">
                    <div class="p-6 pb-0">
                        <h2 class="text-xl font-bold gradient-text leading-tight tracking-wide mb-6">Reservasi Terbaru</h2>
                    </div>
                    <div class="px-6 pb-6">
                        <div class="space-y-3">
                            @foreach($room->reservations->take(5) as $reservation)
                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                <div>
                                    <div class="font-semibold text-primary">{{ $reservation->reservation_code }}</div>
                                    <div class="text-sm text-medium-contrast">{{ $reservation->user->name }} • {{ $reservation->check_in_date->format('d M Y') }} - {{ $reservation->check_out_date->format('d M Y') }}</div>
                                </div>
                                <span class="inline-flex items-center px-2 py-1 text-xs font-medium rounded-full
                                    @if($reservation->status == 'pending') bg-yellow-100 text-yellow-800
                                    @elseif($reservation->status == 'confirmed') bg-blue-100 text-blue-800
                                    @elseif($reservation->status == 'checked_in') bg-green-100 text-green-800
                                    @elseif($reservation->status == 'checked_out') bg-gray-100 text-gray-800
                                    @else bg-red-100 text-red-800 @endif">
                                    {{ ucfirst($reservation->status) }}
                                </span>
                            </div>
                            @endforeach
                            @if($room->reservations->count() > 5)
                            <div class="text-center text-medium-contrast text-sm">
                                +{{ $room->reservations->count() - 5 }} reservasi lainnya
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="modern-card">
                <div class="card-body p-6 text-center">
                    <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <h3 class="font-semibold text-gray-600 mb-2">Belum Ada Reservasi</h3>
                    <p class="text-sm text-gray-500">Kamar ini belum pernah dipesan</p>
                </div>
            </div>
            @endif

            <!-- Room Statistics -->
            <div class="modern-card">
                <div class="card-body p-0">
                    <div class="p-6 pb-0">
                        <h3 class="text-lg font-bold gradient-text leading-tight tracking-wide mb-4">Statistik Kamar</h3>
                    </div>
                    <div class="px-6 pb-6">
                        <div class="space-y-3">
                            <div class="flex justify-between items-center">
                                <span class="text-medium-contrast">Total Reservasi</span>
                                <span class="font-semibold text-primary">{{ $room->reservations->count() }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-medium-contrast">Reservasi Aktif</span>
                                <span class="font-semibold text-primary">{{ $room->reservations->whereIn('status', ['confirmed', 'checked_in'])->count() }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-medium-contrast">Tingkat Hunian</span>
                                <span class="font-semibold text-primary">
                                    @if($room->reservations->count() > 0)
                                        {{ round(($room->reservations->where('status', 'checked_out')->count() / $room->reservations->count()) * 100) }}%
                                    @else
                                        0%
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function changeRoomStatus(roomId, newStatus) {
    if (confirm('Apakah Anda yakin ingin mengubah status kamar ini?')) {
        // This would need an AJAX call or form submission to update status
        // For now, just show an alert
        alert('Fitur ubah status akan diimplementasikan');
    }
}
</script>
@endsection