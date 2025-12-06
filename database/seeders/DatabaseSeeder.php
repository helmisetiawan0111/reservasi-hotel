<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Facility;
use App\Models\RoomType;
use App\Models\Room;
use App\Models\Setting;
use App\Models\Review;
use App\Models\Reservation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create roles
        Role::create(['name' => 'customer']);
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'receptionist']);
        Role::create(['name' => 'super_admin']);

        // Create super admin
        $superAdmin = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@example.com',
            'password' => Hash::make('password'),
            'role' => 'super_admin',
        ]);
        $superAdmin->assignRole('super_admin');

        // Create admin
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);
        $admin->assignRole('admin');

        // Create receptionist
        $receptionist = User::create([
            'name' => 'Receptionist',
            'email' => 'receptionist@example.com',
            'password' => Hash::make('password'),
            'role' => 'receptionist',
        ]);
        $receptionist->assignRole('receptionist');

        // Create customer
        $customer = User::create([
            'name' => 'Customer',
            'email' => 'customer@example.com',
            'password' => Hash::make('password'),
            'role' => 'customer',
        ]);
        $customer->assignRole('customer');

        // Create facilities
        $facilities = [
            ['name' => 'WiFi', 'icon' => 'wifi'],
            ['name' => 'AC', 'icon' => 'snowflake'],
            ['name' => 'Kolam Renang', 'icon' => 'swimming-pool'],
            ['name' => 'Sarapan', 'icon' => 'utensils'],
            ['name' => 'TV', 'icon' => 'tv'],
            ['name' => 'Parkir', 'icon' => 'car'],
        ];

        foreach ($facilities as $facility) {
            Facility::create($facility);
        }

        // Create room types
        $roomTypes = [
            [
                'name' => 'Standard Room',
                'description' => 'Kamar standar dengan fasilitas lengkap untuk kenyamanan Anda',
                'base_price' => 150000,
                'capacity' => 2,
                'image' => 'https://images.unsplash.com/photo-1631049307264-da0ec9d70304?w=400&h=300&fit=crop&crop=center',
            ],
            [
                'name' => 'Deluxe Room',
                'description' => 'Kamar deluxe dengan pemandangan indah dan fasilitas premium',
                'base_price' => 250000,
                'capacity' => 2,
                'image' => 'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?w=400&h=300&fit=crop&crop=center',
            ],
            [
                'name' => 'Suite Room',
                'description' => 'Kamar suite mewah untuk pengalaman terbaik dengan ruang yang luas',
                'base_price' => 500000,
                'capacity' => 4,
                'image' => 'https://images.unsplash.com/photo-1611892440504-42a792e24d32?w=400&h=300&fit=crop&crop=center',
            ],
        ];

        $createdRoomTypes = [];
        foreach ($roomTypes as $type) {
            $createdRoomTypes[] = RoomType::create($type);
        }

        // Attach facilities to room types
        $facilityIds = Facility::pluck('id')->toArray();
        foreach ($createdRoomTypes as $roomType) {
            // Attach random facilities to each room type
            $randomFacilities = collect($facilityIds)->random(rand(3, 6))->toArray();
            $roomType->facilities()->attach($randomFacilities);
        }

        // Create rooms
        $roomTypeIds = RoomType::pluck('id');
        $rooms = [];

        for ($floor = 1; $floor <= 5; $floor++) {
            for ($room = 1; $room <= 10; $room++) {
                $roomNumber = $floor . str_pad($room, 2, '0', STR_PAD_LEFT);
                $rooms[] = [
                    'room_type_id' => $roomTypeIds->random(),
                    'room_number' => $roomNumber,
                    'floor' => $floor,
                    'status' => 'available',
                ];
            }
        }

        foreach ($rooms as $room) {
            Room::create($room);
        }

        // Create sample reservations for reviews
        $rooms = Room::all();
        $sampleReservations = [];

        for ($i = 0; $i < 5; $i++) {
            $reservation = Reservation::create([
                'reservation_code' => 'RSV' . str_pad($i + 1, 4, '0', STR_PAD_LEFT),
                'user_id' => $customer->id,
                'room_id' => $rooms->random()->id,
                'check_in_date' => now()->subDays(rand(1, 30)),
                'check_out_date' => now()->subDays(rand(0, 30))->addDays(rand(1, 7)),
                'total_guests' => rand(1, 4),
                'total_price' => rand(300000, 1000000),
                'status' => 'checked_out',
                'special_requests' => 'Sample reservation for review',
            ]);
            $sampleReservations[] = $reservation;
        }

        // Create sample reviews
        $reviewComments = [
            'Hotel yang sangat bagus dengan pelayanan prima dan kamar yang nyaman. Sangat direkomendasikan!',
            'Hotel yang indah dengan fasilitas yang luar biasa. Stafnya sangat ramah dan membantu.',
            'Lokasi yang sempurna dan kamar yang mewah. Pasti akan menginap di sini lagi.',
            'Pengalaman yang luar biasa! Kamarnya bersih dan fasilitasnya sangat berkualitas.',
            'Menginap yang menyenangkan di hotel ini. Semuanya sempurna dari check-in hingga check-out.',
        ];

        foreach ($sampleReservations as $index => $reservation) {
            Review::create([
                'reservation_id' => $reservation->id,
                'user_id' => $customer->id,
                'rating' => rand(4, 5),
                'comment' => $reviewComments[$index % count($reviewComments)],
                'is_approved' => true,
            ]);
        }

        // Create settings
        $settings = [
            ['key' => 'hotel_name', 'value' => 'Grand Hotel'],
            ['key' => 'hotel_address', 'value' => 'Jl. Sudirman No. 123, Jakarta'],
            ['key' => 'hotel_phone', 'value' => '+62 21 12345678'],
            ['key' => 'hotel_email', 'value' => 'info@grandhotel.com'],
        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }
    }
}
