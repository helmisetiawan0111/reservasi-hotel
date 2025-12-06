@extends('layouts.app')

@section('title', 'Rooms - Hotel Reservation')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-base-100 via-blue-50/30 to-accent/10">
    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-primary/5 via-white to-secondary/5 py-16 lg:py-20" data-aos="fade-up">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="text-center mb-12" data-aos="fade-down">
                <div class="inline-block px-4 py-2 bg-primary/10 rounded-full mb-4">
                    <span class="text-primary font-semibold text-sm">🏨 AKOMODASI MEWAH</span>
                </div>
                <h1 class="text-3xl lg:text-5xl font-bold gradient-text leading-tight tracking-wide mb-6 pb-2">
                    Temukan Kamar Kami
                </h1>
                <p class="text-base lg:text-lg text-medium-contrast max-w-2xl mx-auto leading-relaxed">
                    Pilih dari koleksi kamar yang dirancang elegan kami, masing-masing dibuat untuk kenyamanan dan pengalaman mewah Anda
                </p>
            </div>
        </div>
    </section>

    <!-- Filters Section -->
    <section class="py-8 lg:py-12">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="modern-card max-w-7xl mx-auto" data-aos="zoom-in">
                <div class="p-8 lg:p-10">
                    <div class="flex items-center mb-8" data-aos="fade-right">
                        <svg class="w-6 h-6 text-primary mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                        </svg>
                        <h3 class="text-xl lg:text-2xl font-bold text-high-contrast">Opsi Filter & Urutkan</h3>
                    </div>

                    <form method="GET" class="form-modern grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6 lg:gap-8">
                        <!-- Kapasitas -->
                        <div class="form-control" data-aos="fade-up" data-aos-delay="100">
                            <label class="label">
                                <span class="label-text font-semibold text-primary flex items-center text-sm">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                                    </svg>
                                    Kapasitas
                                </span>
                            </label>
                            <select name="capacity" class="select select-bordered select-primary focus:select-primary focus:ring-2 focus:ring-primary/20 transition-all duration-300 text-sm lg:text-base w-full">
                                <option value="">Kapasitas Apapun</option>
                                <option value="1" {{ request('capacity') == '1' ? 'selected' : '' }}>1 Orang</option>
                                <option value="2" {{ request('capacity') == '2' ? 'selected' : '' }}>2 Orang</option>
                                <option value="3" {{ request('capacity') == '3' ? 'selected' : '' }}>3 Orang</option>
                                <option value="4" {{ request('capacity') == '4' ? 'selected' : '' }}>4+ Orang</option>
                            </select>
                        </div>

                        <!-- Harga Minimum -->
                        <div class="form-control" data-aos="fade-up" data-aos-delay="200">
                            <label class="label">
                                <span class="label-text font-semibold text-primary flex items-center text-sm">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                    </svg>
                                    Harga Minimum
                                </span>
                            </label>
                            <input type="number" name="min_price" value="{{ request('min_price') }}" placeholder="0" class="input input-bordered input-primary focus:input-primary focus:ring-2 focus:ring-primary/20 transition-all duration-300 text-sm lg:text-base w-full">
                        </div>

                        <!-- Harga Maksimum -->
                        <div class="form-control" data-aos="fade-up" data-aos-delay="300">
                            <label class="label">
                                <span class="label-text font-semibold text-primary flex items-center text-sm">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                    </svg>
                                    Harga Maksimum
                                </span>
                            </label>
                            <input type="number" name="max_price" value="{{ request('max_price') }}" placeholder="1000000" class="input input-bordered input-primary focus:input-primary focus:ring-2 focus:ring-primary/20 transition-all duration-300 text-sm lg:text-base w-full">
                        </div>

                        <!-- Urutkan Berdasarkan -->
                        <div class="form-control" data-aos="fade-up" data-aos-delay="400">
                            <label class="label">
                                <span class="label-text font-semibold text-primary flex items-center text-sm">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path>
                                    </svg>
                                    Urutkan Berdasarkan
                                </span>
                            </label>
                            <select name="sort" class="select select-bordered select-primary focus:select-primary focus:ring-2 focus:ring-primary/20 transition-all duration-300 text-sm lg:text-base w-full">
                                <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Nama (A-Z)</option>
                                <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Harga: Rendah ke Tinggi</option>
                                <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Harga: Tinggi ke Rendah</option>
                                <option value="capacity" {{ request('sort') == 'capacity' ? 'selected' : '' }}>Kapasitas</option>
                            </select>
                        </div>

                        <!-- Tombol Terapkan Filter -->
                        <div class="form-control flex items-end" data-aos="fade-up" data-aos-delay="500">
                            <button type="submit" class="btn-modern px-8 py-3 text-base lg:text-lg font-semibold w-full h-auto rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                                </svg>
                                Terapkan Filter
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Room Grid -->
    <section class="py-12 lg:py-16">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                @foreach($roomTypes as $roomType)
                <div class="modern-card group" data-aos="zoom-in" data-aos-delay="{{ 200 + ($loop->index * 100) }}">
                    <div class="relative overflow-hidden mb-4">
                        <img src="{{ $roomType->image ?? 'https://picsum.photos/400/300?random=' . $roomType->id }}"
                             alt="{{ $roomType->name }}"
                             class="modern-image h-48 sm:h-56 lg:h-64" />
                        <!-- Overlay on hover -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/30 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        <!-- Price badge -->
                        <div class="absolute top-4 right-4 bg-white/95 backdrop-blur-sm px-3 py-1 rounded-full shadow-lg">
                            <span class="text-primary font-bold text-sm">Mulai dari Rp {{ number_format($roomType->base_price) }}</span>
                        </div>
                        <!-- Room type badge -->
                        <div class="absolute top-4 left-4 bg-primary/90 text-white px-3 py-1 rounded-full text-sm font-semibold">
                            {{ $roomType->name }}
                        </div>
                    </div>

                    <div>
                        <h3 class="modern-card-title">{{ $roomType->name }}</h3>
                        <p class="modern-card-text text-sm lg:text-base">{{ Str::limit($roomType->description, 120) }}</p>

                        <!-- Room features -->
                        <div class="flex flex-wrap gap-2 mb-4">
                            @if($roomType->facilities && $roomType->facilities->count() > 0)
                                @foreach($roomType->facilities->take(3) as $facility)
                                    <span class="badge badge-primary badge-sm">{{ $facility->name }}</span>
                                @endforeach
                            @else
                                <span class="badge badge-primary badge-sm">WiFi</span>
                                <span class="badge badge-secondary badge-sm">AC</span>
                                <span class="badge badge-accent badge-sm">TV</span>
                            @endif
                        </div>

                        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3">
                            <div class="flex items-center text-sm text-neutral">
                                <svg class="w-4 h-4 mr-2 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                                </svg>
                                Hingga {{ $roomType->capacity }} tamu
                            </div>
                            <a href="{{ route('rooms.show', $roomType) }}" class="modern-card-button w-full sm:w-auto px-6 py-2 text-sm">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- No results message -->
            @if($roomTypes->isEmpty())
            <div class="text-center py-16" data-aos="fade-up">
                <div class="text-6xl mb-6">🏨</div>
                <h3 class="text-2xl font-bold text-neutral mb-4">Tidak Ada Kamar Ditemukan</h3>
                <p class="text-neutral mb-8 max-w-md mx-auto">Kami tidak dapat menemukan kamar yang sesuai dengan kriteria Anda. Coba sesuaikan filter Anda.</p>
                <a href="{{ route('rooms.index') }}" class="btn-modern px-8 py-3">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                    </svg>
                    Reset Filter
                </a>
            </div>
            @endif

            <!-- Pagination -->
            @if($roomTypes->hasPages())
            <div class="mt-12 lg:mt-16 flex justify-center" data-aos="fade-up">
                <div class="modern-card p-4">
                    {{ $roomTypes->appends(request()->query())->links() }}
                </div>
            </div>
            @endif
        </div>
    </section>
</div>
@endsection