<?php
namespace App\Http\Traits;

/**
 * Reprise le fonction observation.edit qui est très longue à cause des différents cas
 * de mise à jour des associations entre observation, ages, especes, et anaactes
 */
trait ObservationEdit
{
  function updateAnimal($observation, $datas)
  {

    $especes_id = Collect();

    $ages_id = Collect();

    foreach ($datas as $key => $data) {

      if (explode('_', $key)[0] == 'espece') {

        $especes_id->push(explode('_', $key)[1]) ;

      } elseif (explode('_', $key)[0] == 'age') {

        $ages_id->push(explode('_', $key)[1]);

      }
    }
    $observation->especes()->detach();
    $observation->especes()->attach($especes_id);

    $observation->ages()->detach();
    $observation->ages()->attach($ages_id);

  }

  public function updateOption($observation, $datas)
  {

    $options_id = Collect();

    foreach ($datas as $key => $value) {

      if (explode('_', $key)[0] == 'option') {

        $options_id->push(explode('_', $key)[1]);

      }
    }

    $observation->options()->detach();
    $observation->options()->attach($options_id);

  }

  public function updateAnaacte($observation, $datas)
  {
    $observation->anaactes()->detach();

    foreach ($datas as $key => $data) {

      if(explode('_', $key)[0] == 'anaacte') {

        $anaacte_id = explode('_', $key)[1];

        for ($i=0; $i < $data ; $i++) {

          $observation->anaactes()->attach($anaacte_id);

        }

      }

    }

  }

  public function updateObservation($observation, $datas)
  {
    if(isset($datas['intitule'])) {

      $intitule = strip_tags($this->quoteToChevron($datas['intitule']));

    } else {
      $intitule = "---- vide ----";
    }

    $explication = ($datas['explication']) ? strip_tags($datas['explication']) : "";
    $autres = ($datas['autres']) ? strip_tags($datas['autres']) : null;
    $ordre = ($datas['ordre']) ? strip_tags($datas['ordre']) : 1;
    $categorie_id = ($datas['categorie']) ? $datas['categorie'] : 1;

    $observation->update([
      'intitule' => $intitule,
      'explication' => $explication,
      'autres' => $autres,
      'categorie_id' => $categorie_id,
      'ordre' => $ordre
    ]);

  }
}
