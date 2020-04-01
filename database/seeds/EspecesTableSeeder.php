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
            'id' => 2,
            "nom" => "ovins",
            'abbreviation' => "ov",
            "icone_id" => 5,
          ],
          [
            'id' => 3,
            "nom" => "caprins",
            'abbreviation' => "cp",
            "icone_id" => 3,
          ],
          [
            'id' => 5,
            "nom" => "bovins",
            'abbreviation' => "bv",
            "icone_id" => 2,
          ],
          [
            'id' => 6,
            "nom" => "porcins",
            'abbreviation' => "pc",
            "icone_id" => 6,
          ],
          [
            'id' => 7,
            "nom" => "chevaux",
            'abbreviation' => "cv",
            "icone_id" => 4,
          ],
          [
            'id' => 8,
            "nom" => "ânes",
            'abbreviation' => "ane",
            "icone_id" => 26,
          ],
        ]);
    }
}
