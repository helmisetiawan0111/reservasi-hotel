<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roomTypes = RoomType::with(['rooms', 'facilities'])->get();
        return view('admin.room-types.index', compact('roomTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $facilities = \App\Models\Facility::all();
        return view('admin.room-types.create', compact('facilities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'capacity' => 'required|integer|min:1|max:10',
            'base_price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'facilities' => 'nullable|array',
            'facilities.*' => 'exists:facilities,id',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('room-types', 'public');
        }

        $roomType = RoomType::create([
            'name' => $request->name,
            'description' => $request->description,
            'capacity' => $request->capacity,
            'base_price' => $request->base_price,
            'image' => $imagePath,
        ]);

        if ($request->facilities) {
            $roomType->facilities()->attach($request->facilities);
        }

        return redirect()->route('admin.room-types.index')
                        ->with('success', 'Tipe kamar berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $roomType = RoomType::with(['rooms', 'facilities'])->findOrFail($id);
        return view('admin.room-types.show', compact('roomType'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $roomType = RoomType::with('facilities')->findOrFail($id);
        $facilities = \App\Models\Facility::all();
        return view('admin.room-types.edit', compact('roomType', 'facilities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $roomType = RoomType::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'capacity' => 'required|integer|min:1|max:10',
            'base_price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'facilities' => 'nullable|array',
            'facilities.*' => 'exists:facilities,id',
        ]);

        $imagePath = $roomType->image;

        // Handle image deletion
        if ($request->input('delete_image') == '1') {
            if ($imagePath && \Storage::disk('public')->exists($imagePath)) {
                \Storage::disk('public')->delete($imagePath);
            }
            $imagePath = null;
        }

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($imagePath && \Storage::disk('public')->exists($imagePath)) {
                \Storage::disk('public')->delete($imagePath);
            }
            $imagePath = $request->file('image')->store('room-types', 'public');
        }

        $roomType->update([
            'name' => $request->name,
            'description' => $request->description,
            'capacity' => $request->capacity,
            'base_price' => $request->base_price,
            'image' => $imagePath,
        ]);

        $roomType->facilities()->sync($request->facilities ?? []);

        return redirect()->route('admin.room-types.index')
                        ->with('success', 'Tipe kamar berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $roomType = RoomType::findOrFail($id);

        // Delete image if exists
        if ($roomType->image && \Storage::disk('public')->exists($roomType->image)) {
            \Storage::disk('public')->delete($roomType->image);
        }

        // Detach facilities
        $roomType->facilities()->detach();

        $roomType->delete();

        return redirect()->route('admin.room-types.index')
                        ->with('success', 'Tipe kamar berhasil dihapus!');
    }
}
