<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Booking;
use App\Models\Room;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'customer_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
            'guest' => 'required|integer|min:1|max:10',
            'total_price' => 'required|numeric|min:0',
        ]);

        // Create booking
        $booking = Booking::create($validated);

        return redirect()->back()->with([
            'success' => 'Pemesanan kamar berhasil dibuat!',
            'booking_id' => $booking->id
        ]);
    }
}
