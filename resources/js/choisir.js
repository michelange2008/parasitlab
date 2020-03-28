// Affichage des analyses proposées après qu'on ait cliqué sur l'icone de l'espece (dans choisir.blade.php)
$('.espece').on('click', function() {

  $(".espece").css('filter', 'opacity(20%)');

  $(this).css('filter', 'blur(0px)')

  $("#titre").html("Voici les analyses proposées pour les ");

  $(".anatype").fadeOut();

  var espece_id = $(this).attr('id').split('_')[1];

  var espece_nom = $(this).attr('name');

  $("#titre").append(espece_nom);

  $("#liste_anatypes").fadeIn();

  var card_id = ".anatype_" + espece_id;

  $(card_id).fadeIn();

});

// Fonction pour mettre le permier mot en majuscule
function strUcFirst(a){return (a+'').charAt(0).toUpperCase()+a.substr(1);}

miseAJourAnaacte();
// Remplissage  Affiche au chargement de la page la listes des actes correspondant à un anatype précis
function miseAJourAnaacte() {

  var url_actuelle = window.location.protocol + "//" + window.location.host + window.location.pathname; // récupère l'adresse de la page actuelle
console.log(url_actuelle);
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

// EN ATTENTE D'AVOIR FINI LA SELECTION
// var url = url_actuelle + '/anatypes/' + option_selected; // modifie d'adresse pour accéder à la méthode show de BlogController
// var url = url_actuelle + '/anatypes/' + option_selected; // modifie d'adresse pour accéder à la méthode show de BlogController

// $.get({
//
//   url : url,
// })
// .done(function(data) {
//
//   $elements = JSON.parse(data);
//
//   console.log($elements);
// });
// Affichage de la liste déroulante des anaactes une fois qu'on a sélectionné un anatype
$('#select_anatype').on('change', function() {

  $("#select_anaacte").empty();
  miseAJourAnaacte();

})
