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
        [ 'id' => 1, "nom" => "opg" ],
        [ 'id' => 2, "nom" => "ookystes" ],
        ['id' => 3, "nom" => "larves" ],
        ['id' => 4, "nom" => "%" ],
      ]);
    }
}
