<?php

use Illuminate\Database\Seeder;

class VetosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vetos')->insert([
        [
          'id' => 1,
          'user_id' => 4,
          'cro' => "0000",
          'cp' => '00000',
          'tel' => '0000000000',
        ],
        [
          'id' => 2,
          'user_id' => 5,
          'cro' => "503018",
          'cp' => '26300',
          'tel' => '0475472035',
        ],
      ]);
    }
}
