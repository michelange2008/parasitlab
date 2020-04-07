<?php

use Illuminate\Database\Seeder;

class OptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('options')->insert([
          [ 'nom' => 'diagnostic.' ],
          [ 'nom' => 'bilan.'],
          [ 'nom' => 'suivi.'],
          [ 'nom' => 'taux_haem.'],
          [ 'nom' => 'test_resistance.'],
          [ 'nom' => 'introduction.'],
          [ 'nom' => 'cas_equides.'],
          [ 'nom' => 'bilan_indiv.'],
          ['nom' => null],

        ]);
    }
}
