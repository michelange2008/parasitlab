$('.a-envoyer').on('click', function() {

  var destinataire_id = $(this).attr('destinataire');
  var type = $(this).attr('type');
  var url_actuelle = window.location.protocol + "//" + window.location.host + window.location.pathname; // récupère l'adresse de la page actuelle

  // si c'est un premier envoi, cela peut être à l'éleveur et au vétérinaire
  if (type === "all") {
    var url_nouvelle = url_actuelle.replace('demandes', 'envoyer_tous/'+destinataire_id);

  }
  else if (type === "single") {

    var url_nouvelle = url_actuelle.replace('demandes', 'envoyer/'+destinataire_id);
  }
  else {
    alertProblem()
  }
console.log(type);
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
          $('#envoi-spinner').fadeIn();
          $('#a-envoyer').hide();
          $('#a-envoyer-jq').hide();
          $('#envoye').fadeOut();

          $.get({

            url : url_nouvelle,

          })
          .done(function(data) {
            $('#envoi-spinner').hide();
            $.confirm({
              theme : 'dark',
              type : 'green',
              typeAnimated: 'true',
              title: "C'est fait !",
              content : "Le mail est bien parti.",
              buttons : {
                ok : {
                  text : 'ok',
                  keys : ['enter', 'escape'],
                }
              }
            });
            $('#envoye-jq').fadeIn();
          })
          .fail(function(data) {
            $('#envoi-spinner').hide();
            $('#envoye-jq').hide();
            $('#a-envoyer').show();
            alertProblem();
          });

        },
      },
      non: function() {
      }
    }
  });


})

function alertProblem() {
  $.confirm({
    theme : 'dark',
    type : 'red',
    typeAnimated: 'true',
    title: "Problème !!!",
    content : "Il y a eu un problème, merci de réessayer",
    buttons : {
      ok : {
        text : 'ok',
        keys : ['enter', 'escape'],
      }
    }
  });
}
