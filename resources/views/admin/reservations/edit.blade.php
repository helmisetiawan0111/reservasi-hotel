@extends('layouts.app')

@section('title', 'Edit Reservasi ' . $reservation->reservation_code . ' - Admin')

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
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-3xl lg:text-4xl font-bold gradient-text leading-tight tracking-wide">Edit Reservasi</h1>
                            <p class="text-medium-contrast text-lg mt-1">{{ $reservation->reservation_code }}</p>
                        </div>
                    </div>
                </div>
                <div class="flex gap-4">
                    <a href="{{ route('admin.reservations.show', $reservation) }}" class="btn-modern px-4 py-2 text-sm font-medium">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                        Lihat Detail
                    </a>
                    <a href="{{ route('admin.reservations.index') }}" class="btn-modern px-4 py-2 text-sm font-medium">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Kembali ke List
                    </a>
                </div>
            </div>
        </div>

        <!-- Edit Form -->
        <div class="max-w-4xl mx-auto">
            <form method="POST" action="{{ route('admin.reservations.update', $reservation) }}" class="space-y-6">
                @csrf
                @method('PATCH')

                <!-- Reservation Information -->
                <div class="modern-card">
                    <div class="card-body p-0">
                        <div class="p-6 pb-0">
                            <h2 class="text-xl font-bold gradient-text leading-tight tracking-wide mb-6">Informasi Reservasi</h2>
                        </div>
                        <div class="px-6 pb-6 space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="form-control">
                                    <label class="label">
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                            </svg>
                                            <span class="label-text font-semibold text-primary">Pelanggan *</span>
                                        </div>
                                    </label>
                                    <select name="user_id" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 bg-white text-gray-900 transition-colors" required>
                                        <option value="">Pilih Pelanggan</option>
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}" {{ $reservation->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }} ({{ $user->email }})</option>
                                        @endforeach
                                    </select>
                                    @error('user_id')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-control">
                                    <label class="label">
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                            </svg>
                                            <span class="label-text font-semibold text-primary">Kamar *</span>
                                        </div>
                                    </label>
                                    <select name="room_id" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 bg-white text-gray-900 transition-colors" required>
                                        <option value="">Pilih Kamar</option>
                                        @foreach($rooms as $room)
                                            <option value="{{ $room->id }}" {{ $reservation->room_id == $room->id ? 'selected' : '' }}>
                                                {{ $room->roomType->name ?? 'N/A' }} - Kamar {{ $room->room_number }} (Lantai {{ $room->floor }})
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('room_id')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div class="form-control">
                                    <label class="label">
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                            <span class="label-text font-semibold text-primary">Check-in *</span>
                                        </div>
                                    </label>
                                    <input type="date" name="check_in_date" value="{{ old('check_in_date', $reservation->check_in_date->format('Y-m-d')) }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 bg-white text-gray-900 transition-colors" required>
                                    @error('check_in_date')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-control">
                                    <label class="label">
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                            </svg>
                                            <span class="label-text font-semibold text-primary">Check-out *</span>
                                        </div>
                                    </label>
                                    <input type="date" name="check_out_date" value="{{ old('check_out_date', $reservation->check_out_date->format('Y-m-d')) }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 bg-white text-gray-900 transition-colors" required>
                                    @error('check_out_date')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-control">
                                    <label class="label">
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                            </svg>
                                            <span class="label-text font-semibold text-primary">Jumlah Tamu *</span>
                                        </div>
                                    </label>
                                    <input type="number" name="total_guests" value="{{ old('total_guests', $reservation->total_guests) }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 bg-white text-gray-900 transition-colors" min="1" max="10" required>
                                    @error('total_guests')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-control">
                                <label class="label">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                        <span class="label-text font-semibold text-primary">Status Reservasi *</span>
                                    </div>
                                </label>
                                <select name="status" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 bg-white text-gray-900 transition-colors" required>
                                    <option value="pending" {{ $reservation->status == 'pending' ? 'selected' : '' }}>Menunggu Konfirmasi</option>
                                    <option value="confirmed" {{ $reservation->status == 'confirmed' ? 'selected' : '' }}>Dikonfirmasi</option>
                                    <option value="checked_in" {{ $reservation->status == 'checked_in' ? 'selected' : '' }}>Check-in</option>
                                    <option value="checked_out" {{ $reservation->status == 'checked_out' ? 'selected' : '' }}>Check-out</option>
                                    <option value="cancelled" {{ $reservation->status == 'cancelled' ? 'selected' : '' }}>Dibatalkan</option>
                                </select>
                                @error('status')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-control">
                                <label class="label">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                        <span class="label-text font-semibold text-primary">Permintaan Khusus</span>
                                    </div>
                                </label>
                                <textarea name="special_requests" rows="3" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 bg-white text-gray-900 transition-colors" placeholder="Permintaan khusus tamu (opsional)">{{ old('special_requests', $reservation->special_requests) }}</textarea>
                                @error('special_requests')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-end">
                    <a href="{{ route('admin.reservations.show', $reservation) }}"
                       class="group relative inline-flex items-center px-6 py-3 text-sm font-semibold text-gray-600 bg-white border-2 border-gray-300 rounded-xl hover:bg-gray-50 hover:border-gray-400 hover:text-gray-800 transition-all duration-300 hover:scale-105 hover:shadow-lg">
                        <svg class="w-5 h-5 mr-2 text-gray-500 group-hover:text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        Batal
                        <div class="absolute inset-0 rounded-xl bg-gradient-to-r from-gray-100 to-gray-200 opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>
                    </a>
                    <button type="submit"
                            class="group relative inline-flex items-center px-8 py-3 text-base font-bold text-white bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl hover:from-blue-600 hover:to-blue-700 transition-all duration-300 hover:scale-105 hover:shadow-xl shadow-blue-500/25">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Simpan Perubahan
                        <div class="absolute inset-0 rounded-xl bg-gradient-to-r from-white/20 to-white/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="absolute -inset-1 rounded-xl bg-gradient-to-r from-blue-400 to-blue-500 opacity-0 group-hover:opacity-50 blur transition-opacity duration-300 -z-10"></div>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection