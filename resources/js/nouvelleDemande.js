$('#select_anatype').on('change', function() {

  var anatype_id = $(this).children("option:selected").val();

  var espece = $('#especeSelect').children("option:selected").attr('id');

  // On récupére l'url actuelle
  var url_actuelle = window.location.protocol + "//" + window.location.host + window.location.pathname; // récupère l'adresse de la page actuelle
  // On modifie l'url pour pouvoir faire la requete
  var url = url_actuelle.replace('laboratoire/demandes/create', 'api/anaactes/'+anatype_id+'/'+espece);

  $('#select_anaacte').children().remove();

  $.get({

    'url': url,

  })
  .done(function(data) {

    var anaactes = JSON.parse(data);

    var option = '';

    $.each(anaactes, function(key, value) {

      option += '<option value="' + value.id + '">' + strUcFirst(value.nom) + '</option>'

    });

    $('#select_anaacte').append(option);

  })
});

// Fonction pour mettre le permier mot en majuscule
function strUcFirst(a){return (a+'').charAt(0).toUpperCase()+a.substr(1);};
