<?php

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert([
          'user_id' => 3,
          'ede' =>"26000000",
          'address_1' => "125 allée des alouettes",
          'cp' => "26300",
          'commune' => "Barbières",
          'tel' => '0601234567',
          
        ]);
    }
}
