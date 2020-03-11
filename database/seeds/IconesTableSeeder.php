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
          ['id' => 1, "nom" => "default.svg"],
          ['id' => 2, "nom" => "bv.svg"],
          ['id' => 3, "nom" => "cp.svg"],
          ['id' => 4, "nom" => "cv.svg"],
          ['id' => 5, "nom" => "ov.svg"],
          ['id' => 6, "nom" => "pc.svg"],
          ['id' => 7, "nom" => "pr.svg"],
          ['id' => 8, "nom" => "tout.svg"],
          ['id' => 9, "nom" => "copr.svg"],
          ['id' => 10, "nom" => "baer.svg"],
          ['id' => 11, "nom" => "eleveur.svg"],
          ['id' => 12, "nom" => "labo.svg"],
          ['id' => 13, "nom" => "webmin.svg"],
          ['id' => 14, "nom" => "veto.svg"],
          ['id' => 15, "nom" => "haem.svg"],
          ['id' => 16, "nom" => "pack.svg"],
          ['id' => 17, "nom" => "inte.svg"],
          ['id' => 18, "nom" => "visi.svg"],
          ['id' => 19, "nom" => "depl.svg"],
          ['id' => 20, "nom" => "mela.svg"],
          ['id' => 21, "nom" => "users.svg"],
          ['id' => 22, "nom" => "suiv.svg"],
          ['id' => 23, "nom" => "resi.svg"],
          ['id' => 24, "nom" => "envo.svg"],
          ['id' => 25, "nom" => "espece.svg"],
          ['id' => 26, "nom" => "ane.svg"],
          ['id' => 27, "nom" => "equides.svg"],
          ['id' => 28, "nom" => "cash.svg"],
          ['id' => 29, "nom" => "virement.svg"],
          ['id' => 30, "nom" => "cheque.svg"],
          ['id' => 31, "nom" => "fasc.svg"],
          ['id' => 32, "nom" => "dicr.svg"],

        ]);
    }
}
