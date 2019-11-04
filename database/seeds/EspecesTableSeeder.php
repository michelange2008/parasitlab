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
            "icone" => "pr.svg",
          ],
          [
            "nom" => "ovins",
            "icone" => "ov.svg",
          ],
          [
            "nom" => "caprins",
            "icone" => "cp.svg",
          ],
          [
            "nom" => "équins",
            "icone" => "cv.svg",
          ],
          [
            "nom" => "bovins",
            "icone" => "bv.svg",
          ],
          [
            "nom" => "porcins",
            "icone" => "pc.svg",
          ],
        ]);
    }
}
