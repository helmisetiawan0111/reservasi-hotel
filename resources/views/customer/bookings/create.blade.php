@extends('layouts.app')

@section('title', 'Pesan Kamar - ' . $roomType->name)

@section('content')
<div class="min-h-screen bg-gradient-to-br from-base-100 via-blue-50/30 to-accent/10">
    <div class="container mx-auto px-4 py-8">
        <!-- Header -->
        <div class="flex justify-between items-center mb-8" data-aos="fade-down" data-aos-delay="100">
            <div>
                <h1 class="text-3xl font-bold gradient-text leading-tight tracking-wide mb-2">Pesan Kamar</h1>
                <p class="text-medium-contrast">{{ $roomType->name }}</p>
            </div>
            <a href="/rooms/{{ $roomType->id }}" class="btn btn-outline btn-primary btn-hover shadow-sm hover:shadow-md transition-all duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali ke Detail Kamar
            </a>
        </div>

        <!-- Booking Form -->
        <div class="max-w-4xl mx-auto" data-aos="fade-up" data-aos-delay="200">
            <div class="modern-card p-8">
                <form method="POST" action="/customer/bookings" class="form-modern">
                    @csrf
                    <input type="hidden" name="room_type_id" value="{{ $roomType->id }}">

                    <!-- Room Info -->
                    <div class="bg-gradient-to-r from-primary/10 to-secondary/10 rounded-xl p-6 mb-8 border border-primary/20">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                            <div>
                                <h3 class="text-xl font-bold text-primary mb-2">{{ $roomType->name }}</h3>
                                <p class="text-medium-contrast">{{ Str::limit($roomType->description, 100) }}</p>
                            </div>
                            <div class="text-right">
                                <div class="text-2xl font-bold text-primary">Rp {{ number_format($roomType->base_price) }}</div>
                                <div class="text-sm text-neutral">per malam</div>
                            </div>
                        </div>
                    </div>

                    <!-- Booking Details -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <!-- Check-in Date -->
                        <div class="form-control" data-aos="fade-up" data-aos-delay="300">
                            <label class="label">
                                <span class="label-text font-semibold text-primary flex items-center text-sm">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    Tanggal Check-in
                                </span>
                            </label>
                            <input type="date" name="check_in_date" value="{{ old('check_in_date', now()->addDay()->format('Y-m-d')) }}"
                                   min="{{ now()->addDay()->format('Y-m-d') }}" required
                                   class="input input-bordered input-primary focus:input-primary focus:ring-2 focus:ring-primary/20 transition-all duration-300 text-sm lg:text-base w-full">
                            @error('check_in_date')
                                <span class="text-error text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Check-out Date -->
                        <div class="form-control" data-aos="fade-up" data-aos-delay="400">
                            <label class="label">
                                <span class="label-text font-semibold text-primary flex items-center text-sm">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    Tanggal Check-out
                                </span>
                            </label>
                            <input type="date" name="check_out_date" value="{{ old('check_out_date', now()->addDays(2)->format('Y-m-d')) }}"
                                   min="{{ now()->addDays(2)->format('Y-m-d') }}" required
                                   class="input input-bordered input-primary focus:input-primary focus:ring-2 focus:ring-primary/20 transition-all duration-300 text-sm lg:text-base w-full">
                            @error('check_out_date')
                                <span class="text-error text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Number of Guests -->
                        <div class="form-control" data-aos="fade-up" data-aos-delay="500">
                            <label class="label">
                                <span class="label-text font-semibold text-primary flex items-center text-sm">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                                    </svg>
                                    Jumlah Tamu
                                </span>
                            </label>
                            <select name="total_guests" required class="select select-bordered select-primary focus:select-primary focus:ring-2 focus:ring-primary/20 transition-all duration-300 text-sm lg:text-base w-full">
                                @for($i = 1; $i <= $roomType->capacity; $i++)
                                    <option value="{{ $i }}" {{ old('total_guests') == $i ? 'selected' : '' }}>{{ $i }} Tamu</option>
                                @endfor
                            </select>
                            @error('total_guests')
                                <span class="text-error text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Special Requests -->
                        <div class="form-control" data-aos="fade-up" data-aos-delay="600">
                            <label class="label">
                                <span class="label-text font-semibold text-primary flex items-center text-sm">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                    Permintaan Khusus (Opsional)
                                </span>
                            </label>
                            <textarea name="special_requests" rows="3" placeholder="Contoh: Extra bed, late check-out, dll."
                                      class="textarea textarea-bordered textarea-primary focus:textarea-primary focus:ring-2 focus:ring-primary/20 transition-all duration-300 text-sm lg:text-base w-full">{{ old('special_requests') }}</textarea>
                        </div>
                    </div>

                    <!-- Price Summary -->
                    <div class="bg-gradient-to-r from-emerald-50 to-blue-50 rounded-xl p-6 mb-8 border border-emerald-200" id="priceSummary">
                        <h4 class="text-lg font-bold text-primary mb-4">Ringkasan Harga</h4>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between">
                                <span>Harga per malam:</span>
                                <span>Rp {{ number_format($roomType->base_price) }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Jumlah malam:</span>
                                <span id="nightsCount">1</span>
                            </div>
                            <hr class="my-2">
                            <div class="flex justify-between font-bold text-lg">
                                <span>Total:</span>
                                <span id="totalPrice">Rp {{ number_format($roomType->base_price) }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center" data-aos="fade-up" data-aos-delay="700">
                        <button type="submit" class="btn-modern px-12 py-4 text-xl font-semibold">
                            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Konfirmasi Reservasi
                        </button>
                        <p class="text-sm text-neutral mt-4">
                            Dengan mengklik tombol di atas, Anda menyetujui syarat dan ketentuan kami.
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
// Auto-calculate price when dates change
document.addEventListener('DOMContentLoaded', function() {
    const checkInInput = document.querySelector('input[name="check_in_date"]');
    const checkOutInput = document.querySelector('input[name="check_out_date"]');
    const pricePerNight = {{ $roomType->base_price }};

    function calculatePrice() {
        const checkIn = new Date(checkInInput.value);
        const checkOut = new Date(checkOutInput.value);

        if (checkIn && checkOut && checkOut > checkIn) {
            const nights = Math.ceil((checkOut - checkIn) / (1000 * 60 * 60 * 24));
            const total = nights * pricePerNight;

            document.getElementById('nightsCount').textContent = nights;
            document.getElementById('totalPrice').textContent = 'Rp ' + total.toLocaleString('id-ID');
        }
    }

    checkInInput.addEventListener('change', calculatePrice);
    checkOutInput.addEventListener('change', calculatePrice);

    // Initial calculation
    calculatePrice();
});
</script>
@endsection