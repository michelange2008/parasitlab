<?php

use Illuminate\Database\Seeder;

class LabosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('labos')->insert([
          [
            "id" => 1,
            'name' => 'Michel BOUY',
            'email' => 'michel.bouy@fibl.org',
            'password' => bcrypt('17891789Mm'),
            "signature" => "mbouy.svg",
            "photo" => "mbouy.jpg",
            "fonction" => "vétérinaire",
            "est_signataire" => true,
          ],
          [
            'id' => 2,
            'name' => 'Amélie LEBRE',
            'email' => 'amelie.lebre@fibl.org',
            'password' => bcrypt('haemonchus'),
            "signature" => "alebre.svg",
            "photo" => "alebre.jpg",
            "fonction" => "parasitologiste",
            "est_signataire" => true,
          ],
          [
            'id' => 3,
            'name' => 'Florence Arsonneau',
            'email' => 'farsonneau@fibl.org',
            'password' => bcrypt('azerty'),
            "signature" => "farsonneau.svg",
            "photo" => "farsonneau.jpg",
            "fonction" => "directrice",
            "est_signataire" => false,
          ],
        ]);
    }
}
