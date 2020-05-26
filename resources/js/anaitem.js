
$("#unite").on('click', function() {

  if($('#unite option:selected').attr('value') == "0") {

    $("#para_unite").show();

    $("#anaitem_enregistre").hide();

    $("#form_unite").on('submit', function(e) {

      e.preventDefault();

      var saisie = $(this).serialize();

      var url_actuelle = window.location.protocol + "//" + window.location.host + window.location.pathname; // récupère l'adresse de la page actuelle

      const regex = /anaitems\/[0-9]*\/edit/gi;

      var url = url_actuelle.replace(regex, 'unites'); // remplace cette adresse par l'adresse correspondant à la méthode store

      console.log(url);

      $.post({ // envoi une requete ajax pour stocker les données communes du nouvel utilisateur

        url: url,
        data: saisie,
      })
      .done(function(datas) {
        var unite = JSON.parse(datas);

        var nouvelle_option = '<option value="' + unite.id + '">' + unite.type + ' : ' + unite.nom + '</option>';

        $("#unite").append(nouvelle_option);

        $('#unite option[value=' + unite.id +']').attr('selected', 'selected');

        $("#anaitem_enregistre").show();

        $('#para_unite').hide();

      })
      .fail(function(datas) {
        console.log(datas);
      });

    });

    $('a').on('click', function(e) {

        e.preventDefault();

        $("#anaitem_enregistre").show();

        $('#para_unite').hide();

    })

  } else {

    $("#anaitem_enregistre").show();

    $('#para_unite').hide();

  }


});
