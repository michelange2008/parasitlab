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
            'id' => "1",
            'user_id' => "3",
            'espece_id' => "2",
            'anapack_id' => "1",
            'toveto' => "1",
            'veto_id' => "2",
            'prelevement' => "2019-11-06 00:00:00",
            'reception' => "2019-11-06 00:00:00",
            'resultat' => null,
            'envoi' => null,
            "facture_id" => 4,
          ],
          [
            'id' => "2",
            'user_id' => "3",
            'espece_id' => "3",
            'anapack_id' => "5",
            'toveto' => "1",
            'veto_id' => "2",
            'prelevement' => null,
            'reception' => "2019-11-08 00:00:00",
            'resultat' => null,
            'envoi' => null,
            "facture_id" => 5,
          ],
          [
            'id' => "3",
            'user_id' => "3",
            'espece_id' => "4",
            'anapack_id' => "1",
            'toveto' => "1",
            'veto_id' => "2",
            'prelevement' => "2019-11-01 00:00:00",
            'reception' => "2019-11-02 00:00:00",
            'resultat' => "2019-11-06 00:00:00",
            'envoi' => "2019-11-06 00:00:00",
            "facture_id" => 1,
          ],
          [
            'id' => "4",
            'user_id' => "6",
            'espece_id' => "4",
            'anapack_id' => "3",
            'toveto' => "1",
            'veto_id' => "2",
            'prelevement' => "2019-11-02 00:00:00",
            'reception' => "2019-11-02 00:00:00",
            'resultat' => "2019-11-05 00:00:00",
            'envoi' => "2019-11-05 00:00:00",
            "facture_id" => 2,
          ],
          [
            'id' => "5",
            'user_id' => "7",
            'espece_id' => "5",
            'anapack_id' => "1",
            'toveto' => "0",
            'veto_id' => "1",
            'prelevement' => "2019-11-03 00:00:00",
            'reception' => "2019-11-03 00:00:00",
            'resultat' => "2019-11-06 00:00:00",
            'envoi' => "2019-11-09 00:00:00",
            "facture_id" => 3,
          ],
          [
            'id' => "6",
            'user_id' => "7",
            'espece_id' => "4",
            'anapack_id' => "2",
            'toveto' => "0",
            'veto_id' => "1",
            'prelevement' => null,
            'reception' => "2019-11-06 00:00:00",
            'resultat' => null,
            'envoi' => null,
            "facture_id" => 6,
          ]
        ]);
    }
}
