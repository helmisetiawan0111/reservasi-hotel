<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\RoomType;
use App\Models\Review;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $roomTypes = RoomType::with(['photos', 'facilities'])->take(6)->get();
        $reviews = Review::with('user')->where('is_approved', true)->latest()->take(3)->get();

        return view('customer.home', compact('roomTypes', 'reviews'));
    }
}
