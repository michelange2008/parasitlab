<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $this->call(UsertypesTableSeeder::class);
      $this->call(UsersTableSeeder::class);
      $this->call(IconesTableSeeder::class);
      $this->call(QttsTableSeeder::class);
      $this->call(VetosTableSeeder::class);
      $this->call(UnitesTableSeeder::class);
      $this->call(EspecesTableSeeder::class);
      $this->call(ClientsTableSeeder::class);
      $this->call(AdminsTableSeeder::class);
      $this->call(AnalistesTableSeeder::class);
      $this->call(AnaitemsTableSeeder::class);
      $this->call(AnaactesTableSeeder::class);
      $this->call(AnapacksTableSeeder::class);
      // $this->call(DemandeTableSeeder::class);
    }
}
