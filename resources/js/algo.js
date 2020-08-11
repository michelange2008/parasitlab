// FONCTION DESTINEE A SAVOIR QUELS SONT LES EXCLUSIONS DEJA EXISTANTES QUAND ON VEUT EN CREER UNE NOUVELLE
// Quand on choisis une nouvelle observation
$('#observations').on('change', function() {
  // On passe en revue toutes les checkbox pour les décocher
  $(':input[type=checkbox]').each(function(key, value) {

    $(this).attr('checked', false);

  });
  // On récupère l'id de l'observation choisie
  var observation_id = $(this).children('option:selected').val();
  // On récupère l'url actuelle
  var url_actuelle = window.location.protocol + "//" + window.location.host + window.location.pathname; // récupère l'adresse de la page actuelle
  // Pour pouvoir la transformer en url  de requete ajax
  var url = url_actuelle.replace('laboratoire/algorithme/exclusions/create', 'api/exclusionsObservation/' + observation_id);
  // On fait la requete ajax via une route api qui conduit à DonneesController@exclusionsObservation
  $.get({

    url: url,

  })
  .done(function(datas) {
    var exclusions = JSON.parse(datas);
    // Si les données renvoyées par la requete ajax ne sont pas nulles
    if(exclusions.length > 0) {
      // On passe en revue les différentes exclusions
      $.each(exclusions, function(key, value) {
        var espece_id = 'espece_' + value.espece_id; // On récupère les infos sur l'espèce, etc.
        var age_id = 'age_' + value.age_id;
        var anatype_id = 'anatype_' + value.anatype_id;
        // On passe en revue toutes les checkbox
        $(':input[type=checkbox]').each(function(key, value) {
          // Si elles on une idée en espece_x
          if (value.id == espece_id) {
            // On la coche
            $(this).attr('checked', 'checked');
            // et on recommence avec les ages et les anatypes
          } else if (value.id == age_id) {
            $(this).attr('checked', 'checked');

          } else if (value.id == anatype_id) {
            $(this).attr('checked', 'checked');

          }
        })
      })

    }
  })
  .fail( function(error) {
    console.log(error);
  })
});
