// Intervient dans la page choisir (ExtranetDemandeController@choisir)
// Quand on clique sur l'icone de l'espece, cela affiche la liste des questions que l'on peut se poser  sur le parasitisme de cette espece
// via une requete ajax qui interroge la méthode ExtranetDemandeController@observationSelonEspece
// On affiche cette liste dans la vue methodeChoixAnalyse
// Cela permet ensuite de cliquer sur les différentes observations et à chaque fois, ça fait uner requete ajax (ExtranetDemandeController@analyseSelonObservations)
// Cette requete retourne un json que l'on affiche dans la vue listeAnalysesProposees

// Initialise la liste des observations
var tableau_observations = [];

// ##################### PREMIERE ETAPE ##########################################################################
// Affichage des analyses proposées après qu'on ait cliqué sur l'icone de l'espece (dans choisir.blade.php)
$('.espece').on('click', function() {

  // modifie l'affichage des logos espece
  $(".espece").css('filter', 'opacity(20%)');
  $(this).css('filter', 'blur(0px)')
  // On vide la liste des observations
  $('.liste_observations').children().remove();
  // On vide la liste des analyses proposées
  $('#liste_analyses').children().remove();
  // On masque le titre des analyses proposées
  $(".titre_analyses").fadeOut();
  // On masque toutes les explications
  $('.observation').each(function () {
    $(this).removeClass('active').addClass('disabled')
  });
  // on efface le bouton de téléchargement du formulaire
  href = $('#pdf').attr('href');
  var regex = /getFormulairePdf\/[0-9]+/;
  href = (href.match(regex)) ? href.replace(regex, 'getFormulairePdf') : href;
  $('#pdf').attr('href', href);
  $('#bouton_pdf').fadeOut();
  // On réinitialise le tableau de observations sélectionnées
  tableau_observations = [];

  // On récupère l'id de l'espece sur laquelle on a cliqué
  var espece_id = $(this).attr('id').split('_')[1];
  // On réupére l'url actuelle
  var url_actuelle = window.location.protocol + "//" + window.location.host + window.location.pathname; // récupère l'adresse de la page actuelle
  // On modifie l'url pour pouvoir faire la requete
  var url = url_actuelle.replace('choisir', 'methode/'+espece_id);

  // affiche le soustitre et on lui donne l'attribut espece avec l'espece_id comme valeur pour la requete ajax suivante
  $("#titre_observations").attr('espece', espece_id).fadeIn()
  // on appelle la fonction qui fait la requete ajax
  listeObservations(url);

});


// ################ DEUXIEME ETAPE ###########################################################
// Quand on clique sur les observations
$(".liste_observations").on('click', ".card-header", function() {

  // On commence par masquer toutes les explications
  $('.collapse').each(function() {
    // TODO: A voir s'il faut masquer les explications
    $(this).removeClass('show');
  })
  // On vide la liste d'analyses
  $('#liste_analyses').children().remove();
  // On efface le titre
  $('.titre_analyses').fadeIn();

  // On récupère l'id de l'observation sur laquelle on a cliqué
  var observation_id = $(this).attr('data-target');
  // On affiche l'explication
  $("#"+observation_id).addClass('show');

  // stockage dans un tableau de l'id de la ligne
  if(tableau_observations.indexOf(observation_id) == -1) { // si l'observation_id n'est pas dans le tableau
    tableau_observations.push(observation_id); // on l'ajoute
  }
  else {
    tableau_observations.splice(tableau_observations.indexOf(observation_id),1  ); // sinon on l'enlève
    $("#"+observation_id).removeClass('show');
  }

  // Changement de couleur de la ligne observation
  $(this).toggleClass('disabled').toggleClass('active'); // et on change de couleur
  // On crée une liste de l'id des observatins sélectionnées, séparéees par des underscores pour le passer à l'ajax
  liste = '';
  $.each(tableau_observations, function(key, value) {
    liste += value+"_";
  })
  // On récupère l'id de l'espece
  espece_id = $("#titre_observations").attr('espece');
  // Et on reconstruit l'url pour la requete ajax
  var url_actuelle = window.location.protocol + "//" + window.location.host + window.location.pathname; // récupère l'adresse de la page actuelle
  var url = url_actuelle.replace('choisir', 'observations/'+espece_id+'/'+liste);

  listeAnalyses(url);

  var href = $("#pdf").attr('href');
  href = href.concat('/'+espece_id);
  $('#pdf').attr('href', href);
  $('#bouton_pdf').fadeIn();
});

// Fonction qui requete ajax avec l'espcece_id (ExtranetDemandeController@observationSelonEspece)
// Et affiche le résultat sous la forme d'une liste d'observations avec trois propriétés quand on clique:
// 1) ça met l'observation en couleur
// 2) cela expand l'affichage pour montrer l'explication et les autres origines
// 3) ça complete la liste des observations cliquées et ça fait une requete ajax pour afficher la liste des analyses
function listeObservations(url) {

  $.get({
    url:url
  })
  .done(function(datas) {
    if(datas != null) {

      lignes = JSON.parse(datas);

      $.each(lignes, function(key, ligne) {
        // la creation de la variable autre est destinée à ne rien afficher quand la valeur de ligne.autres est null
        var autres = (ligne.autres == null) ? '': '<p class="ml-3 mb-0 p-1 pl-2 bordure-epaisse"><i>Autres causes&nbsp;: </i>' + ligne.autres + '</p>';
        // On ajoute la liste des observations
        $("#observations_" + ligne.categorie_id).append(
          '<div class="card">'+
            '<div class="card-header observation list-group-item list-group-item-action disabled pointeur" data-target="observation_' + ligne.id + '">' +
                  ligne.intitule +
            '</div>' +
            '<div id="observation_' + ligne.id + '" class="collapse">' +
              '<div class="card-body small">' +
                '<p class="ml-3 mb-0 p-1 pl-2 bordure-epaisse">' + ligne.explication + '</p>' +
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
function strUcFirst(a){return (a+'').charAt(0).toUpperCase()+a.substr(1);};

function listeAnalyses(url) {

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
}
