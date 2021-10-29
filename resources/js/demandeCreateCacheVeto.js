//#################################################################################################
//            Gestion du bouton envoi facture véto en fonctin de l'existence ou non d'un véto ####
cacheVeto();

$('select[name=tovetouser_id]').on('change', function() {

  cacheVeto();

})

function cacheVeto() {

  if($('select[name=tovetouser_id]').val() == 0) {

    console.log("coucou");
    $("#destfact_3").hide();

  } else {

    $("#destfact_3").show();

  }

}
