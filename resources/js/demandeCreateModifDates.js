// A la sélection d'une date on passe au champs suivant
$('#prelevement').on('change', function() {

  $('.date_alerte').hide();
  id_actuel = '#' + $(this).attr('id');
  var dateChoix =Date.parse($(this).val());
  validDate(dateChoix, id_actuel, '#reception');
  compareDate();
})

$('#reception').on('change', function() {

  $('.date_alerte').hide();
  id_actuel = '#' + $(this).attr('id');
  var dateChoix = Date.parse($(this).val());
  validDate(dateChoix, id_actuel, '#anatypeSelect');
  console.log($("#anatypeSelect").length);
  compareDate();
})
// Fonction destinée à valider les dates
function validDate(dateChoix, id_actuel, id_next) {

  $('.date_alerte').hide(); // On efface les alertes
  var aujourdhui = Date.now(); // On cacule le timestamp du jour
  if(aujourdhui - dateChoix < 0) { // Si la différence la date choisie est dans le futurœ

    $(id_actuel + '_futur').show(); //On afiche une petit phrase

  } else { // Sinon

    $(id_actuel + '_ok').show();
    // Cas des successions de champs dans une nouvelle demande
    if($("#anatypeSelect").length) {

      $(id_next).removeAttr('disabled').focus(); // On passe au champs suivant

    }

  }

};
// Fonction pour mettre par défaut la date de la demande quand c'est une modif
setDate("#" + $("#reception").attr('id'));
setDate("#" + $("#prelevement").attr('id'));

function setDate(id) {

  var date = new Date($(id).attr('date'));
  var day = ("0" + date.getDate()).slice(-2);
  var month = ("0" + (date.getMonth() + 1)).slice(-2);

  var date_formattee = date.getFullYear()+"-"+(month)+"-"+(day) ;

  $(id).val(date_formattee);

}


function compareDate() {

  if($('#prelevement').val() !== '' && $('#reception').val() !== '') {

    var date_prelevement = Date.parse($('#prelevement').val());
    var date_reception = Date.parse($('#reception').val());

    if(date_reception - date_prelevement < 0) {

      $('.date_ok').hide();
      $('#reception_prelevement').show();
    }

    else {

      $('.date_ok').show();
    }
  }

}
