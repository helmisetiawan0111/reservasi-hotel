<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = \App\Models\Room::with(['roomType', 'reservations'])->paginate(15);
        return view('admin.rooms.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roomTypes = \App\Models\RoomType::all();
        $selectedRoomType = null;
        if (request('room_type')) {
            $selectedRoomType = \App\Models\RoomType::find(request('room_type'));
        }
        return view('admin.rooms.create', compact('roomTypes', 'selectedRoomType'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'room_type_id' => 'required|exists:room_types,id',
            'room_number' => 'required|string|max:255|unique:rooms,room_number',
            'floor' => 'required|integer|min:1|max:50',
            'status' => 'required|in:available,occupied,maintenance',
        ]);

        \App\Models\Room::create($request->only(['room_type_id', 'room_number', 'floor', 'status']));

        return redirect()->route('admin.rooms.index')->with('success', 'Kamar berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $room = \App\Models\Room::with(['roomType.facilities', 'reservations.user'])->findOrFail($id);
        return view('admin.rooms.show', compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $room = \App\Models\Room::with(['roomType'])->findOrFail($id);
        $roomTypes = \App\Models\RoomType::all();
        return view('admin.rooms.edit', compact('room', 'roomTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'room_type_id' => 'required|exists:room_types,id',
            'room_number' => 'required|string|max:255|unique:rooms,room_number,' . $id,
            'floor' => 'required|integer|min:1|max:50',
            'status' => 'required|in:available,occupied,maintenance',
        ]);

        $room = \App\Models\Room::findOrFail($id);
        $room->update($request->only(['room_type_id', 'room_number', 'floor', 'status']));

        return redirect()->route('admin.rooms.show', $room)->with('success', 'Kamar berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
