<?php

use Illuminate\Database\Seeder;

class SeriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('series')->insert([
          [
            'id' => 1,
            'eleveur_id' => 6,
            'anapack_id' => 4,
            'espece_id' => 2,
            'acheve' => false,
          ],
          [
            'id' => 2,
            'eleveur_id' => 3,
            'anapack_id' => 3,
            'espece_id' => 3,
            'acheve' => true,
          ],
        ]);
    }
}
