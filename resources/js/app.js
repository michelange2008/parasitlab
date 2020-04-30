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
require( './enpratique.js');
require( './blog.js');
require( './telFormulaire.js');

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


  // Date.prototype.toDateInputValue = (function() {
  //   var local = new Date(this);
  //   local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
  //   return local.toJSON().slice(0,10);
  // });
	//
	// $('#reception').val(new Date().toDateInputValue());


	// $('#enpratiqueTab a').on('click', function (e) {
	//   e.preventDefault()
	//   $(this).tab('show')
	// })

	// $('#list-tab-eleveur a').on('click', function (e) {
		//   e.preventDefault()
		//   $(this).tab('show')
		// });


});
