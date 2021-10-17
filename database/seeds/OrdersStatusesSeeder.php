<?php

use Illuminate\Database\Seeder;

class OrdersStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orderstatuses')->insert([
            'status' => "Order Received",
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);
        DB::table('orderstatuses')->insert([
            'status' => "Preparing",
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);
        DB::table('orderstatuses')->insert([
            'status' => "Ready",
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);
        DB::table('orderstatuses')->insert([
            'status' => "On the Way",
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);
        DB::table('orderstatuses')->insert([
            'status' => "Delivered",
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);
        DB::table('orderstatuses')->insert([
            'status' => "Canceled",
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);

    }
}
