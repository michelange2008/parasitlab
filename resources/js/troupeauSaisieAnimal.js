// Maintien le focus sur le nouvel animal d'un troupeau à saisir dans troupeauShowEditAnimal
$("#animal_numero").focus();
var liste_animaux = [];
$(".animal_numero").each(function() {
  liste_animaux.push($(this).val());
})

$("#animal_numero").on('keyup', function() {

    if($.inArray($("#animal_numero").val(), liste_animaux) != -1) {

      $("#animal_numero").addClass('is-invalid');


    } else {

      $("#animal_numero").removeClass('is-invalid')

    }


})
