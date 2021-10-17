<?php

use Illuminate\Database\Seeder;
use App\User;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // categories
        //
        DB::table('permissions')->insert([
            'value' => 'Food::Categories::View',
            'role1' => true, 		// admin
            'role2' => true, 		// manager
            'role3' => true, 		// driver
            'role4' => true, 		// client
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);
        DB::table('permissions')->insert([
            'value' => 'Food::Categories::Create',
            'role1' => true, 		// admin
            'role2' => true, 		// manager
            'role3' => false, 		// driver
            'role4' => false, 		// client
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);
        DB::table('permissions')->insert([
            'value' => 'Food::Categories::Edit',
            'role1' => true, 		// admin
            'role2' => true, 		// manager
            'role3' => false, 		// driver
            'role4' => false, 		// client
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);
        DB::table('permissions')->insert([
            'value' => 'Food::Categories::Delete',
            'role1' => true, 		// admin
            'role2' => true, 		// manager
            'role3' => false, 		// driver
            'role4' => false, 		// client
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);

        //
        // foods
        //
        DB::table('permissions')->insert([
            'value' => 'Food::Food::View',
            'role1' => true, 		// admin
            'role2' => true, 		// manager
            'role3' => true, 		// driver
            'role4' => true, 		// client
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);
        DB::table('permissions')->insert([
            'value' => 'Food::Food::Create',
            'role1' => true, 		// admin
            'role2' => true, 		// manager
            'role3' => false, 		// driver
            'role4' => false, 		// client
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);
        DB::table('permissions')->insert([
            'value' => 'Food::Food::Edit',
            'role1' => true, 		// admin
            'role2' => true, 		// manager
            'role3' => false, 		// driver
            'role4' => false, 		// client
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);
        DB::table('permissions')->insert([
            'value' => 'Food::Food::Delete',
            'role1' => true, 		// admin
            'role2' => true, 		// manager
            'role3' => false, 		// driver
            'role4' => false, 		// client
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);

        //
        // Extras Group
        //
        DB::table('permissions')->insert([
            'value' => 'Food::ExtrasGroup::View',
            'role1' => true, 		// admin
            'role2' => true, 		// manager
            'role3' => true, 		// driver
            'role4' => true, 		// client
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);
        DB::table('permissions')->insert([
            'value' => 'Food::ExtrasGroup::Create',
            'role1' => true, 		// admin
            'role2' => true, 		// manager
            'role3' => false, 		// driver
            'role4' => false, 		// client
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);
        DB::table('permissions')->insert([
            'value' => 'Food::ExtrasGroup::Edit',
            'role1' => true, 		// admin
            'role2' => true, 		// manager
            'role3' => false, 		// driver
            'role4' => false, 		// client
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);
        DB::table('permissions')->insert([
            'value' => 'Food::ExtrasGroup::Delete',
            'role1' => true, 		// admin
            'role2' => true, 		// manager
            'role3' => false, 		// driver
            'role4' => false, 		// client
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);

        //
        // Extras
        //
        DB::table('permissions')->insert([
            'value' => 'Food::Extras::View',            // not implement
            'role1' => true, 		// admin
            'role2' => true, 		// manager
            'role3' => true, 		// driver
            'role4' => true, 		// client
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);
        DB::table('permissions')->insert([
            'value' => 'Food::Extras::Create',
            'role1' => true, 		// admin
            'role2' => true, 		// manager
            'role3' => false, 		// driver
            'role4' => false, 		// client
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);
        DB::table('permissions')->insert([
            'value' => 'Food::Extras::Edit',
            'role1' => true, 		// admin
            'role2' => true, 		// manager
            'role3' => false, 		// driver
            'role4' => false, 		// client
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);
        DB::table('permissions')->insert([
            'value' => 'Food::Extras::Delete',
            'role1' => true, 		// admin
            'role2' => true, 		// manager
            'role3' => false, 		// driver
            'role4' => false, 		// client
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);

        //
        // NutritionGroup
        //
        DB::table('permissions')->insert([
            'value' => 'Food::NutritionGroup::View',
            'role1' => true, 		// admin
            'role2' => true, 		// manager
            'role3' => true, 		// driver
            'role4' => true, 		// client
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);
        DB::table('permissions')->insert([
            'value' => 'Food::NutritionGroup::Create',
            'role1' => true, 		// admin
            'role2' => true, 		// manager
            'role3' => false, 		// driver
            'role4' => false, 		// client
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);
        DB::table('permissions')->insert([
            'value' => 'Food::NutritionGroup::Edit',
            'role1' => true, 		// admin
            'role2' => true, 		// manager
            'role3' => false, 		// driver
            'role4' => false, 		// client
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);
        DB::table('permissions')->insert([
            'value' => 'Food::NutritionGroup::Delete',
            'role1' => true, 		// admin
            'role2' => true, 		// manager
            'role3' => false, 		// driver
            'role4' => false, 		// client
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);

        //
        // Nutrition
        //
        DB::table('permissions')->insert([
            'value' => 'Food::Nutrition::View',
            'role1' => true, 		// admin
            'role2' => true, 		// manager
            'role3' => true, 		// driver
            'role4' => true, 		// client
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);
        DB::table('permissions')->insert([
            'value' => 'Food::Nutrition::Create',
            'role1' => true, 		// admin
            'role2' => true, 		// manager
            'role3' => false, 		// driver
            'role4' => false, 		// client
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);
        DB::table('permissions')->insert([
            'value' => 'Food::Nutrition::Edit',
            'role1' => true, 		// admin
            'role2' => true, 		// manager
            'role3' => false, 		// driver
            'role4' => false, 		// client
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);
        DB::table('permissions')->insert([
            'value' => 'Food::Nutrition::Delete',
            'role1' => true, 		// admin
            'role2' => true, 		// manager
            'role3' => false, 		// driver
            'role4' => false, 		// client
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);

        //
        // Food Reviews
        //
        DB::table('permissions')->insert([
            'value' => 'Food::Reviews::View',
            'role1' => true, 		// admin
            'role2' => true, 		// manager
            'role3' => true, 		// driver
            'role4' => true, 		// client
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);
        DB::table('permissions')->insert([
            'value' => 'Food::Reviews::Create',
            'role1' => true, 		// admin
            'role2' => true, 		// manager
            'role3' => false, 		// driver
            'role4' => false, 		// client
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);
        DB::table('permissions')->insert([
            'value' => 'Food::Reviews::Edit',
            'role1' => true, 		// admin
            'role2' => true, 		// manager
            'role3' => false, 		// driver
            'role4' => false, 		// client
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);
        DB::table('permissions')->insert([
            'value' => 'Food::Reviews::Delete',
            'role1' => true, 		// admin
            'role2' => true, 		// manager
            'role3' => false, 		// driver
            'role4' => false, 		// client
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);

        //
        // Restaurants
        //
        DB::table('permissions')->insert([
            'value' => 'Restaurants::View',
            'role1' => true, 		// admin
            'role2' => true, 		// manager
            'role3' => true, 		// driver
            'role4' => true, 		// client
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);
        DB::table('permissions')->insert([
            'value' => 'Restaurants::Create',
            'role1' => true, 		// admin
            'role2' => true, 		// manager
            'role3' => false, 		// driver
            'role4' => false, 		// client
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);
        DB::table('permissions')->insert([
            'value' => 'Restaurants::Edit',
            'role1' => true, 		// admin
            'role2' => true, 		// manager
            'role3' => false, 		// driver
            'role4' => false, 		// client
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);
        DB::table('permissions')->insert([
            'value' => 'Restaurants::Delete',
            'role1' => true, 		// admin
            'role2' => true, 		// manager
            'role3' => false, 		// driver
            'role4' => false, 		// client
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);

        //
        // Restaurant review
        //
        DB::table('permissions')->insert([
            'value' => 'RestaurantReview::View',
            'role1' => true, 		// admin
            'role2' => true, 		// manager
            'role3' => true, 		// driver
            'role4' => true, 		// client
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);
        DB::table('permissions')->insert([
            'value' => 'RestaurantReview::Create',
            'role1' => true, 		// admin
            'role2' => true, 		// manager
            'role3' => false, 		// driver
            'role4' => false, 		// client
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);
        DB::table('permissions')->insert([
            'value' => 'RestaurantReview::Edit',
            'role1' => true, 		// admin
            'role2' => true, 		// manager
            'role3' => false, 		// driver
            'role4' => false, 		// client
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);
        DB::table('permissions')->insert([
            'value' => 'RestaurantReview::Delete',
            'role1' => true, 		// admin
            'role2' => true, 		// manager
            'role3' => false, 		// driver
            'role4' => false, 		// client
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);

        //
        // Users
        //
        DB::table('permissions')->insert([
            'value' => 'Users::View',
            'role1' => true, 		// admin
            'role2' => true, 		// manager
            'role3' => true, 		// driver
            'role4' => true, 		// client
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);
        DB::table('permissions')->insert([
            'value' => 'Users::Create',
            'role1' => true, 		// admin
            'role2' => true, 		// manager
            'role3' => false, 		// driver
            'role4' => false, 		// client
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);
        DB::table('permissions')->insert([
            'value' => 'Users::Edit',
            'role1' => true, 		// admin
            'role2' => true, 		// manager
            'role3' => false, 		// driver
            'role4' => false, 		// client
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);
        DB::table('permissions')->insert([
            'value' => 'Users::Delete',
            'role1' => true, 		// admin
            'role2' => false, 		// manager
            'role3' => false, 		// driver
            'role4' => false, 		// client
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);

        //
        // Orders
        //
        DB::table('permissions')->insert([
            'value' => 'Orders::View',
            'role1' => true, 		// admin
            'role2' => true, 		// manager
            'role3' => true, 		// driver
            'role4' => true, 		// client
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);
        DB::table('permissions')->insert([
            'value' => 'Orders::Edit',
            'role1' => true, 		// admin
            'role2' => true, 		// manager
            'role3' => false, 		// driver
            'role4' => false, 		// client
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);
        DB::table('permissions')->insert([
            'value' => 'Orders::Delete',
            'role1' => true, 		// admin
            'role2' => true, 		// manager
            'role3' => false, 		// driver
            'role4' => false, 		// client
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);

        //
        // Drivers
        //
        DB::table('permissions')->insert([
            'value' => 'Drivers::Edit',
            'role1' => true, 		// admin
            'role2' => true, 		// manager
            'role3' => false, 		// driver
            'role4' => false, 		// client
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);

        //
        // Faq
        //
        DB::table('permissions')->insert([
            'value' => 'Faq::View',
            'role1' => true, 		// admin
            'role2' => true, 		// manager
            'role3' => true, 		// driver
            'role4' => true, 		// client
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);
        DB::table('permissions')->insert([
            'value' => 'Faq::Create',
            'role1' => true, 		// admin
            'role2' => true, 		// manager
            'role3' => true, 		// driver
            'role4' => true, 		// client
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);
        DB::table('permissions')->insert([
            'value' => 'Faq::Edit',
            'role1' => true, 		// admin
            'role2' => true, 		// manager
            'role3' => false, 		// driver
            'role4' => false, 		// client
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);
        DB::table('permissions')->insert([
            'value' => 'Faq::Delete',
            'role1' => true, 		// admin
            'role2' => true, 		// manager
            'role3' => false, 		// driver
            'role4' => false, 		// client
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);

        //
        // MediaLibrary
        //
        DB::table('permissions')->insert([
            'value' => 'MediaLibrary::Delete',
            'role1' => true, 		// admin
            'role2' => true, 		// manager
            'role3' => false, 		// driver
            'role4' => false, 		// client
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);

        //
        // Settings
        //
        DB::table('permissions')->insert([
            'value' => 'Settings::ChangeSettings',
            'role1' => true, 		// admin
            'role2' => false, 		// manager
            'role3' => false, 		// driver
            'role4' => false, 		// client
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);
        //
        //
        //
        DB::table('permissions')->insert([
            'value' => 'Logging::View',
            'role1' => true, 		// admin
            'role2' => false, 		// manager
            'role3' => false, 		// driver
            'role4' => false, 		// client
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);

    }
}
