<?php

use Illuminate\Database\Seeder;

class UsertypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usertypes')->insert([
          [
            'id' => 1,
            'nom' =>'éleveur',
            'icone_id' => 11,
            'route' => 'eleveur',
          ],
          [
            'id' => 2,
            'nom' => 'laboratoire',
            'icone_id' => 12,
            'route' => 'laboratoire',
          ],
          [
            'id' => 3,
            'nom' => 'vétérinaire',
            'icone_id' => 14,
            'route' => 'veterinaire',
          ],
        ]);
    }
}
