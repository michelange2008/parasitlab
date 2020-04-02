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
            'abbreviation' => "SGI",
            'nom' => "parasites gastro-intestinaux",
            'technique' => 'méthode quantitative McMaster - NaCl',
            'icone_id' => 9,
          ],
          [
            'id' => 2,
            'abbreviation' => "SGI + DICR",
            'nom' => "parasites gastro-intestinaux +&nbsp;petite douve",
            'technique' => 'méthode quantitative McMaster - ZnCl2',
            'icone_id' => 32,
          ],
          [
            'id' => 3,
            'abbreviation' => "SGResp",
            'nom' => "strongles pulmonaires",
            'technique' => 'méthode semi-quantitative de Baermann',
            'icone_id' => 10,
          ],
          [
            'id' => 4,
            'abbreviation' => "GD + PARAM",
            'nom' => "grande douve et paramphistome",
            'technique' => 'méthode qualitative de sédimentation',
            'icone_id' => 31,
          ],
          [
            'id' => 5,
            'abbreviation' => "HAEM",
            'nom' => "quantification Haemonchus contortus",
            'technique' => 'analyse qPCR',
            'icone_id' => 15,
          ],
          [
            'id' => 6,
            'abbreviation' => "RESIST",
            'nom' => "test d'efficacité de produits vermifuges",
            'technique' => 'méthode quantitative McMaster - NaCl',
            'icone_id' => 23,
          ],
        ]);
    }
}
