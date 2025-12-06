@extends('layouts.app')

@section('title', 'Bantuan & Dukungan - Hotel Reservation')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-purple-50 via-pink-50 to-blue-50">
    <div class="container mx-auto px-4 py-8">
        <!-- Header -->
        <div class="flex justify-between items-center mb-8" data-aos="fade-down" data-aos-delay="100">
            <div>
                <h1 class="text-4xl font-bold gradient-text leading-tight tracking-wide mb-2">Bantuan & Dukungan</h1>
                <p class="text-medium-contrast">Temukan jawaban untuk pertanyaan Anda dan dapatkan dukungan</p>
            </div>
            <a href="{{ route('customer.dashboard') }}" class="btn btn-outline btn-primary btn-hover shadow-sm hover:shadow-md transition-all duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali ke Dashboard
            </a>
        </div>

        <!-- Quick Help Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12" data-aos="fade-up" data-aos-delay="200">
            <div class="modern-card p-6 text-center group" data-aos="zoom-in" data-aos-delay="300">
                <div class="w-16 h-16 mx-auto mb-4 bg-gradient-to-br from-emerald-500 to-blue-500 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">FAQ</h3>
                <p class="text-medium-contrast text-sm mb-4">Pertanyaan yang sering ditanyakan</p>
                <button class="btn btn-primary btn-sm">Lihat FAQ</button>
            </div>

            <div class="modern-card p-6 text-center group" data-aos="zoom-in" data-aos-delay="400">
                <div class="w-16 h-16 mx-auto mb-4 bg-gradient-to-br from-blue-500 to-purple-500 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Kontak Kami</h3>
                <p class="text-medium-contrast text-sm mb-4">Hubungi tim dukungan kami</p>
                <button class="btn btn-primary btn-sm">Kirim Pesan</button>
            </div>

            <div class="modern-card p-6 text-center group" data-aos="zoom-in" data-aos-delay="500">
                <div class="w-16 h-16 mx-auto mb-4 bg-gradient-to-br from-purple-500 to-pink-500 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Panduan</h3>
                <p class="text-medium-contrast text-sm mb-4">Pelajari cara menggunakan sistem</p>
                <button class="btn btn-primary btn-sm">Baca Panduan</button>
            </div>
        </div>

        <!-- FAQ Section -->
        <div class="max-w-4xl mx-auto" data-aos="fade-up" data-aos-delay="600">
            <div class="modern-card p-8">
                <h2 class="text-3xl font-bold gradient-text leading-tight tracking-wide mb-8 text-center">Pertanyaan yang Sering Ditanyakan</h2>

                <div class="space-y-6">
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">Bagaimana cara melakukan reservasi kamar?</h3>
                        <p class="text-medium-contrast leading-relaxed">
                            Untuk melakukan reservasi, kunjungi halaman "Jelajahi Kamar" dari dashboard Anda, pilih tipe kamar yang diinginkan, tentukan tanggal check-in dan check-out, lalu ikuti proses pembayaran.
                        </p>
                    </div>

                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">Apakah saya bisa membatalkan reservasi?</h3>
                        <p class="text-medium-contrast leading-relaxed">
                            Ya, Anda dapat membatalkan reservasi hingga 24 jam sebelum check-in. Pembatalan dapat dilakukan melalui dashboard Anda di bagian "Reservasi Saya".
                        </p>
                    </div>

                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">Apa saja fasilitas yang tersedia di hotel?</h3>
                        <p class="text-medium-contrast leading-relaxed">
                            Grand Hotel menyediakan berbagai fasilitas premium termasuk WiFi gratis, kolam renang, sarapan pagi, TV layar datar, dan AC di setiap kamar. Fasilitas tambahan tersedia tergantung tipe kamar yang Anda pilih.
                        </p>
                    </div>

                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">Bagaimana cara memberikan ulasan?</h3>
                        <p class="text-medium-contrast leading-relaxed">
                            Setelah menyelesaikan menginap, Anda akan menerima email undangan untuk memberikan ulasan. Ulasan juga dapat diberikan melalui dashboard Anda di bagian "Riwayat Reservasi".
                        </p>
                    </div>

                    <div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">Kapan waktu check-in dan check-out?</h3>
                        <p class="text-medium-contrast leading-relaxed">
                            Waktu check-in dimulai pukul 14:00 dan check-out paling lambat pukul 12:00. Jika Anda membutuhkan early check-in atau late check-out, silakan hubungi resepsionis hotel.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="modern-card p-8 mt-8" data-aos="fade-up" data-aos-delay="700">
                <h2 class="text-3xl font-bold gradient-text leading-tight tracking-wide mb-8 text-center">Butuh Bantuan Lebih Lanjut?</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Informasi Kontak</h3>
                        <div class="space-y-4">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-emerald-100 rounded-full flex items-center justify-center mr-4">
                                    <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800">Telepon</p>
                                    <p class="text-medium-contrast">+62 21 12345678</p>
                                </div>
                            </div>

                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800">Email</p>
                                    <p class="text-medium-contrast">support@grandhotel.com</p>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center mr-4 mt-1">
                                    <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800">Alamat</p>
                                    <p class="text-medium-contrast">Jl. Sudirman No. 123<br>Jakarta, Indonesia</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Waktu Operasional</h3>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center py-2 border-b border-gray-100">
                                <span class="text-medium-contrast">Resepsionis 24 Jam</span>
                                <span class="font-semibold text-gray-800">24/7</span>
                            </div>
                            <div class="flex justify-between items-center py-2 border-b border-gray-100">
                                <span class="text-medium-contrast">Dukungan Email</span>
                                <span class="font-semibold text-gray-800">08:00 - 22:00</span>
                            </div>
                            <div class="flex justify-between items-center py-2 border-b border-gray-100">
                                <span class="text-medium-contrast">Dukungan Telepon</span>
                                <span class="font-semibold text-gray-800">06:00 - 24:00</span>
                            </div>
                        </div>

                        <div class="mt-6 p-4 bg-gradient-to-r from-emerald-50 to-blue-50 rounded-lg border border-emerald-200">
                            <p class="text-sm text-emerald-800 font-medium">
                                🚀 <strong>Tanggapan Cepat:</strong> Tim dukungan kami berkomitmen memberikan jawaban dalam waktu 2 jam untuk pertanyaan mendesak.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection