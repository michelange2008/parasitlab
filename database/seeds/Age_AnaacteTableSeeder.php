<?php

use Illuminate\Database\Seeder;

class Age_AnaacteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('age_anaacte')->insert([

          ['age_id' => 1 , 'anaacte_id' => 5],
          ['age_id' => 1 , 'anaacte_id' => 9],
          ['age_id' => 1 , 'anaacte_id' => 10],
          ['age_id' => 1 , 'anaacte_id' => 11],
          ['age_id' => 1 , 'anaacte_id' => 13],
          ['age_id' => 2 , 'anaacte_id' => 1],
          ['age_id' => 2 , 'anaacte_id' => 2],
          ['age_id' => 2 , 'anaacte_id' => 3],
          ['age_id' => 2 , 'anaacte_id' => 9],
          ['age_id' => 2 , 'anaacte_id' => 10],
          ['age_id' => 2 , 'anaacte_id' => 11],
          ['age_id' => 2 , 'anaacte_id' => 13],
        ]);
    }
}
