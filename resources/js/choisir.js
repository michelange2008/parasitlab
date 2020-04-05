var tableau_observations = [];
// Affichage des analyses proposées après qu'on ait cliqué sur l'icone de l'espece (dans choisir.blade.php)
$('.espece').on('click', function() {

  $('.accordion').children().remove();
  $('#liste_analyses').children().remove();
  $(".titre_analyses").fadeOut();
  // On masque toutes les explications
  $('.list_observation').each(function () {
    $(this).removeClass('active').addClass('disabled')
  })

  tableau_observations = [];

  var url_actuelle = window.location.protocol + "//" + window.location.host + window.location.pathname; // récupère l'adresse de la page actuelle

  var espece_id = $(this).attr('id').split('_')[1];

  var url = url_actuelle.replace('choisir', 'methode/'+espece_id);

  // modifie l'affichage des logos espece
  $(".espece").css('filter', 'opacity(20%)');

  $(this).css('filter', 'blur(0px)')

  // affiche le soustitre
  var espece_nom = $(this).attr('name');

  $("#titre_observations").attr('espece', espece_id).fadeIn()

  listeObservations(url);

});


// Quand on clique sur les observations

$(".accordion").on('click', ".card-header", function() {
  // On commence par masquer toutes les explications
  $('.collapse').each(function() {
    // TODO: A voir s'il faut masquer les explications
    // $(this).removeClass('show');
  })
  // On vide la liste d'analyses
  $('#liste_analyses').children().remove();

  // On récupère l'id de l'observation sur laquelle on a cliqué
  var observation_id = $(this).attr('data-target');
  // On affiche l'explication
  $("#"+observation_id).addClass('show');
  // stockage dans un tableau de l'id de la ligne
  if(tableau_observations.indexOf(observation_id) == -1) { // si l'observation_id n'est pas dans le tableau
    // $('#myModal').modal('show')
    tableau_observations.push(observation_id); // on l'ajoute

  }

  else {

    tableau_observations.splice(tableau_observations.indexOf(observation_id),1  ); // sinon on l'enlève
    $("#"+observation_id).removeClass('show');

  }

  // Changement de couleur de la ligne observation
  $(this).toggleClass('disabled').toggleClass('active'); // et on change de couleur
  // On crée une liste de l'id des observatins sélectionnées, séparéees par des virgules pour le passer à l'ajax
  liste = '';
  $.each(tableau_observations, function(key, value) {
    liste += value+"_";
  })
  espece_id = $("#titre_observations").attr('espece');
  // Et on reconstruit l'url pour la requete ajax
  var url_actuelle = window.location.protocol + "//" + window.location.host + window.location.pathname; // récupère l'adresse de la page actuelle
  var url = url_actuelle.replace('choisir', 'observations/'+espece_id+'/'+liste);
  $('.titre_analyses').fadeIn();

  $.get({

    url : url,

  })
  .done(function(datas) {

    if(datas != null) {
      var analyses = JSON.parse(datas);
      // On passe en revue le JSON renvoyé par ExtranetDemandeController@analyseSelonObservations
      $.each(analyses, function(key, value) {
        var id = key.split(" ")[0]+key.length // Manipulation pour créer une id unique avec le nom de l'anatype
        $('#liste_analyses').append("<li id="+id+" class='lead type list-group-item list-group-item-action color-bleu-tres-fonce'>"+ strUcFirst(key) +"</li>") // On liste les anatypes

        $.each(value, function(clef, valeur) { // On passe en revue les anaactes dans chaque anatype
          $("#"+id).append('<ul id="anaacte'+valeur.id+'" class="small sousliste list-group color-bleu"></ul>') // On affiche l'anaacte dans une sousliste
          $("#anaacte"+valeur.id).append("<li class='list-group-item'>"+strUcFirst(valeur.acte)+"</li>")
        })
      })
    }

  });
});

function listeObservations(url) {

  $.get({
    url:url
  })
  .done(function(datas) {
    if(datas != null) {

      lignes = JSON.parse(datas);

      $.each(lignes, function(key, ligne) {

        var autres = (ligne.autres == null) ? '': '<p class="ml-3 mb-0 p-1 bordure-epaisse"><i>Autres causes&nbsp;: </i>' + ligne.autres + '</p>';
        $("#accordion_" + ligne.categorie_id).append(
          '<div class="card">'+
            '<div class="card-header list_observation list-group-item list-group-item-action disabled pointeur" data-target="observation_' + ligne.id + '">' +

                  ligne.intitule +
            '</div>' +
            '<div id="observation_' + ligne.id + '" class="collapse">' +
              '<div class="card-body small">' +
                '<p class="ml-3 mb-0 p-1 bordure-epaisse">' + ligne.explication + '</p>' +
                autres +
              '</div>' +
            '</div>' +
          '</div>'
        );
      });
    };
  })
  .fail(function(datas) {
    console.log('ERREUR: '+datas);
  })
}

// Fonction pour mettre le permier mot en majuscule
function strUcFirst(a){return (a+'').charAt(0).toUpperCase()+a.substr(1);}

miseAJourAnaacte();
// Remplissage  Affiche au chargement de la page la listes des actes correspondant à un anatype précis
function miseAJourAnaacte() {

  var url_actuelle = window.location.protocol + "//" + window.location.host + window.location.pathname; // récupère l'adresse de la page actuelle
  var regex = new RegExp('choisir/[0-9]\/[0-9]');

  var option_selected = $('#select_anatype option:selected').attr('value');

  if (url_actuelle.search(regex) != -1) {

    var url = url_actuelle.replace( regex ,'anaactes/' + option_selected); // modifie d'adresse pour accéder à la méthode show de BlogController

    getAnaactes(url);

  }
  else if (url_actuelle.search('laboratoire/demandes/create') != -1) {

    var url = url_actuelle.replace( 'laboratoire/demandes/create' ,'anaactes/' + option_selected); // modifie d'adresse pour accéder à la méthode show de BlogController

    getAnaactes(url);

  }

};

function getAnaactes(url)
{
  $.get({

    url : url,

  })
  .done(function(data) {

    elements = JSON.parse(data);
    $.each(elements, function(key, element) {

      $("#select_anaacte").append('<option value="'+element.id+'">'+strUcFirst(element.nom)+' '+element.pu_ht+'€</option>')
    })
  });

}

$('#select_anatype').on('change', function() {

  $("#select_anaacte").empty();
  miseAJourAnaacte();

})
