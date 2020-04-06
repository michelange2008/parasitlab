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
            'estSpecial' => false,
            'icone_id' => 9,
          ],
          [
            'id' => 2,
            'abbreviation' => "SGI + DICR",
            'nom' => "parasites gastro-intestinaux + petite douve",
            'technique' => 'méthode quantitative McMaster - ZnCl2',
            'estSpecial' => false,
            'icone_id' => 32,
          ],
          [
            'id' => 3,
            'abbreviation' => "SGResp",
            'nom' => "strongles pulmonaires",
            'technique' => 'méthode semi-quantitative de Baermann',
            'estSpecial' => false,
            'icone_id' => 10,
          ],
          [
            'id' => 4,
            'abbreviation' => "GD + PARAM",
            'nom' => "grande douve et paramphistome",
            'technique' => 'méthode qualitative de sédimentation',
            'estSpecial' => false,
            'icone_id' => 31,
          ],
          [
            'id' => 5,
            'abbreviation' => "HAEM",
            'nom' => "quantification Haemonchus contortus",
            'technique' => 'analyse qPCR',
            'estSpecial' => true,
            'icone_id' => 15,
          ],
          [
            'id' => 6,
            'abbreviation' => "RESIST",
            'nom' => "test d'efficacité de produits vermifuges",
            'technique' => 'méthode quantitative McMaster - NaCl',
            'estSpecial' => true,
            'icone_id' => 23,
          ],
          [
            'id' => 7,
            'abbreviation' => "PACK",
            'nom' => "Pack",
            'technique' => '',
            'estSpecial' => false,
            'icone_id' => 16,
          ],
        ]);
    }
}
