$('#asigner').on('click', function(e) {

  e.preventDefault();

  var demande_id = $(this).attr('attribut');

  var url_actuelle = window.location.protocol + "//" + window.location.host + window.location.pathname; // récupère l'adresse de la page actuelle

  var url_nouvelle = url_actuelle.replace('demandes', 'signer');

  $.confirm({
    theme : 'dark',
    type : 'red',
    typeAnimated: 'true',
    title: "Signer une analyse",
    content : "Veux-tu vraiment signer ces résultats ?",
    buttons : {
      oui: {
        text : 'oui',
        btnClass : 'btn-red',
        action : function() {

          $.get({

            url : url_nouvelle,

          })
          .done(function(data) {
            $('#asigner').fadeOut();
            $('#signe').fadeIn(3000);
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
