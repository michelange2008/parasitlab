// Diverses fonction utilisées lors du remplissage du formulaire de nouvelle demande d'analyse
$('#userSelect').focus();
$('.liste_anatypes').hide();

if(!$('#userSelect').val()) {

  $('#especeSelect').attr('disabled', 'disabled');
  $('#troupeauSelect').attr('disabled', 'disabled');
  $('#anatypeSelect').attr('disabled', 'disabled');
  $('#anaacteSelect').attr('disabled', 'disabled');
  $('#prelevement').attr('disabled', 'disabled');
  $('#reception').attr('disabled', 'disabled');
  $('#nbPrelevements').attr('disabled', 'disabled');
}

// On récupére l'url actuelle
var url_actuelle = window.location.protocol + "//" + window.location.host + window.location.pathname; // récupère l'adresse de la page actuelle

var choix_user = false; // On initialise ces deux variables qui serviron à savoir ce qui a été sélectionné ou pas en cas d'une navigation désordonnée
var choix_espece = false;

// Fonction destinée a renvoyer vers la page de création d'un utilisateur si la ligne"nouveau" est choisie
$("select[name='userDemande']").change(function() {

  $('.listeSerie').remove(); // on enlève une éventuelle référence à une série
  $('#anatypeSelect').removeClass('is-invalid'); // Cas ou l'utilisateur a essayé de choisir un anatype sans choix préalable d'un user
  $('#typeAlerte').hide();

  if($("select[name='userDemande'] > option:selected").val() == "Nouveau") { // S'il sagit d'un nouvel éleveur

    var option = $("select[name='userDemande'] > option:selected");

    var url_nouvelle = url_actuelle.replace('demandes', 'user');

    $.confirm({
      theme : 'dark',
      type : 'red',
      typeAnimated: 'true',
      title: option.attr('titre'),
      content : option.attr('texte'),
      buttons : {
        oui: {
          text : 'oui',
          btnClass : 'btn-red',
          action : function() {
            window.location = url_nouvelle;
            $('#especeSelect').removeAttr('disabled').focus();
            },
        },
        non: function() {
        }
      }
    });


  } else { // Si on fait le choix d'un utilisateur déjà existant


    choix_user = $('#userSelect > options:selected').attr('id'); // On rempli la variable

    $(this).removeClass('is-invalid').addClass('is-valid'); // On passe le rouge au vert

    $('#especeSelect').removeAttr('disabled').focus();

  }

});
//################################################################################################
// Liste des anaactes en fonction de l'anatype sélectionné
// Puis à chaque changement d'espece on met à jour la liste tes types
$('#especeSelect').on('change', function() {

  var eleveur_id = $('#userSelect').val();

  choix_espece = $('#especeSelect > option:selected').attr('id');

    var espece_nom = $('#especeSelect > option:selected').attr('id'); // on récupère l'espece choisie dans la variable espece_nom

    $(this).addClass('is-valid');

    $("#troupeauSelect").removeAttr('disabled').focus(); // On saute à la date de prélèvement
    // On récupère la liste éventuelle des troupeaux
    troupeauSelonEspece(eleveur_id, espece_nom);

    anatypeSelonEspece(espece_nom);

})
// A la sélection d'un troupeaux
$('#troupeauSelect').on('change', function() {

  $('#prelevement').removeAttr('disabled').focus();
  $('#reception').removeAttr('disabled');

})


// A la sélection d'une date on passe au champs suivant
$('#prelevement').on('change', function() {

  $('.date_alerte').hide();
  id_actuel = '#' + $(this).attr('id');
  var dateChoix =Date.parse($(this).val());
  validDate(dateChoix, id_actuel, '#reception');
  compareDate();
})

$('#reception').on('change', function() {

  $('.date_alerte').hide();
  id_actuel = '#' + $(this).attr('id');
  var dateChoix = Date.parse($(this).val());
  validDate(dateChoix, id_actuel, '#anatypeSelect');
  compareDate();
})

$('#anatypeSelect').on('change', function() {

  $("#anaacteSelect").removeAttr('disabled').focus();

})

$('#anaacteSelect').on('change', function() {

  $('#nbPrelevements').removeAttr('disabled').focus();
})

// Fonction destinée à valider les dates
function validDate(dateChoix, id_actuel, id_next) {

  $('.date_alerte').hide(); // On efface les alertes
  var aujourdhui = Date.now(); // On cacule le timestamp du jour
  if(aujourdhui - dateChoix < 0) { // Si la différence la date choisie est dans le futurœ

    $(id_actuel + '_futur').show(); //On afiche une petit phrase

  } else if (aujourdhui - dateChoix > 864000000) { // Si elle est plus ancienne que 10 jours

    $(id_actuel + '_passe').show(); // On affiche une autre phrase

  } else { // Sinon

    $(id_actuel + '_ok').show();

    $(id_next).removeAttr('disabled').focus(); // On passe au champs suivant

  }

};

function compareDate() {

  if($('#prelevement').val() !== '' && $('#reception').val() !== '') {

    var date_prelevement = Date.parse($('#prelevement').val());
    var date_reception = Date.parse($('#reception').val());

    if(date_reception - date_prelevement < 0) {

      $('.date_ok').hide();
      $('#reception_prelevement').show();
    }

    else {

      $('.date_ok').show();
    }
  }

}

function troupeauSelonEspece(eleveur_id, espece_nom) {

  var url = url_actuelle.replace('laboratoire/demandes/create', 'api/troupeau/'+eleveur_id + '/' + espece_nom);

  $.get({

    url: url

  })
  .done(function(datas) {

    var valeurs = JSON.parse(datas);
    $(".listeTroupeau").remove();
    if(valeurs.length > 0) {
      var liste = "";
      $.each(valeurs, function(key, value) {
        liste += '<option value="' + value.id +'" class="listeTroupeau" required>' +
                  value.nom + '</option>'
      });
      $("#troupeauSelect").append(liste);
    } else {
      $('#troupeauSelect option[value="nouveau"]').prop('selected', true);
      $('#troupeauSelect').trigger('change');
    }

  }).fail(function(datas) {
    console.log(datas);
  })

}

function anatypeSelonEspece(espece_nom) {

  var url = url_actuelle.replace('laboratoire/demandes/create', 'api/anatypes/'+espece_nom);

  $.get({

    url: url,

  })
  .done( function(data) {

    var valeurs = JSON.parse(data);
    $(".liste_anatypes").hide();
    $.each(valeurs, function(key, value) {
      $("#anatypes_"+value).show();
    })

  })
  .fail(function(data) {
    console.log("il y a une erreur " + data);
  })


}
