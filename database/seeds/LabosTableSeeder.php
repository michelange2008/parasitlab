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
            "photo" => "mbouy.jpg",
            "fonction" => "vétérinaire",
          ],
          [
            "user_id" => 2,
            "signature" => "alebre.svg",
            "photo" => "alebre.jpg",
            "fonction" => "parasitologiste",
          ],
          [
            "user_id" => 8,
            "signature" => "farsonneau.svg",
            "photo" => "farsonneau.jpg",
            "fonction" => "directrice",
          ],
        ]);
    }
}
