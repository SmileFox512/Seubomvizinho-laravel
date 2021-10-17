<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'role' => "Admin",
            'default' => 'false',
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);
        DB::table('roles')->insert([
            'role' => "Manager",
            'default' => 'false',
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);
        DB::table('roles')->insert([
            'role' => "Driver",
            'default' => 'false',
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);
        DB::table('roles')->insert([
            'role' => "Client",
            'default' => 'true',
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);
    }
}
