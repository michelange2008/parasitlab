<?php

use Illuminate\Database\Seeder;

class OptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds
     *
     * @return void
     */
    public function run()
    {
      DB::statement('SET FOREIGN_KEY_CHECKS = 0');
      DB::table('options')->truncate();
      DB::statement('SET FOREIGN_KEY_CHECKS = 1');

      DB::table('options')->insert([
          [
            'id' => 1,
            'abbreviation' => 'diagnostic',
            'nom' => 'Diagnostic coproscopique',
            'titre' => 'Votre problème est (peut-être) d\'origine parasitaire',
            'soustitre' => 'Il s\'agit de confirmer le diagnostic.',
            'qui' => 'Les animaux malades ou en mauvais état.<br>Il est conseillé de faire une 2<sup>ème</sup> analyse avec les animaux en bon état',
            'quand' => 'Au moment de la constatation du problème.',
            'icone' => 'diagnostic.svg',
          ],
          [
            'id' => 2,
            'abbreviation' => 'bilan',
            'nom' => 'Bilan de troupeau',
            'titre' => 'C\'est le moment d\'évaluer le niveau d\'infestation éventuel du troupeau surtout si vous êtes en fin de saison de pâture, à l\'entrée en bâtiment, en hiver, à l\'achat, etc.',
            'soustitre' => 'Il s\'agit d\'évaluer les mesures de prévention mises en place ou de faire un bilan avant un éventuel traitement',
            'qui' => 'Il est indispensable de faire au moins trois lots de 5 animaux sur la base suivante&nbsp;:<br>
            Les animaux maigres ou en mauvais état, les animaux bien portants, les primipares (agnelles, antenaises, génisses d\'un an ou de deux ans)<br>
            D\'autres lots sont envisageables en fonction de l\'historique de pâturage (estives, parcours, ...).',
            'quand' => 'En fin de saison de pâture, au début de l\'automne ou à la rentrée en bâtiment.',
            'icone' => 'bilan.svg',
          ],
          [
            'id' => 3,
            'abbreviation' => 'suivi',
            'nom' => 'Suivi de troupeau',
            'titre' => 'Vous voulez suivre la dynamique d\'infestation en cours de saison de pâturage par les strongles',
            'soustitre' => 'Afin de mieux connaître la spécificité de votre élevage ou d\'évaluer les moments critiques.',
            'qui' => 'Il faut faire au moins deux ou trois lots a priori de 5 animaux&nbsp;:<br>
            Un premier lot sera fait avec les jeunes et un deuxième lot sera fait avec les autres.',
            'quand' => 'Une première analyse peut être faite à la mise à l\'herbe si aucun bilan n\'a été fait l\'année d\'avant. Sinon, un premier prélèvement fin mai permet d\'évaluer la montée de l\'infestation.<br>
            Une seconde analyse est à réaliser durant le mois de juillet, moment qui correspond au premier pic d\'infestation<br>
            Une troisième et dernière analyse sera réalisée à l\'automne.',
            'icone' => 'suivi.svg',
          ],
          [
            'id' => 4,
            'abbreviation' => 'taux_haem',
            'nom' => 'Taux d\'Haemonchus',
            'titre' => 'Vous voulez connaître la proportion d\'Haemonchus contortus (strongle hautement pathogène des petits ruminants) dans votre troupeau',
            'soustitre' => 'La connaissance de ce taux d\'haemonchus vous permettra une analyse plus fine du risque encouru par les animaux.',
            'qui' => 'Il faut faire un lot de 5 animaux&nbsp;:<br>En choisissant a priori des animaux susceptibles d\'être infestés=> maigres, anémiés, mauvais état général.',
            'quand' => 'C\'est une analyse à réaliser au pic de l\'infestation, c\'est-à-dire au mois de Juillet.<br>Mais il est possible de faire cette analyse à n\'importe quel autre moment si on observe des signes de parasitisme, notamment liés à haemonchus (anémie).',
            'icone' => 'taux_haem.svg',
          ],
          [
            'id' => 5,
            'abbreviation' => 'test_resistance',
            'nom' => 'Résistances aux anthelminthiques',
            'titre' => 'Vous soupçonnez la présence dans votre troupeau de strongles résistants aux anthelminthiques',
            'soustitre' => 'Lors du dernier traitement réalisé, l\'état des animaux ne s\'est pas amélioré.',
            'qui' => 'Le nombre de lots dépend du nombre de produits que vous voulez évaluer.<br>
            Pour chaque produit, il faut prélever deux fois de suite (à chaque fois les mêmes animaux).<br>
            Pour une plus grande fiabilité du test, chaque animal doit être prélevé séparément et le mélange des féces est réalisé par le laboratoire.',
            'quand' => 'Une première analyse est faite le jour du traitement.<br>
            Une seconde analyse est réalisée 7 à 14 jours après le traitement, selon le produit utilisé (contactez-nous pour plus d\'informations).<br>
            Un calcul permet de connaitre le taux de réduction d\'excrétion fécale et donc la présence éventuelle d\'une résistance.',
            'icone' => 'test_resistance.svg',
          ],
          [
            'id' => 6,
            'abbreviation' => 'introduction',
            'nom' => 'Introduction d\'un animal',
            'titre' => 'Vous introduisez un nouvel animal dans votre troupeau',
            'soustitre' => 'Cet animal présente le risque d\'introduire chez vous des parasites résistants aux vermifuges',
            'qui' => 'Le ou les animaux acheté(s)',
            'quand' => 'Durant la quarantaine, il faut faire une analyse coproscopique et si l\'animal est parasité, effectuer un test de résistance.',
            'icone' => 'introduction.svg',
          ],
          [
            'id' => 7,
            'abbreviation' => 'dicro',
            'nom' => 'Petite douve',
            'titre' => 'Le petite douve est un parasite très répandu en région sèche',
            'soustitre' => 'Elle entraîne des saisies du foie à l\'abattoir mais ne pose pas de problèmes aux bovins, et rarement aux petits ruminants',
            'qui' => 'Il est possible de faire des analyses individuelles, de mélange ou par lot selon l\'objectif',
            'quand' => 'Plutôt à la rentrée en bâtiment, car la petite douve a un cycle long (environ 2 mois).',
            'icone' => 'dicro.svg',
          ],
          [
            'id' => 8,
            'abbreviation' => 'bilan_indiv',
            'nom' => 'Bilan individuel',
            'titre' => 'C\'est le moment d\'évaluer le niveau d\'infestation de cet animal',
            'soustitre' => 'Il s\'agit de savoir si votre animal, ou un animal que vous venez d\'acquérir, est parasité (même s\'il ne présente pas de symptôme)',
            'qui' => 'Assez logiquement, l\'animal en question',
            'quand' => 'En fin de saison de pâture, au début de l\'automne ou à la rentrée en bâtiment, à l\'achat et plus généralement dès que l\'on se pose la question de le vermifuger.',
            'icone' => 'bilan_indiv.svg',
          ],
          [
            'id' => 10,
            'abbreviation' => 'respiratoire',
            'nom' => 'Strongles respiratoires',
            'titre' => 'Vos animaux présentent des signes respiratoires, notamment de la toux',
            'soustitre' => 'Dans certains cas, ces symptômes sont attribuables aux strongles respiratoires',
            'qui' => 'Les animaux qui présentent des symptômes',
            'quand' => 'Au moment où vous observez ce problème',
            'icone' => 'respiratoire.svg',
          ],
          [
            'id' => 11,
            'abbreviation' => 'douveparam',
            'nom' => 'Fasciola et Paramphistome',
            'titre' => 'La douve et le paramphistome peuvent atteindre tous les ruminants',
            'soustitre' => 'Ils sont présents principalement lorsqu\'il y a des pâturages humides ou des bords de ruisseaux',
            'qui' => 'Les animaux qui présentent des symptômes ou des baisses de production',
            'quand' => 'ATTENTION: pour une meilleur fiabilité de l\'analyse, il faut prélever pour chaque animal de la bouse matin, midi et soir',
            'icone' => 'douveparam.svg',
          ],
          [
            'id' => 12,
            'abbreviation' => 'baisse_prod',
            'nom' => 'Baisse de production',
            'titre' => 'Votre problème est (peut-être) d\'origine parasitaire',
            'soustitre' => 'Il s\'agit de confirmer le diagnostic.',
            'qui' => 'Les animaux qui ne produisent plus autant de lait qu\'avant ou ceux qui maigrissent.<br>Il est possible de faire une 2<sup>ème</sup> analyse avec les animaux en bon état',
            'quand' => 'Au moment de la constatation du problème.',
            'icone' => 'baisse_prod.svg',
          ],
        ]);
    }
}
