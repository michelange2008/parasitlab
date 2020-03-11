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
            'abbreviation' => "coprosimple",
            "nom" => "strongles gastro-intestinaux",
            "description" => "recherche des strongles gastro-intestinaux sans interprétation",
            "detail" => "il s'agit d'une coproscopie avec un comptage des oeufs de strongles gastro-intestinaux sur 1 prélèvement (mélange des fécès de 5 animaux) dont l'interprétation des résultats est faite par votre vétérinaire",
            "serie" => false,
            "icone_id" => 9,
            "veto" => true,
            "visible" => true,
          ],
          [
            'id' => 2,
            'abbreviation' => "coprointerpr",

            "nom" => "strongles gastro-intestinaux avec interprétation",
            "description" => "coproscopie + interprétation",
            "detail" => "il s'agit d'une coproscopie avec un comptage des oeufs strongles gastro-intestinaux sur 1 prélèvement (mélange des fécès de 5 animaux) accompagnée d'une interprétation réalisée par nous-mêmes en fonction des informations que vous nous avez fournies",
            "serie" => false,
            "icone_id" => 17,
            "veto" => false,
            "visible" => true,
          ],
          [
            'id' => 3,

            'abbreviation' => "baermann",
            "nom" => "strongles respiratoires",
            "description" => "Recherche de larves de strongles respiratoires",
            "detail" => "il s'agit d'une technique particulière permettant de mettre en évidence les larves de strongles respiratoires",
            "serie" => false,
            "icone_id" => 10,
            "veto" => true,
            "visible" => true,
          ],
          [
            'id' => 4,
            'abbreviation' => "haemonchus",

            "nom" => "identification Haemonchus",
            "description" => "comptage des oeufs des strongles gastro-intestinaux et parmi eux de la proportion d'Haemonchus",
            "detail" => "Il s'agit d'évaluer le risque pour le troupeau de l'impact d'Haemonchus contortus. Nous réalisons une analyse PCR permettant de connaître le nombre total de strongles gastro-intestinaux et la proportion d'oeufs d'Haemonchus. Les résultats sont accompagnés d'une interprétation",
            "serie" => false,
            "icone_id" => 15,
            "veto" => true,
            "visible" => true,
          ],
          [
            'id' => 5,
            'abbreviation' => "suivi",

            "nom" => "suivi parasitologique de campagne",
            "description" => "3 coproscopie sur 3 lots + 3 interprétations",
            "detail" => "Il s'agit de vous accompagner dans le suivi de votre troupeau au cours de la saison de pâturage. Nous effectuerons trois séries de coproscopies avec à chaque fois trois échantillons et une interprétation à chaque analyse plus une interprétation globale",
            "serie" => true,
            "icone_id" => 22,
            "veto" => true,
            "visible" => true,
          ],
          [
            'id' => 6,
            'abbreviation' => "resistance",

            "nom" => "test de résistance",
            "description" => "deux coproscopies sur un prélèvement + 1 interprétation",
            "detail" => "Il s'agit de contrôler l'absence de résistance vis-à-vis du vermifuge que vous utilisez. Une 1ère analyse est faite juste avant le traitement et une seconde analyse 7 à 10 jours après (selon le produit utilisé)",
            "serie" => true,
            "icone_id" => 23,
            "veto" => true,
            "visible" => true,
          ],
          [
            'id' => 7,
            'abbreviation' => "visite",

            "nom" => "visite d'élevage",
            "description" => "visite d'élevage + déplacement",
            "detail" => "il s'agit d'une visite d'élevage pour analyser plus en détail la question du parasitisme dans votre élevage",
            "serie" => false,
            "icone_id" => 18,
            "veto" => false,
            "visible" => false,
          ],
          [
            'id' => 8,
            'abbreviation' => "coprodicro",

            "nom" => "strongles gastro-intestinaux + petite douve",
            "description" => "recherche des strongles gastro-intestinaux et de la petite douve",
            "detail" => "il s'agit d'une coproscopie spécifique permettant un comptage des oeufs de petite douve en plus de ceux de strongles gastro-intestinaux. Il est réalisé sur 1 prélèvement et l'interprétation des résultats est faite par votre vétérinaire",
            "serie" => false,
            "icone_id" => 9,
            "veto" => true,
            "visible" => true,
            "visible" => true,
          ],
          [
            'id' => 9,
            'abbreviation' => "fasciola",

            "nom" => "grande douve et paramphistomes",
            "description" => "comptage des oeufs de grande douve et de paramphistome",
            "detail" => "il s'agit d'une coproscopie spécifique permettant un comptage des oeufs de grande douve et de paramphistome. Il doit être réalisé sur un prélèvement de mélange de 10 animaux.",
            "serie" => false,
            "icone_id" => 9,
            "veto" => true,
            "visible" => true,
          ],
        ]);
    }
}
