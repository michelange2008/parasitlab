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
  .done(function(data) {
    if(data == 1) {
      var text = "Merci de votre choix."
    } else {
      var text = "Nous avons pris note de votre choix."
    }
    $.alert({
      animation: 'opacity',
      closeAnimation: 'opacity',
      theme: 'dark',
      type: 'green',
      title: "Vos préférences",
      content: text,
      buttons: {
        OK: {
          keys: ['enter', 'esc'],
        }
      }
  })
})
.fail(function(data) {
  console.log(data);
})

})
