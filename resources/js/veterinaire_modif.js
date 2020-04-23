if($('#modif_veterinaire').length != 0)
{

  $(":input").attr('readonly', true);
  // $("#liste_pays").attr('disabled', true);
  $('#modifie').on('click', function() {

    $(":input").attr('readonly', false);
    $("#liste_pays").attr('disabled', false);
    $(this).hide();
    $('#valide').show();

  });

  $('#modif_veterinaire').submit(function(e) {

    e.preventDefault();

    var saisie = $(this).serialize();

    var url = $(this).attr('action');

    $.post({
      url: url,
      datatype:  'html',
      data: saisie

    })
    .done(function(data) {
      console.log(data);
      $(":input").attr('readonly', 'readonly');
      $("#liste_pays").attr('disabled', true);
      $('#modifie').show();
      $('#valide').hide();
    })
    .fail(function(data) {
      console.log('ERREUR');
    })

  });

}
