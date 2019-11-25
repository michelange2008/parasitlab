<?php

use Illuminate\Database\Seeder;

class ResultatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('resultats')->insert([
          [
            'prelevement_id' => 1,
            'analyse_id' => 1,
            'valeur' => "",
            'created_at' => "2019-11-06 00:00:00",
            'updated_at' => null,
          ],
          [
            'prelevement_id' => 2,
            'analyse_id' => 1,
            'valeur' => "",
            'created_at' => "2019-11-06 00:00:00",
            'updated_at' => null,
          ],
          [
            'prelevement_id' => 3,
            'analyse_id' => 1,
            'valeur' => "",
            'created_at' => "2019-11-06 00:00:00",
            'updated_at' => null,
          ],
          [
            'prelevement_id' => 4,
            'analyse_id' => 1,
            'valeur' => "",
            'created_at' => "2019-11-08 00:00:00",
            'updated_at' => null,
          ],
          [
            'prelevement_id' => 4,
            'analyse_id' => 6,
            'valeur' => "",
            'created_at' => "2019-11-08 00:00:00",
            'updated_at' => null,
          ],
          [
            'prelevement_id' => 5,
            'analyse_id' => 1,
            'valeur' => "",
            'created_at' => "2019-11-08 00:00:00",
            'updated_at' => null,
          ],
          [
            'prelevement_id' => 5,
            'analyse_id' => 6,
            'valeur' => "",
            'created_at' => "2019-11-08 00:00:00",
            'updated_at' => null,
          ],
          [
            'prelevement_id' => 6,
            'analyse_id' => 4,
            'valeur' => "250",
            'created_at' => "2019-11-02 00:00:00",
            'updated_at' => "2019-11-06 00:00:00"
          ],
          [
            'prelevement_id' => 7,
            'analyse_id' => 4,
            'valeur' => "150",
            'created_at' => "2019-11-02 00:00:00",
            'updated_at' => "2019-11-05 00:00:00"
          ],
        ]);
    }
}
