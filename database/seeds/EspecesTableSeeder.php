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
            "type" => "groupe",
            "icone_id" => 7,
          ],
          [
            'id' => 2,
            "nom" => "ovins",
            "type" => "simple",
            "icone_id" => 5,
          ],
          [
            'id' => 3,
            "nom" => "caprins",
            "type" => "simple",
            "icone_id" => 3,
          ],
          [
            'id' => 4,
            "nom" => "équins",
            "type" => "groupe",
            "icone_id" => 4,
          ],
          [
            'id' => 5,
            "nom" => "bovins",
            "type" => "simple",
            "icone_id" => 2,
          ],
          [
            'id' => 6,
            "nom" => "porcins",
            "type" => "simple",
            "icone_id" => 6,
          ],
          [
            'id' => 7,
            "nom" => "chevaux",
            "type" => "simple",
            "icone_id" => 4,
          ],
          [
            'id' => 8,
            "nom" => "ânes",
            "type" => "simple",
            "icone_id" => 26,
          ],
          [
            'id' => 9,
            "nom" => "équidés",
            "type" => "groupe",
            "icone_id" => 27,
          ],


        ]);
    }
}
