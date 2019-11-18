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
          'id' => 1,
          'name' => 'Michel BOUY',
          'email' => 'michel.bouy@fibl.org',
          'password' => bcrypt('17891789Mm'),
          'usertype_id' => 2,
        ],
        [
          'id' => 2,
          'name' => 'Amélie LEBRE',
          'email' => 'amelie.lebre@fibl.org',
          'password' => bcrypt('haemonchus'),
          'usertype_id' => 2
        ],
        [
          'id' => 3,
          'name' => 'Eleveur',
          'email' => 'eleveur@vache.com',
          'password' => bcrypt('azerty'),
          'usertype_id' => 1,
        ],
        [
          'id' => 4,
          'name' => 'aucun vétérinaire',
          'email' => 'michelange@wanadoo.fr',
          'password' => bcrypt('%!*sqy78JK%ù=ff'),
          'usertype_id' => 3,
        ],
        [
          'id' => 5,
          'name' => 'antikor',
          'email' => 'antikor@orange.fr',
          'password' => bcrypt('enerlite+1'),
          'usertype_id' => 3,
        ],
        [
          'id' => 6,
          'name' => 'GAEC de la lune',
          'email' => 'gaeclune@vache.com',
          'password' => bcrypt('azerty'),
          'usertype_id' => 1,
        ],
        [
          'id' => 7,
          'name' => 'EARL des étoiles',
          'email' => 'earletoiles@vache.com',
          'password' => bcrypt('azerty'),
          'usertype_id' => 1,
        ],
        [
          'id' => 8,
          'name' => 'SCEA des galaxies',
          'email' => 'scea@vache.com',
          'password' => bcrypt('azerty'),
          'usertype_id' => 1,
        ],
      ]);
    }
}
