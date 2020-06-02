$('.alg-bouton').on('click', function() {
  var url_actuelle = window.location.protocol + "//" + window.location.host + window.location.pathname;
  if($(this).attr('type') === 'route') {

    document.location.href = url_actuelle + "/" + $(this).attr('route');

  }

  // var url = url_actuelle.replace('laboratoire/algorithme', 'api/' + $(this).attr('id'));
  //
  // $("#modal-infos-titre").html($(this).text());
  // $('#modal-infos-ul').empty();
  //
  // $.get({
  //
  //   url:url
  //
  // })
  // .done(function(datas) {
  //
  //   var valeurs = JSON.parse(datas);
  //
  //   var lignes = '';
  //
  //   $.each(valeurs, function(key, value) {
  //
  //     var nom = (value.nom) ? value.nom : '';
  //     var espece = (value.espece_id) ? ' ('+ value.espece.nom +')'  : '';
  //
  //       lignes += '<li class="list-group-item"><a href="#">' + nom + espece + '</a></li>'
  //
  //   });
  //
  //   $('#modal-infos-ul').append(lignes);
  //
  // })
  // .fail(function(datas) {
  //
  //   console.log(datas);
  //
  // });
  //
  // $("#modal-infos").modal('show');
})

//######################################################################
// MODIFICATION DES OBSERVATIONS PAR UNE FENETRE MODALE ET UNE REQUETE ajax
//######################################################################
var nouvelle_url_put = '';
$('.intitule').on('click', function(e) {
  e.preventDefault();
  // On récupère l'id de l'observation à modifier
  var observation_id = $(this).attr('id').split('_')[1];
  //On récupère l'url pour la soumission du formulaire en ajax
  var url_put = $('.observation_update').attr('action');
  // On élimine la fin pour enlever l'id initiale
  var pos = url_put.search('observations');
  // On recontruit l'url pour la requete ajax
  nouvelle_url_put = url_put.slice(0, pos) + 'observations/' + observation_id;
  // On remplit les champs du formulaire avec les valeurs trouvées dans les attributs de chaque observation
  $('#intitule-modal').append(
    '<input class="form-control" type="text" name="intitule" value="' + $(this).attr('intitule') + '" required>'
  );
  $('#explication-modal').append(
    '<input class="form-control" type="text" name="explication" value="' + $(this).attr('explication') + '" required>'
  );
  $('#autres-modal').append(
    '<input class="form-control" type="text" name="autres" value="' + $(this).attr('autres') + '">'
  );
  $('#ordre-modal').append(
    '<input class="form-control" type="number" name="ordre" value="' + $(this).attr('ordre') + '" required>'
  );
  // On récupère la catégorie correspondante
  var categorie = $(this).attr('categorie');
  // Et on coche le bouton radio correspndant à la catégorie
  $('input[type=radio][name=categorie][id=' + categorie + ']').attr('checked', true);
  // On affiche la fenetre modale avec le formulaire
  $('#modal-infos').modal('show');
})

$('.observation_update').on('submit', function(e) {
  e.preventDefault();
  var donnees = $(this).serialize();

  $.ajax({
    type : "PUT",
    url : nouvelle_url_put,
    data : donnees,
  })
  .done(function(retour) {
    fermeModal();
    var observation = retour[0];
    $('#ordre_' + observation.id).html(observation.ordre);
    $('#intitule_' + observation.id + ' > a').html(observation.intitule);
    $('#intitule_' + observation.id).attr('ordre', observation.ordre);
    $('#intitule_' + observation.id).attr('intitule', observation.intitule);
    $('#intitule_' + observation.id).attr('explication', observation.explication);
    $('#intitule_' + observation.id).attr('autres', observation.autres);
    $('#intitule_' + observation.id).attr('categorie', observation.categorie.nom);

  })
  .fail(function(datas) {
    console.log(datas);
  })
})

$('#bouton_annule').on('click', function(e) {
  e.preventDefault();
  fermeModal();
})

function fermeModal() {
  // On masque la fenetre modale
  $('#modal-infos').modal('hide');
  // On vide tous les champs
  $('#intitule-modal').empty();
  $('#explication-modal').empty();
  $('#autres-modal').empty();
  $('#ordre-modal').empty();

}

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
