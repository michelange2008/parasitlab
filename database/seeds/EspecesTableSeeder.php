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
            "nom" => "petits ruminants",
            "icone" => 6,
          ],
          [
            "nom" => "ovins",
            "icone" => 4,
          ],
          [
            "nom" => "caprins",
            "icone" => 2,
          ],
          [
            "nom" => "équins",
            "icone" => 3,
          ],
          [
            "nom" => "bovins",
            "icone" => 1,
          ],
          [
            "nom" => "porcins",
            "icone" => 5,
          ],
        ]);
    }
}
