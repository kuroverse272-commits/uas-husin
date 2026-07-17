<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Room;
use App\Models\Facility;
use App\Models\Testimonial;
use App\Models\Gallery;

class PageController extends Controller
{
    public function home()
    {
        $rooms = Room::where('status', 'available')->take(3)->get();
        $facilities = Facility::all();
        $testimonials = Testimonial::all();
        $galleries = Gallery::take(4)->get();
        
        return view('home', compact('rooms', 'facilities', 'testimonials', 'galleries'));
    }

    public function kamar(Request $request)
    {
        $query = Room::query();

        // Search by name
        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Filter by type
        if ($request->has('type') && $request->type != '') {
            $query->where('type', $request->type);
        }

        // Filter by capacity
        if ($request->has('capacity') && $request->capacity != '') {
            $query->where('capacity', '>=', $request->capacity);
        }

        // Filter by price range
        if ($request->has('min_price') && $request->min_price != '') {
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->has('max_price') && $request->max_price != '') {
            $query->where('price', '<=', $request->max_price);
        }

        $rooms = $query->paginate(6);
        return view('kamar', compact('rooms'));
    }

    public function galeri()
    {
        $galleries = Gallery::all();
        return view('galeri', compact('galleries'));
    }

    public function tentang()
    {
        $facilities = Facility::all();
        return view('tentang', compact('facilities'));
    }

    public function kontak()
    {
        return view('kontak');
    }

    public function kontakSend(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Simulasikan pengiriman pesan berhasil
        return redirect()->back()->with('success', 'Pesan Anda berhasil dikirim! Staf kami akan segera menghubungi Anda melalui email.');
    }

    public function booking(Request $request)
    {
        $selected_room_id = $request->query('room_id');
        $rooms = Room::where('status', 'available')->get();
        return view('booking', compact('rooms', 'selected_room_id'));
    }
}
