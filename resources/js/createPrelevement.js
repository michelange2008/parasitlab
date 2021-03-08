// Fonction destinée à gérer les types de prélèvements: collectifs (et donc sans lecture d'un troupeau ni écriture)
// ou individuel (ce qui implique de lire la liste des animaux du troupeau et d'écrire les nouveaux animaux).
// la variable i désigne le numéro du prlèvement
$(".indiv").attr('checked', 'checked');
liste_animals(1);


// AU changement de choix prelevt individ ou mélange, on réajuste les champs
$(".typeprelevement").on('change', function() {
  // On récupère le type: indiv ou coll
  var type = $(this).attr('id').split('_')[0];
  // On récupère le numéro du prélèvement
  var i = $(this).attr('id').split('_')[1];
  // Si le choix est individuel
  if(type == 'indiv') {
    // On récupère la liste des animaux
    liste_animals(i)

  // Sinon
  } else {
    // On vide et on inactive la ligne num
    $('#numero_animal_' + i).val('').attr("required", false).attr('disabled', 'disabled');
    // On met le focus sur le nom
    $('#nom_animal_' + i).attr("required", true).focus();
  }

})

// Ecouteur destiné à transférrer le nom de la case num à la case nom
$('.numero_animal').on('change', function() {
  // On explose la saisie num + nom
  var nom = $(this).val().split('-')[1];
  // S'il y a un nom (cas où l'identité de l'animal n'est pas limitée à un numéro)
  if(nom != undefined) {
    // On récupère le num de prélèvement
    var i = $(this).attr('id').split('_')[2];
    // On récupère le numéro de l'animal
    var num = $(this).val().split('-')[0];
    // On met le nom dans la champs nom
    $("#nom_animal_" + i).val(nom);
    // Et on met le numéro dans la case numéro
    $("#numero_animal_" + i).val(num);

  }
})
// Vide le num de l'animal quand on clique sur la croix
$(".vide_numero_animal").on('click', function() {

  var i = $(this).attr('id').split('_')[3];

  $("#numero_animal_" + i).val("");

  $("#nom_animal_" + i).val("");
})

// Fonction de base qui est lancée quand on a un prlèvement individuel et qui récupère la liste des animaux
function liste_animals(i) {

  var troupeau_id = $("#troupeau").attr('num');

  var demande_id = $('input[name=demande_id]').attr('value');

  $('.animal_num').empty();

  $('.identif').removeAttr('disabled');

  $('#numero_animal_' + i).attr("required", true).focus();

  $('#nom_animal_' + i).attr("required", false);

  var url_actuelle = window.location.protocol + "//" + window.location.host + window.location.pathname; // récupère l'adresse de la page actuelle

  var anc ='laboratoire/prelevement/createOnDemande/' + demande_id;

  var nouv =  'api/animal/' + troupeau_id;

  var url = url_actuelle.replace(anc, nouv);

  $.get({

    url: url

  })
  .done(function(datas) {

    var animals = JSON.parse(datas);

    var liste_animals = '';

    $.each(animals, function(key, animal) {

      if(animal.nom == null) {

        liste_animals += '<option value="' + animal.numero + '">' +
        animal.numero
        '</option>'


      } else {

        liste_animals += '<option value="' + animal.numero + '-' + animal.nom +'">' +
        animal.numero +
        ' - ' + animal.nom
        '</option>'

      }

    })

    $(".animal_num").append(liste_animals);
  })

}
