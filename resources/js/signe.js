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
            $('#a-signer').fadeOut();
            $('#signe-jq').fadeIn(2000);
            $('#a-envoyer-jq').fadeIn(3000);
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
