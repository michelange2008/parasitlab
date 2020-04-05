<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
          [
            "id" => 1,
            "nom" => "signe",
          ],
          [
            "id" => 2,
            "nom" => "action",
          ],
          [
            "id" => 3,
            "nom" => "situation",
          ],
        ]);
    }
}
