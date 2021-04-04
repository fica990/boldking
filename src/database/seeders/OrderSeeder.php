<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            'customer_id' => 2,
            'subscription_id' => 1,
            'status' => Order::STATUS_FAILED,
            'total' => 50,
            'paid_date' => '2018-12-15',
        ]);

        DB::table('orders')->insert([
            'customer_id' => 1,
            'subscription_id' => NULL,
            'status' => Order::STATUS_PAID,
            'total' => 100,
            'paid_date' => '2019-01-03',
        ]);

        DB::table('orders')->insert([
            'customer_id' => 3,
            'subscription_id' => 2,
            'status' => Order::STATUS_PAID,
            'total' => 10,
            'paid_date' => '2019-02-11',
        ]);

        DB::table('orders')->insert([
            'customer_id' => 2,
            'subscription_id' => NULL,
            'status' => Order::STATUS_PAID,
            'total' => 20,
            'paid_date' => '2019-03-04',
        ]);

        DB::table('orders')->insert([
            'customer_id' => 4,
            'subscription_id' => 3,
            'status' => Order::STATUS_CREATED,
            'total' => 20,
            'paid_date' => '2019-03-06',
        ]);
    }
}
