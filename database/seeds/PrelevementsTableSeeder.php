<?php

use Illuminate\Database\Seeder;

class PrelevementsTable extends Seeder
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
          ],
          [
            'id' => 2,
            'identification' => "maigres",
            'demande_id' => 1,
          ],
          [
            'id' => 3,
            'identification' => "normales",
            'demande_id' => 1,
          ],
          [
            'id' => 4,
            'identification' => "multipares",
            'demande_id' => 2,
          ],
          [
            'id' => 5,
            'identification' => "primipares",
            'demande_id' => 2,
          ],
          [
            'id' => 6,
            'identification' => "Mustang",
            'demande_id' => 3,
          ],
        ]);
    }
}
