var tableau_observations = [];
// Affichage des analyses proposées après qu'on ait cliqué sur l'icone de l'espece (dans choisir.blade.php)
$('.espece').on('click', function() {
// console.log(tableau_observations);
  $('#liste_analyses').children().remove();
  $('.liste_observations').children().remove();
  $(".titre_analyses").fadeOut();

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

$("ul").on('click', ".list_observation", function() {

  var observation_id = $(this).attr('id');
  $('.body-text').fadeOut(100);
  $("#explication" + observation_id).fadeIn();
  $("#autres" + observation_id).fadeIn();
  $('#liste_analyses').children().remove();
  // stockage dans un tableau de l'id de la ligne
  if(tableau_observations.indexOf(observation_id) == -1) { // si l'observation_id n'est pas dans le tableau
    $('#myModal').modal('show')
    tableau_observations.push(observation_id); // on l'ajoute

  }

  else {

    tableau_observations.splice(tableau_observations.indexOf(observation_id),1  ); // sinon on l'enlève

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
        $('#liste_analyses').append("<li id="+id+" class='lead type list-group-item list-group-item-action color-bleu-tres-fonce'>"+ key +"</li>") // On liste les anatypes

        $.each(value, function(clef, valeur) { // On passe en revue les anaactes dans chaque anatype
          $("#"+id).append('<ul id="anaacte'+valeur.id+'" class="small sousliste list-group color-bleu"></ul>') // On affiche l'anaacte dans une sousliste
          $("#anaacte"+valeur.id).append("<li class='list-group-item'>"+valeur.acte+"</li>")
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
        // console.log(ligne.autres);
        $('#liste_'+ligne.categorie_id).append("<li id='"+ligne.id+"' class='list_observation list-group-item list-group-item-action disabled pointeur'>"+strUcFirst(ligne.intitule)+"</li>");
        $("#explication").append('<p id="explication' + ligne.id + '" class="body-text" style="display:none">'+ligne.explication+'</p>')
        if(ligne.id != null) {
          $('.causes-possibles').fadeIn();
          $('#autres').append('<p id="autres' + ligne.id + '" class="body-text"  style="display:none">'+ligne.autres+'</p>')

        }
      })
    }
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
