<?php

use Illuminate\Database\Seeder;

class AnatypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('anatypes')->insert([
          [
            'id' => 1,
            'nom' => "strongles gastro-intestinaux",
            'technique' => 'méthode quantitative Mac-Master - NaCl',
            'icone_id' => 9,
          ],
          [
            'id' => 2,
            'nom' => "strongles gastro-intestinaux + petite douve",
            'technique' => 'méthode quantitative Mac-Master - ZnCl2',
            'icone_id' => 32,
          ],
          [
            'id' => 3,
            'nom' => "détection larves pulmonaires",
            'technique' => 'méthode semi-quantitative de Baermann - NaCl',
            'icone_id' => 10,
          ],
          [
            'id' => 4,
            'nom' => "détection Grande Douve et Paramphistome",
            'technique' => 'méthode qualitative de sédimentation',
            'icone_id' => 31,
          ],
          [
            'id' => 5,
            'nom' => "recherche et quantification Haemonchus contortus",
            'technique' => 'analyse qPCR',
            'icone_id' => 15,
          ],
          [
            'id' => 6,
            'nom' => "test d'efficacité d'un vermifuge",
            'technique' => 'méthode quantitative Mac-Master - NaCl',
            'icone_id' => 23,
          ],
        ]);
    }
}
