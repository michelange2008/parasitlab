// On récupére l'url actuelle
var url_actuelle = window.location.protocol + "//" + window.location.host + window.location.pathname; // récupère l'adresse de la page actuelle

// On inactive tous les champs qui le doivent
$("#troupeau_animal_ou_melange_create").attr('disabled', true);

$("#num_animal_create").attr('disabled', true);
$("#nom_animal_create").attr('disabled', true);


$("#eleveur").on('change', function() {
  var eleveur_id = $('#eleveur option:selected').attr('value');
  var url = url_actuelle.replace('laboratoire/animal/create', 'api/troupeaus_un_eleveur/'+eleveur_id)

  $.get({
    url: url,
  })
  .done(function(datas) {
    var troupeaux = JSON.parse(datas);
    var nb_troupeau = troupeaux.length;

    if (nb_troupeau == 0) {
      $("#troupeau_animal_ou_melange_create").empty().append('<option>Aucun troupeau: il faut en ajouter un --></option>').attr('disabled',true);
    }
    else {
      var options = '';
      for(var item in troupeaux){
        var troupeau = troupeaux[item];
        options += '<option value="' + troupeau.id + '">' + troupeau.nom + '</option>'
      }
      $("#troupeau_animal_ou_melange_create").empty().append(options).attr('disabled', false);
      $("#num_animal_create").attr('disabled', false);
      $("#nom_animal_create").attr('disabled', false);
    }
  })
})

$('#add_troupeau_animal_ou_melange_create').on('click', function() {
  document.location.href=url_actuelle.replace('animal/create', 'troupeau/create');
})
