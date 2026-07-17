<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Room;
use App\Models\Booking;
use App\Models\Facility;
use App\Models\Gallery;
use App\Models\Testimonial;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalRooms = Room::count();
        $totalBookings = Booking::count();
        $bookingsToday = Booking::whereDate('created_at', Carbon::today())->count();
        $revenue = Booking::where('status', '!=', 'Cancelled')->sum('total_price');

        $recentBookings = Booking::with('room')->latest()->take(5)->get();

        return view('admin.dashboard', compact('totalRooms', 'totalBookings', 'bookingsToday', 'revenue', 'recentBookings'));
    }

    // ROOMS CRUD
    public function rooms()
    {
        $rooms = Room::latest()->paginate(10);
        return view('admin.rooms.index', compact('rooms'));
    }

    public function roomsStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'capacity' => 'required|integer|min:1',
            'status' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/rooms'), $imageName);
            $validated['image'] = 'uploads/rooms/' . $imageName;
        }

        Room::create($validated);

        return redirect()->back()->with('success', 'Kamar berhasil ditambahkan!');
    }

    public function roomsUpdate(Request $request, $id)
    {
        $room = Room::findOrFail($id);
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'capacity' => 'required|integer|min:1',
            'status' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($room->image && file_exists(public_path($room->image))) {
                @unlink(public_path($room->image));
            }
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/rooms'), $imageName);
            $validated['image'] = 'uploads/rooms/' . $imageName;
        }

        $room->update($validated);

        return redirect()->back()->with('success', 'Kamar berhasil diperbarui!');
    }

    public function roomsDestroy($id)
    {
        $room = Room::findOrFail($id);
        if ($room->image && file_exists(public_path($room->image))) {
            @unlink(public_path($room->image));
        }
        $room->delete();

        return redirect()->back()->with('success', 'Kamar berhasil dihapus!');
    }

    // BOOKINGS MANAGE
    public function bookings()
    {
        $bookings = Booking::with('room')->latest()->paginate(15);
        return view('admin.bookings.index', compact('bookings'));
    }

    public function bookingsUpdateStatus(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $request->validate([
            'status' => 'required|in:Pending,Confirmed,Check In,Check Out,Cancelled'
        ]);

        $booking->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Status booking berhasil diperbarui!');
    }

    public function bookingsDestroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->back()->with('success', 'Booking berhasil dihapus!');
    }

    // FACILITIES CRUD
    public function facilities()
    {
        $facilities = Facility::latest()->paginate(10);
        return view('admin.facilities.index', compact('facilities'));
    }

    public function facilitiesStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'required|string|max:100',
            'description' => 'nullable|string',
        ]);

        Facility::create($validated);

        return redirect()->back()->with('success', 'Fasilitas berhasil ditambahkan!');
    }

    public function facilitiesUpdate(Request $request, $id)
    {
        $facility = Facility::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'required|string|max:100',
            'description' => 'nullable|string',
        ]);

        $facility->update($validated);

        return redirect()->back()->with('success', 'Fasilitas berhasil diperbarui!');
    }

    public function facilitiesDestroy($id)
    {
        $facility = Facility::findOrFail($id);
        $facility->delete();

        return redirect()->back()->with('success', 'Fasilitas berhasil dihapus!');
    }

    // GALLERIES CRUD
    public function galleries()
    {
        $galleries = Gallery::latest()->paginate(10);
        return view('admin.galleries.index', compact('galleries'));
    }

    public function galleriesStore(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads/gallery'), $imageName);
        $validated['image'] = 'uploads/gallery/' . $imageName;

        Gallery::create($validated);

        return redirect()->back()->with('success', 'Gambar galeri berhasil ditambahkan!');
    }

    public function galleriesUpdate(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($gallery->image && file_exists(public_path($gallery->image))) {
                @unlink(public_path($gallery->image));
            }
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/gallery'), $imageName);
            $validated['image'] = 'uploads/gallery/' . $imageName;
        }

        $gallery->update($validated);

        return redirect()->back()->with('success', 'Gambar galeri berhasil diperbarui!');
    }

    public function galleriesDestroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        if ($gallery->image && file_exists(public_path($gallery->image))) {
            @unlink(public_path($gallery->image));
        }
        $gallery->delete();

        return redirect()->back()->with('success', 'Gambar galeri berhasil dihapus!');
    }

    // TESTIMONIALS CRUD
    public function testimonials()
    {
        $testimonials = Testimonial::latest()->paginate(10);
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function testimonialsStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'job' => 'required|string|max:255',
            'message' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $imageName = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('uploads/testimonials'), $imageName);
            $validated['photo'] = 'uploads/testimonials/' . $imageName;
        }

        Testimonial::create($validated);

        return redirect()->back()->with('success', 'Testimoni berhasil ditambahkan!');
    }

    public function testimonialsUpdate(Request $request, $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'job' => 'required|string|max:255',
            'message' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            if ($testimonial->photo && file_exists(public_path($testimonial->photo))) {
                @unlink(public_path($testimonial->photo));
            }
            $imageName = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('uploads/testimonials'), $imageName);
            $validated['photo'] = 'uploads/testimonials/' . $imageName;
        }

        $testimonial->update($validated);

        return redirect()->back()->with('success', 'Testimoni berhasil diperbarui!');
    }

    public function testimonialsDestroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        if ($testimonial->photo && file_exists(public_path($testimonial->photo))) {
            @unlink(public_path($testimonial->photo));
        }
        $testimonial->delete();

        return redirect()->back()->with('success', 'Testimoni berhasil dihapus!');
    }
}
