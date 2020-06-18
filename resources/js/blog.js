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

      $('.blog').hide();

      $('#blog_' + value.id).show();

    })

    $('#blogs_retablir').show();

  })

})

// Rétablir toutes les blogs
$('#blogs_retablir').on('click', function() {

  $('.blog').show();

  $('#blogs_retablir').hide();

  $('a').removeClass('alert-bleu-tres-fonce');
  
})

//##############################################################################
// BLOG lire plus ou moins
//##############################################################################
// DEPLIER POUR LIRE PLUS
	$('.readmore').on('click', function() {

		var id = $(this).attr('id').split('_')[1];
		// Affiche tous les boutons lire plus
		$('.readmore').show();
		// Efface le bouton lireplus cliqué
		$(this).hide();
		// Efface tous les boutons liremoins
		$('.readless').hide();
		// Affiche le bouton liremoins de l'article sélectionné
		$('#readless_' + id).fadeIn();
		// Efface tous les contenus
		$('.blog-contenu').hide();
		// Affiche le contenu du blog sélectionné
		$('#contenu_' + id).fadeIn();

	});

	// REPLIER POUR LIRE MOINS
	$('.readless').on('click', function() {

		// On efface tous les boutons readless
		$('.readless').hide();
		// On affiche tous les boutons readmore
		$('.readmore').fadeIn();
		// On efface tous les contenus
		$('.blog-contenu').hide();

	})
