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
            'nom' => "strongles gastro-intestinaux (ovins)",
            'anaacte_id' => 1,
            'espece_id' => 2,
            'icone_id' => 9,
          ],
          [
            'id' => 2,
            'nom' => "strongles gastro-intestinaux (bovins)",
            'anaacte_id' => 1,
            'espece_id' => 5,
            'icone_id' => 9,
          ],
          [
            'id' => 3,
            'nom' => "strongles gastro-intestinaux (équins)",
            'anaacte_id' => 1,
            'espece_id' => 9,
            'icone_id' => 9,
        ],
          [
            'id' => 4,
            'nom' => "strongles respiratoires (ovins)",
            'anaacte_id' => 2,
            'espece_id' => 2,
            'icone_id' => 10,
          ],
          [
            'id' => 5,
            'nom' => "strongles respiratoires (bovins)",
            'anaacte_id' => 2,
            'espece_id' => 5,
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
            'nom' => "strongles gastro-intestinaux (caprins)",
            'anaacte_id' => 1,
            'espece_id' => 3,
            'icone_id' => 9,
          ],
          [
            'id' => 8,
            'nom' => "strongles respiratoires (caprins)",
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
          [
            'id' => 10,
            'nom' => "strongles gastro-intestinaux (ânes)",
            'anaacte_id' => 1,
            'espece_id' => 8,
            'icone_id' => 9,
          ],
          [
            'id' => 11,
            'nom' => "strongles gastro-intestinaux (porcs)",
            'anaacte_id' => 1,
            'espece_id' => 6,
            'icone_id' => 9,
          ],
          [
            'id' => 12,
            'nom' => "strongles gastro-intestinaux + petite douve (bovins)",
            'anaacte_id' => 1,
            'espece_id' => 5,
            'icone_id' => 32,
          ],
          [
            'id' => 13,
            'nom' => "strongles gastro-intestinaux + petite douve (ovins)",
            'anaacte_id' => 1,
            'espece_id' => 2,
            'icone_id' => 32,
          ],
          [
            'id' => 14,
            'nom' => "strongles gastro-intestinaux + petite douve (caprins)",
            'anaacte_id' => 1,
            'espece_id' => 3,
            'icone_id' => 32,
          ],
          [
            'id' => 15,
            'nom' => "Grande douve et paramphistome (caprins)",
            'anaacte_id' => 9,
            'espece_id' => 3,
            'icone_id' => 31,
          ],
          [
            'id' => 16,
            'nom' => "Grande douve et paramphistome (ovins)",
            'anaacte_id' => 9,
            'espece_id' => 2,
            'icone_id' => 31,
          ],
          [
            'id' => 17,
            'nom' => "Grande douve et paramphistome (bovins)",
            'anaacte_id' => 9,
            'espece_id' => 5,
            'icone_id' => 31,
          ],
        ]);
    }
}
