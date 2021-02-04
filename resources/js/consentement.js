$(".consentement").on('change', function() {
  var url_actuelle = window.location.protocol + "//" + window.location.host + window.location.pathname; // récupère l'adresse de la page actuelle
  var url_nouvelle = url_actuelle.replace('eleveur', 'consentement');
  var user_id = $(this).attr('user');
  var consentement = $(this).attr('id');
  var datas = {'user_id' : user_id, 'consentement' : consentement};

  $.post({
    url: url_nouvelle,
    data: datas
  })
  .done(function(datas) {
    $.alert({
      theme: 'dark',
      type: 'green',
      title: "Modification de mes préférences",
      content: datas
    })
  })
  .fail(function(datas) {
    console.log(datas);
  })

})
