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
            "abbreviation" => "SGIN",
            "nom" => "strongles gastro-intestinaux",
            "unite_id" => "",
            "qtt_id" => "",
          ],
          [
            "abbreviation" => "NEMA",
            "nom" => "nématodirus",
            "unite_id" => "",
            "qtt_id" => "",
          ],
          [
            "abbreviation" => "TRIC",
            "nom" => "trichuris",
            "unite_id" => "",
            "qtt_id" => "",
          ],
          [
            "abbreviation" => "STRY",
            "nom" => "strongyloïdes",
            "unite_id" => "",
            "qtt_id" => "",
          ],
          [
            "abbreviation" => "COCC",
            "nom" => "coccidies",
            "unite_id" => "",
            "qtt_id" => "",
          ],
          [
            "abbreviation" => "RESP",
            "nom" => "strongles respiratoires",
            "unite_id" => "",
            "qtt_id" => "",
          ],
        ]);
    }
}
