// Fonction destinée a renvoyer vers la page de création d'un utilisateur si la ligne"nouveau" est choisie
$("select[name='userDemande']").change(function() {
  console.log($("select[name='userDemande'] > option:selected").val());

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
  }
});
//################################################################################################

//################################################################################################
// Requête pour vérifier si l'anapack correspond à une série
function ajouterEstSerie() {

  var anapack = $("select[name='anapack'] > option:selected").attr('id');

  var url_actuelle = window.location.protocol + "//" + window.location.host + window.location.pathname; // récupère l'adresse de la page actuelle
  // l'adresse pour consulter la méthode estSerie de AnapackController est estserie/n°Anapack
  var user_name = $("select[name='userDemande'] > option:selected").attr('id');

  var url_nouvelle = url_actuelle.replace('demandes/create', 'estserie/'+anapack+'/'+user_name);

  $.get({

    url : url_nouvelle,
    data_type : 'json',


  })
  .done(function(data) {
    var liste = JSON.parse(data);
    console.log(liste.estSerie);
    if(liste.estSerie == 1) {
      $('#estSerie').removeClass('d-none');
    }
    else {
      $('#estSerie').addClass('d-none');
    }
  })
  .fail(function(data) {

    console.log("ça merde !");
  })

}

ajouterEstSerie();

$("select[name='anapack'] ").on('change', function() {

  ajouterEstSerie();

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
