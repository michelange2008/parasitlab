// Maintien le focus sur le nouvel animal d'un troupeau à saisir dans troupeauShowEditAnimal
$("#animal_numero").focus();

var liste_animaux = [];

$(".animal_numero").each(function() {

  liste_animaux.push($(this).val());

})
// On enlève l'input vide (nouvel animal) de la liste des animaux
liste_animaux.splice(0,1);

var numero = "";
// Le bouton modif est désactivé
$(".btn_animal_edit").attr('disabled', 'disabled');
// Quand le numéro de l'animal prend le focus
$(".animal_numero").on('focus', function() {

  // On récupère ce  numéro
  numero = $(this).attr('id').split('_')[2];
  // On enlève ce numéro de la liste des doublons
  liste_animaux.splice(liste_animaux.indexOf(numero), 1);
  // On construit l'id du bouton de validation de la modification pour le mettre disabled
  var btn_id = "#btn_" + $(this).attr('id');


  $(this).on('keyup', function(e) {

    if(e.which === 27) {

      $(this).val(numero);

      $(btn_id).removeAttr('disabled');

      $(this).removeClass('is-invalid')

    }

    if($.inArray($(this).val(), liste_animaux) != -1) {

      $(this).addClass('is-invalid');


      $(this).on('blur', function() {

        $(this).val(numero);

        $(this).removeClass('is-invalid')

        $(btn_id).removeAttr('disabled');
      })

    } else {

      $(this).removeClass('is-invalid')

      $(btn_id).removeAttr('disabled');

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
