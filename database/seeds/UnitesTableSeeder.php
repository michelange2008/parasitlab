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
        [ 'id' => 1, "type" => "unites.qttf", "nom" => "unites.opg" ],
        [ 'id' => 2, "type" => "unites.qttf", 'nom' => "unites.ookystes" ],
        ['id' => 3, "type" => "unites.qttf", "nom" => "unites.larves" ],
        ['id' => 4, "type" => "unites.qttf", "nom" => "unites.percent" ],
        ['id' => 5, "type" => "unites.qltf", "nom" => "" ],
      ]);
    }
}
