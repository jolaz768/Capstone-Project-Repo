<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Payment;
use App\Models\Shop;
use App\Models\User;
use App\Models\Visitor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DashboardDummySeeder extends Seeder
{
    public function run(): void
    {
        // Get or create a shop
        $shop = Shop::query()->first();
        if (! $shop) {
            $shop = Shop::create([
                'shop_name' => 'Dashboard Seeder Shop',
                'phone' => '09123456789',
                'address' => '123 Main Street, City',
                'shop_image' => 'https://c8.alamy.com/comp/BAYXW7/small-tailor-shop-india-BAYXW7.jpg',
                'shop_logo' => 'https://tse3.mm.bing.net/th/id/OIP.cgR72x_ijdsCLHWBr9DPVQHaHa?r=0&cb=thfc1&rs=1&pid=ImgDetMain&o=7&rm=3',
                'is_active' => true,
                'user_id' => null,
                'description' => 'This is a dashboard seeder shop.',
            ]);
        }
        $shopId = $shop->id;

        // Get or create a customer user
        $customerUserId = User::query()->first()?->id;
        if (! $customerUserId) {
            $customer = User::create([
                'name' => 'Test Customer',
                'email' => 'customer@local.test',
                'password' => bcrypt('password'),
            ]);
            $customerUserId = $customer->id;
        }

        $existingUserIds = User::query()->pluck('id')->toArray();

        // Clear old data
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        if (Schema::hasTable('booking_items')) DB::table('booking_items')->truncate();
        if (Schema::hasTable('bookings')) Booking::truncate();
        if (Schema::hasTable('payments')) Payment::truncate();
        if (Schema::hasTable('visitors')) Visitor::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        // Create 30 days of dummy data
        for ($daysAgo = 29; $daysAgo >= 0; $daysAgo--) {
            $date = Carbon::now()->subDays($daysAgo);

            for ($j = 0; $j < rand(2, 6); $j++) {
    $amount = rand(300, 2500);

    // --- Fixed status distribution ---
    $rand = rand(1, 100);
    if ($rand <= 40) {
        $status = 'pending';
    } elseif ($rand <= 70) {
        $status = 'approved';
    } elseif ($rand <= 80) {
        $status = 'rejected';
    } elseif ($rand <= 90) {
        $status = 'cancelled';
    } elseif ($rand <= 95) {
        $status = 'processing';
    } else {
        $status = 'completed';
    }

    $booking = Booking::create([
        'shop_id' => $shopId,
        'user_id' => $customerUserId,
        'status' => $status,
        'booking_date' => $date->toDateString(),
        'total_price' => $amount,
        'created_at' => $date->copy()->addHours(rand(8, 20)),
        'updated_at' => $date->copy()->addHours(rand(8, 20)),
    ]);

    // Create payment only for approved or completed bookings
    if (in_array($status, ['approved', 'completed'])) {
        Payment::create([
            'booking_id' => $booking->id,
            'amount' => $amount,
            'status' => 'completed',
            'paid_at' => $date->copy()->addHours(rand(8, 20)),
            'created_at' => $date,
            'updated_at' => $date,
            'user_id' => 3

        ]);
    }
}

            // Visitors (unchanged)
            if (Schema::hasTable('visitors')) {
                for ($v = 0; $v < rand(5, 20); $v++) {
                    Visitor::create([
                        'shop_id' => $shopId,
                        'user_id' => !empty($existingUserIds) ? $existingUserIds[array_rand($existingUserIds)] : null,
                        'visited_at' => $date->copy()->addHours(rand(8, 22)),
                        'created_at' => $date,
                        'updated_at' => $date,
                    ]);
                }
            }
        }
    }
}
