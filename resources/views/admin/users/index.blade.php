@extends('layouts.app')

@section('title', 'Kelola Pengguna - Admin Dashboard')

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
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-3xl lg:text-4xl font-bold gradient-text leading-tight tracking-wide">Kelola Pengguna</h1>
                            <p class="text-medium-contrast text-lg mt-1">Kelola semua pengguna sistem hotel</p>
                        </div>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <a href="{{ route('admin.dashboard') }}" class="group relative inline-flex items-center px-6 py-3 text-sm font-semibold text-gray-700 bg-gradient-to-r from-gray-100 to-gray-200 rounded-xl hover:from-gray-200 hover:to-gray-300 transition-all duration-300 hover:scale-105 hover:shadow-lg border-2 border-gray-300 hover:border-gray-400">
                        <svg class="w-4 h-4 mr-2 text-gray-600 group-hover:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Kembali ke Dashboard
                        <div class="absolute inset-0 rounded-xl bg-gradient-to-r from-gray-200/20 to-gray-300/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </a>
                    <a href="{{ route('admin.users.create') }}" class="group relative inline-flex items-center px-8 py-3 text-base font-bold text-white bg-gradient-to-r from-green-500 to-green-600 rounded-xl hover:from-green-600 hover:to-green-700 transition-all duration-300 hover:scale-105 hover:shadow-xl shadow-green-500/25 border-2 border-green-500">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Tambah Pengguna
                        <div class="absolute inset-0 rounded-xl bg-gradient-to-r from-white/20 to-white/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="absolute -inset-1 rounded-xl bg-gradient-to-r from-green-400 to-green-500 opacity-0 group-hover:opacity-50 blur transition-opacity duration-300 -z-10"></div>
                    </a>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 grid-spacing mb-6">
            <div class="col-span-full mb-4">
                <h2 class="text-2xl font-bold gradient-text text-center" data-aos="fade-up" data-aos-delay="50">Ringkasan Pengguna</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-primary to-accent mx-auto mt-2 rounded-full"></div>
            </div>
            <div class="dashboard-card hover:scale-[1.02] transition-all duration-300 shadow-xl hover:shadow-2xl" data-aos="fade-up" data-aos-delay="100">
                <div class="card-body text-center">
                    <div class="stat-value text-blue-600 mb-2">{{ \App\Models\User::count() }}</div>
                    <div class="stat-label">Total Pengguna</div>
                </div>
            </div>
            <div class="dashboard-card hover:scale-[1.02] transition-all duration-300 shadow-xl hover:shadow-2xl" data-aos="fade-up" data-aos-delay="200">
                <div class="card-body text-center">
                    <div class="stat-value text-green-600 mb-2">{{ \App\Models\User::role('customer')->count() }}</div>
                    <div class="stat-label">Pelanggan</div>
                </div>
            </div>
            <div class="dashboard-card hover:scale-[1.02] transition-all duration-300 shadow-xl hover:shadow-2xl" data-aos="fade-up" data-aos-delay="300">
                <div class="card-body text-center">
                    <div class="stat-value text-purple-600 mb-2">{{ \App\Models\User::role(['admin', 'super_admin'])->count() }}</div>
                    <div class="stat-label">Admin</div>
                </div>
            </div>
            <div class="dashboard-card hover:scale-[1.02] transition-all duration-300 shadow-xl hover:shadow-2xl" data-aos="fade-up" data-aos-delay="400">
                <div class="card-body text-center">
                    <div class="stat-value text-orange-600 mb-2">{{ \App\Models\User::role('receptionist')->count() }}</div>
                    <div class="stat-label">Resepsionis</div>
                </div>
            </div>
        </div>

        <!-- Admin Management Section -->
        <div class="mb-8">
            <h2 class="text-2xl font-bold gradient-text leading-tight tracking-wide mb-6">Manajemen Admin & Super Admin</h2>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Add New Admin -->
                <div class="modern-card hover:scale-[1.02] transition-all duration-300 shadow-xl hover:shadow-2xl" data-aos="fade-up" data-aos-delay="100">
                    <div class="card-body text-center">
                        <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold admin-text-dark mb-2">Tambah Admin Baru</h3>
                        <p class="text-medium-contrast text-sm mb-4">Buat akun admin atau super admin baru</p>
                        <a href="{{ route('admin.users.create') }}" class="btn-modern px-6 py-3 text-base font-semibold">
                            Tambah Admin
                        </a>
                    </div>
                </div>

                <!-- Admin List -->
                <div class="modern-card hover:scale-[1.02] transition-all duration-300 shadow-xl hover:shadow-2xl" data-aos="fade-up" data-aos-delay="200">
                    <div class="card-body">
                        <h3 class="text-lg font-bold admin-text-dark mb-4">Admin & Super Admin Aktif</h3>
                        <div class="space-y-3">
                            @foreach(\App\Models\User::role(['admin', 'super_admin'])->get() as $admin)
                            <div class="flex items-center justify-between p-3 bg-gradient-to-r from-gray-50 to-white rounded-lg border border-gray-200">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-gradient-to-br from-primary to-accent rounded-full flex items-center justify-center">
                                        <span class="text-white font-bold text-sm">{{ strtoupper(substr($admin->name, 0, 1)) }}</span>
                                    </div>
                                    <div>
                                        <p class="font-semibold admin-text-dark">{{ $admin->name }}</p>
                                        <p class="text-sm text-medium-contrast">{{ $admin->email }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-2">
                                    @if($admin->hasRole('super_admin'))
                                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">Super Admin</span>
                                    @else
                                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-purple-100 text-purple-800">Admin</span>
                                    @endif
                                    <a href="{{ route('admin.users.edit', $admin) }}" class="text-blue-600 hover:text-blue-900 transition-colors duration-200">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                            @if(\App\Models\User::role(['admin', 'super_admin'])->count() == 0)
                            <div class="text-center py-4">
                                <p class="text-medium-contrast">Belum ada admin yang terdaftar</p>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Users Table -->
        <div class="modern-card hover:scale-[1.02] transition-all duration-300 shadow-xl hover:shadow-2xl" data-aos="fade-up" data-aos-delay="300">
            <div class="card-body p-0">
                <div class="overflow-x-auto">
                    <table class="table table-zebra w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Nama</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Email</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Role</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Bergabung</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <!-- Table Body -->
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse(\App\Models\User::with('roles')->get() as $user)
                            <tr class="hover:bg-gray-50 transition-colors duration-200">
                                <!-- User Name & Avatar -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 bg-gradient-to-br from-primary to-accent rounded-full flex items-center justify-center text-white font-bold text-sm mr-3">
                                            {{ strtoupper(substr($user->name, 0, 1)) }}
                                        </div>
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">{{ $user->name }}</div>
                                        </div>
                                    </div>
                                </td>
                                <!-- Email -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $user->email }}</div>
                                </td>
                                <!-- Roles -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($user->roles->count() > 0)
                                        @foreach($user->roles as $role)
                                            <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full mr-1
                                                @if($role->name == 'super_admin') bg-red-100 text-red-800
                                                @elseif($role->name == 'admin') bg-purple-100 text-purple-800
                                                @elseif($role->name == 'receptionist') bg-orange-100 text-orange-800
                                                @else bg-blue-100 text-blue-800
                                                @endif">
                                                {{ ucfirst(str_replace('_', ' ', $role->name)) }}
                                            </span>
                                        @endforeach
                                    @else
                                        <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-800">
                                            Tidak ada role
                                        </span>
                                    @endif
                                </td>
                                <!-- Verification Status -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full
                                        @if($user->email_verified_at) bg-green-100 text-green-800
                                        @else bg-yellow-100 text-yellow-800
                                        @endif">
                                        {{ $user->email_verified_at ? 'Terverifikasi' : 'Belum Verifikasi' }}
                                    </span>
                                </td>
                                <!-- Join Date -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $user->created_at ? $user->created_at->format('d/m/Y') : 'N/A' }}</div>
                                </td>
                                <!-- Actions -->
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex space-x-2">
                                        <!-- View Button -->
                                        <a href="{{ route('admin.users.show', $user) }}" class="text-blue-600 hover:text-blue-900 transition-colors duration-200" title="Lihat Detail">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                        </a>
                                        <!-- Edit Button -->
                                        <a href="{{ route('admin.users.edit', $user) }}" class="text-yellow-600 hover:text-yellow-900 transition-colors duration-200" title="Edit User">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg>
                                        </a>
                                        <!-- Delete Button (not for current user) -->
                                        @if($user->id !== auth()->id())
                                        <form method="POST" action="{{ route('admin.users.destroy', $user) }}" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900 transition-colors duration-200" title="Hapus User">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
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
                                <td colspan="6" class="px-6 py-12 text-center">
                                    <div class="text-gray-500">
                                        <svg class="w-12 h-12 mx-auto mb-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                                        </svg>
                                        <p class="text-lg font-medium">Belum ada pengguna</p>
                                        <p class="text-sm">Pengguna sistem akan muncul di sini.</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection