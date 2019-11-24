<?php

use Illuminate\Database\Seeder;

class Anaitem_analyseTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('anaitem_analyse')->insert([
          [
            'anaitem_id' => 1,
            'analyse_id' => 1,
          ],
          [
            'anaitem_id' => 2,
            'analyse_id' => 1,
          ],
          [
            'anaitem_id' => 3,
            'analyse_id' => 1,
          ],
          [
            'anaitem_id' => 4,
            'analyse_id' => 1,
          ],
          [
            'anaitem_id' => 5,
            'analyse_id' => 1,
          ],
          [
            'anaitem_id' => 7,
            'analyse_id' => 1,
          ],
          [
            'anaitem_id' => 8,
            'analyse_id' => 1,
          ],
          [
            'anaitem_id' => 9,
            'analyse_id' => 1,
          ],
          [
            'anaitem_id' => 1,
            'analyse_id' => 2,
          ],
          [
            'anaitem_id' => 2,
            'analyse_id' => 2,
          ],
          [
            'anaitem_id' => 3,
            'analyse_id' => 2,
          ],
          [
            'anaitem_id' => 4,
            'analyse_id' => 2,
          ],
          [
            'anaitem_id' => 5,
            'analyse_id' => 2,
          ],
          [
            'anaitem_id' => 7,
            'analyse_id' => 2,
          ],
          [
            'anaitem_id' => 8,
            'analyse_id' => 2,
          ],
          [
            'anaitem_id' => 9,
            'analyse_id' => 2,
          ],
          [
            'anaitem_id' => 1,
            'analyse_id' => 3,
          ],
          [
            'anaitem_id' => 6,
            'analyse_id' => 4,
          ],
          [
            'anaitem_id' => 10,
            'analyse_id' => 6,
          ],

        ]);
    }
}
