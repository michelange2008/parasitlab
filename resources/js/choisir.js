// Intervient dans la page choisir (ExtranetDemandeController@choisir)
// Quand on clique sur l'icone de l'espece, cela affiche la liste des questions que l'on peut se poser  sur le parasitisme de cette espece
// via une requete ajax qui interroge la méthode ExtranetDemandeController@observationSelonEspece
// On affiche cette liste dans la vue methodeChoixAnalyse
// Cela permet ensuite de cliquer sur les différentes observations et à chaque fois, ça fait uner requete ajax (ExtranetDemandeController@analyseSelonObservations)
// Cette requete retourne un json que l'on affiche dans la vue options.blade


// Initialise la liste des observations
var tableau_observations = [];
var selection = [];
// On récupère le href original du bouton de téléchargment de formulaire pour pouvoir le remettre à zéro quand on change d'espèce
var href_initial = $("#bouton_pdf").attr('href');

// ##################### PREMIERE ETAPE ##########################################################################
// Affichage des analyses proposées après qu'on ait cliqué sur l'icone de l'espece (dans choisir.blade.php)
$('.espece').on('click', function() {
  // On réinitialise le bouton de téléchargement de fichier
  $('#bouton_pdf').attr('href', href_initial);
  // On modifie l'affichage des logos espece
  $(".espece").css('filter', 'opacity(20%)');
  $(this).css('filter', 'blur(0px)');
  // On vide la colonne d'options
  videOptionsAnaaactes();
  // On efface les intertitres correspondant aux categories
  $('.categorie').hide();
  // On vide la liste d'observation
  $('.liste_observations').empty();

  selection = [];
  // On récupère l'id de l'espece sur laquelle on a cliqué
  var espece_id = $(this).attr('id').split('_')[1];
  // On stocke cette valeur dans un input hidden pour la suite
  $("#input_espece").val(espece_id);
  // On récupére l'url actuelle
  var url_actuelle = window.location.protocol + "//" + window.location.host + window.location.pathname; // récupère l'adresse de la page actuelle
  // On modifie l'url pour pouvoir faire la requete
  var url = url_actuelle.replace('analyses/choisir', 'api/observations/'+espece_id);

  // On récupère l'abbreviation de l'espece pour pouvoir modifier le href du bouton de téléchargement du formulaire
  var espece_abbreviation = $(this).attr('name');
  var href = href_initial.replace('espece', espece_abbreviation);
  $('#bouton_pdf').attr('href', href);

  // affiche le soustitre et on lui donne l'attribut espece avec l'espece_id comme valeur pour la requete ajax suivante
  $("#titre_observations").attr('espece', espece_id).fadeIn()
  // on appelle la fonction qui fait la requete ajax
  listeObservations(url);

  var observation_id = '';
  // On réinitialise le tableau de observations sélectionnées
  tableau_observations = [];
  // On remet à zéro le numéro d'observation qui serait sélectionné
  $('.liste_observations').each(function(key,value) {

    selection.push(null);
  })
});


// ################ DEUXIEME ETAPE ###########################################################
// Quand on clique sur les observations
$(".liste_observations").on('click', ".card", function() {
  // On récupère l'id de la card qui englobe observation et explication cliquée
  var id = $(this).attr('id').split('_')[1];
  var observation_id = '#observation_' + id;
  var explication_id = '#explication_' + id;
  var estSelection = $(observation_id).attr('selection');
  // On récupère la catégorie
  var categorie_id = $(this).parent().attr('id');
  var id_categorie = categorie_id.split('_')[1];

// SUR LA COLONNE OBSERVATIONS:
  if(estSelection == "oui") {

    inactiveObservation(id);
    // On supprime cette valeur dui tableau selection
    selection[id_categorie-1] = null;

  } else if(estSelection == "non") {
    // On passe l'attribut selection à true
    // Si une observation de cette catégorie est présente dans le tableau selection (cad a été sélectionnée avant)
    if(selection[id_categorie-1] != null) { // Le id_categorie-1 est du au fait que l'array selection indice à 0 tandis que les bdd commencent à 1
      var id_observation_active = selection[id_categorie-1];
      // On inactive l'observation (fermer le collapse, enlever la couleur)
      inactiveObservation(id_observation_active);
    }
    // Puis on inscrit la nouvelle obbservation cliquée dans le tableau selection
    selection[id_categorie-1] = id; // Le "-1" est dû au fait que les id des catégories commencent à 1 tandis que l'index du tableau à 0
    activeObservation(id);
  }

  // ON EFFACE TOUTE LA COLONNE OPTIONS:
  videOptionsAnaaactes();

  // On stocke la sélection dans les input pour la transmission ajax
  $.each(selection, function(key,value) {
    var indice = key + 1;
    $("#input_" + indice).val(value);
  })


  // On appelle la fonction listeOptions qui fait une requete post du formulaire caché (ExtranetDemandeController@optionsSelonObservations)
  listeOptions();


  // $('#bouton_pdf').fadeIn();
});

