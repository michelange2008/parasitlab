<?php

use Illuminate\Database\Seeder;

class ResultatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('resultats')->insert([

          /*
          // DEMANDE 6 PRELEVEMENT 1/3
          */
          [
            'prelevement_id' => 10,

            'anaitem_id' => 1,
            'valeur' => "2350",
            
            'created_at' => "2019-11-06 00:00:00",
            'updated_at' => "2019-11-08 00:00:00"
          ],
          [
            'prelevement_id' => 10,

            'anaitem_id' => 2,
            'valeur' => "50",

            'created_at' => "2019-11-06 00:00:00",
            'updated_at' => "2019-11-08 00:00:00"
          ],
          [
            'prelevement_id' => 10,

            'anaitem_id' => 4,
            'valeur' => "50",

            'created_at' => "2019-11-06 00:00:00",
            'updated_at' => "2019-11-08 00:00:00"
          ],
          [
            'prelevement_id' => 10,

            'anaitem_id' => 5,
            'valeur' => "200",

            'created_at' => "2019-11-06 00:00:00",
            'updated_at' => "2019-11-08 00:00:00"
          ],
          /*
          // DEMANDE 6 PRELEVEMENT 2/3
          */
          [
            'prelevement_id' => 11,

            'anaitem_id' => 1,
            'valeur' => "1050",

            'created_at' => "2019-11-06 00:00:00",
            'updated_at' => "2019-11-08 00:00:00"
          ],
          [
            'prelevement_id' => 11,

            'anaitem_id' => 4,
            'valeur' => "150",

            'created_at' => "2019-11-06 00:00:00",
            'updated_at' => "2019-11-08 00:00:00"
          ],
          [
            'prelevement_id' => 11,

            'anaitem_id' => 5,
            'valeur' => "800",

            'created_at' => "2019-11-06 00:00:00",
            'updated_at' => "2019-11-08 00:00:00"
          ],

          /*
          // DEMANDE 6 PRELEVEMENT 3/3
          */
          [
            'prelevement_id' => 12,

            'anaitem_id' => 2,
            'valeur' => "350",

            'created_at' => "2019-11-06 00:00:00",
            'updated_at' => "2019-11-08 00:00:00"
          ],
        /*
        // DEMANDE 7 PRELEVEMENT 13 1/1
        */
        [
          'prelevement_id' => 13,

          'anaitem_id' => 1,
          'valeur' => "2350",

          'created_at' => "2019-11-06 00:00:00",
          'updated_at' => "2019-11-08 00:00:00"
        ],
        [
          'prelevement_id' => 13,

          'anaitem_id' => 2,
          'valeur' => "50",

          'created_at' => "2019-11-06 00:00:00",
          'updated_at' => "2019-11-08 00:00:00"
        ],
        [
          'prelevement_id' => 13,

          'anaitem_id' => 4,
          'valeur' => "50",

          'created_at' => "2019-11-06 00:00:00",
          'updated_at' => "2019-11-08 00:00:00"
        ],
        [
          'prelevement_id' => 13,

          'anaitem_id' => 5,
          'valeur' => "200",

          'created_at' => "2019-11-06 00:00:00",
          'updated_at' => "2019-11-08 00:00:00"
        ],
//######################################################################################
//                    SUIVI DE CAMPAGNE                                                #
//######################################################################################

// PREMIERE SERIE ///////////////////////////////////////////////////////////////////////
        /*
        // DEMANDE 9 PRELEVEMENT 15 1/3
        */
        [
          'prelevement_id' => 15,

          'anaitem_id' => 1,
          'valeur' => "450",

          'created_at' => "2019-06-15 00:00:00",
          'updated_at' => "2019-06-17 00:00:00"
        ],
        /*
        // DEMANDE 9 PRELEVEMENT 16 2/3
        */
        [
          'prelevement_id' => 16,

          'anaitem_id' => 1,
          'valeur' => "150",

          'created_at' => "2019-06-15 00:00:00",
          'updated_at' => "2019-06-17 00:00:00"
        ],
        [
          'prelevement_id' => 16,

          'anaitem_id' => 4,
          'valeur' => "50",

          'created_at' => "2019-06-15 00:00:00",
          'updated_at' => "2019-06-17 00:00:00"
        ],
        [
          'prelevement_id' => 16,

          'anaitem_id' => 5,
          'valeur' => "300",

          'created_at' => "2019-06-15 00:00:00",
          'updated_at' => "2019-06-17 00:00:00"
        ],
        /*
        // DEMANDE 9 PRELEVEMENT 17 3/3
        */
        [
          'prelevement_id' => 17,

          'anaitem_id' => 1,
          'valeur' => "50",

          'created_at' => "2019-06-15 00:00:00",
          'updated_at' => "2019-06-17 00:00:00"
        ],
// DEUXIEME SERIE ///////////////////////////////////////////////////////////////////////
        /*
        // DEMANDE 10 PRELEVEMENT 18 1/3
        */
        [
          'prelevement_id' => 18,

          'anaitem_id' => 1,
          'valeur' => "1450",

          'created_at' => "2019-07-20 00:00:00",
          'updated_at' => "2019-07-20 00:00:00",
        ],
        /*
        // DEMANDE 9 PRELEVEMENT 19 2/3
        */
        [
          'prelevement_id' => 19,

          'anaitem_id' => 1,
          'valeur' => "850",

          'created_at' => "2019-07-20 00:00:00",
          'updated_at' => "2019-07-20 00:00:00",
        ],
        [
          'prelevement_id' => 19,

          'anaitem_id' => 4,
          'valeur' => "50",

          'created_at' => "2019-07-20 00:00:00",
          'updated_at' => "2019-07-20 00:00:00",
        ],
        [
          'prelevement_id' => 19,

          'anaitem_id' => 5,
          'valeur' => "300",

          'created_at' => "2019-07-20 00:00:00",
          'updated_at' => "2019-07-20 00:00:00",
        ],
        /*
        // DEMANDE 9 PRELEVEMENT 20 3/3
        */
        [
          'prelevement_id' => 20,

          'anaitem_id' => 1,
          'valeur' => "150",

          'created_at' => "2019-07-20 00:00:00",
          'updated_at' => "2019-07-20 00:00:00",
        ],

// TROISIEME SERIE ///////////////////////////////////////////////////////////////////////
      /*
      // DEMANDE 9 PRELEVEMENT 21 1/3
      */
      [
        'prelevement_id' => 21,

        'anaitem_id' => 1,
        'valeur' => "2050",

        'created_at' => "2019-09-03 00:00:00",
        'updated_at' => "2019-09-04 00:00:00",
      ],
      /*
      // DEMANDE 9 PRELEVEMENT 22 2/3
      */
      [
        'prelevement_id' => 22,

        'anaitem_id' => 1,
        'valeur' => "1000",

        'created_at' => "2019-09-03 00:00:00",
        'updated_at' => "2019-09-04 00:00:00",
      ],
      [
        'prelevement_id' => 22,

        'anaitem_id' => 4,
        'valeur' => "50",

        'created_at' => "2019-09-03 00:00:00",
        'updated_at' => "2019-09-04 00:00:00",
      ],
      [
        'prelevement_id' => 22,

        'anaitem_id' => 5,
        'valeur' => "300",

        'created_at' => "2019-09-03 00:00:00",
        'updated_at' => "2019-09-04 00:00:00",
      ],
      /*
      // DEMANDE 9 PRELEVEMENT 23 3/3
      */
      [
        'prelevement_id' => 23,

        'anaitem_id' => 1,
        'valeur' => "550",

        'created_at' => "2019-09-03 00:00:00",
        'updated_at' => "2019-09-04 00:00:00",
      ],
    ]);
  }
}
