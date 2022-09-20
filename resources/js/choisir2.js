// Intervient dans la page choisir (Technique\AnalysesController@choisir)
// Quand on clique sur l'icone de l'espece, cela affiche la liste des questions que l'on peut se poser  sur le parasitisme de cette espece
// via une requete ajax qui interroge la méthode ExtranetDemandeController@observationSelonEspece
// On affiche cette liste dans la vue methodeChoixAnalyse
// Cela permet ensuite de cliquer sur les différentes observations et à chaque fois, ça fait uner requete ajax (ExtranetDemandeController@analyseSelonObservations)
// Cette requete retourne un json que l'on affiche dans la vue options.blade
var choisirFirst = $('#choisirFirst').attr('session');
// Initialise la liste des observations
var tableau_observations = [];
var selection = [];
// On récupére l'url actuelle
var url_actuelle = window.location.protocol + "//" + window.location.host + window.location.pathname; // récupère l'adresse de la page actuelle

// On récupère le href original du bouton de téléchargment de formulaire pour pouvoir le remettre à zéro quand on change d'espèce
// var href_initial = $("#bouton_pdf").attr('href');
// On récupère l'adresse des icones ainsi que le contenu du tooltip pour la remise à zéro en changement d'espcèce
var src_img_espece = $('#src_img_espece').attr('lien');

//#################################### INTRODUCTION ############################################################
// Explique qu'il faut choisir une analyse
// Efface l'explication et affiche la liste des especes
$('#choisirExplicationBouton').on('click', function() {

  $('#choisirExplication').hide();

  $('#choisirEspece').fadeIn();

})

 // ##################### PREMIERE ETAPE ##########################################################################
// Affichage des analyses proposées après qu'on ait cliqué sur l'icone de l'espece (dans choisir.blade.php)
$('.espece').on('click', function() {
  // On efface les fenêtre ages
  $("#age").empty();
  // On vide le champs input ages
  $("#input_age").val('');
  $("#explication_observation").empty();

  // On réinitialise le bouton de téléchargement de fichier
  // $('#bouton_pdf').attr('href', href_initial);
  // On modifie l'affichage des logos espece
  $(".espece").css('filter', 'opacity(20%)');
  $(this).css('filter', 'blur(0px)');

});
