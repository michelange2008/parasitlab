// Diverses fonction utilisées lors du remplissage du formulaire de nouvelle demande d'analyse
$('#userSelect').focus();
$('.liste_anatypes').hide();

$('#troupeauSelect').attr('disabled', 'disabled');
$('#anatypeSelect').attr('disabled', 'disabled');
$('#anaacteSelect').attr('disabled', 'disabled');
$('#prelevement').attr('disabled', 'disabled');
$('#reception').attr('disabled', 'disabled');

$('#nbPrelevements').attr('disabled', 'disabled');

if(!$('#userSelect').val()) {

  $('#especeSelect').attr('disabled', 'disabled');
}

// On récupére l'url actuelle
var url_actuelle = window.location.protocol + "//" + window.location.host + window.location.pathname; // récupère l'adresse de la page actuelle

var choix_user = false; // On initialise ces deux variables qui serviron à savoir ce qui a été sélectionné ou pas en cas d'une navigation désordonnée
var choix_espece = false;

// Fonction destinée a renvoyer vers la page de création d'un utilisateur si la ligne"nouveau" est choisie
$("select[name='userDemande']").change(function() {

  $('.listeSerie').remove(); // on enlève une éventuelle référence à une série

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

// Intermédiaire avec demandeCreateModifDates.js qui active anatype si les dates sont bonnes

$('#anatypeSelect').on('change', function() {

  $("#anaacteSelect").removeAttr('disabled').focus();

})

$('#anaacteSelect').on('change', function() {

  $('#nbPrelevements').removeAttr('disabled').focus();
})


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

//#################################################################################################
//            Gestion du bouton envoi facture véto en fonctin de l'existence ou non d'un véto ####
cacheVeto();

$('select[name=veto_id]').on('change', function() {

  cacheVeto();

})

function cacheVeto() {

  if($('select[name=veto_id]').val() == 0) {

    $("#type_veterinaire").hide();

  } else {

    $("#type_veterinaire").show();

  }

}

//#############################################################################################################
// Change le bouton radio de choix de l'envoi de la facture

$('#choixDestFact a').on('click', function(){
    var sel = $(this).data('title');
    var tog = $(this).data('toggle');
    $('#'+tog).prop('value', sel);

    $('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
    $('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
})
