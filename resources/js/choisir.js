// Intervient dans la page choisir (ExtranetDemandeController@choisir)
// Quand on clique sur l'icone de l'espece, cela affiche la liste des questions que l'on peut se poser  sur le parasitisme de cette espece
// via une requete ajax qui interroge la méthode ExtranetDemandeController@observationSelonEspece
// On affiche cette liste dans la vue methodeChoixAnalyse
// Cela permet ensuite de cliquer sur les différentes observations et à chaque fois, ça fait uner requete ajax (ExtranetDemandeController@analyseSelonObservations)
// Cette requete retourne un json que l'on affiche dans la vue options.blade





// Initialise la liste des observations
var tableau_observations = [];
  var selection = [];
// ##################### PREMIERE ETAPE ##########################################################################
// Affichage des analyses proposées après qu'on ait cliqué sur l'icone de l'espece (dans choisir.blade.php)
$('.espece').on('click', function() {

  // On modifie l'affichage des logos espece
  $(".espece").css('filter', 'opacity(20%)');
  $(this).css('filter', 'blur(0px)');
  // On vide la colonne d'options
  videOption();
  $('.categorie').hide();
  $('.liste_observations').empty();

  // On récupère l'id de l'espece sur laquelle on a cliqué
  var espece_id = $(this).attr('id').split('_')[1];
  // On stocke cette valeur dans un input hidden pour la suite
  $("#input_espece").val(espece_id);
  // On récupére l'url actuelle
  var url_actuelle = window.location.protocol + "//" + window.location.host + window.location.pathname; // récupère l'adresse de la page actuelle
  // On modifie l'url pour pouvoir faire la requete
  var url = url_actuelle.replace('choisir', 'methode/'+espece_id);

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
  // On récupère la catégorie
  var categorie_id = $(this).parent().attr('id');
  var id_categorie = categorie_id.split('_')[1];

// SUR LA COLONNE OBSERVATIONS:
// On crée un booleen qui est vrai si l'observation est active, cad qu'elle a été cliquée
  var est_active = ($(this).children(observation_id).attr('class').split(' ')).includes('active')

  if(est_active) {

    inactiveObservation(id);
    // On supprime cette valeur dui tableau selection
    selection[id-1] = null;

  } else {
    // Si une observation de cette catégorie est présente dans le tableau selection (cad a été sélectionnée avant)
    if(selection[id_categorie-1] != null) { // Le id_categorie-1 est du au fait que l'array selection indice à 0 tandis que les bdd commencent à 1
      var id_observation_active = selection[id_categorie-1];
      // On inactive l'observation (fermer le collapse, enlever la couleur)
      inactiveObservation(id_observation_active);
    }
    // Puis on inscrit la nouvelle obbservation cliquée dans le tableau selection
    selection[id_categorie-1] = id;
    activeObservation(id);
  }

  // ON EFFACE TOUTE LA COLONNE OPTIONS:
  videOption();

  // On stocke la sélection dans les input pour la transmission ajax
  $.each(selection, function(key,value) {
    var indice = key + 1;
    $("#input_" + indice).val(value);
  })


  // Et on reconstruit l'url pour la requete ajax
  // var url_actuelle = window.location.protocol + "//" + window.location.host + window.location.pathname; // récupère l'adresse de la page actuelle
  // var url = url_actuelle.replace('choisir', 'observations/'+espece_id+'/'+liste);
  //
  listeOptions();


  // $('#bouton_pdf').fadeIn();
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
      $('.categorie').fadeIn();
      $.each(lignes, function(key, ligne) {
        // la creation de la variable autre est destinée à ne rien afficher quand la valeur de ligne.autres est null
        var autres = (ligne.autres == null) ? '': '<p class="ml-3 mb-0 p-1 pl-2 bordure-epaisse"><i>Autres causes&nbsp;: </i>' + ligne.autres + '</p>';
        // On ajoute la liste des observations
        $("#categorie_" + ligne.categorie_id).append(
          '<div id="card_' + ligne.id + '" class="card borderless" categorie="'+ligne.categorie_id+'">'+
            '<div id="observation_' + ligne.id + '" class="card-header observation list-group-item list-group-item-action disabled pointeur" data-target="observation_' + ligne.id + '">' +
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

function listeOptions() {

    var url_actuelle = window.location.protocol + "//" + window.location.host + window.location.pathname; // récupère l'adresse de la page actuelle
    // On modifie l'url pour pouvoir faire la requete
    var url = url_actuelle.replace('choisir', 'choisir/options');

    $.post({
      url : url,
      data: $('form').serialize(),
      datatype: 'json'
    })
    .done(function(datas) {
      console.log(datas);
    })

  //
  // .done(function(datas) {
  //   if(datas != null) {
  //     if(JSON.parse(datas).length == 0) {
  //         $('#aucune_option').append(
  //           '<p class="lead alert-warning p-3">'
  //           +'Désolé... Nous n\'avons aucune proposition d\'analyses pour cette situation.'
  //           +'</p>'
  //         );
  //     }
  //     else {
  //
  //       $('#titre_options').fadeIn();
  //       var analyses = JSON.parse(datas);
  //
  //       $.each(analyses, function(key, value) {
  //         $('.option').each(function() {
  //           if($(this).attr('id') == value) {
  //             $(this).fadeIn();
  //           }
  //         })
  //       })
  //     }
  //     $('#penser_veto').fadeIn(2000);
  //
  //     // On passe en revue le JSON renvoyé par ExtranetDemandeController@analyseSelonObservations
  //     // $.each(analyses, function(key, value) {
  //     //   var id = key.split(" ")[0]+key.length // Manipulation pour créer une id unique avec le nom de l'anatype
  //     //   $('#liste_analyses').append("<li id="+id+" class='lead type list-group-item list-group-item-action color-bleu-tres-fonce'>"+ strUcFirst(key) +"</li>") // On liste les anatypes
  //     //
  //     //   $.each(value, function(clef, valeur) { // On passe en revue les anaactes dans chaque anatype
  //     //     $("#"+id).append('<ul id="anaacte'+valeur.id+'" class="small sousliste list-group color-bleu"></ul>') // On affiche l'anaacte dans une sousliste
  //     //     $("#anaacte"+valeur.id).append("<li class='list-group-item'>"+strUcFirst(valeur.acte)+"</li>")
  //     //   })
  //     // })
  //   }
  //
  // });
}

function videOption() {

  // On masque le panneau veto
  $("#penser_veto").hide();
  // On masque la liste d'options
  $('.option').each(function() {
    $(this).hide();
  });
  // On masque le titre des analyses proposées
  $("#titre_options").hide();
  // On vide le 0 option
  $('#aucune_option').empty();

}

function inactiveObservation(id) {

  $("#observation_" + id).toggleClass('active').toggleClass('disabled');
  $("#explication_" + id).removeClass('show');

}

function activeObservation(id) {

  $("#observation_" + id).toggleClass('active').toggleClass('disabled');
  $("#explication_" + id).addClass('show');

}
