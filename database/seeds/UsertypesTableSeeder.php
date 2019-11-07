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
            'nom' =>'eleveur',
            'icone_id' => 11,
          ],
          [
            'id' => 2,
            'nom' => 'labo',
            'icone_id' => 12,
          ],
          [
            'id' => 3,
            'nom' => 'webmin',
            'icone_id' => 13,
          ],
          [
            'id' => 4,
            'nom' => 'veto',
            'icone_id' => 14,
          ],
        ]);
    }
}
