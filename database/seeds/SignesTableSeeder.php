<?php

use Illuminate\Database\Seeder;

class SignesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('signes')->insert([
        [
          'nom' => 'diarrhée',
        ],
        [
          'nom' => 'amaigrissement',
        ],
        [
          'nom' => 'poil / laine piqués',
        ],
      ]);
    }
}
