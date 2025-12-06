@extends('layouts.app')

@section('title', $roomType->name . ' - Hotel Reservation')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-base-100 via-blue-50/30 to-accent/10">
    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-primary/5 via-white to-secondary/5 py-16 lg:py-20" data-aos="fade-up">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="text-center mb-12" data-aos="fade-down">
                <div class="inline-block px-4 py-2 bg-primary/10 rounded-full mb-4">
                    <span class="text-primary font-semibold text-sm">🏨 DETAIL KAMAR</span>
                </div>
                <h1 class="text-3xl lg:text-5xl font-bold gradient-text leading-tight tracking-wide mb-6 pb-2">
                    {{ $roomType->name }}
                </h1>
                <p class="text-base lg:text-lg text-neutral max-w-3xl mx-auto">
                    Rasakan kemewahan dan kenyamanan di {{ strtolower($roomType->name) }} premium kami
                </p>
            </div>
        </div>
    </section>

    <!-- Room Details -->
    <section class="py-12 lg:py-16">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-8 mb-12 lg:mb-16" data-aos="fade-up">
                <!-- Room Image -->
                <div class="relative" data-aos="zoom-in" data-aos-delay="200">
                    <div class="modern-card overflow-hidden">
                        <img src="{{ $roomType->image ?? 'https://picsum.photos/600/400?random=' . $roomType->id }}"
                             alt="{{ $roomType->name }}"
                             class="modern-image w-full h-80 lg:h-96" />
                        <!-- Price overlay -->
                        <div class="absolute top-4 right-4 bg-white/95 backdrop-blur-sm px-4 py-2 rounded-full shadow-lg">
                            <div class="text-primary font-bold text-lg">Rp {{ number_format($roomType->base_price) }}</div>
                            <div class="text-xs text-neutral">per malam</div>
                        </div>
                    </div>
                </div>

                <!-- Room Information -->
                <div class="space-y-6" data-aos="fade-left" data-aos-delay="400">
                    <div>
                        <h2 class="text-2xl lg:text-3xl font-bold text-primary mb-4">{{ $roomType->name }}</h2>
                        <p class="text-neutral leading-relaxed text-base lg:text-lg">{{ $roomType->description }}</p>
                    </div>

                    <!-- Room Features Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="bg-white/80 backdrop-blur-sm rounded-xl p-4 shadow-lg border border-white/50">
                            <div class="flex items-center mb-2">
                                <svg class="w-5 h-5 text-primary mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                                </svg>
                                <span class="font-semibold text-primary">Kapasitas</span>
                            </div>
                            <p class="text-neutral">Hingga {{ $roomType->capacity }} tamu</p>
                        </div>

                        <div class="modern-card p-4">
                            <div class="flex items-center mb-2">
                                <svg class="w-5 h-5 text-secondary mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                                <span class="font-semibold text-secondary">Ketersediaan</span>
                            </div>
                            <p class="text-neutral">{{ $availableRooms->count() }} kamar tersedia</p>
                        </div>
                    </div>

                    <!-- Booking Section -->
                    <div class="bg-gradient-to-r from-primary/10 to-secondary/10 rounded-2xl p-6 border border-primary/20">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                            <div>
                                <div class="text-3xl lg:text-4xl font-bold text-primary mb-1">
                                    Rp {{ number_format($roomType->base_price) }}
                                </div>
                                <div class="text-sm text-neutral">per malam</div>
                            </div>

                            <div class="flex flex-col sm:flex-row gap-3">
                                <!-- Temporarily show booking link for testing -->
                                <a href="/customer/bookings/create/{{ $roomType->id }}" class="btn-modern px-8 py-3 text-lg font-semibold">
                                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    Pesan Sekarang
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    <!-- Facilities Section -->
    <section class="py-12 lg:py-16 bg-gradient-to-br from-white via-primary/5 to-secondary/5" data-aos="fade-up">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="text-center mb-12" data-aos="fade-down">
                <h2 class="text-3xl lg:text-4xl font-bold gradient-text leading-tight tracking-wide mb-4 pb-2">
                    Fasilitas Kamar
                </h2>
                <p class="text-neutral max-w-2xl mx-auto">
                    Nikmati fasilitas lengkap kami yang dirancang untuk kenyamanan Anda yang optimal
                </p>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3 lg:gap-4" data-aos="zoom-in" data-aos-delay="200">
                @if($roomType->facilities && $roomType->facilities->count() > 0)
                    @foreach($roomType->facilities as $facility)
                    <div class="modern-card text-center group" data-aos="fade-up" data-aos-delay="{{ 100 + ($loop->index * 50) }}">
                        <div class="w-12 h-12 bg-gradient-to-br from-primary to-accent rounded-full flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <h3 class="modern-card-title">{{ $facility->name }}</h3>
                    </div>
                    @endforeach
                @else
                    <div class="modern-card text-center">
                        <div class="w-12 h-12 bg-gradient-to-br from-primary to-accent rounded-full flex items-center justify-center mx-auto mb-3">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <h3 class="modern-card-title">WiFi</h3>
                    </div>
                    <div class="modern-card text-center">
                        <div class="w-12 h-12 bg-gradient-to-br from-secondary to-orange-400 rounded-full flex items-center justify-center mx-auto mb-3">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <h3 class="modern-card-title">Pendingin Ruangan</h3>
                    </div>
                    <div class="modern-card text-center">
                        <div class="w-12 h-12 bg-gradient-to-br from-accent to-green-400 rounded-full flex items-center justify-center mx-auto mb-3">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <h3 class="modern-card-title">Televisi</h3>
                    </div>
                    <div class="modern-card text-center">
                        <div class="w-12 h-12 bg-gradient-to-br from-primary to-blue-500 rounded-full flex items-center justify-center mx-auto mb-3">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <h3 class="modern-card-title">Layanan Kamar</h3>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Available Rooms Section -->
    @if($availableRooms->count() > 0)
    <section class="py-12 lg:py-16 bg-gradient-to-br from-base-100 to-white" data-aos="fade-up">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="text-center mb-12" data-aos="fade-down">
                <h2 class="text-3xl lg:text-4xl font-bold gradient-text leading-tight tracking-wide mb-4 pb-2">
                    Kamar Tersedia
                </h2>
                <p class="text-neutral max-w-2xl mx-auto">
                    Pilih dari kamar {{ $roomType->name }} yang tersedia kami
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4" data-aos="zoom-in" data-aos-delay="200">
                @foreach($availableRooms as $room)
                <div class="modern-card text-center group" data-aos="fade-up" data-aos-delay="{{ 100 + ($loop->index * 100) }}">
                    <div class="w-16 h-16 bg-gradient-to-br from-primary to-accent rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <h3 class="modern-card-title text-xl">Kamar {{ $room->room_number }}</h3>
                    <p class="modern-card-text mb-4">Lantai {{ $room->floor }}</p>
                    <div class="badge badge-success badge-lg px-4 py-2">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Tersedia Sekarang
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Reviews Section -->
    <section class="py-12 lg:py-16 bg-gradient-to-br from-white via-accent/5 to-secondary/10" data-aos="fade-up">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="text-center mb-12" data-aos="fade-down">
                <h2 class="text-3xl lg:text-4xl font-bold gradient-text leading-tight tracking-wide mb-4 pb-2">
                    Ulasan Tamu
                </h2>
                <p class="text-neutral max-w-2xl mx-auto">
                    Apa yang dikatakan tamu kami tentang pengalaman mereka
                </p>
            </div>

            <div class="max-w-4xl mx-auto">
                @if(isset($reviews) && $reviews->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4" data-aos="zoom-in" data-aos-delay="200">
                        @foreach($reviews->take(6) as $review)
                        <div class="modern-card group" data-aos="fade-up" data-aos-delay="{{ 100 + ($loop->index * 100) }}">
                            <!-- Rating -->
                            <div class="rating rating-md mb-4 flex justify-center">
                                @for($i = 1; $i <= 5; $i++)
                                    <input type="radio" name="rating-{{ $review->id }}" class="mask mask-star-2 bg-warning" {{ $i <= $review->rating ? 'checked' : '' }} disabled />
                                @endfor
                            </div>

                            <!-- Review text -->
                            <blockquote class="text-sm lg:text-base text-neutral leading-relaxed mb-4 italic">
                                "{{ Str::limit($review->comment, 120) }}"
                            </blockquote>

                            <!-- Guest info -->
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-gradient-to-br from-primary to-accent rounded-full flex items-center justify-center text-white font-bold text-sm mr-3">
                                    {{ strtoupper(substr($review->user->name, 0, 1)) }}
                                </div>
                                <div>
                                    <div class="font-bold text-primary text-sm">{{ $review->user->name }}</div>
                                    <div class="text-xs text-neutral">Tamu Terverifikasi</div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-16" data-aos="fade-in">
                        <div class="text-6xl mb-6">⭐</div>
                        <h3 class="text-2xl font-bold text-neutral mb-4">Belum Ada Ulasan</h3>
                        <p class="text-neutral max-w-md mx-auto">
                            Jadilah yang pertama mengalami dan mengulas kamar indah ini!
                        </p>
                    </div>
                @endif
            </div>
        </div>
    </section>
</div>
@endsection