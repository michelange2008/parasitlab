//#########################################################################################################
// Affiche la liste des vétos si sitch "envoi to véto" est sur emitter.on('event', (arguments) => {

var toVeto =$('#toVeto').prop('checked');

function afficheListeVeto(auVeto) {

  if(!auVeto) {
    $('#choixDuVeto').addClass('d-none').removeClass('d-block'); // liste déroulante des vétos
    $('#iconeVeto').removeClass('d-none').addClass('d-block'); // icone veto pour remplacer quand la liste déroulante est masquée
                                                                //(pour éviter de faire bouger les boutons en dessous)
  }
  else {
    $('#choixDuVeto').removeClass('d-none').addClass('d-block');
    $('#iconeVeto').addClass('d-none').removeClass('d-block');
  }

};

// au démarrage l'affiche du véto dépend de la position d'origine du switch
afficheListeVeto($('#toVeto').prop('checked'));

// au changement de switch on change l'affichage
$('#toVeto').on('change', function() {

  afficheListeVeto($('#toVeto').prop('checked'));

});
//############################################################################################################

//#############################################################################################################
// Change le bouton radio de choix de l'envoi de la facture

$('#radioBtn a').on('click', function(){
    var sel = $(this).data('title');
    var tog = $(this).data('toggle');
    $('#'+tog).prop('value', sel);

    $('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
    $('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
})

//#################################################################################################################
