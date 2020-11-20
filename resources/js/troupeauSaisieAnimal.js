// On crée des variables vides pour garder en mémoire le numéro et le nom lors de la saisie
var numero = "";
var nom="";
var estNum = /[0-9]+/g;
// On crée la liste des animaux du troupeau
var liste_animaux = [];

$(".animal_numero").each(function() {

  liste_animaux.push($(this).val());

})

// Maintien le focus sur le nouvel animal d'un troupeau à saisir dans troupeauShowEditAnimal
$("#add_animal_numero").focus();

// Les bouton modif les animaux sont désactivés
$(".btn_animal_edit").hide();

//############################################################################
//                         SAISIE D'UN NOUVEL ANIMAL                         #
//############################################################################
// A la saisie dans le champ numéro
$("#add_animal_numero").on('keyup', function(e) {
  // Si on tape la touche Echap, ça vide l'input et enlève le style erreur
  if(e.which === 27) {

    $(this).removeClass('is-invalid')
    $(this).val('')

  }
  // Si le numéro est dans la liste, ça met un style d'erreur et ça désactive le bouton submit
  if($.inArray($(this).val(), liste_animaux) != -1) {

    $(this).addClass('is-invalid');
    $("#add_animal_btn").attr('disabled', 'disabled');

    // Sinon ça enlève le style d'erreur et réactive le bouton submit
  } else {

    $(this).removeClass('is-invalid');
    $('#add_animal_btn').removeAttr('disabled');

  }

})
// Si une valeur est seulement saisie par autocompletion, on vérifier qu'elle ne soit pas déà dans la liste
$("#add_animal_numero").on('blur', function() {
  // Si le numéro est dans la liste, ça met un style d'erreur et ça désactive le bouton submit
  if($.inArray($(this).val(), liste_animaux) != -1) {

    $(this).addClass('is-invalid').focus();
    $("#add_animal_btn").attr('disabled', 'disabled');

    // Sinon ça enlève le style d'erreur et réactive le bouton submit
  } else {

    $(this).removeClass('is-invalid');
    $('#add_animal_btn').removeAttr('disabled');

  }
})

// A la soumission du formulaire "ajouter un animal"
var soumission = false; // variable pour éviter une boucle infinie
$("#add_animal").on('submit', function(e) {
  if(!soumission) {

    e.preventDefault();
    // Si les deux champs sont vides
    if($("#add_animal_numero").val() == '' && $('#add_animal_nom').val() == '') {

      alertChampVide();

      // Si seul le champs numero est rempli
    } else if ($("#add_animal_numero").val() != '' && $('#add_animal_nom').val() == '') {

      alertAprèsTestNum();

      // S'il y a seulement un nom
    } else if ($("#add_animal_numero").val() == '' && $('#add_animal_nom').val() != '') {

      confirmAnimalSansNum();

      // Si les deux champs sont remplis on vérifie avec le champs num est un nombre
    } else {

      promptApresTestNum();

    }
  }

})

//#####################################################################
//                     MODIFICATION D'UN ANIMAL                       #
//#####################################################################

// Quand le numéro de l'animal prend le focus
$(".animal_numero").on('focus', function() {
  var animal_id = $(this).attr('id');
  // On récupère ce  numéro
  numero = animal_id.split('_')[2];
  // On enlève ce numéro de la liste des animaux
  liste_animaux.splice(liste_animaux.indexOf(numero), 1);
  // On construit l'id du bouton de validation de la modification pour le mettre disabled
  var btn_id = "#btn_" + animal_id;

  $(btn_id).show();

  $(this).on('keyup', function(e) {

    if(e.which === 27) {

      $(btn_id).hide();

      $(this).val(numero);

      $(this).removeClass('is-invalid');

      $(this).trigger('blur');

    } else {

      if($.inArray($(this).val(), liste_animaux) != -1) {

        doublon($(this), btn_id);

        $(btn_id).hide();

      } else {

        $(this).removeClass('is-invalid');

        $(btn_id).show();

      }

    }

  })

})


