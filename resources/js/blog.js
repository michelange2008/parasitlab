$('.blog').on('click', function(e) {

  var ancien_id = $('.suppr').attr('id');

  var blog_id = $(this).attr('id').split("_")[1];

  var url_actuelle = window.location.protocol + "//" + window.location.host + window.location.pathname; // récupère l'adresse de la page actuelle

  var url = url_actuelle.replace('parasitisme', 'blog/' + blog_id);

  var image_avec_chemin = $('#image').attr('src');

  var image = image_avec_chemin.split("/")[(image_avec_chemin.split("/").length -1)];

  $.get({

    url : url,

  })

  .done(function(data) {

    var elements = JSON.parse(data);

    // modification du chemin de l'image pour l'affichage
    var nouvel_image_avec_chemin = image_avec_chemin.replace(image, elements.image);
    // Affichage des différents éléments qui ont changé
    $('#image').attr('src', nouvel_image_avec_chemin);
    $('#titre').html(elements.titre);
    $('#date_creation').html('( ' + elements.date + ' )');
    $('#contenu').html(elements.contenu);
    $("#auteur").html(elements.auteur);
    $('#liste_motclefs').html(elements.liste_motclefs);
    // Modification des liens pour l'édition et la suppression
    var edit = $(".edit").attr('action');
    var nouvel_edit = edit.replace(ancien_id, elements.id );
    $('.edit').attr('action', nouvel_edit);
    var suppr = $('.suppr').attr('action');
    var nouveau_suppr = suppr.replace(ancien_id, elements.id);
    $('.suppr').attr('action', nouveau_suppr);
  })
})
