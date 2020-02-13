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
            'id' => 3,
            'name' => 'Eleveur',
            'email' => 'eleveur@vache.com',
            'password' => bcrypt('azerty'),
            'num' =>"26000000",
            'address_1' => "125 allée des alouettes",
            'address_2' => null,
            'cp' => "26300",
            'commune' => "Barbières",
            'tel' => '0601234567',
            'veto_id' => 1,
          ],
          [
            'id' => 5,
            'name' => 'GAEC de la lune',
            'email' => 'gaeclune@vache.com',
            'password' => bcrypt('azerty'),
            'num' =>"26111111",
            'address_1' => "125 allée des alouettes",
            'address_2' => null,
            'cp' => "26300",
            'commune' => "Combovin",
            'tel' => '0601234567',
            'veto_id' => null,
          ],
          [
            'id' => 6,
            'name' => 'EARL des étoiles',
            'email' => 'earletoiles@vache.com',
            'password' => bcrypt('azerty'),
            'num' =>"26222222",
            'address_1' => "125 allée des alouettes",
            'address_2' => "quartier des renards",
            'cp' => "26300",
            'commune' => "Saint Vincent la Commanderie",
            'tel' => '0601234567',
            'veto_id' => 1,
          ],
          [
            'id' => 7,
            'name' => 'SCEA des galaxies',
            'email' => 'scea@vache.com',
            'password' => bcrypt('azerty'),
            'num' =>"26333333",
            'address_1' => "125 allée des alouettes",
            'address_2' => null,
            'cp' => "26300",
            'commune' => "Rochefort-Samson",
            'tel' => '0601234567',
            'veto_id' => null,
          ],
        ]);
    }
}
