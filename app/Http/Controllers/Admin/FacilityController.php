<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $facilities = \App\Models\Facility::all();
        return view('admin.facilities.index', compact('facilities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $facility = \App\Models\Facility::findOrFail($id);
        return view('admin.facilities.show', compact('facility'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $facility = \App\Models\Facility::findOrFail($id);
        $roomTypes = \App\Models\RoomType::all();
        return view('admin.facilities.edit', compact('facility', 'roomTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:1000',
            'room_types' => 'nullable|array',
            'room_types.*' => 'exists:room_types,id',
        ]);

        $facility = \App\Models\Facility::findOrFail($id);
        $facility->update([
            'name' => $request->name,
            'icon' => $request->icon,
            'description' => $request->description,
        ]);

        // Update room type associations
        $facility->roomTypes()->sync($request->room_types ?? []);

        return redirect()->route('admin.facilities.show', $facility)->with('success', 'Fasilitas berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
