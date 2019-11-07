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
          ],
          [
            'id' => 2,
            'nom' => 'labo',
          ],
          [
            'id' => 3,
            'nom' => 'webmin',
          ],
          [
            'id' => 4,
            'nom' => 'veto',
          ],
        ]);
    }
}