$(".animal_numero").on('blur', function() {

  if($(this).val() == "") {

    $(this).val(numero);
  }
  // On construit l'id du bouton de validation de la modification pour le mettre disabled
  var btn_id = "#btn_" + $(this).attr('id');



})

$(".animal_existant").on('focus', function() {

  $(this).removeClass('form-control-plaintext').addClass('form-control');

})

$(".animal_existant").on('blur', function() {

  $(this).addClass('form-control-plaintext').removeClass('form-control');

})

//##################### FONCTIONS #############################################

function alertAprèsTestNum() {

  // On teste si c'est un nombre
  var test = estNum.test($("#add_animal_numero").val());
  // Si oui on soumet le questionnaire
  if(test) {
    soumission = true;
    $("#add_animal").submit();
    // Si non on demande à l'user s'il veut vraiment saisir un nom à la place du numéro
  } else {

    $.confirm({
      theme : "dark",
      type : "green",
      title : "Attention",
      content : "Souhaitez-vous saisir juste un nom sans numéro ?",
      buttons : {
        OUI : {
          btnClass : 'btn-success',
          keys : ['enter'],
          action :function() {
            if($.inArray($("#add_animal_nom").val(), liste_animaux) == -1) {
              soumission = true;
              $("#add_animal").submit();
            } else {
              doublon($("#add_animal_numero"), $("#add_animal_btn").attr('id'));
              close();
            }
          }
        },
        NON : {
          btnClass : 'btn-danger',
          keys : ['esc'],
          action : function() {
            $("#add_animal_numero").val('').focus();
          }
        }
      }
    });
  }
}

function promptApresTestNum() {
  // On teste si c'est un nombre
  var test = estNum.test($("#add_animal_numero").val());
  // Si oui on soumet le questionnaire
  if(test) {
    soumission = true;
    $("#add_animal").submit();
    // Si non on demande à l'user s'il veut vraiment saisir un nom à la place du numéro
  } else {

    $.alert({
      theme : "dark",
      type : "green",
      title : "Attention",
      content : "Il faut saisir un nombre dans le champ 'numero' !",
      buttons : {
        ok : {
          btnClass : 'btn-success',
          keys : ['enter'],
          action : function() {
            $("#add_animal_numero").val('').focus();
          }
        }
      }
    });
  }
}

function confirmAnimalSansNum() {

  $.confirm({
    theme : "dark",
    type : "green",
    title : "Confirmation",
    content : "Vous confirmez que l'animal n'a pas de numéro !",
    buttons : {
      oui : {
        btnClass : 'btn-success',
        keys : ['enter'],
        action :function() {
          if($.inArray($("#add_animal_nom").val(), liste_animaux) == -1) {
            $("#add_animal_numero").val($("#add_animal_nom").val());
            $("#add_animal_nom").val('');
            soumission = true;
            $("#add_animal").submit();
          } else {
            console.log('toto');
            doublon($("#add_animal_numero"), $("#add_animal_btn").attr('id'));
          }
        }
      },
      non : {
        btnClass : 'btn-danger',
        keys : ['esc'],
        action : function() {
          $("#add_animal_numero").focus();
        }
      }
    }
  })

}

function alertChampVide() {
  $.alert({
    theme : "dark",
    type : "red",
    title : "Attention",
    content : "Il faut au moins saisir un nom ou un numéro",
    buttons : {
      OK : {
        btnClass : "btn-success",
        keys : ['enter'],
        function() {
          $("#add_animal_numero").focus();

        }
      }
    }
  })
}

function doublon(champ, bouton) {

  $(champ).addClass('is-invalid');

  $(champ).on('blur', function() {

    $(champ).val(numero);

    $(champ).removeClass('is-invalid')

    $(bouton).removeAttr('disabled');
  })

}
