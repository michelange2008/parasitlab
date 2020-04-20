$('.a-envoyer').on('click', function() {

  var destinataire_id = $(this).attr('destinataire');

  var url_actuelle = window.location.protocol + "//" + window.location.host + window.location.pathname; // récupère l'adresse de la page actuelle

  var url_nouvelle = url_actuelle.replace('demandes', 'envoyer/'+destinataire_id);

  $.confirm({
    theme : 'dark',
    type : 'green',
    typeAnimated: 'true',
    title: "Envoyer une analyse",
    content : "Dois-je envoyer ces résultats aux destinataires ?",
    buttons : {
      oui: {
        text : 'oui',
        btnClass : 'btn-success',
        action : function() {

          $.get({

            url : url_nouvelle,

          })
          .done(function(data) {
            console.log(data);
            $('#envoye').fadeOut();
            $('#a-envoyer-jq').fadeOut();
            $('#envoye-jq').fadeIn();
          })
          .fail(function(data) {
            console.log("ERREUR !");
          });

        },
      },
      non: function() {
      }
    }
  });


})
