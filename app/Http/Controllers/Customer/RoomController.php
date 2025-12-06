<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index(Request $request)
    {
        $query = RoomType::with(['photos', 'facilities']);

        // Filter by capacity
        if ($request->has('capacity') && $request->capacity) {
            $query->where('capacity', '>=', $request->capacity);
        }

        // Filter by price range
        if ($request->has('min_price') && $request->min_price) {
            $query->where('base_price', '>=', $request->min_price);
        }
        if ($request->has('max_price') && $request->max_price) {
            $query->where('base_price', '<=', $request->max_price);
        }

        // Sort
        $sort = $request->get('sort', 'name');
        switch ($sort) {
            case 'price_low':
                $query->orderBy('base_price', 'asc');
                break;
            case 'price_high':
                $query->orderBy('base_price', 'desc');
                break;
            case 'capacity':
                $query->orderBy('capacity', 'asc');
                break;
            default:
                $query->orderBy('name', 'asc');
        }

        $roomTypes = $query->paginate(12);

        return view('customer.rooms.index', compact('roomTypes'));
    }

    public function show(RoomType $roomType)
    {
        $roomType->load(['photos', 'facilities', 'rooms' => function($query) {
            $query->where('status', 'available');
        }]);

        // Get available rooms for this type
        $availableRooms = $roomType->rooms->where('status', 'available');

        return view('customer.rooms.show', compact('roomType', 'availableRooms'));
    }
}
