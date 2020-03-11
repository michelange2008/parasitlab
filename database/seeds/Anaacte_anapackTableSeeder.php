<?php

use Illuminate\Database\Seeder;

class Anaacte_anapackTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('anaacte_anapack')->insert([
        [
          'anapack_id' => 1,
          'anaacte_id' => 1,
        ],
  //#############################
        [
          'anapack_id' => 2,
          'anaacte_id' => 1,
        ],
        [
          'anapack_id' => 2,
          'anaacte_id' => 5,
        ],
//###################################
        [
          'anapack_id' => 3,
          'anaacte_id' => 2,
        ],
//##################################
        [
          'anapack_id' => 4,
          'anaacte_id' => 3,
        ],
//#################################
        [
          'anapack_id' => 5,
          'anaacte_id' => 1,
        ],
        [
          'anapack_id' => 5,
          'anaacte_id' => 5,
        ],
//###################################
        [
          'anapack_id' => 6,
          'anaacte_id' => 1,
        ],
        [
          'anapack_id' => 6,
          'anaacte_id' => 1,
        ],
        [
          'anapack_id' => 6,
          'anaacte_id' => 5,
        ],
//###################################
        [
          'anapack_id' => 7,
          'anaacte_id' => 7,
        ],
        [
          'anapack_id' => 7,
          'anaacte_id' => 6,
        ],
//##################################
        [
          'anapack_id' => 8,
          'anaacte_id' => 10,
        ],
//##################################
        [
          'anapack_id' => 9,
          'anaacte_id' => 9,
        ],

      ]);
    }
}
