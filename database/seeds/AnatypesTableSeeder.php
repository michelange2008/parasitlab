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
            'nom' => "anatypes.nom.SGI",
            'technique' => 'anatypes.technique.SGI',
            'estSpecial' => false,
            'icone_id' => 9,
          ],
          [
            'id' => 2,
            'abbreviation' => "SGI + DICR",
            'nom' => "anatypes.nom.SGIDICR",
            'technique' => 'anatypes.technique.SGIDICR',
            'estSpecial' => false,
            'icone_id' => 32,
          ],
          [
            'id' => 3,
            'abbreviation' => "SGResp",
            'nom' => "anatypes.nom.SGRESP",
            'technique' => 'anatypes.technique.SGRESP',
            'estSpecial' => false,
            'icone_id' => 10,
          ],
          [
            'id' => 4,
            'abbreviation' => "GD + PARAM",
            'nom' => "anatypes.nom.GDPARAM",
            'technique' => 'anatypes.technique.GDPARAM',
            'estSpecial' => false,
            'icone_id' => 31,
          ],
          [
            'id' => 5,
            'abbreviation' => "HAEM",
            'nom' => "anatypes.nom.HAEM",
            'technique' => 'anatypes.technique.HAEM',
            'estSpecial' => true,
            'icone_id' => 15,
          ],
          [
            'id' => 6,
            'abbreviation' => "RESIST",
            'nom' => "anatypes.nom.RESIST",
            'technique' => 'anatypes.technique.RESIST',
            'estSpecial' => true,
            'icone_id' => 23,
          ],
          [
            'id' => 7,
            'abbreviation' => "PACK",
            'nom' => "anatypes.nom.PACK",
            'technique' => 'anatypes.technique.PACK',
            'estSpecial' => false,
            'icone_id' => 16,
          ],
        ]);
    }
}
