<?php
namespace App\Fournisseurs;

use App\Fournisseurs\ListeFournisseur;

/**
 * FOURNIT LA LISTE DES VETOS AVEC TOUTES LES INFOS NECESSAIRES FORMATTEES POUR LES AFFICHER DANS INDEX
 */
class ListeNewsFournisseur extends ListeFournisseur
{

  public function creeListe($news)
  {
    $this->liste = collect();

    foreach ($news as $new) {

      $description = [];

      // UTILISER LE TRAIT ITEMFACTORY QUI CONSTRUIT UN OBJET COLLECT AVEC 4 VARIABLES: action, id, nom, route)

      $img = $this->photoFactory('news/'.$new->img);

      $title = $this->lienFactory($new->id, ucfirst($new->title), 'news.show', 'affiche_user');

      $content = $this->itemFactory($new->content);

      $conclusion = $this->itemFactory($new->conclusion);

      $isDisplay = $this->ouinonFactory($new->id, $new->display);

      $suppr = $this->delFactory($new->id, 'news.destroy');

      $description = [
        $img,
        $title,
        $content,
        $conclusion,
        $isDisplay,
        $suppr,
      ];

      $this->liste->put($new->id , $description);

    }

    return $this->liste;
  }
}
