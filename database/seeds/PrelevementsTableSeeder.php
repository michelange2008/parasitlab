<?php

use Illuminate\Database\Seeder;

class PrelevementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prelevements')->insert([
          [
            'id' => 1,
            'identification' => "Anthenaises",
            'demande_id' => 1,
            'analyse_id' => 1,
            'etat' => 1,
            'consistance' => 1,
            'created_at' => "2019-11-06 00:00:00",
            'updated_at' => null,
          ],
          [
            'id' => 2,
            'identification' => "maigres",
            'demande_id' => 1,
            'analyse_id' => 1,
            'etat' => 1,
            'consistance' => 2,
            'created_at' => "2019-11-06 00:00:00",
            'updated_at' => null,
          ],
          [
            'id' => 3,
            'identification' => "normales",
            'demande_id' => 1,
            'analyse_id' => 1,
            'etat' => 1,
            'consistance' => 1,
            'created_at' => "2019-11-06 00:00:00",
            'updated_at' => null,
          ],
          [
            'id' => 4,
            'identification' => "multipares",
            'demande_id' => 2,
            'analyse_id' => 6,
            'etat' => 2,
            'consistance' => 1,
            'created_at' => "2019-11-08 00:00:00",
            'updated_at' => null,
          ],
          [
            'id' => 5,
            'identification' => "primipares",
            'demande_id' => 2,
            'analyse_id' => 6,
            'etat' => 2,
            'consistance' => 1,
            'created_at' => "2019-11-08 00:00:00",
            'updated_at' => null,
          ],
          [
            'id' => 6,
            'identification' => "Mustang",
            'demande_id' => 3,
            'analyse_id' => 3,
            'etat' => 1,
            'consistance' => 1,
            'created_at' => "2019-11-02 00:00:00",
            'updated_at' => "2019-11-06 00:00:00",
          ],
          [
            'id' => 7,
            'identification' => "Jument",
            'demande_id' => 4,
            'analyse_id' => 3,
            'etat' => 1,
            'consistance' => 3,
            'created_at' => "2019-06-02 00:00:00",
            'updated_at' => "2019-06-05 00:00:00",
          ],
          [
            'id' => 13,
            'identification' => "Jument",
            'demande_id' => 4,
            'analyse_id' => 3,
            'etat' => 1,
            'consistance' => 1,
            'created_at' => "2019-08-02 00:00:00",
            'updated_at' => "2019-08-05 00:00:00",
          ],
          [
            'id' => 8,
            'identification' => "Lot 1",
            'demande_id' => 5,
            'analyse_id' => 2,
            'etat' => 1,
            'consistance' => 3,
            'created_at' => "2019-11-03 00:00:00",
            'updated_at' => "2019-11-06 00:00:00",
          ],
          [
            'id' => 9,
            'identification' => "Lot 2",
            'demande_id' => 5,
            'analyse_id' => 2,
            'etat' => 1,
            'consistance' => 2,
            'created_at' => "2019-11-03 00:00:00",
            'updated_at' => "2019-11-06 00:00:00",
          ],
          [
            'id' => 10,
            'identification' => "maigres",
            'demande_id' => 6,
            'analyse_id' => 1,
            'etat' => 1,
            'consistance' => 2,
            'created_at' => "2019-11-06 00:00:00",
            'updated_at' => "2019-11-08 00:00:00",
          ],
          [
            'id' => 11,
            'identification' => "chevrettes",
            'demande_id' => 6,
            'analyse_id' => 1,
            'etat' => 1,
            'consistance' => 1,
            'created_at' => "2019-11-06 00:00:00",
            'updated_at' => "2019-11-08 00:00:00",
          ],
          [
            'id' => 12,
            'identification' => "autres",
            'demande_id' => 6,
            'analyse_id' => 1,
            'etat' => 1,
            'consistance' => 1,
            'created_at' => "2019-11-06 00:00:00",
            'updated_at' => "2019-11-08 00:00:00",
          ],
        ]);
    }
}
