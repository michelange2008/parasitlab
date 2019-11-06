<?php

use Illuminate\Database\Seeder;

class IconesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('icones')->insert([
          ['id' => 1, "nom" => "bv.svg"],
          ['id' => 2, "nom" => "cp.svg"],
          ['id' => 3, "nom" => "cv.svg"],
          ['id' => 4, "nom" => "ov.svg"],
          ['id' => 5, "nom" => "pc.svg"],
          ['id' => 6, "nom" => "pr.svg"],
          ['id' => 7, "nom" => "tout.svg"],
          ['id' => 8, "nom" => "coproscopie.svg"],
          ['id' => 9, "nom" => "baermann.svg"],
        ]);
    }
}
