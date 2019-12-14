<?php

use Illuminate\Database\Seeder;

class EleveursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('eleveurs')->insert([
          [
            'user_id' => 3,
            'num' =>"26000000",
            'address_1' => "125 allée des alouettes",
            'address_2' => null,
            'cp' => "26300",
            'commune' => "Barbières",
            'tel' => '0601234567',
          ],
          [
            'user_id' => 6,
            'num' =>"26111111",
            'address_1' => "125 allée des alouettes",
            'address_2' => null,
            'cp' => "26300",
            'commune' => "Combovin",
            'tel' => '0601234567',
          ],
          [
            'user_id' => 7,
            'num' =>"26222222",
            'address_1' => "125 allée des alouettes",
            'address_2' => "quartier des renards",
            'cp' => "26300",
            'commune' => "Saint Vincent la Commanderie",
            'tel' => '0601234567',
          ],
          [
            'user_id' => 8,
            'num' =>"26333333",
            'address_1' => "125 allée des alouettes",
            'address_2' => null,
            'cp' => "26300",
            'commune' => "Rochefort-Samson",
            'tel' => '0601234567',
          ],
        ]);
    }
}
