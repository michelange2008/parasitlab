// On inactive tous les champs qui le doivent
$("#troupeau_animal_ou_melange_create").attr('disabled', true);
var troupeau_id= 0;
$("#eleveur").on('change', function() {
  var eleveur_id = $('#eleveur option:selected').attr('value');
  var url = $("#route").html().replace('user_id', eleveur_id);

  $.get({
    url: url,
  })
  .done(function(datas) {
    var troupeaux = JSON.parse(datas);
    var nb_troupeau = troupeaux.length;

    if (nb_troupeau == 0) {
      $("#troupeau_animal_ou_melange_create").empty().append('<option>Aucun troupeau: il faut en ajouter au moins un</option>').attr('disabled',true);
    }
    else {
      var options = '';
      for(var item in troupeaux){
        var troupeau = troupeaux[item];
        options += '<option value="' + troupeau.id + '">' + troupeau.nom + '</option>'
      }
      $("#troupeau_animal_ou_melange_create").empty().append(options).attr('disabled', false);
      troupeau_id = $('#troupeau_animal_ou_melange_create').val();
      var route = $('#choix_troupeau').attr('href');
      $('#choix_troupeau').attr('href', route + '/' + troupeau_id);
    }
  })
})

$('#troupeau_animal_ou_melange_create').on('change', function() {
  troupeau_id = $('#troupeau_animal_ou_melange_create').val();
  var route = $('#choix_troupeau').attr('href');
  $('#choix_troupeau').attr('href', route + '/' + troupeau_id);
})
