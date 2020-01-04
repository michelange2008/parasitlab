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
            'id' => 2,
            'nom' => "coproscopie (bovins)",
            'anaacte_id' => 1,
            'espece_id' => 5,
            'icone_id' => 9,
          ],
          [
            'id' => 3,
            'nom' => "coproscopie (équins)",
            'anaacte_id' => 1,
            'espece_id' => 4,
            'icone_id' => 9,
          ],
          [
            'id' => 5,
            'nom' => "test de baermann (bovins)",
            'anaacte_id' => 2,
            'espece_id' => 5,
            'icone_id' => 10,
          ],
          [
            'id' => 1,
            'nom' => "coproscopie (ovins)",
            'anaacte_id' => 1,
            'espece_id' => 2,
            'icone_id' => 9,
          ],
          [
            'id' => 4,
            'nom' => "test de baermann (ovins)",
            'anaacte_id' => 2,
            'espece_id' => 2,
            'icone_id' => 10,
          ],
          [
            'id' => 6,
            'nom' => "pourcentage d'Haemonchus (ovins)",
            'anaacte_id' => 3,
            'espece_id' => 2,
            'icone_id' => 15,
          ],
          [
            'id' => 7,
            'nom' => "coproscopie (caprins)",
            'anaacte_id' => 1,
            'espece_id' => 3,
            'icone_id' => 9,
          ],
          [
            'id' => 8,
            'nom' => "test de baermann (caprins)",
            'anaacte_id' => 2,
            'espece_id' => 3,
            'icone_id' => 10,
          ],
          [
            'id' => 9,
            'nom' => "pourcentage d'Haemonchus (caprins)",
            'anaacte_id' => 3,
            'espece_id' => 3,
            'icone_id' => 15,
          ],
        ]);
    }
}
