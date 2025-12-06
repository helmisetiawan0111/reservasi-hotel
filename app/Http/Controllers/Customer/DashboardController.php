<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // Get user's recent reservations
        $recentReservations = $user->reservations()
            ->with(['room.roomType'])
            ->latest()
            ->take(5)
            ->get();

        // Stats
        $totalBookings = $user->reservations()->count();
        $activeBookings = $user->reservations()->whereIn('status', ['confirmed', 'checked_in'])->count();
        $completedBookings = $user->reservations()->where('status', 'checked_out')->count();

        return view('customer.dashboard', compact(
            'recentReservations',
            'totalBookings',
            'activeBookings',
            'completedBookings'
        ));
    }
}
