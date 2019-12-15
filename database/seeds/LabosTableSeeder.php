<?php

use Illuminate\Database\Seeder;

class LabosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('labos')->insert([
          [
            "user_id" => 1,
            "signature" => "mbouy.svg",
            "icone_id" => 25,
            "fonction" => "vétérinaire",
          ],
          [
            "user_id" => 2,
            "signature" => "alebre.svg",
            "icone_id" => 26,
            "fonction" => "parasitologiste",
          ],
          [
            "user_id" => 9,
            "signature" => "farsonneau.svg",
            "icone_id" => 27,
            "fonction" => "directrice",
          ],
        ]);
    }
}
