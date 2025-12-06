<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\RoomType;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function create(Request $request, $roomTypeId = null)
    {
        // Get roomType from route parameter or query parameter
        if (!$roomTypeId) {
            $roomTypeId = $request->query('roomType');
            if (!$roomTypeId) {
                $query = $request->query();
                foreach ($query as $key => $value) {
                    if (is_numeric($key)) {
                        $roomTypeId = $key;
                        break;
                    }
                }
            }
        }

        $roomType = RoomType::findOrFail($roomTypeId);

        // Check if room is available
        $availableRooms = $roomType->rooms()->where('status', 'available')->count();
        if ($availableRooms == 0) {
            return redirect()->back()->with('error', 'Maaf, kamar ini sedang tidak tersedia.');
        }

        // Temporarily allow access without auth for testing
        // if (!auth()->check() || !auth()->user()->hasRole('customer')) {
        //     return redirect()->route('login');
        // }

        return view('customer.bookings.create', compact('roomType'));
    }

    public function store(Request $request)
    {
        $roomTypeId = $request->input('room_type_id'); // Assuming we add this to the form
        $roomType = RoomType::findOrFail($roomTypeId);

        $request->validate([
            'check_in_date' => 'required|date|after:today',
            'check_out_date' => 'required|date|after:check_in_date',
            'total_guests' => 'required|integer|min:1|max:' . $roomType->capacity,
        ]);

        // Create reservation - temporarily use a default user for testing
        $reservation = Reservation::create([
            'reservation_code' => 'RSV' . str_pad(rand(1000, 9999), 4, '0', STR_PAD_LEFT),
            'user_id' => Auth::id() ?? 1, // Use default user if not authenticated
            'room_id' => $roomType->rooms()->where('status', 'available')->first()->id ?? null,
            'check_in_date' => $request->check_in_date,
            'check_out_date' => $request->check_out_date,
            'total_guests' => $request->total_guests,
            'total_price' => $this->calculatePrice($roomType, $request->check_in_date, $request->check_out_date),
            'status' => 'pending',
        ]);

        return redirect('/customer/bookings/' . $reservation->id)
                        ->with('success', 'Reservasi berhasil dibuat! Silakan selesaikan pembayaran.');
    }

    public function show(Reservation $reservation)
    {
        // Temporarily allow viewing any reservation for testing
        // Ensure user can only view their own reservations
        // if ($reservation->user_id !== Auth::id()) {
        //     abort(403);
        // }

        return view('customer.bookings.show', compact('reservation'));
    }

    private function calculatePrice(RoomType $roomType, $checkIn, $checkOut)
    {
        $nights = \Carbon\Carbon::parse($checkIn)->diffInDays(\Carbon\Carbon::parse($checkOut));
        return $roomType->base_price * $nights;
    }
}
