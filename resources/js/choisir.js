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

var option_selected = $('#select_anatype option:selected').attr('value');

var url_actuelle = window.location.protocol + "//" + window.location.host + window.location.pathname; // récupère l'adresse de la page actuelle

var regex = new RegExp('[0-9]\/[0-9]');

var url = url_actuelle.replace( regex ,'anaactes/' + option_selected); // modifie d'adresse pour accéder à la méthode show de BlogController

console.log(url);

$.get({

  url : url,

})
.done(function(data) {

  // $elements = JSON.parse(data);

  console.log(data);
});


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

  console.log($(this).attr('class'));

})
