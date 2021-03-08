$('.alg-bouton').on('click', function() {

  var url_actuelle = window.location.protocol + "//" + window.location.host + window.location.pathname;
  if($(this).attr('type') === 'route') {

    document.location.href = url_actuelle + "/" + $(this).attr('route');

  }

});

  $('.alg-ligne').on('click', function() {
    var modal_id = "#modal-" + $(this).attr('id');
    console.log(modal_id);

    $(modal_id).modal('show');

  });




//##############################################################################
// Suppression d'une observation
//############################################################################
$(".suppr_item").on('click', function(e) {

  e.preventDefault();
  var id = $(this).attr('id');
  $.confirm({
    type : 'red',
    title : "Suppression d'une observation",
    content : "Etes-vous vraiment sûr de vouloir supprimer cette observation et toutes les associations qui y sont attachées ?",
    buttons : {
      OUI: function() {
        $('#form_' + id).submit()
      },
      NON: function() {

      }
    }
  })
});


//###############################################################################
// GESTION DES CHECKBOX DES OBSERVATIONS
// quand on clicque sur une checkbox d'observation
$('.checkbox_observation').on('click', function() {
  // On récupère l'id de l'observation
  var observation_id = $(this).attr('id').split('_')[1];
  // On bascule le caractère gras (coché) ou maigre (décoché) de l'intitulé de l'observation
  $('#intitule_' + observation_id + ' a').toggleClass('font-weight-bold');
  // On récupère l'url
  var url_actuelle = window.location.protocol + "//" + window.location.host + window.location.pathname;
  // On la modifie pour la requete ajax en y ajoutant l'observation_id
  var url_get = url_actuelle +'/'+ observation_id;
  // REQUETE AJAX
  $.get({
    url : url_get,
  })
  .done(function(datas) {
    // Le retour correspond à l'action menée sur la table pivot ages_observations
    // Si la table attached est vide (length = 0) c'est que la ligne de la table pivot a été supprimée sinon c'est le contraire
    var message = (datas.attached.length == 0) ? "L'association a été supprimée" : "l'association a été créée";
    // Même manip pour la couleur de la boite de dialogue alert
    var type = (datas.attached.length == 0) ? 'red' : 'green';
    // On informe l'utilisateur
    $.alert({
      type : type,
      title : 'Lien entre animal et observation',
      content : message,

    });
  })
  .fail(function(datas) {
    console.log(datas);
  })

});
