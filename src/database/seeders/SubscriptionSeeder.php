<?php

namespace Database\Seeders;

use App\Models\Subscription;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subscriptions')->insert([
            'customer_id' => 2,
            'start_date' => '2018-08-01',
            'nextorder_date' => '2019-02-02',
            'day_iteration' => 30,
            'active' => 0,
        ]);

        DB::table('subscriptions')->insert([
            'customer_id' => 3,
            'start_date' => '2018-04-01',
            'nextorder_date' => '2019-03-21',
            'day_iteration' => 40,
            'active' => 1,
        ]);

        DB::table('subscriptions')->insert([
            'customer_id' => 4,
            'start_date' => '2019-03-06',
            'nextorder_date' => '2019-03-26',
            'day_iteration' => 20,
            'active' => 1,
        ]);
    }
}
