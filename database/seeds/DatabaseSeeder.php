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
      $this->call(IconesTableSeeder::class);
      $this->call(UsertypesTableSeeder::class);
      $this->call(UsersTableSeeder::class);
      $this->call(QttsTableSeeder::class);
      $this->call(VetosTableSeeder::class);
      $this->call(UnitesTableSeeder::class);
      $this->call(EspecesTableSeeder::class);
      $this->call(TvasTableSeeder::class);
      $this->call(EleveursTableSeeder::class);
      $this->call(LabosTableSeeder::class);
      $this->call(AnaitemsTableSeeder::class);
      $this->call(AnaactesTableSeeder::class);
      $this->call(AnalysesTableSeeder::class);
      $this->call(AnapacksTableSeeder::class);
      $this->call(FacturesTableSeeder::class);
      $this->call(DemandeTableSeeder::class);
      $this->call(Anaacte_anapackTableSeeder::class);
      $this->call(Anaitem_analyseTableSeeder::class);
      $this->call(PrelevementsTableSeeder::class);
      $this->call(ResultatsTableSeeder::class);

    }
}
