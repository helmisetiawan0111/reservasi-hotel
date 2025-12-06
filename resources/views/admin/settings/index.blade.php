@extends('layouts.app')

@section('title', 'Pengaturan Sistem - Admin Dashboard')

@section('content')
<div class="min-h-screen admin-panel">
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold admin-text-dark mb-2">Pengaturan Sistem</h1>
                <p class="text-medium-contrast">Kelola pengaturan umum sistem hotel</p>
            </div>
            <a href="{{ route('admin.dashboard') }}" class="group relative inline-flex items-center px-6 py-3 text-sm font-semibold text-gray-700 bg-gradient-to-r from-gray-100 to-gray-200 rounded-xl hover:from-gray-200 hover:to-gray-300 transition-all duration-300 hover:scale-105 hover:shadow-lg border-2 border-gray-300 hover:border-gray-400">
                <svg class="w-4 h-4 mr-2 text-gray-600 group-hover:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali ke Dashboard
                <div class="absolute inset-0 rounded-xl bg-gradient-to-r from-gray-200/20 to-gray-300/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            </a>
        </div>

        <!-- Settings Form -->
        <div class="max-w-4xl">
            <form method="POST" action="{{ route('admin.settings.update') }}" class="space-y-8">
                @csrf

                <!-- Hotel Information Section -->
                <div class="modern-card hover:scale-[1.02] transition-all duration-300 shadow-xl hover:shadow-2xl" data-aos="fade-up" data-aos-delay="100">
                    <div class="card-body">
                        <h3 class="text-xl font-bold admin-text-dark mb-6 flex items-center">
                            <svg class="w-6 h-6 mr-3 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                            Informasi Hotel
                        </h3>

                        <!-- Hotel Basic Info Fields -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Hotel Name -->
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text font-semibold text-primary">Nama Hotel</span>
                                </label>
                                <input type="text" name="hotel_name" value="{{ old('hotel_name', \App\Models\Setting::getValue('hotel_name', 'Grand Hotel')) }}" class="input input-bordered input-primary focus:input-primary w-full" required>
                            </div>

                            <!-- Hotel Address -->
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text font-semibold text-primary">Alamat Hotel</span>
                                </label>
                                <input type="text" name="hotel_address" value="{{ old('hotel_address', \App\Models\Setting::getValue('hotel_address', '')) }}" class="input input-bordered input-primary focus:input-primary w-full" placeholder="Jl. Sudirman No. 123, Jakarta">
                            </div>

                            <!-- Hotel Phone -->
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text font-semibold text-primary">Telepon Hotel</span>
                                </label>
                                <input type="tel" name="hotel_phone" value="{{ old('hotel_phone', \App\Models\Setting::getValue('hotel_phone', '')) }}" class="input input-bordered input-primary focus:input-primary w-full" placeholder="+62 21 12345678">
                            </div>

                            <!-- Hotel Email -->
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text font-semibold text-primary">Email Hotel</span>
                                </label>
                                <input type="email" name="hotel_email" value="{{ old('hotel_email', \App\Models\Setting::getValue('hotel_email', '')) }}" class="input input-bordered input-primary focus:input-primary w-full" placeholder="info@grandhotel.com">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- System Settings -->
                <div class="modern-card hover:scale-[1.02] transition-all duration-300 shadow-xl hover:shadow-2xl" data-aos="fade-up" data-aos-delay="200">
                    <div class="card-body">
                        <h3 class="text-xl font-bold admin-text-dark mb-6 flex items-center">
                            <svg class="w-6 h-6 mr-3 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            Pengaturan Sistem
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text font-semibold text-primary">Mata Uang Default</span>
                                </label>
                                <select name="default_currency" class="select select-bordered select-primary focus:select-primary w-full">
                                    <option value="IDR" {{ old('default_currency', \App\Models\Setting::getValue('default_currency', 'IDR')) == 'IDR' ? 'selected' : '' }}>Rupiah (IDR)</option>
                                    <option value="USD" {{ old('default_currency', \App\Models\Setting::getValue('default_currency', 'IDR')) == 'USD' ? 'selected' : '' }}>US Dollar (USD)</option>
                                    <option value="EUR" {{ old('default_currency', \App\Models\Setting::getValue('default_currency', 'IDR')) == 'EUR' ? 'selected' : '' }}>Euro (EUR)</option>
                                </select>
                            </div>

                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text font-semibold text-primary">Timezone</span>
                                </label>
                                <select name="timezone" class="select select-bordered select-primary focus:select-primary w-full">
                                    <option value="Asia/Jakarta" {{ old('timezone', \App\Models\Setting::getValue('timezone', 'Asia/Jakarta')) == 'Asia/Jakarta' ? 'selected' : '' }}>Asia/Jakarta (WIB)</option>
                                    <option value="Asia/Makassar" {{ old('timezone', \App\Models\Setting::getValue('timezone', 'Asia/Jakarta')) == 'Asia/Makassar' ? 'selected' : '' }}>Asia/Makassar (WITA)</option>
                                    <option value="Asia/Jayapura" {{ old('timezone', \App\Models\Setting::getValue('timezone', 'Asia/Jakarta')) == 'Asia/Jayapura' ? 'selected' : '' }}>Asia/Jayapura (WIT)</option>
                                </select>
                            </div>

                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text font-semibold text-primary">Batas Waktu Check-in (HH:MM)</span>
                                </label>
                                <input type="time" name="checkin_time" value="{{ old('checkin_time', \App\Models\Setting::getValue('checkin_time', '14:00')) }}" class="input input-bordered input-primary focus:input-primary w-full">
                            </div>

                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text font-semibold text-primary">Batas Waktu Check-out (HH:MM)</span>
                                </label>
                                <input type="time" name="checkout_time" value="{{ old('checkout_time', \App\Models\Setting::getValue('checkout_time', '12:00')) }}" class="input input-bordered input-primary focus:input-primary w-full">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Email Settings -->
                <div class="modern-card hover:scale-[1.02] transition-all duration-300 shadow-xl hover:shadow-2xl" data-aos="fade-up" data-aos-delay="300">
                    <div class="card-body">
                        <h3 class="text-xl font-bold admin-text-dark mb-6 flex items-center">
                            <svg class="w-6 h-6 mr-3 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            Pengaturan Email
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text font-semibold text-primary">Email Notifikasi</span>
                                </label>
                                <input type="email" name="notification_email" value="{{ old('notification_email', \App\Models\Setting::getValue('notification_email', '')) }}" class="input input-bordered input-primary focus:input-primary w-full" placeholder="admin@grandhotel.com">
                            </div>

                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text font-semibold text-primary">Kirim Email Konfirmasi</span>
                                </label>
                                <div class="flex items-center space-x-3 mt-3">
                                    <input type="checkbox" name="send_confirmation_email" value="1" {{ old('send_confirmation_email', \App\Models\Setting::getValue('send_confirmation_email', '1')) ? 'checked' : '' }} class="checkbox checkbox-primary">
                                    <span class="text-sm text-medium-contrast">Aktifkan pengiriman email konfirmasi reservasi</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Save Button -->
                <div class="flex justify-end">
                    <button type="submit" class="btn-modern px-8 py-3 text-lg font-semibold">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Simpan Pengaturan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection