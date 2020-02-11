$('.espece').on('click', function() {

  var espece_id = $(this).attr('id').split('_')[1];


  var url_actuelle = window.location.protocol + "//" + window.location.host + window.location.pathname; // récupère l'adresse de la page actuelle

  var url_nouvelle = url_actuelle + '/' + espece_id;

  $.get({

    url : url_nouvelle
  })
  .done(function(datas) {

    console.log(datas);

  })
  .fail(function(error) {

    console.log((error));
    
  })

});
