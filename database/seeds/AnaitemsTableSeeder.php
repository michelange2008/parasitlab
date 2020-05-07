<?php

use Illuminate\Database\Seeder;

class AnaitemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('anaitems')->insert([
          [
            'id' => 1,
            "abbreviation" => "SGIN",
            "nom" => "anaitems.SGIN",
            "unite_id" => "1",
            "qtt_id" => "1",
          ],
          [
            'id' => 2,
            "abbreviation" => "NEMA",
            "nom" => "anaitems.NEMA",
            "unite_id" => "1",
            "qtt_id" => "1",
          ],
          [
            'id' => 3,
            "abbreviation" => "TRIC",
            "nom" => "anaitems.TRIC",
            "unite_id" => "1",
            "qtt_id" => "1",
          ],
          [
            'id' => 4,
            "abbreviation" => "STRY",
            "nom" => "anaitems.STRY",
            "unite_id" => "1",
            "qtt_id" => "1",
          ],
          [
            'id' => 5,
            "abbreviation" => "COCC",
            "nom" => "anaitems.COCC",
            "unite_id" => "2",
            "qtt_id" => "2",
          ],
          [
            'id' => 6,
            "abbreviation" => "RESP",
            "nom" => "anaitems.RESP",
            "unite_id" => "3",
            "qtt_id" => "2",
          ],
          [
            'id' => 7,
            "abbreviation" => "DICR",
            "nom" => "anaitems.DICR",
            "unite_id" => "5",
            "qtt_id" => "3",
          ],
          [
            'id' => 8,
            "abbreviation" => "FASC",
            "nom" => "anaitems.FASC",
            "unite_id" => "5",
            "qtt_id" => "3",
          ],
          [
            'id' => 9,
            "abbreviation" => "PHIS",
            "nom" => "anaitems.PHIS",
            "unite_id" => "1",
            "qtt_id" => "1",
          ],
          [
            'id' => 10,
            "abbreviation" => "HAEM",
            "nom" => "anaitems.HAEM",
            "unite_id" => "4",
            "qtt_id" => "4",
          ],
          [
            'id' => 11,
            "abbreviation" => "MONI",
            "nom" => "anaitems.MONI",
            "unite_id" => "5",
            "qtt_id" => "3",
          ],
          [
            'id' => 12,
            "abbreviation" => "ASCA",
            "nom" => "anaitems.ASCA",
            "unite_id" => "5",
            "qtt_id" => "3",
          ],
        ]);
    }
}
