// Fonction destinée à gérer les types de prélèvements: collectifs (et donc sans lecture d'un troupeau ni écriture)
// ou individuel (ce qui implique de lire la liste des animaux du troupeau et d'écrire les nouveaux animaux).


// AU changement de valeur du bouton radio
$(".typeprelevement").on('change', function(e) {
  // On récupère la valeur du bouton et on concatene pour reconstruire l'id des champs des noms des prélèvements

  if($(this).val() === 'indiv') {

    var url_actuelle = window.location.protocol + "//" + window.location.host + window.location.pathname; // récupère l'adresse de la page actuelle

    var anc ='laboratoire/demandes/create';

    var nouv =  'api/animal/' + troupeau_id;

    var url = url_actuelle.replace(anc, nouv);

    $.get({

      url: url

    })
    .done(function(datas) {
      // console.log(JSON.parse(datas));
    })

  }

})
