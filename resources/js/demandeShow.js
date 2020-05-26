//Mise à jour de l'AFFICHAGE
var demande = $('#demande');

if(demande.attr('acheve') == 1) {

  $('#inacheve').hide();

  if(demande.attr('signe') == 1) {

    $('#acheve_non_signe').hide();
    $('#affiche_pdf').show();
    $('#signe').show();
    $('#renvoyer_resultats').show();

    if(demande.attr('envoye') == 1) {

      $('#envoye').show();

    }

    else {

      $('#a-envoyer').show();

    }

  } else {

    $('#acheve_signe').hide();
    $('#a-signer').show();

  }

} else {

  $("a-signer").hide();

}


// SIGNATURE DES DEMANDES ET MODIFICATION DES AFFICHAGES CORRESPONDANT
$('#a-signer').on('click', function(e) {

  e.preventDefault();

  var demande_id = $(this).attr('attribut');

  var url_actuelle = window.location.protocol + "//" + window.location.host + window.location.pathname; // récupère l'adresse de la page actuelle

  var url_nouvelle = url_actuelle.replace('demandes', 'signer');

  $.confirm({
    theme : 'dark',
    type : 'green',
    title: "Signer une analyse",
    content : "Veux-tu vraiment signer ces résultats ?",
    buttons : {
      oui: {
        text : 'oui',
        btnClass : 'btn-success',
        action : function() {

          $.get({

            url : url_nouvelle,

          })
          .done(function(data) {
            $('#acheve_non_signe').hide();
            $('#acheve_signe').show();
            $('#a-signer').hide();
            $('#signe').fadeIn();
            $('#a-envoyer').fadeIn()
            $('#affiche_pdf').show();
            $('#renvoyer_resultats').show();
            $('#inacheve').hide();
          })
          .fail(function(data) {
            console.log(data);
          });

        },
      },
      non: function() {
      }
    }
  });


})
