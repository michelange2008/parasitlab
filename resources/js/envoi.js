$('.a-envoyer').on('click', function(e) {

  e.preventDefault();

  var demande_id = $(this).attr('attribut');

  var url_actuelle = window.location.protocol + "//" + window.location.host + window.location.pathname; // récupère l'adresse de la page actuelle

  var url_nouvelle = url_actuelle.replace('demandes', 'envoyer');

  $.confirm({
    theme : 'dark',
    type : 'red',
    typeAnimated: 'true',
    title: "Envoyer une analyse",
    content : "Veux-tu vraiment envoyer ces résultats aux destinataires ?",
    buttons : {
      oui: {
        text : 'oui',
        btnClass : 'btn-red',
        action : function() {

          $.get({

            url : url_nouvelle,

          })
          .done(function(data) {
            $('.a-envoyer').fadeOut();
            $('#envoye-jq').fadeIn(4000);
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
