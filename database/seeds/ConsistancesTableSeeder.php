<?php

use Illuminate\Database\Seeder;

class ConsistancesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('consistances')->insert([
          ['id' => 1, 'nom' => 'crottes/crottin'],
          ['id' => 2, 'nom' => 'bouse'],
          ['id' => 3, 'nom' => 'liquide'],
          ['id' => 4, 'nom' => 'hétérogène'],
        ]);
    }
}
