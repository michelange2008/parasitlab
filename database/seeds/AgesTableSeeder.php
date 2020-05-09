<?php

use Illuminate\Database\Seeder;

class AgesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ages')->insert([

          [
            'id' => 1,
            "nom" => "vaches",
            'abbreviation' => "vl",
            'espece_id' => 5,
            "icone_id" => 33,
          ],
          [
            'id' => 2,
            "nom" => "génisses ou broutards",
            'abbreviation' => "jb",
            'espece_id' => 5,
            "icone_id" => 34,
          ],
        ]);
    }
}
