<?php

use Illuminate\Database\Seeder;

class DemandeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('demandes')->insert([
          [
            'id' => 1,
            'user_id' => 3,
            'espece_id' => 2,
            'nb_prelevement' => 3,
            'anapack_id' => 1,
            'toveto' => 1,
            'veto_id' => 2,
            'date_prelevement' => "2019-11-06 00:00:00",
            'date_reception' => "2019-11-06 00:00:00",
            'date_resultat' => null,
            'date_envoi' => null,
            "facture_id" => 4,
          ],
          [
            'id' => 2,
            'user_id' => 3,
            'nb_prelevement' => 2,
            'espece_id' => 3,
            'anapack_id' => 5,
            'toveto' => 1,
            'veto_id' => 2,
            'date_prelevement' => null,
            'date_reception' => "2019-11-08 00:00:00",
            'date_resultat' => null,
            'date_envoi' => null,
            "facture_id" => 5,
          ],
          [
            'id' => 3,
            'user_id' => 3,
            'nb_prelevement' => 1,
            'espece_id' => 4,
            'anapack_id' => 1,
            'toveto' => 1,
            'veto_id' => 2,
            'date_prelevement' => "2019-11-01 00:00:00",
            'date_reception' => "2019-11-02 00:00:00",
            'date_resultat' => "2019-11-06 00:00:00",
            'date_envoi' => "2019-11-06 00:00:00",
            "facture_id" => 1,
          ],
          [
            'id' => 4,
            'user_id' => 6,
            'nb_prelevement' => 1,
            'espece_id' => 4,
            'anapack_id' => 3,
            'toveto' => 1,
            'veto_id' => 2,
            'date_prelevement' => "2019-11-02 00:00:00",
            'date_reception' => "2019-11-02 00:00:00",
            'date_resultat' => "2019-11-05 00:00:00",
            'date_envoi' => "2019-11-05 00:00:00",
            "facture_id" => 2,
          ],
          [
            'id' => 5,
            'user_id' => 7,
            'nb_prelevement' => 1,
            'espece_id' => 5,
            'anapack_id' => 1,
            'toveto' => 0,
            'veto_id' => 1,
            'date_prelevement' => "2019-11-03 00:00:00",
            'date_reception' => "2019-11-03 00:00:00",
            'date_resultat' => "2019-11-06 00:00:00",
            'date_envoi' => "2019-11-09 00:00:00",
            "facture_id" => 3,
          ],
          [
            'id' => 6,
            'user_id' => 7,
            'nb_prelevement' => 1,
            'espece_id' => 4,
            'anapack_id' => 2,
            'toveto' => 0,
            'veto_id' => 1,
            'date_prelevement' => null,
            'date_reception' => "2019-11-06 00:00:00",
            'date_resultat' => null,
            'date_envoi' => null,
            "facture_id" => 6,
          ]
        ]);
    }
}
