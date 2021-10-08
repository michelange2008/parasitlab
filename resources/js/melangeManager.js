
// GESTION DE LA MODIFICATION DES MELANGES
// Crée un nouvel animal dans un mélange ou ajoute ou retire un animal d'un mélange
// On récupére l'url actuelle
var url_actuelle = window.location.protocol + "//" + window.location.host + window.location.pathname; // récupère l'adresse de la page actuelle
// On récupère l'id du mélange pour la mise à jour
var melange_id = $("#liste-in").attr('melange');
var troupeau_id = $('#liste-in').attr('troupeau')
// On initialise la variable à faux
var animal_deja_present = false

// Ajout d'un animal
$("#add_animal").on("click", function() {
  var numero_nouveau = $("#numero_nouveau").val();
  var nom_nouveau = $("#nom_nouveau").val();
  // Si le champs numero est vide, on ouvre une alert d'avertissement
  if(numero_nouveau == '') {

    $.alert({
      title: "Attention !",
      content: "Il faut saisir au moins une valeur dans le champs numéro",
      theme: 'dark',
      type: 'red',
      icon: 'fas fa-exclamation-triangle',
      buttons: {
        OK: {
          btnClass : 'btn-success',
        }
      }
    });

  } else {
    // On passe en revue tous les numeros déjà existants
    $('button').each(function(index) {
      if($(this).html().search(numero_nouveau) !== -1) {
        // On passe la variable à vrai
        animal_deja_present = true;
      }
    })

    // Si le nom saisi est déjà parmi les existants, on fait une alerte
    // qui laisse la choix de l'enregister quand même.
    if(animal_deja_present) {
      $.confirm({
        title: "Attention !",
        content: "Cet animal semble déjà exister, voulez-vous quand même l'enregistrer",
        theme: 'dark',
        type: 'orange',
        icon: 'fas fa-exclamation-triangle',
        buttons: {
          oui: {
            btnClass: 'btn-blue',
            keys: ['enter'],
            action: function() {
              // Si on veut tout de même l'enregistrer, on soumet le formulaire
              formsubmit();
            }
          },
          non: {
            btnClass: 'btn-secondary',
            keys: ['esc'],
            action:function() {
              $('#numero_nouveau').focus();
            }
          }
        }
      });
    } else {
      // On crée le nouvel animal
      formsubmit();
    }

  }

})

// Met à jour la liste des animaux du mélange dans la BDD puis appelle la fonction
// updateMelange qui met à jour la liste affichée à  l'écran
function formsubmit() {

  url = getUrl('api/melange/addAnimal');

  $("#numero_nouveau").attr('value', $("#numero_nouveau").val());

  $.post({
    url: url,
    data: $("#form_addAnimal").serialize()
  })
  .done(function(data) {
    var animal = JSON.parse(data);
    // On met à jour le mélange en ajoutant cet animal dans la bdd (AJAX)
    updateMelange(animal.id, 'addtomelange');
    // On met à jour l'affichage
    updateListeMelange(animal);

  })
  .fail(function(data) {
    alert('il y a un problème !')
  })
}

// Ajout ou suppression d'un animal du mélange
// Quand on clique sur un animal
$('.liste-animals').on('click', '.animal-melange', function() {

  // On récupère le contenu
  var contenu = $(this).html();
  // On récupère le numéro de l'animal
  var contenu_id = $(this).children().attr('id');
  var animal_id = contenu_id.split('_')[1];
  // On récupère l'id de la liste
  var liste_id = $(this).parent().attr('id');
  // On efface la ligne correspondante
  $(this).fadeOut();
  // Si on a cliqué sur un animal hors du mélange
  if(liste_id == "liste-out") {
    // On met à jour le mélange en ajoutant cet animal dans la bdd (AJAX)
    updateMelange(animal_id, 'addtomelange');
    // On affiche cette animal dans la liste In
    $("#animalIn_" + animal_id).fadeIn();
    // Si on a cliqué sur un animal dans le mélange
  } else {
    // On l'enlève du mélange dans la BDD (AJAX)
    updateMelange(animal_id, 'deltomelange');
    // On l'affiche dans la liste hors mélange
    $("#animalOut_" + animal_id).fadeIn();
  }

})

// Fonction qui renvoie l'url pour la requete AJAX
function getUrl(route) {
  // comme les url sont différente en local (avec /public/) et en distant
  // et que il y deux façon de créer un nouvel animal dans un mélange (melange.create et melange.edit)
  // Il faut repérer le position du mot laboratoire et modifier l'url en conséquence
  var cesure = url_actuelle.search('laboratoire');
  // cesure est la position de la lettre l dans l'url actuelle
  // url_actuelle.sustring(cesure) est le fragment d'url à partir du l de laboratoire
  return url_actuelle.replace( url_actuelle.substring(cesure), route);
}

// Met à jour le mélange dans la base de donnée par une requete ajax
// Si addOrdel = 'addtomelange' c'est un ajout via la méthode DonneesController@addtomelange
// Si addOrdel = 'deltomelange' c'est un retrait via la méthode DonneesController@deltomelange
function updateMelange(animal_id, addOrdel) {

  // Création de l'url de la requete AJAX (addtomelange pour ajout, deltomelange pour retrait)

  url = getUrl(('api/melange/' + addOrdel));
  // On construit un JSON
  var data = {
    "melange_id" : melange_id,
    "animal_id" : animal_id
  }

  // Requete post sur DonneesController@maddtomelange
  $.post({
    url : url,
    data: data,
  })
  .done(function(datas) {
    console.log("Ok tout va bien");
  })
  .fail(function(errors) {
    console.log('ERREURS:' + errors);
  })

}

// Met à jour la liste des animaux présents dans le mélange avec le retour ajax
// de la fonction DonneesController@melangeUpdate
function updateListeMelange(animal) {

  // On ajoute une ligne visible dans les animaux du mélange
  var ligne_in =
    '<div id="animalIn_' + animal.id +
    '" class="animal-melange in-melange">' +
    '<button id="animal_' + animal.id + '"' +
    'class="m-1 p-3 border btn btn-info text-left w-100" title="' + animal.id +' ">' +
    animal.numero + ' ' + (animal.nom ? animal.nom : '') +
    '</button></div>';

  $('#liste-in').prepend(ligne_in);
  // Et une ligne cachée dans les animaux hors du mélange
  var ligne_out =
    '<div id="animalOut_' + animal.id +
    '" class="animal-melange out-melange collapse">' +
    '<button id="animal_' + animal.id + '"' +
    'class="m-1 p-3 border btn btn-light text-left w-100" title="' + animal.id +' ">' +
    animal.numero + ' ' + (animal.nom ? animal.nom : '') +
    '</button></div>';

  $('#liste-out').prepend(ligne_out);
}
