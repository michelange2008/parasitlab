<?php

use Illuminate\Database\Seeder;

class QttsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("qtts")->insert([
          ["nom" => "valeur" ],
          ["nom" => "estimation" ],
          ["nom" => "presence" ],
        ])
    }
}
