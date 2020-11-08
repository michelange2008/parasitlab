// require( './usertypes.js');
require( './bs-custom-file-input-min.js')
require('./bootstrap.js');

require( './bootstrap-table.min.js');
require( './bootstrap-table-accent-neutralise.min.js');
require( './bootstrap-table-locale-all.js');

require( './createUser.js');
require( './demandeShow.js');
require( './envoi.js');
require( './nbPrelevement.js');
require('./createDemandeTypePrelevement.js');
require( './enpratique.js');
require( './blog.js');
require( './telFormulaire.js');
require( './algo.js');

require( 'jquery-confirm' );

$(function() {

	$.ajaxSetup({

		headers: {
			'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
		}
	});

	// Initialisation des js de bootstrap
	$('[data-toggle="tooltip"]').tooltip();

	$('#table').bootstrapTable();

	$('.toast').toast();

	$('.carousel').carousel();


	// Fonction d'appel d'une boite de dialogue quand on veut supprimer quelque chose (analyse, personne, etc.)
	$('.suppr').on('click', function(event) {

		event.preventDefault();

		var form_id = "#"+$(this).attr('id');

		$.confirm({
			theme : 'dark',
			type : 'red',
			typeAnimated: 'true',
			title: $(this).attr('titre'), // on récupère le texte de la boite
			content : $(this).attr('texte'), // de dialogue dans les attributs titre et texte (manip pour la multilingue)
			buttons : {
				oui: {
					text : 'oui',
					btnClass : 'btn-red',
					action : function() {

						$(form_id).submit();

					},
				},
				non: function() {

				}
			}
		})
	});

	// FONCTION POUR AFFICHER L'input image signature quand un user laboratoire passe de non signataire à signataire
	// Afficher ou non l'image en fonction du statut signataire ou non
	if($("#input_signataire").attr('statut') === "1") {

		$("#input_signataire").show();

	}
	// Changer l'affichage de l'input signature en fonction de la checkbox est_signataire
	$("#signataire").on('change', function() {

		if($("#signataire").is(':checked')) {

			$("#input_signataire").show();

		} else {

			$("#input_signataire").hide();

		}

	})

// Suppression Icone

$('.icone_del').on('click', function() {

	var nom = $(this).attr('alt');
	var id = $(this).attr('id');

console.log(nom);
	$.confirm({
			type : 'red',
			thme : 'dark',
	    title: 'Suppression !',
	    content: 'Souhaitez-vous vraiment supprimer <strong>' + nom + '</strong> ?',
	    buttons: {
	        Oui: function () {
	            $('#icone_suppr_' + id ).submit();
	        },
	        Non: function () {

	        },
	    }
	});
});

$('.icone_add').on('click', function() {

	var icone_id = $(this).attr('id');
	var icone_nom = $(this).attr('alt');

	$('#input_choix_icone_nom').attr('value', icone_nom);
	$('#input_choix_icone_id').attr('value', icone_id);

	$('#modal-choix-icone').modal('hide');
})


});
