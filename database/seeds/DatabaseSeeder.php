<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(OrdersStatusesSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(CreateUsersSeeder::class);
        $this->call(PermissionsSeeder::class);

        //
        // settings
        //
        DB::table('settings')->insert(['param' => 'default_tax', 'value' => '10', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);
        DB::table('settings')->insert(['param' => 'version', 'value' => '1.4.0', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);
        DB::table('settings')->insert(['param' => 'demo_mode', 'value' => 'false', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);
        DB::table('settings')->insert(['param' => 'notify_image', 'value' => '100', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);

        DB::table('image_uploads')->insert(['id' => 100, 'filename' => 'notify.png', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);

        //
        // payments
        //
        DB::table('settings')->insert(['param' => 'StripeEnable', 'value' => 'true', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);
        DB::table('settings')->insert(['param' => 'stripeKey', 'value' => '', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);
        DB::table('settings')->insert(['param' => 'stripeSecretKey', 'value' => '', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);
        DB::table('settings')->insert(['param' => 'razEnable', 'value' => 'true', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);
        DB::table('settings')->insert(['param' => 'razKey', 'value' => '', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);
        DB::table('settings')->insert(['param' => 'razName', 'value' => 'My Company Name', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);
        DB::table('settings')->insert(['param' => 'cashEnable', 'value' => 'true', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);

        //
        // Currencies
        //
        DB::table('settings')->insert(['param' => 'default_currencies', 'value' => '$', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);
        DB::table('settings')->insert(['param' => 'default_currencyCode', 'value' => 'USD', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);
        DB::table('settings')->insert(['param' => 'rightSymbol', 'value' => 'false', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);
        //
        DB::table('currencies')->insert(['name' => 'US Dollar', 'symbol' => '$', 'code' => 'USD', 'digits' => 2, 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);
        DB::table('currencies')->insert(['name' => 'Euro', 'symbol' => '€', 'code' => 'EUR', 'digits' => 2, 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);

        // firebase
        DB::table('settings')->insert(['param' => 'firebase_key', 'value' => '', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);
        
        // ui customer app 
        DB::table('settings')->insert(['param' => 'radius', 'value' => '3', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);
        DB::table('settings')->insert(['param' => 'shadow', 'value' => '10', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);
        DB::table('settings')->insert(['param' => 'row1', 'value' => 'search', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);
        DB::table('settings')->insert(['param' => 'row2', 'value' => 'topr', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);
        DB::table('settings')->insert(['param' => 'row3', 'value' => 'topf', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);
        DB::table('settings')->insert(['param' => 'row4', 'value' => 'cat', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);
        DB::table('settings')->insert(['param' => 'row5', 'value' => 'pop', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);
        DB::table('settings')->insert(['param' => 'row6', 'value' => 'nearyou', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);
        DB::table('settings')->insert(['param' => 'row7', 'value' => 'review', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);
        DB::table('settings')->insert(['param' => 'row1visible', 'value' => 'true', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);
        DB::table('settings')->insert(['param' => 'row2visible', 'value' => 'true', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);
        DB::table('settings')->insert(['param' => 'row3visible', 'value' => 'true', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);
        DB::table('settings')->insert(['param' => 'row4visible', 'value' => 'true', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);
        DB::table('settings')->insert(['param' => 'row5visible', 'value' => 'true', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);
        DB::table('settings')->insert(['param' => 'row6visible', 'value' => 'true', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);
        DB::table('settings')->insert(['param' => 'row7visible', 'value' => 'true', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);
        DB::table('settings')->insert(['param' => 'mainColor', 'value' => 'ff668798', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);
        DB::table('settings')->insert(['param' => 'iconColorWhiteMode', 'value' => '', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);
        DB::table('settings')->insert(['param' => 'iconColorDarkMode', 'value' => '', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);
        DB::table('settings')->insert(['param' => 'restaurantCardWidth', 'value' => '', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);
        DB::table('settings')->insert(['param' => 'restaurantCardHeight', 'value' => '', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);
        DB::table('settings')->insert(['param' => 'restaurantBackgroundColor', 'value' => '', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);
        DB::table('settings')->insert(['param' => 'restaurantCardTextSize', 'value' => '', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);
        DB::table('settings')->insert(['param' => 'restaurantCardTextColor', 'value' => '', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);
        DB::table('settings')->insert(['param' => 'restaurantTitleColor', 'value' => 'FFFFFF', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);
        DB::table('settings')->insert(['param' => 'dishesTitleColor', 'value' => '', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);
        DB::table('settings')->insert(['param' => 'dishesBackgroundColor', 'value' => '', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);
        DB::table('settings')->insert(['param' => 'dishesCardHeight', 'value' => '', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);
        DB::table('settings')->insert(['param' => 'oneInLine', 'value' => 'false', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);
        DB::table('settings')->insert(['param' => 'categoriesTitleColor', 'value' => '', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);
        DB::table('settings')->insert(['param' => 'categoriesBackgroundColor', 'value' => '', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);
        DB::table('settings')->insert(['param' => 'categoryCardWidth', 'value' => '', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);
        DB::table('settings')->insert(['param' => 'categoryCardHeight', 'value' => '', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);
        DB::table('settings')->insert(['param' => 'searchBackgroundColor', 'value' => '', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);
        DB::table('settings')->insert(['param' => 'reviewTitleColor', 'value' => '', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);
        DB::table('settings')->insert(['param' => 'reviewBackgroundColor', 'value' => '', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);
        DB::table('settings')->insert(['param' => 'categoryCardCircle', 'value' => 'true', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);
        DB::table('settings')->insert(['param' => 'darkMode', 'value' => 'false', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);
        DB::table('settings')->insert(['param' => 'topRestaurantCardHeight', 'value' => '', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);
        DB::table('settings')->insert(['param' => 'bottomBarType', 'value' => 'type1', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);
        DB::table('settings')->insert(['param' => 'bottomBarColor', 'value' => '', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);
        DB::table('settings')->insert(['param' => 'titleBarColor', 'value' => '', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);
        DB::table('settings')->insert(['param' => 'mapapikey', 'value' => '', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);
        DB::table('settings')->insert(['param' => 'typeFoods', 'value' => 'type2', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);
        
        //
        DB::table('settings')->insert(['param' => 'ordersNotifications', 'value' => '0', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);
        DB::table('settings')->insert(['param' => 'walletEnable', 'value' => 'true', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);
        // 18.11.2020
        DB::table('settings')->insert(['param' => 'payPalEnable', 'value' => 'true', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);
        DB::table('settings')->insert(['param' => 'payPalSandBox', 'value' => 'true', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);
        DB::table('settings')->insert(['param' => 'payPalClientId', 'value' => '', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);
        DB::table('settings')->insert(['param' => 'payPalSecret', 'value' => '', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);
        DB::table('settings')->insert(['param' => 'payStackEnable', 'value' => 'true', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);
        DB::table('settings')->insert(['param' => 'payStackKey', 'value' => '', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);
        DB::table('settings')->insert(['param' => 'distanceUnit', 'value' => 'km', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);
        DB::table('settings')->insert(['param' => 'appLanguage', 'value' => '1', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);

    }
}
