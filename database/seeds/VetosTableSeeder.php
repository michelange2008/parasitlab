<?php

use Illuminate\Database\Seeder;

class VetosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vetos')->insert([
        [
          'id' => 1,
          'name' => 'antikor',
          'email' => 'antikor@orange.fr',
          'password' => bcrypt('enerlite+1'),
          'num' => "503018",
          'address_1' => '605 Grande Rue',
          'cp' => '26300',
          'commune' => "Barbières",
          'indicatif' => "33",
          'tel' => '0475472035',
        ],
      ]);
    }
}
