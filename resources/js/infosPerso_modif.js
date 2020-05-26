// FONCTION DESTINEE A PASSER LE FORMULAIRE DE MODIFICATION DES DONNEES DU VETERINAIRE D'ACTIF A INACTIF ET VICE-VERSA
$(":input").attr('readonly', true);
$("#liste_pays").attr('disabled', true);
$("#liste_veterinaires").attr('disabled', true);


$('#modifie').on('click', function() {

  $(":input").attr('readonly', false);
  $("#liste_pays").attr('disabled', false);
  $("#liste_veterinaires").attr('disabled', false);
  $("#new_vet").hide();
  $(this).hide();
  $('#valide').show();

});


$('#modif_infos').submit(function(e) {

  e.preventDefault();

  var saisie = $(this).serialize();

  var url = $(this).attr('action');

  // On vérifie que l'adresse email a un format valide. Les autres vérif sont faites par le formulaire lui-même et UserController@store
  var email = $('#champ_mail').val();

  if(!isEmail(email)) {

    $.alert({
      title: "Attention",
      content: $('#email_non_valide').attr('message'),
      type: 'red'
    });

    $('#champ_mail').addClass('is-invalid').focus();
  }

  else {

    $('#champ_mail').removeClass('is-invalid');

    $.post({

      url: url,
      datatype:  'html',
      data: saisie

    })
    .done(function(data) {
      if(data.erreur) {
        $.alert({
          theme: 'dark',
          title: "Attention",
          content: $('#email_doublon').attr('message'),
          type: 'red'
        });
      }
      $(":input").attr('readonly', 'readonly');
      $("#liste_pays").attr('disabled', true);
      $("#liste_veterinaires").attr('disabled', true);
      $('#modifie').show();
      $('#valide').hide();
    })
    .fail(function(data) {
      console.log('ERREUR');
    })

  }

});
// Fonction pour vérifier si un email a un format valide
function isEmail(myVar){
  // La 1ère étape consiste à définir l'expression régulière d'une adresse email
  var regEmail = new RegExp('^[0-9a-z._-]+@{1}[0-9a-z.-]{2,}[.]{1}[a-z]{2,5}$','i');

  return regEmail.test(myVar);
}
