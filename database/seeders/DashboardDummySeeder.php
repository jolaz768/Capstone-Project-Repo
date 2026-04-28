<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Payment;
use App\Models\Shop;
use App\Models\User;
use App\Models\Visitor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class DashboardDummySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $shopId = 1; // change if needed
        $userId = 1; // change if needed

        $tenant = User::query()
            ->whereHas('roles', function ($query) {
                $query->whereIn('name', ['admin', 'super-admin']);
            })
            ->first();

        if (! $tenant) {
            $tenant = User::query()->find($userId) ?? User::query()->first();
        }

        if (! $tenant) {
            $tenant = User::create([
                'name' => 'Dashboard Seeder User',
                'email' => 'dashboard-seeder@local.test',
                'password' => bcrypt('password'),
            ]);
        }

        $shop = Shop::query()
            ->where(function ($query) use ($tenant) {
                $query->where('user_id', $tenant->id)
                    ->orWhere('tenant_id', $tenant->id);
            })
            ->first();

        if (! $shop) {
            $shop = Shop::create([
                'name' => 'Dashboard Seeder Shop',
                'slug' => Str::slug('Dashboard Seeder Shop') . '-' . time(),
                'phone' => '09123456789',
                'shop_image' => '',
                'shop_logo' => '',
                'is_active' => true,
                'user_id' => $tenant->id,
                'tenant_id' => $tenant->id,
            ]);
        }

        $shopId = $shop->id;
        $tenantId = $shop->tenant_id ?? $shop->user_id;

        if (! $tenantId || ! User::query()->whereKey($tenantId)->exists()) {
            $tenantId = $tenant->id;
        }

        $customerUserId = User::query()->whereKey($userId)->value('id') ?? $tenant->id;
        $existingUserIds = User::query()->pluck('id')->all();

        // Clear old dummy data safely when foreign keys exist.
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        if (Schema::hasTable('booking_items')) {
            DB::table('booking_items')->truncate();
        }
        if (Schema::hasTable('bookings')) {
            Booking::truncate();
        }
        if (Schema::hasTable('payments')) {
            Payment::truncate();
        }
        if (Schema::hasTable('visitors')) {
            Visitor::truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        // Create 30 days of dummy data
        for ($i = 29; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);

            // Create bookings
            for ($j = 0; $j < rand(2, 6); $j++) {
                $amount = rand(300, 2500);

                $booking = Booking::create([
                    'shop_id' => $shopId,
                    'tenant_id' => $tenantId,
                    'user_id' => $customerUserId,
                    'status' => rand(0, 10) > 2 ? 'approved' : 'pending',
                    'booking_date' => $date->toDateString(),
                    'booking_type' => rand(0, 10) > 7 ? 'offline' : 'online',
                    'total_price' => $amount,
                    'created_at' => $date->copy()->addHours(rand(8, 20)),
                    'updated_at' => $date->copy()->addHours(rand(8, 20)),
                ]);

                // Create payment only for approved bookings
                if ($booking->status === 'approved') {
                    Payment::create([
                        'booking_id' => $booking->id,
                        'amount' => $amount,
                        'status' => 'completed',
                        'paid_at' => $date->copy()->addHours(rand(8, 20)),
                        'created_at' => $date,
                        'updated_at' => $date,
                    ]);
                }
            }

            // Create visitors
            if (Schema::hasTable('visitors')) {
                for ($v = 0; $v < rand(5, 20); $v++) {
                    Visitor::create([
                        'shop_id' => $shopId,
                        'user_id' => $existingUserIds !== [] ? $existingUserIds[array_rand($existingUserIds)] : null,
                        'visited_at' => $date->copy()->addHours(rand(8, 22)),
                        'created_at' => $date,
                        'updated_at' => $date,
                    ]);
                }
            }
        }
    }
}
