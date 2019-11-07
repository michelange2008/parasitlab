<?php

use Illuminate\Database\Seeder;

class AnaactesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('anaactes')->insert([
        [
          'id' => 1,
          'code' => "COPR",
          'nom' => "coproscopie",
          'description' => "coproscopie simple",
          'icone_id' => 9,
          'puht' => "10",
        ],
        [
          'id' => 2,
          'code' => "BAER",
          'nom' => "test de baermann",
          'description' => "recherche de larves de strongles par le test de Baermann",
          'icone_id' => 10,
          'puht' => "12",
        ],
        [
          'id' => 3,
          'code' => "HAEM",
          'nom' => "taux d'Haemochus",
          'description' => "evaluation de la proportion d'oeufs d'Haemonchus par le test d'immunofluorescence",
          'icone_id' => 15,
          'puht' => "30",
        ],
        [
          'id' => 4,
          'code' => "PACK",
          'nom' => "matériel d'envoi",
          'description' => "pack pour l'envoi des prélèvements avec l'affranchissement",
          'icone_id' => 16,
          'puht' => "5",
        ],
        [
          'id' => 5,
          'code' => "INTE",
          'nom' => "interprétation des résultats",
          'description' => "coût pour la lecture et l'interprétation des résultats",
          'icone_id' => 17,
          'puht' => "15",
        ],
        [
          'id' => 6,
          'code' => "VISI",
          'nom' => "visite d'élevage",
          'description' => "coût pour une visite d'élevage parasito (frais de déplacement en supplément)",
          'icone_id' => 18,
          'puht' => "150",
        ],
        [
          'id' => 7,
          'code' => "DEPL",
          'nom' => "frais de déplacement (par km)",
          'description' => "frais de déplacement pour une visite au kilometre réel",
          'icone_id' => 19,
          'puht' => "0.5",
        ],
        [
          'id' => 8,
          'code' => "MELA",
          'nom' => "réalisation du mélange",
          'description' => "coût supplémentaire pour réaliser un mélange avec des prélèvements individuels",
          'icone_id' => 20,
          'puht' => "5",
        ],
      ]);
    }
}
