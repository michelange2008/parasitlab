<?php

use Illuminate\Database\Seeder;

class AnacteOptionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('anaacte_option')->insert([
          [
            'anaacte_id' => 1,
            'option_id' => 1,
          ],
          [
            'anaacte_id' => 1,
            'option_id' => 8,
          ],
          [
            'anaacte_id' => 2,
            'option_id' => 1,
          ],
          [
            'anaacte_id' => 3,
            'option_id' => 1,
          ],
          [
            'anaacte_id' => 4,
            'option_id' => 3,
          ],
          [
            'anaacte_id' => 5,
            'option_id' => 7,
          ],
          [
            'anaacte_id' => 8,
            'option_id' => 7,
          ],
          [
            'anaacte_id' => 6,
            'option_id' => 7,
          ],
          [
            'anaacte_id' => 7,
            'option_id' => 7,
          ],
          [
            'anaacte_id' => 8,
            'option_id' => 3,
          ],
          [
            'anaacte_id' => 9,
            'option_id' => 9,
          ],
          [
            'anaacte_id' => 10,
            'option_id' => 9,
          ],
          [
            'anaacte_id' => 11,
            'option_id' => 10,
          ],
          [
            'anaacte_id' => 12,
            'option_id' => 4,
          ],
          [
            'anaacte_id' => 13,
            'option_id' => 5,
          ],
          [
            'anaacte_id' => 15,
            'option_id' => 2,
          ],
          [
            'anaacte_id' => 16,
            'option_id' => 2,
          ],
          [
            'anaacte_id' => 11,
            'option_id' => 2,
          ],
          [
            'anaacte_id' => 16,
            'option_id' => 7,
          ],
          [
            'anaacte_id' => 1,
            'option_id' => 6,
          ],
          [
            'anaacte_id' => 2,
            'option_id' => 6,
          ],
          [
            'anaacte_id' => 5,
            'option_id' => 6,
          ],
          [
            'anaacte_id' => 13,
            'option_id' => 6,
          ],
          [
            'anaacte_id' => 11,
            'option_id' => 6,
          ],
        ]);
    }
}
