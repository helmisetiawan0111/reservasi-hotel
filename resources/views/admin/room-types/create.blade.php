@extends('layouts.app')

@section('title', 'Tambah Tipe Kamar Baru - Admin Dashboard')

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
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-3xl lg:text-4xl font-bold gradient-text leading-tight tracking-wide">Tambah Tipe Kamar Baru</h1>
                            <p class="text-medium-contrast text-lg mt-1">Buat kategori kamar baru untuk hotel Anda</p>
                        </div>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <a href="{{ route('admin.room-types.index') }}" class="btn-modern px-4 py-2 text-sm font-medium hover:scale-105 transition-all duration-300">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Kembali ke Daftar
                    </a>
                </div>
            </div>
        </div>

        <!-- Create Form -->
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6" data-aos="fade-up" data-aos-delay="200">
            <form action="{{ route('admin.room-types.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Left Column -->
                    <div class="space-y-6">
                        <!-- Basic Information -->
                        <div>
                            <h3 class="text-xl font-bold admin-text-dark mb-4 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Informasi Dasar
                            </h3>

                            <!-- Name -->
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text font-semibold text-primary">Nama Tipe Kamar <span class="text-red-500">*</span></span>
                                </label>
                                <input type="text" name="name" value="{{ old('name') }}"
                                       class="input input-bordered input-primary focus:input-primary w-full @error('name') input-error @enderror"
                                       placeholder="Contoh: Deluxe Room, Suite, Standard Room" required>
                                @error('name')
                                    <span class="text-error text-sm mt-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Description -->
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text font-semibold text-primary">Deskripsi <span class="text-red-500">*</span></span>
                                </label>
                                <textarea name="description" rows="4"
                                          class="textarea textarea-bordered textarea-primary focus:textarea-primary w-full @error('description') textarea-error @enderror"
                                          placeholder="Jelaskan fitur dan kenyamanan kamar ini..." required>{{ old('description') }}</textarea>
                                @error('description')
                                    <span class="text-error text-sm mt-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Capacity -->
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text font-semibold text-primary">Kapasitas Maksimal <span class="text-red-500">*</span></span>
                                </label>
                                <input type="number" name="capacity" value="{{ old('capacity', 2) }}" min="1" max="10"
                                       class="input input-bordered input-primary focus:input-primary w-full @error('capacity') input-error @enderror" required>
                                @error('capacity')
                                    <span class="text-error text-sm mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Pricing -->
                        <div>
                            <h3 class="text-xl font-bold admin-text-dark mb-4 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Harga
                            </h3>

                            <!-- Base Price -->
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text font-semibold text-primary">Harga Dasar per Malam <span class="text-red-500">*</span></span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input type="number" name="base_price" value="{{ old('base_price') }}" min="0" step="1000"
                                           class="input input-bordered input-primary focus:input-primary w-full @error('base_price') input-error @enderror"
                                           placeholder="150000" required>
                                </div>
                                @error('base_price')
                                    <span class="text-error text-sm mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-6">
                        <!-- Image Upload -->
                        <div>
                            <h3 class="text-xl font-bold admin-text-dark mb-4 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                Gambar Kamar
                            </h3>

                            <!-- Image Preview -->
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text font-semibold text-primary">Upload Gambar</span>
                                </label>
                                <div class="border-2 border-dashed border-gray-300 rounded-xl p-6 text-center hover:border-primary transition-colors duration-300" id="imageDropZone">
                                    <input type="file" name="image" accept="image/*" class="hidden" id="imageInput" onchange="previewImage(event)">
                                    <div id="imagePreview" class="hidden mb-4">
                                        <img id="previewImg" src="" alt="Preview" class="max-w-full h-48 object-cover rounded-lg mx-auto">
                                    </div>
                                    <div id="uploadPrompt">
                                        <svg class="w-12 h-12 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                        </svg>
                                        <p class="text-gray-600 mb-2">Klik untuk upload gambar atau drag & drop</p>
                                        <button type="button" onclick="document.getElementById('imageInput').click()"
                                                class="btn-modern px-4 py-2 text-sm font-medium">
                                            Pilih Gambar
                                        </button>
                                        <p class="text-xs text-gray-500 mt-2">Format: JPG, PNG, Max: 2MB</p>
                                    </div>
                                </div>
                                @error('image')
                                    <span class="text-error text-sm mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Facilities -->
                        <div>
                            <h3 class="text-xl font-bold admin-text-dark mb-4 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                </svg>
                                Fasilitas
                            </h3>

                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text font-semibold text-primary">Pilih Fasilitas</span>
                                </label>
                                <div class="grid grid-cols-2 gap-3 max-h-48 overflow-y-auto border border-gray-200 rounded-lg p-4">
                                    @foreach($facilities as $facility)
                                    <label class="flex items-center space-x-2 cursor-pointer hover:bg-gray-50 p-2 rounded">
                                        <input type="checkbox" name="facilities[]" value="{{ $facility->id }}"
                                               {{ in_array($facility->id, old('facilities', [])) ? 'checked' : '' }}
                                               class="checkbox checkbox-primary">
                                        <span class="text-sm">{{ $facility->name }}</span>
                                    </label>
                                    @endforeach
                                </div>
                                @error('facilities')
                                    <span class="text-error text-sm mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="flex justify-end gap-4 mt-8 pt-6 border-t border-gray-200">
                    <a href="{{ route('admin.room-types.index') }}"
                       class="group relative inline-flex items-center px-6 py-3 text-sm font-semibold text-gray-600 bg-white border-2 border-gray-300 rounded-xl hover:bg-gray-50 hover:border-gray-400 hover:text-gray-800 transition-all duration-300 hover:scale-105 hover:shadow-lg">
                        <svg class="w-5 h-5 mr-2 text-gray-500 group-hover:text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        Batal
                        <div class="absolute inset-0 rounded-xl bg-gradient-to-r from-gray-100 to-gray-200 opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>
                    </a>
                    <button type="submit"
                            class="group relative inline-flex items-center px-8 py-3 text-base font-bold text-white bg-gradient-to-r from-green-500 to-green-600 rounded-xl hover:from-green-600 hover:to-green-700 transition-all duration-300 hover:scale-105 hover:shadow-xl shadow-green-500/25">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Simpan Tipe Kamar
                        <div class="absolute inset-0 rounded-xl bg-gradient-to-r from-white/20 to-white/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="absolute -inset-1 rounded-xl bg-gradient-to-r from-green-400 to-green-500 opacity-0 group-hover:opacity-50 blur transition-opacity duration-300 -z-10"></div>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function previewImage(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('previewImg').src = e.target.result;
            document.getElementById('imagePreview').classList.remove('hidden');
            document.getElementById('uploadPrompt').classList.add('hidden');
        };
        reader.readAsDataURL(file);
    }
}

// Drag and drop functionality
const dropZone = document.getElementById('imageDropZone');
const fileInput = document.getElementById('imageInput');

['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
    dropZone.addEventListener(eventName, preventDefaults, false);
});

function preventDefaults(e) {
    e.preventDefault();
    e.stopPropagation();
}

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

dropZone.addEventListener('drop', handleDrop, false);

function handleDrop(e) {
    const dt = e.dataTransfer;
    const files = dt.files;

    if (files.length > 0) {
        fileInput.files = files;
        previewImage({ target: { files: files } });
    }
}
</script>
@endsection