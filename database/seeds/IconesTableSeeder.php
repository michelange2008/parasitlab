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
          [ "nom" => "bv.svg"],
          [ "nom" => "cp.svg"],
          [ "nom" => "cv.svg"],
          [ "nom" => "ov.svg"],
          [ "nom" => "pc.svg"],
          [ "nom" => "pr.svg"],
          [ "nom" => "tout.svg"],
          [ "nom" => "coproscopie.svg"],
          [ "nom" => "baermann.svg"],
        ]);
    }
}
