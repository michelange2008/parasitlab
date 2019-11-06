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
          'id' => "1",
          'user_id' => "3",
          'espece_id' => "2",
          'anapack_id' => "1",
          'toveto' => "1",
          'veto_id' => "2",
          'facture' => "3",
          'prelevement' => "2019-11-06 00:00:00",
          'reception' => "2019-11-06 00:00:00",
          'resultat' => "2019-11-06 00:00:00",
          'envoi' => "2019-11-06 00:00:00",
        ]);
    }
}
