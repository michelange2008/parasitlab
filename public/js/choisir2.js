
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
  var espece = $(this).attr('id').split('_')[1];
  // On efface tous les panneaux préalablement affichés
  $('.espece_choix').hide();
  $('.signes').hide();
  // $('.anatype').removeClass("visible").addClass("invisible");
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
  // Affichage des choix liés à l'espece
  $('#'+espece+'_choix').toggle();

  choix_situation(espece);

});

// AFFICHAGE DES DIFFERENTS SIGNES OBERVES EN FONCTION DES SITUATIONS
// Volet qui s'affiche ou s'efface
function choix_situation(espece) {
  // Quand on clique sur le bandeau de situation
  $('.situation').on('click', function() {
    // On efface les anatypes affichés
    // $('.anatype').removeClass("visible").addClass("invisible");
    // On récupère la nom de la situation
    var situation = $(this).attr('id');
    // Et selon l'état du panneau des signes de la situation
    if($('#'+espece+'_'+situation).is(":hidden")) {
      // On masque tout les panneaux
      $('.signes').hide();
      // On affiche le panneau correspondant à la situation²
      $('#'+espece+'_'+situation).show();

    } else {
      // Sinon on masque tout
      $('.signes').hide();

    }
    // choix_analyse(espece, situation);
  })

}

// function choix_analyse(espece, situation) {
// // Quand on clique sur un signe
//   $('.signe').on('click', function () {
//     // On récupère sont id
//     var signe = $(this).attr('id');
//     console.log(signe);
//     // On en déduit l'anatype
//     var anatype_id = '#' + signe.replace('signe', 'ana');
//     // Et selon l'état d'affichage de l'anatype
//     $('.anatype').removeClass("visible").addClass("invisible");
//     $(anatype_id).toggleClass("invisible").toggleClass("visible");
//   })
// }
