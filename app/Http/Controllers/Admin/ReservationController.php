<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = \App\Models\Reservation::with(['user', 'room.roomType'])->latest()->paginate(15);
        return view('admin.reservations.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = \App\Models\User::where('role', 'customer')->get();
        $rooms = \App\Models\Room::with('roomType')->where('status', 'available')->get();
        $selectedRoom = null;
        if (request('room_id')) {
            $selectedRoom = \App\Models\Room::with('roomType')->find(request('room_id'));
        }
        return view('admin.reservations.create', compact('users', 'rooms', 'selectedRoom'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'room_id' => 'required|exists:rooms,id',
            'check_in_date' => 'required|date|after:today',
            'check_out_date' => 'required|date|after:check_in_date',
            'total_guests' => 'required|integer|min:1|max:10',
            'special_requests' => 'nullable|string|max:1000',
        ]);

        $room = \App\Models\Room::with('roomType')->find($request->room_id);
        $nights = \Carbon\Carbon::parse($request->check_in_date)->diffInDays(\Carbon\Carbon::parse($request->check_out_date));
        $totalPrice = $nights * $room->roomType->base_price;

        $reservation = \App\Models\Reservation::create([
            'reservation_code' => 'RES-' . strtoupper(uniqid()),
            'user_id' => $request->user_id,
            'room_id' => $request->room_id,
            'check_in_date' => $request->check_in_date,
            'check_out_date' => $request->check_out_date,
            'total_guests' => $request->total_guests,
            'total_price' => $totalPrice,
            'status' => 'confirmed',
            'special_requests' => $request->special_requests,
        ]);

        return redirect()->route('admin.reservations.show', $reservation)->with('success', 'Reservasi berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $reservation = \App\Models\Reservation::with(['user', 'room.roomType', 'guests', 'payments'])->findOrFail($id);
        return view('admin.reservations.show', compact('reservation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $reservation = \App\Models\Reservation::with(['user', 'room.roomType'])->findOrFail($id);
        $users = \App\Models\User::where('role', 'customer')->get();
        $rooms = \App\Models\Room::with('roomType')->where('status', 'available')->orWhere('id', $reservation->room_id)->get();
        return view('admin.reservations.edit', compact('reservation', 'users', 'rooms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'room_id' => 'required|exists:rooms,id',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after:check_in_date',
            'total_guests' => 'required|integer|min:1|max:10',
            'status' => 'required|in:pending,confirmed,checked_in,checked_out,cancelled',
            'special_requests' => 'nullable|string|max:1000',
        ]);

        $reservation = \App\Models\Reservation::findOrFail($id);
        $room = \App\Models\Room::with('roomType')->find($request->room_id);
        $nights = \Carbon\Carbon::parse($request->check_in_date)->diffInDays(\Carbon\Carbon::parse($request->check_out_date));
        $totalPrice = $nights * $room->roomType->base_price;

        $reservation->update([
            'user_id' => $request->user_id,
            'room_id' => $request->room_id,
            'check_in_date' => $request->check_in_date,
            'check_out_date' => $request->check_out_date,
            'total_guests' => $request->total_guests,
            'total_price' => $totalPrice,
            'status' => $request->status,
            'special_requests' => $request->special_requests,
        ]);

        return redirect()->route('admin.reservations.show', $reservation)->with('success', 'Reservasi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
