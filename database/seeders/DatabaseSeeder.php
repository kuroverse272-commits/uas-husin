<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin User
        User::updateOrCreate(
            ['email' => 'admin@starking.com'],
            [
                'name' => 'Admin Starking',
                'password' => Hash::make('admin123'),
            ]
        );

        // Facilities
        $facilities = [
            ['name' => 'Free Wi-Fi', 'icon' => 'fa-wifi', 'description' => 'Akses internet gratis 24 jam di seluruh area hotel.'],
            ['name' => 'Kolam Renang', 'icon' => 'fa-swimming-pool', 'description' => 'Kolam renang outdoor yang luas dan bersih untuk dewasa & anak-anak.'],
            ['name' => 'Restoran & Kafe', 'icon' => 'fa-utensils', 'description' => 'Menu lezat masakan Nusantara dan Internasional dari chef profesional.'],
            ['name' => 'Pusat Kebugaran', 'icon' => 'fa-dumbbell', 'description' => 'Peralatan gym modern untuk menjaga kebugaran tubuh Anda.'],
            ['name' => 'Spa & Pijat', 'icon' => 'fa-spa', 'description' => 'Layanan spa penenang untuk relaksasi tubuh dan pikiran.'],
        ];

        foreach ($facilities as $fac) {
            \App\Models\Facility::updateOrCreate(['name' => $fac['name']], $fac);
        }

        // Rooms
        $rooms = [
            [
                'name' => 'Standard Room',
                'type' => 'Standard',
                'description' => 'Kamar Standard yang nyaman dengan tempat tidur Queen-size, AC, TV LED, kamar mandi dengan shower panas/dingin, dan air mineral gratis.',
                'price' => 350000.00,
                'capacity' => 2,
                'image' => 'https://images.unsplash.com/photo-1611891487122-207579d67d98?auto=format&fit=crop&w=800&q=80',
                'status' => 'available'
            ],
            [
                'name' => 'Deluxe Room',
                'type' => 'Deluxe',
                'description' => 'Kamar Deluxe menawarkan ruang yang lebih luas dengan pilihan tempat tidur King-size atau Twin, pembuat kopi/teh, brankas pribadi, dan pemandangan kota yang menawan.',
                'price' => 600000.00,
                'capacity' => 2,
                'image' => 'https://images.unsplash.com/photo-1566665797739-1674de7a421a?auto=format&fit=crop&w=800&q=80',
                'status' => 'available'
            ],
            [
                'name' => 'Executive Suite',
                'type' => 'Suite',
                'description' => 'Kamar Executive Suite mewah dengan ruang tamu terpisah, tempat tidur King-size super nyaman, mini bar, bathtub, dan akses eksklusif ke lounge eksekutif.',
                'price' => 1200000.00,
                'capacity' => 4,
                'image' => 'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?auto=format&fit=crop&w=800&q=80',
                'status' => 'available'
            ],
            [
                'name' => 'Family Room',
                'type' => 'Suite',
                'description' => 'Dirancang khusus untuk keluarga besar, dilengkapi dengan dua tempat tidur besar, ruang bermain kecil untuk anak-anak, microwave, dan kulkas mini.',
                'price' => 1500000.00,
                'capacity' => 5,
                'image' => 'https://images.unsplash.com/photo-1590490360182-c33d57733427?auto=format&fit=crop&w=800&q=80',
                'status' => 'available'
            ],
        ];

        foreach ($rooms as $room) {
            \App\Models\Room::updateOrCreate(['name' => $room['name']], $room);
        }

        // Testimonials
        $testimonials = [
            [
                'name' => 'Ahmad Dani',
                'job' => 'Pengusaha',
                'message' => 'Pelayanannya sangat ramah dan cepat. Kamarnya bersih, wangi, dan fasilitas gym-nya sangat lengkap. Sangat cocok untuk perjalanan bisnis saya.',
                'photo' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=200&q=80'
            ],
            [
                'name' => 'Sarah Wijaya',
                'job' => 'Traveler',
                'message' => 'Menginap di Hotel Starking adalah pengalaman yang luar biasa! Kolam renangnya sangat bersih dan makanan restorannya sangat lezat. Pasti kembali lagi!',
                'photo' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=200&q=80'
            ],
            [
                'name' => 'Budi Santoso',
                'job' => 'Keluarga Traveler',
                'message' => 'Anak-anak sangat senang tinggal di Family Room. Luas sekali dan pelayanan kamarnya luar biasa. Terima kasih Hotel Starking!',
                'photo' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=crop&w=200&q=80'
            ],
        ];

        foreach ($testimonials as $testi) {
            \App\Models\Testimonial::updateOrCreate(['name' => $testi['name']], $testi);
        }

        // Galleries
        $galleries = [
            ['title' => 'Lobi Utama Hotel', 'image' => 'https://images.unsplash.com/photo-1564507592333-c60657eea523?auto=format&fit=crop&w=800&q=80'],
            ['title' => 'Kolam Renang Outdoor', 'image' => 'https://images.unsplash.com/photo-1576013551627-0cc20b96c2a7?auto=format&fit=crop&w=800&q=80'],
            ['title' => 'Restoran Mewah', 'image' => 'https://images.unsplash.com/photo-1550966871-3ed3cdb5ed0c?auto=format&fit=crop&w=800&q=80'],
            ['title' => 'Kamar Suite Mewah', 'image' => 'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?auto=format&fit=crop&w=800&q=80'],
            ['title' => 'Layanan Spa Relaksasi', 'image' => 'https://images.unsplash.com/photo-1540555700478-4be289fbecef?auto=format&fit=crop&w=800&q=80'],
            ['title' => 'Ruang Gym Modern', 'image' => 'https://images.unsplash.com/photo-1534438327276-14e5300c3a48?auto=format&fit=crop&w=800&q=80'],
        ];

        foreach ($galleries as $gal) {
            \App\Models\Gallery::updateOrCreate(['title' => $gal['title']], $gal);
        }
    }
}
