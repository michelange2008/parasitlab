//#################################################################################################
//            Gestion du bouton envoi facture véto en fonction de l'existence ou non d'un véto ####
//#################################################################################################

// Au chargement de la page
cacheVeto(); // On affiche ou cache le bouton véto comme dest de facture selon la valeur
var factureto = $("#choixDestFact").data('factureto'); // On récupère l'id de l'user destinataire de la facture
$("#facture").val(factureto); // On met en value de l'input hidden sur le dest de fact l'id de l'user dest de facture
var facturetotype = $("#choixDestFact").data('facturetotype'); // On récupère le type de destinataire
$(".destfact").each(function(key, type) { //On passe en revue les boutons
  if(type.id.split("_")[1] == facturetotype) { // Si c'est le même destinataire on met en rouge

    $("#" + type.id).addClass('active').removeClass('notActive').attr('selected', 'selected');

  } else { // Sinon on met en clair

    $("#" + type.id).removeClass('active').addClass('notActive').removeAttr('selected');

  }
})
var eleveur = $("#choixDestFact").data('eleveur')
var veto = $('select[name=tovetouser_id] option:selected').val();
$("#type_laboratoire").attr('data-title', 0);
$("#type_veterinaire").attr('data-title', veto);
$("#type_eleveur").attr('data-title', eleveur);
// Au changement de véto
$('select[name=tovetouser_id]').on('change', function() {
  // On cache ou on affiche le vétérinaire comme destinataire possible de la facture
  cacheVeto();
  // On affecte le numéro du vétérinaire au bouton de choix de facture
  var veto = $('select[name=tovetouser_id] option:selected').val();
  $("#type_veterinaire").attr('data-title', veto);
  // SI le véto est destinataire de la facture, il fautmettre à jour l'input hidden #facture
  if($("#type_veterinaire").attr('selected')){
    $("#facture").val(veto)
  }

})

function cacheVeto() {

  if($('select[name=tovetouser_id]').val() == 0) {

    $("#type_veterinaire").hide();
    // Il faut aussi remettre le destinataire de facture sur l'éleveur et modifier les aspects des boutons
    if($("#type_veterinaire").attr('selected')) {

      var eleveur = $("#choixDestFact").data('eleveur')
      $("#facture").val(eleveur);
      $("#type_veterinaire").removeClass('active').addClass('notActive').removeAttr('selected');
      $("#type_laboratoire").removeClass('active').addClass('notActive').removeAttr('selected');
      $("#type_eleveur").removeClass('notActive').addClass('active').attr('selected', 'selected');

    }

  } else {

    $("#type_veterinaire").show();

  }

}

//#############################################################################################################
// Change le bouton radio de choix de l'envoi de la facture

$('#choixDestFact a').on('click', function(){
    var sel = $(this).data('title');
    var tog = $(this).data('toggle');
    $('#'+tog).prop('value', sel);

    $('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive').removeAttr('selected');
    $('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active').attr('selected', 'selected');
})
