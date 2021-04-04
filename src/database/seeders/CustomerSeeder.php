<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Subscription;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            'name' => 'Bruce Wayne',
            'email' => 'bruce@boldking.com',
            'active' => 1,
        ]);

        DB::table('customers')->insert([
            'name' => 'Diana Prince',
            'email' => 'diana@boldking.com',
            'active' => 1,
        ]);

        DB::table('customers')->insert([
            'name' => 'Tony Stark',
            'email' => 'tony@boldking.com',
            'active' => 1,
        ]);

        DB::table('customers')->insert([
            'name' => 'Peter Parker',
            'email' => 'peter@boldking.com',
            'active' => 1,
        ]);
    }
}
