@extends('layouts.app')

@section('title', 'Beranda - Reservasi Hotel')

@section('content')
<div class="min-h-screen">
    <!-- Hero Section -->
    <section class="hero min-h-screen bg-gradient-to-br from-primary via-blue-600 to-accent text-white relative overflow-hidden" data-aos="fade-in">
        <!-- Animated Background Elements -->
        <div class="absolute inset-0">
            <div class="absolute top-20 left-10 w-72 h-72 bg-white/10 rounded-full blur-3xl animate-pulse hidden lg:block"></div>
            <div class="absolute bottom-20 right-10 w-96 h-96 bg-accent/20 rounded-full blur-3xl animate-pulse delay-1000 hidden lg:block"></div>
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-secondary/15 rounded-full blur-2xl animate-bounce"></div>
        </div>

        <div class="hero-overlay bg-black/30"></div>
        <div class="hero-content text-center relative z-10 px-4" data-aos="zoom-in" data-aos-delay="300" data-aos-duration="800" data-aos-offset="150">
            <div class="max-w-7xl mx-auto px-4">
                <div class="mb-6" data-aos="fade-down" data-aos-delay="500">
                    <span class="inline-block px-6 py-3 bg-white/20 backdrop-blur-sm rounded-full text-sm font-medium mb-6 border border-white/20">
                        🏨 Pengalaman Hotel Mewah
                    </span>
                </div>
                <h1 class="mb-8 text-4xl md:text-5xl lg:text-6xl font-semibold text-gradient-bright leading-tight tracking-wide pb-2">
                    Selamat Datang di<br class="hidden sm:block">
                    Grand Hotel
                </h1>
                <p class="mb-10 text-lg sm:text-xl md:text-2xl text-white max-w-3xl mx-auto leading-relaxed px-4" data-aos="fade-up" data-aos-delay="700">
                    Rasakan kemewahan dan kenyamanan tak tertandingi di jantung kota. Penginapan sempurna Anda menanti dengan layanan kelas dunia.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center px-4" data-aos="fade-up" data-aos-delay="900">
                    <a href="{{ route('rooms.index') }}" class="hero-btn-explore w-full sm:w-auto">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                        Jelajahi Kamar
                    </a>
                    <a href="#rooms" class="hero-btn-learn w-full sm:w-auto">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                        </svg>
                        Pelajari Lebih Lanjut
                    </a>
                </div>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce hidden sm:block" data-aos="fade-in" data-aos-delay="1200">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
            </svg>
        </div>
    </section>

    <!-- Search Section -->
    <section class="py-20 bg-gradient-to-br from-base-100 via-blue-50/30 to-accent/10 relative overflow-hidden" data-aos="fade-up" data-aos-duration="800" data-aos-offset="150">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-5">
            <div class="absolute top-10 left-10 w-32 h-32 border-2 border-primary rounded-full hidden lg:block"></div>
            <div class="absolute bottom-10 right-10 w-24 h-24 border-2 border-secondary rounded-full hidden lg:block"></div>
            <div class="absolute top-1/2 left-1/3 w-16 h-16 border-2 border-accent rounded-full hidden lg:block"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 relative z-10">
            <div class="text-center mb-10 lg:mb-12" data-aos="fade-down">
                <h2 class="text-4xl md:text-5xl font-semibold bg-gradient-to-r from-primary via-secondary to-accent bg-clip-text text-transparent leading-[1.25] tracking-normal mb-6">
                    Temukan Kamar Sempurna Anda
                </h2>
                <p class="text-base md:text-lg text-medium-contrast leading-relaxed max-w-2xl mx-auto px-4">
                    Cari dan pesan akomodasi ideal Anda dengan sistem pemesanan yang mudah digunakan
                </p>
            </div>

           
        </div>
    </section>

    <!-- Featured Rooms -->
    <section id="rooms" class="py-24 bg-gradient-to-br from-base-100 to-blue-50/50 relative overflow-hidden" data-aos="fade-up" data-aos-duration="800" data-aos-offset="150">
        <!-- Background Elements -->
        <div class="absolute inset-0 opacity-5">
            <div class="absolute top-20 right-20 w-64 h-64 bg-primary rounded-full blur-3xl"></div>
            <div class="absolute bottom-20 left-20 w-48 h-48 bg-accent rounded-full blur-3xl"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 relative z-10">
                <div class="text-center mb-16" data-aos="fade-down">
                    <div class="inline-block px-4 py-2 bg-primary/10 rounded-full mb-4">
                        <span class="text-primary font-semibold text-sm">🏨 KAMAR KAMI</span>
                    </div>

                    <h2 class="text-4xl md:text-5xl font-semibold gradient-text leading-tight tracking-wide mb-6 pb-2">
                        Kamar Unggulan
                    </h2>


                    <p class="text-base md:text-lg text-gray-700 leading-relaxed max-w-3xl mx-auto">
                        Temukan pilihan kamar mewah yang dipilih dengan hati-hati untuk kenyamanan
                        dan relaksasi Anda yang optimal
                    </p>
                </div>


            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                @foreach($roomTypes as $roomType)
                <div class="modern-card p-6" data-aos="zoom-in" data-aos-delay="{{ 200 + ($loop->index * 100) }}">
                    <div class="relative overflow-hidden mb-4">
                        <img src="{{ $roomType->image ? (filter_var($roomType->image, FILTER_VALIDATE_URL) ? $roomType->image : asset('storage/' . $roomType->image)) : 'https://picsum.photos/400/300?random=' . $roomType->id }}"
                              alt="{{ $roomType->name }}"
                              class="modern-image h-56 w-full" />
                        <!-- Overlay on hover -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/30 via-transparent to-transparent opacity-0 hover:opacity-100 transition-opacity duration-500"></div>
                        <!-- Price badge -->
                        <div class="absolute top-4 right-4 bg-white/95 backdrop-blur-sm px-3 py-1 rounded-full shadow-lg">
                            <span class="text-primary font-bold text-sm">Mulai dari Rp {{ number_format($roomType->base_price) }}</span>
                        </div>
                        <!-- Room type badge -->
                        <div class="absolute top-4 left-4 bg-primary/90 text-white px-3 py-1 rounded-full text-sm font-semibold">
                            {{ $roomType->name }}
                        </div>
                    </div>

                    <div class="text-gray-700 font-medium leading-relaxed">
                        <h3 class="text-lg font-semibold mb-2">{{ $roomType->name }}</h3>
                        <p class="text-sm mb-4">{{ Str::limit($roomType->description, 120) }}</p>

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
                            <div class="flex items-center text-sm text-gray-700">
                                <svg class="w-4 h-4 mr-2 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                                </svg>
                                Hingga {{ $roomType->capacity }} Tamu
                             </div>
                              <a href="{{ route('rooms.show', $roomType) }}" class="btn btn-primary btn-sm w-full sm:w-auto">
                                  Lihat Detail
                              </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Call to action -->
            <div class="text-center mt-20" data-aos="fade-up" data-aos-delay="1000" data-aos-duration="600">
                <div class="inline-block">
                    <a href="{{ route('rooms.index') }}" class="group relative inline-flex items-center px-12 py-5 bg-gradient-to-r from-emerald-600 via-blue-600 to-amber-600 text-white font-bold text-xl rounded-2xl shadow-2xl hover:shadow-3xl transition-all duration-500 hover:scale-105 hover:-translate-y-1 overflow-hidden">
                        <!-- Animated background -->
                        <div class="absolute inset-0 bg-gradient-to-r from-amber-600 via-emerald-600 to-blue-600 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

                        <!-- Button content -->
                        <svg class="w-7 h-7 mr-4 relative z-10 transition-transform duration-300 group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                        <span class="relative z-10 tracking-wide">Lihat Semua Kamar</span>

                        <!-- Shine effect -->
                        <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-700"></div>
                    </a>
                </div>
            </div>
         </div>
     </section>

     <!-- Reviews -->
     <section class="py-24 bg-gradient-to-br from-white via-emerald-50/30 to-blue-50/40 relative overflow-hidden" data-aos="fade-up" data-aos-duration="800" data-aos-offset="150">
         <!-- Background Elements -->
         <div class="absolute inset-0 opacity-3">
             <div class="absolute top-16 left-1/4 w-48 h-48 bg-emerald-200 rounded-full blur-3xl"></div>
             <div class="absolute bottom-16 right-1/4 w-40 h-40 bg-blue-200 rounded-full blur-3xl"></div>
             <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-32 h-32 bg-amber-100 rounded-full blur-2xl"></div>
         </div>

         <div class="max-w-7xl mx-auto px-4 relative z-10">
             <div class="text-center mb-20" data-aos="fade-down" data-aos-delay="200" data-aos-duration="600">
                 <div class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-emerald-100 to-blue-100 rounded-full mb-6 shadow-sm border border-emerald-200/50">
                     <span class="text-emerald-700 font-bold text-sm tracking-wide">⭐ ULASAN TAMU</span>
                 </div>
                 <h2 class="text-4xl md:text-5xl font-semibold bg-gradient-to-r from-emerald-600 via-blue-600 to-amber-600 bg-clip-text text-transparent leading-[1.25] tracking-normal mb-8">
                     Apa Kata Tamu Kami
                 </h2>
                 <p class="text-base md:text-lg text-gray-700 max-w-4xl mx-auto leading-relaxed">
                     Baca ulasan autentik dari tamu puas kami yang mengalami kemewahan dan kenyamanan di Grand Hotel
                 </p>
             </div>

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                @foreach($reviews as $review)
                <div class="group relative" data-aos="fade-up" data-aos-delay="{{ 300 + ($loop->index * 100) }}" data-aos-duration="700">
                    <!-- Card Container -->
                    <div class="review-card p-6 relative overflow-hidden">
                        <!-- Subtle background pattern -->
                        <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-emerald-50 to-blue-50 rounded-full opacity-50 -translate-y-16 translate-x-16"></div>

                        <!-- Rating -->
                        <div class="flex justify-center mb-6">
                            <div class="review-rating rating rating-lg">
                                @for($i = 1; $i <= 5; $i++)
                                    <input type="radio" name="rating-{{ $review->id }}" class="mask mask-star-2 bg-amber-400" {{ $i <= $review->rating ? 'checked' : '' }} disabled />
                                @endfor
                            </div>
                        </div>

                        <!-- Review text -->
                        <blockquote class="review-quote text-lg leading-relaxed mb-8 font-medium relative z-10 pl-6">
                            "{{ Str::limit($review->comment, 150) }}"
                        </blockquote>

                        <!-- Guest info -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="review-avatar w-14 h-14 rounded-full flex items-center justify-center text-white font-bold text-lg shadow-lg">
                                    {{ strtoupper(substr($review->user->name, 0, 1)) }}
                                </div>
                                <div class="ml-4">
                                    <div class="review-author text-lg">{{ $review->user->name }}</div>
                                    <div class="review-verified">Tamu Terverifikasi</div>
                                </div>
                            </div>

                            <!-- Decorative star -->
                            <div class="text-amber-300 opacity-60 group-hover:opacity-80 transition-opacity duration-300">
                                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Trust indicators -->
            <div class="text-center mt-16 lg:mt-20" data-aos="fade-up" data-aos-delay="800" data-aos-duration="600">
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6 max-w-6xl mx-auto">
                    <div class="trust-card p-6 lg:p-8">
                        <div class="trust-value text-3xl lg:text-4xl mb-3">4.8</div>
                        <div class="trust-label text-sm lg:text-base mb-3">Rating Rata-rata</div>
                        <div class="flex justify-center space-x-1">
                            <span class="text-amber-400 text-xl">⭐</span>
                            <span class="text-amber-400 text-xl">⭐</span>
                            <span class="text-amber-400 text-xl">⭐</span>
                            <span class="text-amber-400 text-xl">⭐</span>
                            <span class="text-amber-400 text-xl">⭐</span>
                        </div>
                    </div>
                    <div class="trust-card p-6 lg:p-8">
                        <div class="trust-value text-3xl lg:text-4xl mb-3">500+</div>
                        <div class="trust-label text-sm lg:text-base mb-3">Tamu Puas</div>
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-emerald-500 rounded-full mx-auto flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="trust-card p-6 lg:p-8">
                        <div class="trust-value text-3xl lg:text-4xl mb-3">50+</div>
                        <div class="trust-label text-sm lg:text-base mb-3">Kamar Mewah</div>
                        <div class="w-12 h-12 bg-gradient-to-br from-amber-500 to-orange-500 rounded-full mx-auto flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="trust-card p-6 lg:p-8">
                        <div class="trust-value text-3xl lg:text-4xl mb-3">24/7</div>
                        <div class="trust-label text-sm lg:text-base mb-3">Dukungan Pelanggan</div>
                        <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-500 rounded-full mx-auto flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 text-white relative overflow-hidden" data-aos="fade-up">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-10 left-10 w-32 h-32 border border-primary rounded-full"></div>
            <div class="absolute bottom-10 right-10 w-24 h-24 border border-accent rounded-full"></div>
            <div class="absolute top-1/2 left-1/3 w-16 h-16 border border-secondary rounded-full"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 py-12 lg:py-16 relative z-10">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12 mb-8 lg:mb-12">
                <div data-aos="fade-right">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-primary to-accent rounded-lg flex items-center justify-center mr-3">
                            <span class="text-white font-bold text-xl">G</span>
                        </div>
                        <h3 class="text-2xl font-bold bg-gradient-to-r from-primary to-accent bg-clip-text text-transparent">Grand Hotel</h3>
                    </div>
                    <p class="text-gray-600 leading-relaxed mb-6">
                        Rasakan kemewahan dan kenyamanan tak tertandingi di jantung kota. Penginapan sempurna Anda menanti dengan layanan dan fasilitas kelas dunia.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-white/10 hover:bg-primary rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-white/10 hover:bg-accent rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.75.098.118.112.221.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.747-1.378 0 0-.599 2.282-.744 2.84-.282 1.084-1.064 2.456-1.549 3.235C9.584 23.815 10.77 24.001 12.017 24.001c6.624 0 11.99-5.367 11.99-11.987C24.007 5.367 18.641.001.012.017z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-white/10 hover:bg-secondary rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.75.098.118.112.221.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.747-1.378 0 0-.599 2.282-.744 2.84-.282 1.084-1.064 2.456-1.549 3.235C9.584 23.815 10.77 24.001 12.017 24.001c6.624 0 11.99-5.367 11.99-11.987C24.007 5.367 18.641.001.012.017z"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <div data-aos="fade-up" data-aos-delay="200">
                    <h4 class="font-bold text-lg mb-6 text-white">Tautan Cepat</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-600 hover:text-primary transition-colors duration-300 flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                            Tentang Kami
                        </a></li>
                        <li><a href="{{ route('rooms.index') }}" class="text-gray-600 hover:text-primary transition-colors duration-300 flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                            Kamar
                        </a></li>
                        <li><a href="#" class="text-gray-600 hover:text-primary transition-colors duration-300 flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                            Kontak
                        </a></li>
                        <li><a href="#" class="text-gray-600 hover:text-primary transition-colors duration-300 flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                            Galeri
                        </a></li>
                    </ul>
                </div>

                <div data-aos="fade-up" data-aos-delay="400">
                    <h4 class="font-bold text-lg mb-6 text-white">Info Kontak</h4>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <svg class="w-5 h-5 text-primary mr-3 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <div>
                                <p class="text-gray-600">Jl. Sudirman No. 123</p>
                                <p class="text-gray-600">Jakarta, Indonesia</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-primary mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            <p class="text-gray-600">+62 21 12345678</p>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-primary mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <p class="text-gray-600">info@grandhotel.com</p>
                        </div>
                    </div>
                </div>

                <div data-aos="fade-left" data-aos-delay="600">
                    <h4 class="font-bold text-lg mb-6 text-white">Buletin Berita</h4>
                    <p class="text-gray-600 mb-4">Berlangganan untuk mendapatkan penawaran khusus dan pembaruan.</p>
                    <div class="flex">
                        <input type="email" placeholder="Email Anda" class="form-modern input input-bordered flex-1 rounded-r-none focus:input-primary">
                        <button class="btn-modern rounded-l-none px-6">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Bottom Bar -->
            <div class="border-t border-gray-700 pt-8 mt-8">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-gray-600 text-sm mb-4 md:mb-0">
                        © 2024 Grand Hotel. Seluruh hak cipta dilindungi undang-undang.
                    </p>
                    <div class="flex space-x-6 text-sm">
                        <a href="#" class="text-gray-600 hover:text-primary transition-colors">Kebijakan Privasi</a>
                        <a href="#" class="text-gray-600 hover:text-primary transition-colors">Syarat dan Ketentuan</a>
                        <a href="#" class="text-gray-600 hover:text-primary transition-colors">Kebijakan Cookie</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
@endsection