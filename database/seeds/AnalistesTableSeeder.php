<?php

use Illuminate\Database\Seeder;

class AnalistesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('analistes')->insert([
          [
            "nom" => "coproscopie (petits ruminants)",
            "espece_id" => 1,
          ],
          [
            "nom" => "coproscopie (bovins)",
            "espece_id" => 5,
          ],
          [
            "nom" => "coproscopie (équins)",
            "espece_id" => 4,
          ],
          [
            "nom" => "test de baermann (petits ruminants)",
            "espece_id" => 1,
          ],
          [
            "nom" => "test de baermann (bovins)",
            "espece_id" => 5
          ],
        ]);
    }
}
