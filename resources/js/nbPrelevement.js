var i = $('#nbPrelevement').val();

affichePrelevement(i);

$('#nbPrelevement').on('change', function() {

  var i = $(this).val();

  affichePrelevement(i);

})

function affichePrelevement(i) {

  $('.prelevement').each(function(indice){

    j = parseInt(i) + 1;

    if(indice < j ) {

      $("#prelevement_"+indice).fadeIn();

    }

    else {

      $("#prelevement_"+indice).fadeOut();

    }
  })

}
