// Affiche l'input multiple quand on choisit valeur comme Qtt (label valeurs)

showhideMultiple(); // Au démarrage on affiche multiple si valeur est sélectionnée

// Aux changements on vérifie si c'est valeur ou non qui est sélectionnée
$("#qtt").on('click', function() {

  showhideMultiple();

});

function showhideMultiple() {

  if($('#qtt option:selected').attr('value') == '1') {

    $('#multiple').show();

  } else {

    $('#multiple').hide();

  }

}
