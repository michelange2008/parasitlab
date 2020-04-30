//###################################################################################################
// Modifie le nombre de ligne de prélèvement en fonction de la valeur de l'input
var nbPrelevements = $("input[name='nbPrelevements']").val() // nombre de prélèvement

// Boucle qui passe en revue chaque ligne est l'affiche si son index est inférieur au nombre de prélèvements
$('.lignePrelevement').each(function(index) {
  if(index < nbPrelevements) {
    $('#lignePrelevement_'+(index+1)).removeClass('d-none').addClass('d-flex');
    var identification = 'identification_'+(index+1);
    $("input[name="+identification+"]").attr('required',true);
  }
});
// Idem quand on change la valeur de l'input nb de prélèvements
$("input[name='nbPrelevements']").on('change', function(e) {

    nbPrelevements = $("input[name='nbPrelevements']").val();

    $(".lignePrelevement").removeClass('d-flex').addClass('d-none');
    $(".identification").attr('required',false);

    $('.lignePrelevement').each(function(index) {
      if(index < nbPrelevements) {
        $('#lignePrelevement_'+(index+1)).removeClass('d-none').addClass('d-flex');
        var identification = 'identification_'+(index+1);
        $("input[name="+identification+"]").attr('required',true);
      }
    });
});
//##########################################################################################################

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
