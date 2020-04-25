var choix = 0; // on initialise la variable choix à faux
$('input:submit').attr('disabled', true);

$('.case_demande').on('click', function() {
  if($(this).prop('checked')) {

    choix += 1;

  } else {

    choix -= 1;

  }

  (choix > 0) ? $('input:submit').attr('disabled', false) :$('input:submit').attr('disabled', true);
})

$('.case_acte').on('click', function() {
  if($(this).prop('checked')) {

    choix += 1;

  } else {

    choix -= 1;

  }

  (choix > 0) ? $('input:submit').attr('disabled', false) :$('input:submit').attr('disabled', true);
})
