// Appelé dans la page labo.admin.melanges.choix_troupeau.blade
$("#troupeau_animal_ou_melange_create").attr('disabled', true); // On inactive la liste des troupeaux
$("#choix_troupeau").hide();// On rend invisible de bouton tant que l'éleveur et le troupeau ne sont pas choisis
var troupeau_id= 0; // On met l'id du troupeau à 0
var eleveur_id = 0;
$("#eleveur").on('change', function() {
  var eleveur_id = $('#eleveur option:selected').attr('value');
  var url = $("#route").html().replace('user_id', eleveur_id); // On modifie la ligne (invisible) avec le n° de l'éleveur
  // On va chercher la liste des troupeaux de l'éleveur
  $.get({
    url: url,
  })
  .done(function(datas) {
    var troupeaux = JSON.parse(datas);
    var nb_troupeau = troupeaux.length;
    // S'il n'y a pas de troupeau on prévient qu'il faut en créer un d'abord
    if (nb_troupeau == 0) {
      $("#troupeau_animal_ou_melange_create").empty().append('<option>Aucun troupeau: il faut en ajouter au moins un</option>').attr('disabled',true);
    }
    // Sinon on fait une liste d'options avec une case vide au départ et la liste des troupeaux après
    else {
      var options = '<option value="0" selected disabled>Choisir un troupeau</option>';
      for(var item in troupeaux){
        var troupeau = troupeaux[item];
        options += '<option value="' + troupeau.id + '">' + troupeau.nom + '</option>'
      }
      $("#troupeau_animal_ou_melange_create").empty().append(options).attr('disabled', false);
    }
  })
})

$('#troupeau_animal_ou_melange_create').on('change', function() {
  troupeau_id = $('#troupeau_animal_ou_melange_create').val();
  route = $("#choix_troupeau").attr('href');
  $('#choix_troupeau').attr('href', route + '/' + troupeau_id);
  $("#choix_troupeau").fadeIn();
})
