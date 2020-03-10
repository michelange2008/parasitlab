<?php

use Illuminate\Database\Seeder;

class ReglementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reglements')->insert([
          [
            "id" => 1,
            "nom" => "Espèces",
            'icone_id' =>28,
          ],
          [
            "id" => 2,
            "nom" => "Virement",
            'icone_id' =>29,
          ],
          [
            "id" => 3,
            "nom" => "Chèque",
            'icone_id' =>30,
          ],
        ]);
    }
}
