@extends('layouts.app')

@section('title', 'Edit Tipe Kamar: ' . $roomType->name . ' - Admin')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50/30 to-indigo-50/20">
    <div class="max-w-6xl mx-auto px-6 py-8">
        <!-- Header Section -->
        <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-xl border border-white/20 p-6 mb-6 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-primary/10 to-accent/10 rounded-full -translate-y-16 translate-x-16"></div>
            <div class="absolute bottom-0 left-0 w-24 h-24 bg-gradient-to-tr from-blue-100 to-indigo-100 rounded-full translate-y-12 -translate-x-12"></div>
            <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-6 relative z-10">
                <div class="flex-1">
                    <div class="flex items-center gap-4 mb-3">
                        <div class="w-12 h-12 bg-gradient-to-br from-primary to-accent rounded-xl flex items-center justify-center shadow-lg">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-3xl lg:text-4xl font-bold gradient-text leading-tight tracking-wide">Edit Tipe Kamar</h1>
                            <p class="text-medium-contrast text-lg mt-1">Kelola informasi dan pengaturan tipe kamar</p>
                        </div>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <div class="text-right">
                        <div class="text-sm text-medium-contrast">Tipe Kamar</div>
                        <div class="font-semibold admin-text-dark text-lg">{{ $roomType->name }}</div>
                    </div>
                    <div class="w-14 h-14 bg-gradient-to-br from-primary to-accent rounded-full flex items-center justify-center shadow-lg">
                        <span class="text-white font-bold text-xl">{{ strtoupper(substr($roomType->name, 0, 1)) }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Form -->
        <form id="room-type-form" method="POST" action="{{ route('admin.room-types.update', $roomType) }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PATCH')

            <!-- Basic Information -->
            <div class="modern-card">
                <div class="card-body p-0">
                    <div class="p-8 pb-0">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center shadow-lg">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-2xl font-bold gradient-text leading-tight tracking-wide">Informasi Dasar</h2>
                                <p class="text-gray-600 mt-1">Konfigurasi informasi utama tipe kamar</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-8">
                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                            <!-- Room Name -->
                            <div class="space-y-3">
                                <label class="block text-sm font-semibold text-gray-700 flex items-center gap-2">
                                    <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                    </svg>
                                    Nama Tipe Kamar
                                </label>
                                <input type="text" name="name" value="{{ old('name', $roomType->name) }}"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-white shadow-sm"
                                       placeholder="Masukkan nama tipe kamar">
                                @error('name')
                                    <p class="text-red-500 text-sm mt-2 flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <!-- Capacity -->
                            <div class="space-y-3">
                                <label class="block text-sm font-semibold text-gray-700 flex items-center gap-2">
                                    <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                                    </svg>
                                    Kapasitas Tamu
                                </label>
                                <select name="capacity" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200 bg-white shadow-sm appearance-none">
                                    @for($i = 1; $i <= 10; $i++)
                                        <option value="{{ $i }}" {{ old('capacity', $roomType->capacity) == $i ? 'selected' : '' }}>
                                            {{ $i }} Tamu{{ $i > 1 ? '' : '' }}
                                        </option>
                                    @endfor
                                </select>
                                <div class="absolute right-4 top-1/2 transform -translate-y-1/2 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                                @error('capacity')
                                    <p class="text-red-500 text-sm mt-2 flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <!-- Base Price -->
                            <div class="space-y-3">
                                <label class="block text-sm font-semibold text-gray-700 flex items-center gap-2">
                                    <svg class="w-4 h-4 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Harga Base per Malam
                                </label>
                                <input type="number" name="base_price" value="{{ old('base_price', $roomType->base_price) }}"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200 bg-white shadow-sm"
                                       placeholder="0">
                                @error('base_price')
                                    <p class="text-red-500 text-sm mt-2 flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Media & Content -->
            <div class="modern-card">
                <div class="card-body p-0">
                    <div class="p-6 pb-0">
                        <h2 class="text-xl font-bold gradient-text leading-tight tracking-wide mb-6">Media & Konten</h2>
                    </div>
                    <div class="p-6">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                            <!-- Upload Gambar Baru (Left Side) -->
                            <div class="space-y-4">
                                <div class="flex items-center gap-3 mb-4">
                                    <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-semibold admin-text-dark">Upload Gambar Baru</h3>
                                        <p class="text-sm text-gray-600">Pilih gambar untuk mengganti yang lama</p>
                                    </div>
                                </div>
                                <div class="border-2 border-dashed border-blue-200 rounded-xl p-6 text-center hover:border-blue-400 hover:bg-blue-50/50 transition-all duration-300 bg-blue-50/20 cursor-pointer" id="upload-zone">
                                    <div id="upload-content">
                                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                            <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                            </svg>
                                        </div>
                                        <p class="text-gray-700 font-medium mb-2">Klik untuk memilih gambar</p>
                                        <p class="text-gray-500 text-sm mb-3">atau drag & drop di sini</p>
                                        <div class="flex items-center justify-center gap-2 text-xs text-gray-400">
                                            <span class="px-2 py-1 bg-white rounded">JPG</span>
                                            <span class="px-2 py-1 bg-white rounded">PNG</span>
                                            <span class="px-2 py-1 bg-white rounded">GIF</span>
                                            <span class="text-gray-300">•</span>
                                            <span>Maksimal 2MB</span>
                                        </div>
                                    </div>
                                    <div id="image-preview" class="hidden">
                                        <img id="preview-img" src="" alt="Preview" class="w-24 h-24 object-cover mx-auto rounded-lg mb-3 border-2 border-blue-200">
                                        <p id="file-name" class="text-blue-600 font-semibold text-sm mb-2"></p>
                                        <button type="button" id="remove-preview" class="px-4 py-2 bg-red-500 text-white text-sm rounded-lg hover:bg-red-600 transition-colors">
                                            <svg class="w-4 h-4 mr-1 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                            Hapus
                                        </button>
                                    </div>
                                    <input type="file" name="image" accept="image/*" class="hidden" id="image-upload">
                                </div>
                                @error('image')
                                    <p class="text-red-500 text-sm mt-2 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <!-- Gambar Saat Ini (Right Side) -->
                            <div class="space-y-4">
                                <div class="flex items-center gap-3 mb-4">
                                    <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                                        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-semibold admin-text-dark">Gambar Saat Ini</h3>
                                        <p class="text-sm text-gray-600">Gambar yang sedang digunakan</p>
                                    </div>
                                </div>
                                @if($roomType->image)
                                <div class="relative w-full h-48 bg-gray-50 rounded-xl overflow-hidden border-2 border-gray-200 shadow-sm">
                                    <img src="{{ filter_var($roomType->image, FILTER_VALIDATE_URL) ? $roomType->image : asset('storage/' . $roomType->image) }}" alt="{{ $roomType->name }}" class="w-full h-full object-cover">
                                    <div class="absolute top-3 right-3">
                                        <button type="button"
                                                onclick="if(confirm('Apakah Anda yakin ingin menghapus gambar ini?')) { document.getElementById('delete-image').value='1'; this.form.submit(); }"
                                                class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-lg transition-all duration-300 hover:scale-105 shadow-lg">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/60 to-transparent p-3">
                                        <p class="text-white text-sm font-medium">{{ $roomType->name }}</p>
                                    </div>
                                </div>
                                <input type="hidden" name="delete_image" id="delete-image" value="0">
                                @else
                                <div class="w-full h-48 bg-gray-50 rounded-xl border-2 border-dashed border-gray-300 flex items-center justify-center">
                                    <div class="text-center text-gray-500">
                                        <div class="w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-3">
                                            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>
                                        <p class="text-sm font-medium">Belum ada gambar</p>
                                        <p class="text-xs text-gray-400 mt-1">Upload gambar untuk ditampilkan</p>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detail Kamar -->
            <div class="modern-card">
                <div class="card-body p-0">
                    <div class="p-8 pb-0">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-10 h-10 bg-gradient-to-br from-pink-500 to-pink-600 rounded-xl flex items-center justify-center shadow-lg">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-2xl font-bold gradient-text leading-tight tracking-wide">Detail Kamar</h2>
                                <p class="text-gray-600 mt-1">Deskripsikan karakteristik dan keunggulan tipe kamar</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-8">
                        <div class="space-y-4">
                            <div class="space-y-3">
                                <label class="block text-sm font-semibold text-gray-700 flex items-center gap-2">
                                    <svg class="w-4 h-4 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    Deskripsi Tipe Kamar
                                </label>
                                <textarea name="description" rows="6" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition-all duration-200 resize-none bg-white shadow-sm"
                                          placeholder="Jelaskan detail fasilitas, suasana, dan keunggulan tipe kamar ini dengan kata-kata yang menarik...">{{ old('description', $roomType->description) }}</textarea>
                                <div class="flex items-center gap-2 text-sm text-gray-500">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Deskripsikan dengan detail untuk memberikan pengalaman yang luar biasa kepada tamu
                                </div>
                                @error('description')
                                    <p class="text-red-500 text-sm mt-2 flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Facilities Management -->
            <div class="modern-card mt-8">
                <div class="card-body p-0">
                    <div class="p-8 pb-0">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-10 h-10 bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl flex items-center justify-center shadow-lg">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-2xl font-bold gradient-text leading-tight tracking-wide">Fasilitas</h2>
                                <p class="text-gray-600 mt-1">Pilih fasilitas yang tersedia untuk tipe kamar ini</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
                            @foreach(\App\Models\Facility::all() as $facility)
                            <label class="group flex items-center p-4 bg-white hover:bg-orange-50 rounded-xl border border-gray-200 hover:border-orange-300 transition-all duration-200 cursor-pointer shadow-sm hover:shadow-md">
                                <div class="flex items-center justify-center w-5 h-5">
                                    <input type="checkbox"
                                           name="facilities[]"
                                           value="{{ $facility->id }}"
                                           {{ $roomType->facilities->contains($facility->id) ? 'checked' : '' }}
                                           class="w-4 h-4 text-orange-500 border-gray-300 rounded focus:ring-orange-500 group-hover:scale-110 transition-transform">
                                </div>
                                <div class="ml-4 flex-1">
                                    <span class="font-medium text-gray-800 text-sm group-hover:text-orange-700 transition-colors">{{ $facility->name }}</span>
                                    @if($facility->description)
                                        <p class="text-gray-500 text-xs mt-1">{{ $facility->description }}</p>
                                    @endif
                                </div>
                                <div class="w-2 h-2 bg-orange-200 rounded-full opacity-0 group-hover:opacity-100 transition-opacity"></div>
                            </label>
                            @endforeach
                        </div>
                        @error('facilities')
                            <p class="text-red-500 text-sm mt-4 flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
            </div>
            </form>

            <!-- Action Buttons at Bottom -->
            <div class="mt-12 mb-8">
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                    <a href="{{ route('admin.room-types.show', $roomType) }}"
                       class="px-8 py-4 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl transition-all duration-200 hover:scale-105 hover:shadow-md border border-gray-300 font-medium">
                        Batal
                    </a>
                    <button type="submit"
                            form="room-type-form"
                            class="px-10 py-4 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white rounded-xl transition-all duration-200 hover:scale-105 hover:shadow-lg shadow-blue-500/25 font-semibold">
                        Simpan Perubahan
                    </button>
                </div>
                <p class="text-center text-gray-500 text-sm mt-6">
                    Pastikan semua informasi sudah benar sebelum menyimpan perubahan
                </p>
            </div>
        </div>
</div>

</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
const dropZone = document.querySelector('.border-dashed');
const fileInput = document.getElementById('image-upload');

if (dropZone && fileInput) {
    // Prevent default drag behaviors
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, preventDefaults, false);
    });

    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    // Highlight drop zone when dragging over it
    ['dragenter', 'dragover'].forEach(eventName => {
        dropZone.addEventListener(eventName, highlight, false);
    });

    ['dragleave', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, unhighlight, false);
    });

    function highlight(e) {
        dropZone.classList.add('border-primary', 'bg-primary/5');
    }

    function unhighlight(e) {
        dropZone.classList.remove('border-primary', 'bg-primary/5');
    }

    // Handle dropped files
    dropZone.addEventListener('drop', handleDrop, false);

    function handleDrop(e) {
        const dt = e.dataTransfer;
        const files = dt.files;

        if (files.length > 0) {
            fileInput.files = files;
            updateFileDisplay(files[0]);
        }
    }

    // Handle file selection via click
    fileInput.addEventListener('change', function() {
        if (this.files.length > 0) {
            updateFileDisplay(this.files[0]);
        }
    });

    function updateFileDisplay(file) {
        const uploadContent = document.getElementById('upload-content');
        const imagePreview = document.getElementById('image-preview');
        const previewImg = document.getElementById('preview-img');
        const fileName = document.getElementById('file-name');

        if (file) {
            // Show preview
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImg.src = e.target.result;
                fileName.textContent = file.name;
                uploadContent.classList.add('hidden');
                imagePreview.classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        }
    }

    // Remove preview functionality
    document.getElementById('remove-preview').addEventListener('click', function() {
        const uploadContent = document.getElementById('upload-content');
        const imagePreview = document.getElementById('image-preview');
        const fileInput = document.getElementById('image-upload');

        // Reset file input
        fileInput.value = '';

        // Hide preview, show upload content
        imagePreview.classList.add('hidden');
        uploadContent.classList.remove('hidden');

        // Reset drop zone styling
        dropZone.classList.remove('border-primary', 'bg-primary/5');
    });

    // Make drop zone clickable
    dropZone.addEventListener('click', function() {
        fileInput.click();
    });
}
});
</script>
@endsection
