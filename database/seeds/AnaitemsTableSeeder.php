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
            "nom" => "strongles gastro-intestinaux",
            "unite_id" => "1",
            "qtt_id" => "1",
          ],
          [
            'id' => 2,
            "abbreviation" => "NEMA",
            "nom" => "nématodirus",
            "unite_id" => "1",
            "qtt_id" => "1",
          ],
          [
            'id' => 3,
            "abbreviation" => "TRIC",
            "nom" => "trichuris",
            "unite_id" => "1",
            "qtt_id" => "1",
          ],
          [
            'id' => 4,
            "abbreviation" => "STRY",
            "nom" => "strongyloïdes",
            "unite_id" => "1",
            "qtt_id" => "1",
          ],
          [
            'id' => 5,
            "abbreviation" => "COCC",
            "nom" => "coccidies",
            "unite_id" => "2",
            "qtt_id" => "2",
          ],
          [
            'id' => 6,
            "abbreviation" => "RESP",
            "nom" => "strongles respiratoires",
            "unite_id" => "3",
            "qtt_id" => "2",
          ],
          [
            'id' => 7,
            "abbreviation" => "DICR",
            "nom" => "petite douve",
            "unite_id" => "5",
            "qtt_id" => "3",
          ],
          [
            'id' => 8,
            "abbreviation" => "FASC",
            "nom" => "grande douve",
            "unite_id" => "5",
            "qtt_id" => "3",
          ],
          [
            'id' => 9,
            "abbreviation" => "PHIS",
            "nom" => "paramphistome",
            "unite_id" => "1",
            "qtt_id" => "1",
          ],
          [
            'id' => 10,
            "abbreviation" => "HAEM",
            "nom" => "haemonchus",
            "unite_id" => "4",
            "qtt_id" => "4",
          ],
          [
            'id' => 11,
            "abbreviation" => "MONI",
            "nom" => " ténia (moniezia expansa)",
            "unite_id" => "5",
            "qtt_id" => "3",
          ],
          [
            'id' => 12,
            "abbreviation" => "ASCA",
            "nom" => "ascaris",
            "unite_id" => "5",
            "qtt_id" => "3",
          ],
        ]);
    }
}
