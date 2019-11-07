<?php

use Illuminate\Database\Seeder;

class EspecesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('especes')->insert([
          [
            'id' => 1,
            "nom" => "petits ruminants",
            "icone_id" => 7,
          ],
          [
            'id' => 2,
            "nom" => "ovins",
            "icone_id" => 5,
          ],
          [
            'id' => 3,
            "nom" => "caprins",
            "icone_id" => 3,
          ],
          [
            'id' => 4,
            "icone_id" => 4,
            "nom" => "équins",
          ],
          [
            'id' => 5,
            "nom" => "bovins",
            "icone_id" => 2,
          ],
          [
            'id' => 6,
            "nom" => "porcins",
            "icone_id" => 6,
          ],
        ]);
    }
}
