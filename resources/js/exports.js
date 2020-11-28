// Gestion des exports
var url_actuelle = window.location.protocol + "//" + window.location.host + window.location.pathname; // récupère l'adresse de la page actuelle

$('form#choix button[type=submit]').prop('disabled', true); // On passe le bouton exporter à "inactif" tant qu'il n'y a pas un choix d'espece et de parasite
$("#anaitems").empty(); // On vide la liste des parasites en attendant que l'on ait cliqué sur l'espece
$("#all_anaitems").prop('disabled', true);

// Quand on clique sur une espece et que la case all_especes est cochée, cela décoche la case all_especes
// et ça décoche la case all_anaitems et ça déselect tous les especes (sauf la sélectionnée) et tous les parasites
$("#especes").on('click', function() {

  var id_checkbox = "#all_" + $(this).attr('id');

  if($(id_checkbox).prop('checked', true)) {

    $(id_checkbox).prop('checked', false); // on décoche la case
    var id_multiple = "#" + $(this).attr('id'); // on récupère l'id de la select
    var option = $(id_multiple).val().toString(); // on récupère l'item sélectionné

    $(id_multiple + ' option').prop('selected', false); // On passe tous à désélctionné
    $(id_multiple + ' option[value=' + option + ']').prop('selected', true); // sauf celui sur lequel on a cliqué

    if($("#all_anaitems").prop('checked', true)) {

      $("#all_anaitems").prop('checked', false);
      $("#anaitems option").prop('selected', false);

    }
  }

})
// Quand on clique sur un anaitem et que la case tous les anaitems est cochée, cela la décoche
$("#anaitems").on('click', function() {

  var id = "#all_" + $(this).attr('id');

  if($(id).prop('checked', true)) {

    $(id).prop('checked', false);
    var id_multiple = "#" + $(this).attr('id'); // on récupère l'id de la select
    var option = $(id_multiple).val().toString(); // on récupère l'item sélectionné

    $(id_multiple + ' option').prop('selected', false); // On passe tous à désélctionné
    $(id_multiple + ' option[value=' + option + ']').prop('selected', true); // sauf celui sur lequel on a cliqué


  }
})
// Quand une des chekbox (tout) change
$(".all").on('change', function() {

  var id_multiple = "#" + $(this).attr('id').split('_')[1];
  // Si la case à cocher est cochée
  if($(this).prop('checked')) {

    $(id_multiple + ' option').prop('selected', true).trigger('change');
    $("#all_anaitems").prop('disabled', false);


  } else {

    $(id_multiple + ' option').prop('selected', false).trigger('change');
    $("#all_anaitems").prop('checked', false).prop('disabled', false);

  }
})

// AU changement d'espèce on récupère la liste des parasites correspondants

$("#especes").on('change', function() {

  var especes = $(this).val().toString();

  if(especes == "") {

    $("#anaitems").empty();

  } else {

    $("#nb_enregistrements").empty;

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

        if($("#anaitems").val().includes(value.id.toString())) {

          anaitem_present = true; //Mais si c'est le cas, on met la variable à true

          options += '<option value="' + value.id + '" selected>' + value.nom + '</option>'

        } else {

          options += '<option value="' + value.id + '">' + value.nom + '</option>'

        }

      })
      $("#anaitems").empty().append(options);
      if(!anaitem_present) {

        $("#anaitems").val('');
        $("#nb_enregistrements").html('');

      }
    })

  }

})
// Pour n'importe quel changement dans le formulaire
$("form#choix").on('change', function(e) {

  if($("#especes").val().length != 0 && $("#anaitems").val().length != 0) {

    var data = $(this).serialize();
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

        $('form').attr('action', url_actuelle.replace('choix', 'export'))

      }

      $("#nb_enregistrements").empty().append(text);

    })

    .fail(function(error) {
      console.log(error);
    })

  }


})
