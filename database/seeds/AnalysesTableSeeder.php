<?php

use Illuminate\Database\Seeder;

class AnalysesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('analyses')->insert([
          [
            'id' => 1,
            'nom' => "coproscopie (petits ruminants)",
            'anaacte_id' => 1,
            'espece_id' => 1,
          ],
          [
            'id' => 2,
            'nom' => "coproscopie (bovins)",
            'anaacte_id' => 1,
            'espece_id' => 5,
          ],
          [
            'id' => 3,
            'nom' => "coproscopie (équins)",
            'anaacte_id' => 1,
            'espece_id' => 4,
          ],
          [
            'id' => 4,
            'nom' => "test de baermann (petits ruminants)",
            'anaacte_id' => 2,
            'espece_id' => 1,
          ],
          [
            'id' => 5,
            'nom' => "test de baermann (bovins)",
            'anaacte_id' => 2,
            'espece_id' => 5,
          ],
          [
            'id' => 6,
            'nom' => "pourcentage d'Haemonchus (petits ruminants)",
            'anaacte_id' => 3,
            'espece_id' => 1,
          ],
        ]);
    }
}