// Fonction qui requete ajax avec l'espece_id (ExtranetDemandeController@observationSelonEspece)
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
      $('.categorie').fadeIn();
      $.each(lignes, function(key, ligne) {
        // la creation de la variable autre est destinée à ne rien afficher quand la valeur de ligne.autres est null
        var autres = (ligne.autres == null) ? '': '<p class="ml-3 mb-0 p-1 pl-2 bordure-epaisse"><i>Autres causes&nbsp;: </i>' + ligne.autres + '</p>';
        // On ajoute la liste des observations
        $("#categorie_" + ligne.categorie_id).append(
          '<div id="card_' + ligne.id + '" class="card borderless" categorie="'+ligne.categorie_id+'">'+
            '<div id="observation_' + ligne.id + '" class="card-header observation list-group-item list-group-item-action disabled pointeur" selection="non" >' +
                  ligne.intitule +
            '</div>' +
            '<div id="explication_' + ligne.id + '" class="collapse bg-bleu-tres-clair">' +
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

// Fonction qui passe en display:block les options et les analyses sélectionnées
function listeOptions() {

    var url_actuelle = window.location.protocol + "//" + window.location.host + window.location.pathname; // récupère l'adresse de la page actuelle
    // On modifie l'url pour pouvoir faire la requete
    var url = url_actuelle.replace('analyses/choisir', 'api/options');

    $.post({
      url : url,
      data: $('form').serialize(), // on passe le formulaire caché
      datatype: 'json'
    })
    .done(function(datas) {
      if(datas != null) { // Si des données sont revenues (ce qui doit être systématiquement le cas)
        var options = JSON.parse(datas).options; // On récupère le tableau options (2 options max)
        var anaactes = JSON.parse(datas).anaactes; // on révupère le tableau anaactes (2 anaactes max)
        if(nombreSelections(selection) > 0) { // S'il y a au moins une sélection

          if(options.length == 0) { // Mais que le tableau option est vide, on affiche un message qu'il n'y a pas d'analyse

            $('#aucune_option').show();


          } else { // Mais si le tableau option n'est pas vide, on affiche les options et anaactes correpondants

            $.each(options, function(key, value) { // Affichage des options
              $('#' + value + '.option').fadeIn();
            })
            if(anaactes.length == 1) { // Affichage d'un titre d'analyses différent s'il y en a une ou deux
              $('#une').fadeIn();
            } else {
              $('#deux').fadeIn();
            }

            $.each(anaactes, function(key, value) { // Affichage des analyses
              $('#anaacte_' + value).fadeIn();
            })

            $('#boutons').fadeIn(1000);
          }
          $('#penser_veto').fadeIn(3000); // Et le véto

        } else { // Si il n'y aucune observation séléctionnée, on efface tout

          videOptionsAnaaactes();
        }

      }

    })
}

function videOptionsAnaaactes() {

  // On masque le panneau veto
  $("#penser_veto").hide();
  $('#boutons').hide();
  // On masque la liste d'options
  $('.option').hide();
  $('.anaacte').hide();
  // On masque le titre des analyses proposées
  $(".titre_analyses").hide();

  // On vide le 0 option
  $('#aucune_option').hide();

}

function inactiveObservation(id) {
  $("#observation_" + id).attr('selection', 'non');
  $("#observation_" + id).toggleClass('active').toggleClass('disabled');
  $("#explication_" + id).removeClass('show');

}

function activeObservation(id) {
  $("#observation_" + id).attr('selection', 'oui');
  $("#observation_" + id).toggleClass('active').toggleClass('disabled');
  $("#explication_" + id).addClass('show');

}

function nombreSelections(selection) {

  var longueur_selection = 0
  selection.forEach(function(value) {
    longueur_selection += (value == null) ? 0 : 1;
  });

  return longueur_selection;
}
