<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
          [
            "user_id" => 1,
            "signature" => "mbouy.svg",
          ],
          [
            "user_id" => 2,
            "signature" => "alebre.svg",
          ],
        ]);
    }
}
