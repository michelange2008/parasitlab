<?php

use Illuminate\Database\Seeder;

class ModereglementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modereglements')->insert([
          [
            "id" => 3,
            "nom" => "Espèces",
            'icone_id' =>28,
          ],
          [
            "id" => 2,
            "nom" => "Virement",
            'icone_id' =>29,
          ],
          [
            "id" => 1,
            "nom" => "Chèque",
            'icone_id' =>30,
          ],
        ]);
    }
}
