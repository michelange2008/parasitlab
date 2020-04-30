// On récupére l'url actuelle
var url_actuelle = window.location.protocol + "//" + window.location.host + window.location.pathname; // récupère l'adresse de la page actuelle

// FONCTION DESTINEE A CHOISIR L'ANAACTE EN FONCTION DE L'ANATYPE: AU DÉMARRAGE PUIS À CHAQUE CHANGEMENT
// on initialise la liste de anaactes avec l'anatype par défaut
var anatype_id = $("#anatypeSelect > option:selected").val();
// On efface le bloc estSerie

requeteAnaactes(anatype_id);

$('#anatypeSelect').on('focus', function() {
  if($('#userSelect > option:selected').val() == '') {

    $(this).addClass('is-invalid');
    $('#typeAlerte').show();
    $('#userSelect').focus();
  }
})

$('#anatypeSelect').on('change', function() {

  var anatype_id = $(this).children("option:selected").val();

  requeteAnaactes(anatype_id);

  $(this).addClass('is-valid');

  $('#anaacteSelect').focus();

});

// Modifie le liste des anaactes en fonction du choix de l'anatype
function requeteAnaactes(anatype_id) {
  $('#premierPrelevementSerie').val(null);
  $('#estSerie').addClass('d-none');
  $('.listeSerie').remove();

  var espece = $('#especeSelect').children("option:selected").attr('id');

  // On modifie l'url pour pouvoir faire la requete
  var url = url_actuelle.replace('laboratoire/demandes/create', 'api/anaactes/'+anatype_id+'/'+espece);

  $('#anaacteSelect').children().remove();

  $.get({

    'url': url,

  })
  .done(function(data) {

    var anaactes = JSON.parse(data);

    var option = '';

    $.each(anaactes, function(key, value) {

      option += '<option value="' + value.id + '">' + strUcFirst(value.nom) + '</option>'

    });

    $('#anaacteSelect').append(option);

    if(anaactes.length == 1) {

      $('#anaacteSelect').children().attr('selected', 'selected');

      ajouterEstSerie($('#anaacteSelect > option:selected').val(), $("#userSelect > option:selected").attr('id'));
    }


  })


}
//################################################################################################

// Au changement d'anaacte on appelle la fonction ajouterEstSerie
$("select[name='anaacte_id'] ").on('change', function() {

  $('.listeSerie').remove(); // après avoir éliminer d'éventuelles lignes résiduelles

  var anaacte_id = $("#anaacteSelect > option:selected").val();
  var user_id = $("#userSelect > option:selected").attr('id');

  ajouterEstSerie(anaacte_id, user_id);

})

// Fonction pour vérifier si l'anaacte correspond à une série
function ajouterEstSerie(anaacte_id, user_id) {


  // l'adresse pour consulter la méthode estSerie de AnapackController est estserie/anapack_id/user_id

  var url_nouvelle = url_actuelle.replace('laboratoire/demandes/create', 'api/estSerie/'+anaacte_id+'/'+user_id);
console.log(url_nouvelle);
  $.get({

    url : url_nouvelle,
    data_type : 'json', // renvoie un json: estSerie (bouleen), nbDemande (integer), numero d'ordre (objet Demande)

  })
  .done(function(data) {

    $('#premier').empty();
    var liste = JSON.parse(data); // on récupère le json

    if(liste.estSerie == 1) { // Si c'est une série

      $('#estSerie').removeClass('d-none'); // on affiche le bloc correspondant

      $('#premierPrelevementSerie').val('premier');

      if(liste.nbDemandes != 0) { // si l'user à déjà des séries inachevées du meme anapack on affiche l'info avec du dernier prélèvement

        $('#pas_de_serie').hide();

        $('#y_a_serie').show();

        for (var i = 0; i < liste.nbDemandes; i++) { // On passe en revue les différentes demandes dans ce cas (série identique inachevée)

          $("#premier").append(

            '<div class="form-check">' +

            '<input type="radio" class="form-check-input"  id="premierPrelevementSerie" name="serie" value="null" checked >' +

            '<label class="form-check-label" for="premierPrelevementSerie">' +

              $('#premier_envoi').attr("texte") +

            '</label></div>' +

            '<div class="form-check mt-2">' +

            '<input type="radio" class="form-check-input" id="serie_'+liste[i].id+'" name="serie" value="'+liste[i].id+'">'+

            '<label class="form-check-label" for="demande_id">'+$('#autre').attr("texte")+' '+liste[i].date_reception+'</label>' +

            '</div>'

          )

        }

      }

      else {

        $('#y_a_serie').hide();

        $('#pas_de_serie').show();

      }
    }
    else { // Sinon on efface tout le bloc
      $('#premierPrelevementSerie').val(null);
      $('#estSerie').addClass('d-none');
      $('.listeSerie').remove();

    }
  })
  .fail(function(data) {

    console.log("ça merde !");
  })

}

// Fonction pour mettre le permier mot en majuscule
function strUcFirst(a){return (a+'').charAt(0).toUpperCase()+a.substr(1);};
