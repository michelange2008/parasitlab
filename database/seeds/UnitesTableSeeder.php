<?php

use Illuminate\Database\Seeder;

class UnitesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table("unites")->insert([
        [ 'id' => 1, "type" => "quantitatif", "nom" => "opg" ],
        [ 'id' => 2, "type" => "quantitatif", "nom" => "ookystes" ],
        ['id' => 3, "type" => "quantitatif", "nom" => "larves" ],
        ['id' => 4, "type" => "quantitatif", "nom" => "%" ],
        ['id' => 5, "type" => "qualitatif", "nom" => "" ],
      ]);
    }
}
