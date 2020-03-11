<?php

use Illuminate\Database\Seeder;

class Anaitem_analyseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('anaitem_analyse')->insert([
// SGIN + MONE OVINS
          [
            'analyse_id' => 1,
            'anaitem_id' => 1,
          ],
          [
            'analyse_id' => 1,
            'anaitem_id' => 2,
          ],
          [
            'analyse_id' => 1,
            'anaitem_id' => 3,
          ],
          [
            'analyse_id' => 1,
            'anaitem_id' => 4,
          ],
          [
            'analyse_id' => 1,
            'anaitem_id' => 5,
          ],
          [
            'analyse_id' => 1,
            'anaitem_id' => 11,
          ],
// SGIN  BOVINS
          [
            'analyse_id' => 2,
            'anaitem_id' => 1,
          ],
          [
            'analyse_id' => 2,
            'anaitem_id' => 2,
          ],
          [
            'analyse_id' => 2,
            'anaitem_id' => 3,
          ],
          [
            'analyse_id' => 2,
            'anaitem_id' => 4,
          ],
          [
            'analyse_id' => 2,
            'anaitem_id' => 5,
          ],
// SGIN EQUINS
          [
            'analyse_id' => 3,
            'anaitem_id' => 1,
          ],
// RESPI OVINS
          [
            'analyse_id' => 4,
            'anaitem_id' => 6,
          ],
// RESPI BOVINS
          [
            'analyse_id' => 5,
            'anaitem_id' => 6,
          ],
// HAEM OVINS
          [
            'analyse_id' => 6,
            'anaitem_id' => 10,
          ],
// SGIN CAPRINS
          [
            'analyse_id' => 7,
            'anaitem_id' => 1,
          ],
          [
            'analyse_id' => 7,
            'anaitem_id' => 2,
          ],
          [
            'analyse_id' => 7,
            'anaitem_id' => 3,
          ],
          [
            'analyse_id' => 7,
            'anaitem_id' => 4,
          ],
          [
            'analyse_id' => 7,
            'anaitem_id' => 5,
          ],
// RESPI CAPRINS
          [
            'analyse_id' => 8,
            'anaitem_id' => 6,
          ],
// HAEM CAPRINS
          [
            'analyse_id' => 9,
            'anaitem_id' => 10,
          ],
// SGIN ANES
          [
            'analyse_id' => 10,
            'anaitem_id' => 1,
          ],
// SGIN porcs
          [
            'analyse_id' => 11,
            'anaitem_id' => 1,
          ],
          [
            'analyse_id' => 11,
            'anaitem_id' => 3,
          ],
          [
            'analyse_id' => 11,
            'anaitem_id' => 12,
          ],
          [
            'analyse_id' => 11,
            'anaitem_id' => 5,
          ],

// SGIN + DICR BOVINS
          [
            'analyse_id' => 12,
            'anaitem_id' => 1,
          ],
          [
            'analyse_id' => 12,
            'anaitem_id' => 2,
          ],
          [
            'analyse_id' => 12,
            'anaitem_id' => 3,
          ],
          [
            'analyse_id' => 12,
            'anaitem_id' => 4,
          ],
          [
            'analyse_id' => 12,
            'anaitem_id' => 5,
          ],
          [
            'analyse_id' => 12,
            'anaitem_id' => 7,
          ],
// sgin + dicr ovins
          [
            'analyse_id' => 13,
            'anaitem_id' => 1,
          ],
          [
            'analyse_id' => 13,
            'anaitem_id' => 2,
          ],
          [
            'analyse_id' => 13,
            'anaitem_id' => 3,
          ],
          [
            'analyse_id' => 13,
            'anaitem_id' => 4,
          ],
          [
            'analyse_id' => 13,
            'anaitem_id' => 5,
          ],
          [
            'analyse_id' => 13,
            'anaitem_id' => 7,
          ],
          [
            'analyse_id' => 13,
            'anaitem_id' => 11,
          ],
// SGIN + DICR CAPRINS
          [
            'analyse_id' => 14,
            'anaitem_id' => 1,
          ],
          [
            'analyse_id' => 14,
            'anaitem_id' => 2,
          ],
          [
            'analyse_id' => 14,
            'anaitem_id' => 3,
          ],
          [
            'analyse_id' => 14,
            'anaitem_id' => 4,
          ],
          [
            'analyse_id' => 14,
            'anaitem_id' => 5,
          ],
          [
            'analyse_id' => 14,
            'anaitem_id' => 7,
          ],
// FASCI CAPRINS
          [
            'analyse_id' => 15,
            'anaitem_id' => 1,
          ],
          [
            'analyse_id' => 15,
            'anaitem_id' => 2,
          ],
          [
            'analyse_id' => 15,
            'anaitem_id' => 3,
          ],
          [
            'analyse_id' => 15,
            'anaitem_id' => 4,
          ],
          [
            'analyse_id' => 15,
            'anaitem_id' => 5,
          ],
          [
            'analyse_id' => 15,
            'anaitem_id' => 8,
          ],
          [
            'analyse_id' => 15,
            'anaitem_id' => 9,
          ],
// FASCI OVINS
          [
            'analyse_id' => 16,
            'anaitem_id' => 1,
          ],
          [
            'analyse_id' => 16,
            'anaitem_id' => 2,
          ],
          [
            'analyse_id' => 16,
            'anaitem_id' => 3,
          ],
          [
            'analyse_id' => 16,
            'anaitem_id' => 4,
          ],
          [
            'analyse_id' => 16,
            'anaitem_id' => 5,
          ],
          [
            'analyse_id' => 16,
            'anaitem_id' => 8,
          ],
          [
            'analyse_id' => 16,
            'anaitem_id' => 9,
          ],
          [
            'analyse_id' => 16,
            'anaitem_id' => 11,
          ],
// FASCI CAPRINS
          [
            'analyse_id' => 17,
            'anaitem_id' => 1,
          ],
          [
            'analyse_id' => 17,
            'anaitem_id' => 2,
          ],
          [
            'analyse_id' => 17,
            'anaitem_id' => 3,
          ],
          [
            'analyse_id' => 17,
            'anaitem_id' => 4,
          ],
          [
            'analyse_id' => 17,
            'anaitem_id' => 5,
          ],
          [
            'analyse_id' => 17,
            'anaitem_id' => 8,
          ],
          [
            'analyse_id' => 17,
            'anaitem_id' => 9,
          ],
        ]);
    }
}
