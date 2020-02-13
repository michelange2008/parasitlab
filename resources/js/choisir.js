$('.espece').on('click', function() {

  $(".espece").css('filter', 'opacity(20%)');
  $(this).css('filter', 'blur(0px)')

  $("#titre").html("Voici les analyses proposées pour les ");

  $(".anapack").fadeOut();

  var espece_id = $(this).attr('id').split('_')[1];

  var espece_nom = $(this).attr('name');

  $("#titre").append(espece_nom);

  $("#liste_anapacks").fadeIn();

  var card_id = ".anapack_" + espece_id;

  $(card_id).fadeIn();

});
