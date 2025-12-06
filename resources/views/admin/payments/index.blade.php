@extends('layouts.app')

@section('title', 'Kelola Pembayaran - Admin Dashboard')

@section('content')
<div class="min-h-screen admin-panel">
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold admin-text-dark mb-2">Kelola Pembayaran</h1>
                <p class="text-medium-contrast">Pantau semua transaksi pembayaran tamu</p>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="dashboard-card hover:scale-[1.02] transition-all duration-300 shadow-xl hover:shadow-2xl" data-aos="fade-up" data-aos-delay="100">
                <div class="card-body text-center">
                    <div class="stat-value text-blue-600 mb-2">{{ \App\Models\Payment::count() }}</div>
                    <div class="stat-label">Total Pembayaran</div>
                </div>
            </div>
            <div class="dashboard-card hover:scale-[1.02] transition-all duration-300 shadow-xl hover:shadow-2xl" data-aos="fade-up" data-aos-delay="200">
                <div class="card-body text-center">
                    <div class="stat-value text-green-600 mb-2">{{ \App\Models\Payment::where('status', 'completed')->count() }}</div>
                    <div class="stat-label">Berhasil</div>
                </div>
            </div>
            <div class="dashboard-card hover:scale-[1.02] transition-all duration-300 shadow-xl hover:shadow-2xl" data-aos="fade-up" data-aos-delay="300">
                <div class="card-body text-center">
                    <div class="stat-value text-yellow-600 mb-2">{{ \App\Models\Payment::where('status', 'pending')->count() }}</div>
                    <div class="stat-label">Menunggu</div>
                </div>
            </div>
            <div class="dashboard-card hover:scale-[1.02] transition-all duration-300 shadow-xl hover:shadow-2xl" data-aos="fade-up" data-aos-delay="400">
                <div class="card-body text-center">
                    <div class="stat-value text-purple-600 mb-2">Rp {{ number_format(\App\Models\Payment::where('status', 'completed')->sum('amount')) }}</div>
                    <div class="stat-label">Total Pendapatan</div>
                </div>
            </div>
        </div>

        <!-- Recent Check-ins & Check-outs with Payment Status -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
            <!-- Recent Check-ins -->
            <div class="modern-card hover:scale-[1.02] transition-all duration-300 shadow-xl hover:shadow-2xl" data-aos="fade-up" data-aos-delay="500">
                <div class="card-body p-0">
                    <div class="p-6 pb-0">
                        <h3 class="text-lg font-bold gradient-text leading-tight tracking-wide mb-4">Check-in Hari Ini</h3>
                    </div>
                    <div class="px-6 pb-6">
                        <div class="space-y-3">
                            @forelse(\App\Models\Reservation::with(['user', 'room.roomType', 'payments'])->where('status', 'checked_in')->whereDate('check_in_date', today())->latest()->take(5)->get() as $reservation)
                            <div class="flex items-center justify-between p-3 bg-gradient-to-r from-green-50 to-white rounded-lg border border-green-200">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-sm admin-text-dark">{{ $reservation->user->name }}</p>
                                        <p class="text-xs text-medium-contrast">{{ $reservation->room->roomType->name ?? 'N/A' }} - {{ $reservation->room->room_number }}</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    @if($reservation->payments->where('status', 'completed')->count() > 0)
                                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Lunas</span>
                                    @else
                                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">Belum Bayar</span>
                                    @endif
                                </div>
                            </div>
                            @empty
                            <div class="text-center py-4">
                                <p class="text-medium-contrast text-sm">Belum ada check-in hari ini</p>
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Check-outs -->
            <div class="modern-card hover:scale-[1.02] transition-all duration-300 shadow-xl hover:shadow-2xl" data-aos="fade-up" data-aos-delay="600">
                <div class="card-body p-0">
                    <div class="p-6 pb-0">
                        <h3 class="text-lg font-bold gradient-text leading-tight tracking-wide mb-4">Check-out Hari Ini</h3>
                    </div>
                    <div class="px-6 pb-6">
                        <div class="space-y-3">
                            @forelse(\App\Models\Reservation::with(['user', 'room.roomType', 'payments'])->where('status', 'checked_out')->whereDate('check_out_date', today())->latest()->take(5)->get() as $reservation)
                            <div class="flex items-center justify-between p-3 bg-gradient-to-r from-orange-50 to-white rounded-lg border border-orange-200">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-orange-500 rounded-full flex items-center justify-center">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-sm admin-text-dark">{{ $reservation->user->name }}</p>
                                        <p class="text-xs text-medium-contrast">{{ $reservation->room->roomType->name ?? 'N/A' }} - {{ $reservation->room->room_number }}</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    @if($reservation->payments->where('status', 'completed')->count() > 0)
                                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Lunas</span>
                                    @else
                                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">Belum Lunas</span>
                                    @endif
                                </div>
                            </div>
                            @empty
                            <div class="text-center py-4">
                                <p class="text-medium-contrast text-sm">Belum ada check-out hari ini</p>
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Payments Table -->
        <div class="modern-card hover:scale-[1.02] transition-all duration-300 shadow-xl hover:shadow-2xl" data-aos="fade-up" data-aos-delay="500">
            <div class="card-body p-0">
                <div class="overflow-x-auto">
                    <table class="table table-zebra w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">ID Pembayaran</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Reservasi</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Tamu</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Jumlah</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Metode</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Tanggal</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <!-- Table Body -->
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($payments as $payment)
                            <tr class="hover:bg-gray-50 transition-colors duration-200">
                                <!-- Payment ID -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">#{{ $payment->id }}</div>
                                </td>
                                <!-- Reservation Code -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $payment->reservation->reservation_code ?? 'N/A' }}</div>
                                </td>
                                <!-- Guest Info -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $payment->reservation->user->name ?? 'N/A' }}</div>
                                    <div class="text-xs text-gray-500">{{ $payment->reservation->user->email ?? '' }}</div>
                                </td>
                                <!-- Amount -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">Rp {{ number_format($payment->amount) }}</div>
                                </td>
                                <!-- Payment Method -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ ucfirst($payment->payment_method ?? 'N/A') }}</div>
                                </td>
                                <!-- Status Badge -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full
                                        @if($payment->status == 'completed') bg-green-100 text-green-800
                                        @elseif($payment->status == 'pending') bg-yellow-100 text-yellow-800
                                        @elseif($payment->status == 'failed') bg-red-100 text-red-800
                                        @else bg-gray-100 text-gray-800
                                        @endif">
                                        {{ ucfirst($payment->status) }}
                                    </span>
                                </td>
                                <!-- Date -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $payment->created_at ? $payment->created_at->format('d/m/Y H:i') : 'N/A' }}</div>
                                </td>
                                <!-- Actions -->
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex space-x-2">
                                        <!-- View Button -->
                                        <a href="{{ route('admin.payments.show', $payment) }}" class="text-blue-600 hover:text-blue-900 transition-colors duration-200">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                        </a>
                                        <!-- Mark as Completed (for pending payments) -->
                                        @if($payment->status == 'pending')
                                        <form method="POST" action="{{ route('admin.payments.update', $payment) }}" class="inline">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="completed">
                                            <button type="submit" class="text-green-600 hover:text-green-900 transition-colors duration-200" title="Tandai sebagai berhasil">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </button>
                                        </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <!-- Empty State -->
                            <tr>
                                <td colspan="8" class="px-6 py-12 text-center">
                                    <div class="text-gray-500">
                                        <svg class="w-12 h-12 mx-auto mb-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                        </svg>
                                        <p class="text-lg font-medium">Belum ada pembayaran</p>
                                        <p class="text-sm">Transaksi pembayaran tamu akan muncul di sini.</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        @if($payments->hasPages())
        <div class="mt-8">
            {{ $payments->links() }}
        </div>
        @endif
    </div>
</div>
@endsection