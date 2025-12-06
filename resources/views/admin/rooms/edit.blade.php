@extends('layouts.app')

@section('title', 'Edit Kamar ' . $room->room_number . ' - Admin')

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
                            <h1 class="text-3xl lg:text-4xl font-bold gradient-text leading-tight tracking-wide">Edit Kamar {{ $room->room_number }}</h1>
                            <p class="text-medium-contrast text-lg mt-1">{{ $room->roomType->name }} - Lantai {{ $room->floor }}</p>
                        </div>
                    </div>
                </div>
                <div class="flex gap-4">
                    <a href="{{ route('admin.rooms.show', $room) }}" class="btn-modern px-4 py-2 text-sm font-medium">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                        Lihat Detail
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

        <!-- Edit Form -->
        <div class="max-w-4xl mx-auto">
            <form method="POST" action="{{ route('admin.rooms.update', $room) }}" class="space-y-6">
                @csrf
                @method('PATCH')

                <!-- Room Information -->
                <div class="modern-card">
                    <div class="card-body p-0">
                        <div class="p-6 pb-0">
                            <h2 class="text-xl font-bold gradient-text leading-tight tracking-wide mb-6">Informasi Kamar</h2>
                        </div>
                        <div class="px-6 pb-6 space-y-6">
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text font-semibold text-primary">Tipe Kamar *</span>
                                </label>
                                <select name="room_type_id" class="select select-bordered select-primary focus:select-primary w-full" required>
                                    <option value="">Pilih Tipe Kamar</option>
                                    @foreach($roomTypes as $roomType)
                                        <option value="{{ $roomType->id }}" {{ $room->room_type_id == $roomType->id ? 'selected' : '' }}>
                                            {{ $roomType->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('room_type_id')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text font-semibold text-primary">Nomor Kamar *</span>
                                    </label>
                                    <input type="text" name="room_number" value="{{ old('room_number', $room->room_number) }}" class="input input-bordered input-primary focus:input-primary w-full" required>
                                    @error('room_number')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text font-semibold text-primary">Lantai *</span>
                                    </label>
                                    <input type="number" name="floor" value="{{ old('floor', $room->floor) }}" class="input input-bordered input-primary focus:input-primary w-full" min="1" max="50" required>
                                    @error('floor')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text font-semibold text-primary">Status Kamar *</span>
                                </label>
                                <select name="status" class="select select-bordered select-primary focus:select-primary w-full" required>
                                    <option value="available" {{ $room->status == 'available' ? 'selected' : '' }}>Tersedia</option>
                                    <option value="occupied" {{ $room->status == 'occupied' ? 'selected' : '' }}>Terisi</option>
                                    <option value="maintenance" {{ $room->status == 'maintenance' ? 'selected' : '' }}>Perbaikan</option>
                                </select>
                                @error('status')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-end">
                    <a href="{{ route('admin.rooms.show', $room) }}"
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