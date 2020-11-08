// Fonction destinée à gérer les types de prélèvements: collectifs (et donc sans lecture d'un troupeau ni écriture)
// ou individuel (ce qui implique de lire la liste des animaux du troupeau et d'écrire les nouveaux animaux).

// Lecture du bouton radio
$(".typeprelevement").each(function() {
  $(this).attr('checked', false);
})
// AU changement de valeur du bouton radio
$(".typeprelevement").on('change', function(e) {
  // On récupère la valeur du bouton et on concatene pour reconstruire l'id des champs des noms des prélèvements
  var type = ".type_" + $(this).val();

  $(".input_type").hide();

  $(type).fadeIn();

  if($(this).val() === 'indiv') {

    var url_actuelle = window.location.protocol + "//" + window.location.host + window.location.pathname; // récupère l'adresse de la page actuelle

    var eleveur_id = $("#userSelect option:selected").val();

    var espece_nom = $("#especeSelect option:selected").val();

    var anc ='laboratoire/demandes/create';

    var nouv =  'api/troupeau/' + eleveur_id + '/' + espece_nom;

    var url = url_actuelle.replace(anc, nouv);

    $.get({

      url: url

    })
    .done(function(datas) {
      console.log(JSON.parse(datas));
    })

  }

})
