$(function() {

  // Fonction destinée à gérer les types de prélèvements: collectifs (et donc sans lecture d'un troupeau ni écriture)
  // ou individuel (ce qui implique de lire la liste des animaux du troupeau et d'écrire les nouveaux animaux).
  // la variable i désigne le numéro du prélèvement
  $(".indiv").attr('checked', 'checked');
  $(".nom_melange").attr('required', false);
  console.log();
  liste_animals(1);
  // On active la fenêtre modale

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
      $("#ligne_indiv_" + i).show();
      $("#ligne_melange_" + i).hide();
      $("#nom_melange_" + i).val('');
      $("#nom_melange_" + i).attr('required', false);
      $("#numero_animal_" + i).attr('required', true);

      // Si c'est du type prélèvement simple
    } else if(type == 'coll') {

      liste_melanges(i)
      $("#ligne_melange_" + i).show();
      $("#ligne_indiv_" + i).hide();
      $("#numero_animal_" + i).val('');
      $("#nom_animal_" + i).val('');
      $("#numero_animal_" + i).attr('required', false);
      $("#nom_melange_" + i).attr('required', true);


      // sinon c'est d'un type prélèvement avec des animaux identifiés
    } else {
      document.cookie = 'demande = 61';
      // ouverture d'une fenetre modale
      $('#melange_avec_animaux').modal();
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

  // Fonction de base qui est lancée quand on a un prélèvement individuel et qui récupère la liste des animaux
  function liste_animals(i) {

    var troupeau_id = $("#troupeau").attr('num');

    var demande_id = $('input[name=demande_id]').attr('value');

    $('.animal_num').empty();

    $('#numero_animal_' + i).attr("required", true).focus();

    var url_actuelle = window.location.protocol + "//" + window.location.host + window.location.pathname; // récupère l'adresse de la page actuelle

    var anc ='laboratoire/prelevement/create/' + demande_id;

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

  function liste_melanges(i) {

    var troupeau_id = $("#troupeau").attr('num');

    var demande_id = $('input[name=demande_id]').attr('value');

    $(".liste_melanges").empty();

    var url_actuelle = window.location.protocol + "//" + window.location.host + window.location.pathname; // récupère l'adresse de la page actuelle

    var anc ='laboratoire/prelevement/create/' + demande_id;

    var nouv =  'api/melanges/' + troupeau_id;

    var url = url_actuelle.replace(anc, nouv);

    $.get({
      url: url,
    })
    .done(function(datas) {

      var melanges = JSON.parse(datas);

      var liste_melanges = '';

      $.each(melanges, function(key, melange) {

        liste_melanges += '<option value="' + melange.nom +'">' +
          melange.nom +
          '</option>'

      })

      $(".liste_melanges").append(liste_melanges);
    })

  }

})
