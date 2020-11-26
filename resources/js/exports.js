// Gestion des exports

var url_actuelle = window.location.protocol + "//" + window.location.host + window.location.pathname; // récupère l'adresse de la page actuelle

$('button[type=submit]').attr('disabled', 'disabled'); // On passe le bouton exporter à "inactif" tant qu'il n'y a pas un choix d'espece et de parasite
$("#anaitems").empty(); // On vide la liste des parasites en attendant que l'on ait cliqué sur l'espece


// AU changement d'espèce on récupère la liste des parasites correspondants

$("#especes").on('change', function() {

  var especes = $(this).val().toString();

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
