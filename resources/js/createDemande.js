// Fonction destinée a renvoyer vers la page de création d'un utilisateur si la ligne"nouveau" est choisie
$("select[name='userDemande']").change(function() {
  console.log($("select[name='userDemande'] > option:selected").val());

  if($("select[name='userDemande'] > option:selected").val() == "Nouveau") {

    var url_actuelle = window.location.protocol + "//" + window.location.host + window.location.pathname; // récupère l'adresse de la page actuelle

    var url_nouvelle = url_actuelle.replace('demandes', 'user');

    $.confirm({
      theme : 'dark',
      type : 'red',
      typeAnimated: 'true',
      title: "Nouvel éleveur",
      content : "Faut-il créer un nouvel éleveur ?",
      buttons : {
        oui: {
          text : 'oui',
          btnClass : 'btn-red',
          action : function() {
            window.location = url_nouvelle;
          },
        },
        non: function() {
        }
      }
    });
  }
});

var nbPrelevements = $("input[name='nbPrelevements']").val()

$('.lignePrelevement').each(function(index) {
  if(index < nbPrelevements) {
    $('#lignePrelevement_'+(index+1)).removeClass('d-none').addClass('d-flex');
  }
})

$("input[name='nbPrelevements']").on('change', function(e) {

    nbPrelevements = $("input[name='nbPrelevements']").val();

    $(".lignePrelevement").removeClass('d-flex').addClass('d-none');

    $('.lignePrelevement').each(function(index) {
      if(index < nbPrelevements) {
        $('#lignePrelevement_'+(index+1)).removeClass('d-none').addClass('d-flex');
      }
    })
})
