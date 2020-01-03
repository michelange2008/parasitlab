// Fonction destinée a renvoyer vers la page de création d'un utilisateur si la ligne"nouveau" est choisie
$("select[name='userDemande']").change(function() {

  $('.listeSerie').remove();

  if($("select[name='userDemande'] > option:selected").val() == "Nouveau") {

    var url_actuelle = window.location.protocol + "//" + window.location.host + window.location.pathname; // récupère l'adresse de la page actuelle

    var url_nouvelle = url_actuelle.replace('demandes', 'user');

    $.confirm({
      theme : 'dark',
      type : 'red',
      typeAnimated: 'true',
      title: "Nouvel éleveur",
      content : "Faut-il créer un nouvel éleveur ?",
      buttons : {
        oui: {
          text : 'oui',
          btnClass : 'btn-red',
          action : function() {
            window.location = url_nouvelle;
          },
        },
        non: function() {
        }
      }
    });
  } else { // Si c'est pas un nouvel éleveur et qu'il y a déjà eu un choix de l'anapack, on appelle la fonction ajouterEstSerie

    var anapack_id = $("select[name='anapack'] > option:selected").attr('id');

    var user_id = $("select[name='userDemande'] > option:selected").attr('id');

    ajouterEstSerie(anapack_id, user_id);

  }


});
//################################################################################################

//################################################################################################
// Fonction pour vérifier si l'anapack correspond à une série
function ajouterEstSerie(anapack_id, user_id) {

  var url_actuelle = window.location.protocol + "//" + window.location.host + window.location.pathname; // récupère l'adresse de la page actuelle
  // l'adresse pour consulter la méthode estSerie de AnapackController est estserie/anapack_id/user_id

  var url_nouvelle = url_actuelle.replace('demandes/create', 'estserie/'+anapack_id+'/'+user_id);

  $.get({

    url : url_nouvelle,
    data_type : 'json', // renvoie un json: estSerie (bouleen), nbDemande (integer), numero d'ordre (objet Demande)

  })
  .done(function(data) {
    var liste = JSON.parse(data); // on récupère le json

    if(liste.estSerie == 1) { // Si c'est une série

      $('#estSerie').removeClass('d-none'); // on affiche le bloc correspondant

      $('#premierPrelevementSerie').val('premier');

      if(liste.nbDemandes != 0) { // si l'user à déjà des séries inachevées du meme anapack on affiche l'info avec du dernier prélèvement

        for (var i = 0; i < liste.nbDemandes; i++) { // On passe en revue les différentes demandes dans ce cas (série identique inachevée)

          $("#premier").after(
            '<div class="form-check listeSerie">'+

            '<input type="radio" class="form-check-input" id="serie_'+liste[i].id+'" name="serie" value="'+liste[i].id+'">'+

            '<label for="demande_id">Nouvel envoi de la même série que la demande du '+liste[i].date_reception+'</label>'+

            '</div>'
          )

        }

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

// Au changement d'anapack on appelle la fonction ajouterEstSerie
$("select[name='anapack'] ").on('change', function() {

  $('.listeSerie').remove(); // après avoir éliminer d'éventuelles lignes résiduelles

  var anapack_id = $("select[name='anapack'] > option:selected").attr('id');

  var user_id = $("select[name='userDemande'] > option:selected").attr('id');

  ajouterEstSerie(anapack_id, user_id);

})

//###################################################################################################
// Modifie le nombre de ligne de prélèvement en fonction de la valeur de l'input
var nbPrelevements = $("input[name='nbPrelevements']").val() // nombre de prélèvement

// Boucle qui passe en revue chaque ligne est l'affiche si son index est inférieur au nombre de prélèvements
$('.lignePrelevement').each(function(index) {
  if(index < nbPrelevements) {
    $('#lignePrelevement_'+(index+1)).removeClass('d-none').addClass('d-flex');
  }
});
// Idem quand on change la valeur de l'input nb de prélèvements
$("input[name='nbPrelevements']").on('change', function(e) {

    nbPrelevements = $("input[name='nbPrelevements']").val();

    $(".lignePrelevement").removeClass('d-flex').addClass('d-none');

    $('.lignePrelevement').each(function(index) {
      if(index < nbPrelevements) {
        $('#lignePrelevement_'+(index+1)).removeClass('d-none').addClass('d-flex');
      }
    });
});
//##########################################################################################################

//#########################################################################################################
// Affiche la liste des vétos si sitch "envoi to véto" est sur emitter.on('event', (arguments) => {

var toVeto =$('#toVeto').prop('checked');

function afficheListeVeto(auVeto) {

  if(!auVeto) {
    $('#choixDuVeto').addClass('d-none').removeClass('d-block'); // liste déroulante des vétos
    $('#iconeVeto').removeClass('d-none').addClass('d-block'); // icone veto pour remplacer quand la liste déroulante est masquée
                                                                //(pour éviter de faire bouger les boutons en dessous)
  }
  else {
    $('#choixDuVeto').removeClass('d-none').addClass('d-block');
    $('#iconeVeto').addClass('d-none').removeClass('d-block');
  }

};

// au démarrage l'affiche du véto dépend de la position d'origine du switch
afficheListeVeto($('#toVeto').prop('checked'));

// au changement de switch on change l'affichage
$('#toVeto').on('change', function() {

  afficheListeVeto($('#toVeto').prop('checked'));

});
//############################################################################################################

//#############################################################################################################
// Change le bouton radio de choix de l'envoi de la facture

$('#radioBtn a').on('click', function(){
    var sel = $(this).data('title');
    var tog = $(this).data('toggle');
    $('#'+tog).prop('value', sel);

    $('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
    $('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
})

//#################################################################################################################
