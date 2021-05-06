$("#add_animal").on("click", function() {
  var numero_nouveau = $("#numero_nouveau").val();
  var nom_nouveau = $("#nom_nouveau").val();
  // Si le champs numero est vide, on ouvre une alert d'avertissement
  if(numero_nouveau == '') {

    $.alert({
      title: "Attention !",
      content: "Il faut saisir au moins une valeur dans le champs numéro",
      theme: 'dark',
      type: 'red',
      icon: 'fas fa-exclamation-triangle',
      buttons: {
        OK: {
          btnClass : 'btn-success',
        }
      }
    });

  }

  else {
    // On initialise la variable à faux
    var animal_deja_present = false
    // On passe en revue tous les noms déjà existant
    $('.animal_numero').each(function() {
      // Si ce numero est déjà présent
      if($(this).html() == numero_nouveau ) {
        // On passe la variable à vrai
        animal_deja_present = true;
      }
    })

    // Si le nom saisi est déjà parmi les existants, on fait une alerte
    // qui laisse la choix de l'enregister quand même.
    if(animal_deja_present) {
      $.confirm({
        title: "Attention !",
        content: "Cet animal semble déjà exister, voulez-vous quand même l'enregistrer",
        theme: 'dark',
        type: 'orange',
        icon: 'fas fa-exclamation-triangle',
        buttons: {
          oui: {
            btnClass: 'btn-blue',
            keys: ['enter'],
            action: function() {
              // Si on veut tout de même l'enregistrer, on soumet le formulaire
              formsubmit();
            }
          },
          non: {
            btnClass: 'btn-secondary',
            keys: ['esc'],
            action:function() {
              $('#numero_nouveau').focus();
            }
          }
        }
      });
    } else {
      // On crée le nouvel animal
      formsubmit();

    }

  }

})

function formsubmit() {
  var url = window.location.protocol + "//" + window.location.host + '/parasitlab/public/api/melange/addAnimal'
  $("#numero_nouveau").attr('value', $("#numero_nouveau").val());

  $.post({
    url: url,
    data: $("#form_addAnimal").serialize()
  })
  .done(function(data) {
    var animal_id = data;
    var numero_nouveau = $("#numero_nouveau").val();
    var nom_nouveau = $("#nom_nouveau").val();
    $('#listeAnimals').prepend(

      '<tr>' +
        '<td><label class="animal_numero" for="choix_' + animal_id + '">' +
          numero_nouveau +
        '</label></td>' +
        '<td><label for="choix_' + animal_id +'">' +
          nom_nouveau +
        '</label></td>' +
        '<td>' +
          '<input id="choix_' +  animal_id + '" type="checkbox" name="choix[]" value="' + animal_id + '" checked="true">' +
        '</td>' +
      '</tr>'

    )
    $("#numero_nouveau").val('');
    $("#nom_nouveau").val('');
  })
  .fail(function(data) {
    alert('il y a un problème !')
  })
}
