// Demande d econfirmation avant signature d'une demande d'analyse
var envoyer = false;

$('form#form_signer').on('click', function(e) {

  if(!envoyer) {

    e.preventDefault();

    $.confirm({
      theme : 'dark',
      type : 'green',
      title: "Signer une analyse",
      content : "Veux-tu vraiment signer ces résultats ?",
      buttons : {
        oui: {
          text : 'oui',
          btnClass : 'btn-success',
          action : function() {

            envoyer = true;
            $("form#form_signer").trigger('submit');

          },
        },
        non: function() {
        }
      }
    });
  }

})
