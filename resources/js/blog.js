// Affichage d'un blog en cliquant sur son titre
function afficheBlog(nouvel_id) {

  var ancien_id = $('.suppr').attr('id'); // id du blog affiché avant d'avoir cliqué


  var url_actuelle = window.location.protocol + "//" + window.location.host + window.location.pathname; // récupère l'adresse de la page actuelle

  var url = url_actuelle.replace('parasitisme', 'blog/' + nouvel_id); // modifie d'adresse pour accéder à la méthode show de BlogController

  var image_avec_chemin = $('#image').attr('src'); // chemin de l'image actuelle pour pouvoir connaître son nom

  var image = image_avec_chemin.split("/")[(image_avec_chemin.split("/").length -1)]; // nom de l'image après éclatement de l'adresse

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

}

$('.blog').on('click', function(e) {

  var nouvel_id = $(this).attr('id').split("_")[1]; // id du blog que l'on veut afficher

  afficheBlog(nouvel_id)

})

$('#liste_blogs').on('click', '.blogmotclef', function(e) {

  var nouvel_id = $(this).attr('id').split("_")[1]; // id du blog que l'on veut afficher

  afficheBlog(nouvel_id)

})



// affichage de la liste de blogs correspondant à un motclef_
$('.motclef').on('click', function(e) {

  $('a').removeClass('alert-bleu-tres-fonce');

  $(this).addClass('alert-bleu-tres-fonce');

  $('#liste_blogs').empty();

  e.preventDefault();

  var id = $(this).attr('id').split('_')[1];

  var url_actuelle = window.location.protocol + "//" + window.location.host + window.location.pathname; // récupère l'adresse de la page actuelle

  var url = url_actuelle.replace('parasitisme', 'laboratoire/motclef/' + id); // modifie d'adresse pour accéder à la méthode show de BlogController

  $.get({

    url : url,

  })
  .done(function(data) {

    var elements = JSON.parse(data);

    var liste = '';

    $.each(elements, function(key, value) {


        liste += '<li class="blogmotclef list-group-item" id="blogmotclef_'+
        value.id+
        '"><button class="blog btn text-left" >'+
        value.titre+
        '</button></li>'


    })

    $('#liste_blogs').append(liste);
  })

})
