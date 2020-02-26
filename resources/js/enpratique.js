
$('.btn_enpratique').on('click', function(e) {
  e.preventDefault();
  var id = "#" + $(this).attr('id').split('_')[1];
  $('.panneau').hide();
  $(id).fadeIn();
  $('.btn_enpratique').removeClass('btn-lg').removeClass('btn-sm');
  $(this).addClass('btn-lg')

})
