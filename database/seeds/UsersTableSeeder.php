<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        [
          'name' => 'Michel BOUY',
          'email' => 'michel.bouy@fibl.org',
          'password' => bcrypt('17891789Mm'),
          'type_id' => 3,
        ],
        [
          'name' => 'Amélie LEBRE',
          'email' => 'amelie.lebre@fibl.org',
          'password' => bcrypt('haemonchus'),
          'type_id' => 2
        ],
        [
          'name' => 'Eleveur',
          'email' => 'eleveur@vache.com',
          'password' => bcrypt('azerty'),
          'type_id' => 1,
        ]
      ]);
    }
}
