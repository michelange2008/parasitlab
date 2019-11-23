<?php

use Illuminate\Database\Seeder;

class AnapacksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('anapacks')->insert([
          [
            'id' => 1,
            "nom" => "coproscopie simple",
            "description" => "coproscopie sans interprétation",
            "detail" => "il s'agit d'une coproscopie sur 1 prélèvement dont l'interprétation des résultats est faite par votre vétérinaire",
            "icone_id" => 9,
          ],
          [
            'id' => 2,
            "nom" => "coproscopie avec interprétation",
            "description" => "coproscopie + interprétation",
            "detail" => "il s'agit d'une coproscopie sur 1 prélèvement accompagnée d'une interprétation réalisée par nous-mêmes en fonction des informations que vous nous avez fournies",
            "icone_id" => 17,
          ],
          [
            'id' => 3,
            "nom" => "suivi de campagne",
            "description" => "3 coproscopie sur 3 prélèvement + 3 interprétations",
            "detail" => "Il s'agit de vous accompagner dans le suivi de votre troupeau au cours de la saison de pâturage. Nous effectuerons trois séries de coproscopies avec à chaque fois trois échantillons et une interprétation à chaque analyse plus une interprétation globale",
            "icone_id" => 22,
          ],
          [
            'id' => 4,
            "nom" => "test de résistance",
            "description" => "deux coproscopies sur deux prélèvements + 1 interprétation",
            "detail" => "Il s'agit de contrôler l'absence de résistance vis-à-vis du vermifuge que vous utilisez. Nous réaliserons deux séries de coproscopies, avec chaque fois deux échantillons (traités - témoins) et une interprétation après la 2ème analyse",
            "icone_id" => 23,
          ],
          [
            'id' => 5,
            "nom" => "coproscopie + identification Haemonchus",
            "description" => "coproscopie + comptage Haemonchus",
            "detail" => "Il s'agit d'évaluer le risque pour le troupeau de l'impact d'Haemonchus contortus. Nous réalisons une coproscopie suivie d'un comptage du nombre d'Haemonchus et les résultats sont accompagnés d'une interprétation",
            "icone_id" => 15,
          ],
          [
            'id' => 6,
            "nom" => "visite d'élevage",
            "description" => "visite d'élevage + déplacement",
            "detail" => "il s'agit d'une visite d'élevage pour analyser plus en détail la question du parasitisme dans votre élevage",
            "icone_id" => 18,
          ],
          [
            'id' => 7,
            "nom" => "test de Baermann",
            "description" => "Recherche de larves de strongles respiratoires",
            "detail" => "il s'agit d'une technique particulière permettant de mettre en évidence les larves de strongles respiratoires",
            "icone_id" => 10,
          ],
        ]);
    }
}
