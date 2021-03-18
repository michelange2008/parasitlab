// Gestion des exports
var url_actuelle = window.location.protocol + "//" + window.location.host + window.location.pathname; // récupère l'adresse de la page actuelle

$('form#choix button[type=submit]').prop('disabled', true); // On passe le bouton exporter à "inactif" tant qu'il n'y a pas un choix d'espece et de parasite
$("#anaitems_export").empty(); // On vide la liste des parasites en attendant que l'on ait cliqué sur l'espece
$("#all_anaitems").prop('disabled', true);

// Quand on clique sur une espece et que la case all_especes est cochée, cela décoche la case all_especes
// et ça décoche la case all_anaitems et ça déselect tous les especes (sauf la sélectionnée) et tous les parasites
$("#especes_export").on('click', function() {

  var especes = $(this).val().toString();

  // Si la case à cocher toutes especes est cochée
  if($("#all_especes").prop('checked', true)) {

    $("#all_especes").prop('checked', false); // on décoche la case

  }

  var option = $("#especes_export").val(); // on récupère l'item sélectionné

  if($("#all_anaitems").prop('checked', true)) {

    $("#all_anaitems").prop('checked', false);
    $("#anaitems_export option").prop('selected', false);

  }
  anaitemsFromEspece(especes);

  $("#nb_enregistrements").empty();

})
// Quand on clique sur un anaitem et que la case tous les anaitems est cochée, cela la décoche
$("#anaitems_export").on('click', function() {

  var id = "#all_" + $(this).attr('id');

  if($(id).prop('checked', true)) {

    $(id).prop('checked', false);
    var id_multiple = "#" + $(this).attr('id'); // on récupère l'id de la select
    var option = $(id_multiple).val().toString(); // on récupère l'item sélectionné

    $(id_multiple + ' option').prop('selected', false); // On passe tous à désélctionné
    $(id_multiple + ' option[value=' + option + ']').prop('selected', true); // sauf celui sur lequel on a cliqué


  }
})
// Quand la checkbox toutes espece change
$("#all_especes_export").on('change', function() {

  if($(this).prop('checked')) {

    $("#all_anaitems").prop('disabled', false);
    $('#especes_export option').prop('selected', true).trigger('change');
    anaitemsFromEspece($("#especes_export").val());

  } else {

    $('#especes_export option').prop('selected', false).trigger('change');
    $("#anaitems_export").empty();
    $("#all_anaitems_export").prop('checked', false);
    $("#nb_enregistrements").empty();

  }

})
// Quand la chekbox tous les parasites change
$("#all_anaitems_export").on('change', function() {

  if($(this).prop('checked')) {

    $('#anaitems_export option').prop('selected', true).trigger('change');
    $("#all_anaitems_export").prop('disabled', false);


  } else {

    $('#anaitems_export option').prop('selected', false).trigger('change');
    $("#all_anaitems").prop('checked', false);
    $("#nb_enregistrements").empty();

  }
})

// Fonction pour récupérer la liste des parasites correspondants au clic sur une espece
function anaitemsFromEspece(especes) {

  url = url_actuelle.replace('choix', 'anaitemsFromEspece/' + especes);

  $.get({

    url : url,
    data : especes,

  })
  .done(function(datas) {
    var anaitems = JSON.parse(datas);

    var options = "";
    var anaitem_present = false; // On considère que la nouvelle espèce ne possède pas les parasites sélectionnés avant
    $.each(anaitems, function(key, value) {

      if($("#anaitems_export").val().includes(value.id.toString())) {

        anaitem_present = true; //Mais si c'est le cas, on met la variable à true

        options += '<option value="' + value.id + '" selected>' + value.nom + '</option>'

      } else {

        options += '<option value="' + value.id + '">' + value.nom + '</option>'

      }

    })
    $("#anaitems_export").empty().append(options);
    if(!anaitem_present) {

      $("#anaitems_export").val('');
      $("#nb_enregistrements").html('');

    }
  })


};
// Requête Ajax pour connaître le nombre de résultats en fonction des choix espèce/anaitems
// Pour n'importe quel changement dans le formulaire
$("form#choix").on('change', function(e) {
  // S'il y a au moins une espèce et un anaitem choisi
  if($("#especes_export").val().length !== 0 && $("#anaitems_export").val().length !== 0) {
    // on sérialize le formulaire
    var data = $(this).serialize();
    // On interroge ExportsController@comptage pour connaître le nombre d'enregistrements
    url = url_actuelle.replace('choix', 'comptage');

    $.post({
      url : url,
      data : data,

    })
    .done(function(datas) {

      var text = ''

      if (datas == 0) {

        text = '<div class="px-3 pt-3 pb-1 alert-rouge">'

        + '<p id="nb_enregistrements" class="lead">'

        + '<i class="fas fa-sad-tear"></i>'

        + ' Il n\'y a aucun enregistrement.</p></div>';

        $('button[type=submit]').attr('disabled', 'disabled');

      } else {

        if (datas == 1) {

          text = '<div id="exporter" class="px-3 pt-3 pb-1 alert-warning">'

          + '<p id="nb_enregistrements" class="lead">'

          + '<i class="fas fa-grin"></i>'

          + ' Il y a 1 enregistrement</p></div>';

        } else {

          text = '<div id="exporter" class="px-3 pt-3 pb-1 alert-success">'

          + '<p id="nb_enregistrements" class="lead">'

          + '<i class="fas fa-grin"></i>'

          + ' Il y a '

          + datas

          + ' enregistrements.</p></div>';

        }

        $('button[type=submit]').removeAttr('disabled');
        // On modifie l'attribut du formulaire de la vue export/choix pour router vers la méthode ExportsController@export
        $('form').attr('action', url_actuelle.replace('choix', 'export'))

      }

      $("#nb_enregistrements").empty().append(text);

    })

    .fail(function(error) {
      console.log(error);
    })

  }


})
