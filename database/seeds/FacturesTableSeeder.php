<?php

use Illuminate\Database\Seeder;

class FacturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('factures')->insert([
          [
            'id' => 1,
            'demande_id' => 3,
            'facture_dest' => "3",
            'faite' => 1,
            'total_ht' => 35.20,
            'total_ttc' => 42.24,
            'faite_date' => "2019-11-06 00:00:00",
            'envoyee' => 1,
            'envoyee_date' => "2019-11-07 00:00:00",
            'payee' => 1,
            'payee_date' => "2019-11-15 00:00:00"
          ],
          [
            'id' => 2,
            'demande_id' => 4,
            'facture_dest' => "3",
            'faite' => 1,
            'total_ht' => 46.30,
            'total_ttc' => 55.56,
            'faite_date' => "2019-11-05 00:00:00",
            'envoyee' => 1,
            'envoyee_date' => "2019-11-06 00:00:00",
            'payee' => 0,
            'payee_date' => null
          ],
          [
            'id' => 3,
            'demande_id' => 5,
            'facture_dest' => 3,
            'faite' => 1,
            'total_ht' => 135.20,
            'total_ttc' => 162.24,
            'faite_date' => "2019-11-06 00:00:00",
            'envoyee' => 1,
            'envoyee_date' => "2019-11-06 00:00:00",
            'payee' => 1,
            'payee_date' => "2019-11-15 00:00:00"
          ],
          [
            'id' => 4,
            'demande_id' => 1,
            'facture_dest' => "3",
            'faite' => 0,
            'total_ht' => 0,
            'total_ttc' => 0,
            'faite_date' => null,
            'envoyee' => 0,
            'envoyee_date' => null,
            'payee' => 0,
            'payee_date' => null,
          ],
          [
            'id' => 5,
            'demande_id' => 2,
            'facture_dest' => "3",
            'faite' => 0,
            'total_ht' => 0,
            'total_ttc' => 0,
            'faite_date' => null,
            'envoyee' => 0,
            'envoyee_date' => null,
            'payee' => 0,
            'payee_date' => null,
          ],
          [
            'id' => 6,
            'demande_id' => 6,
            'facture_dest' => "3",
            'faite' => 0,
            'total_ht' => 0,
            'total_ttc' => 0,
            'faite_date' => null,
            'envoyee' => 0,
            'envoyee_date' => null,
            'payee' => 0,
            'payee_date' => null,
          ],
        ]);
    }
}
