function choix_espece(url) {

  $('#choix_select').children().remove();

  $.get({
    url : url
  })
  .done(function(datas) {
    var especes = JSON.parse(datas);
    var options ='<option value=null></option>';
    $.each(especes, function(key, value) {
      options += "<option value='"+strUcFirst(value.abbreviation)+"'>"+value.nom+"</option>"
    })
    $('#choix_select').append(options);
  });

  $('#choix').fadeIn();

  $('#choix_select').on('click', function(){
    if($(this).val() != 'null')
    {
      $('#choix_form').submit();
      $('#choix').fadeOut();
    }
  });

  $('#choix_annule').on('click', function(){
    $('#choix').fadeOut();
  })
}
// sous menu de Express
$('.telFormulaire').on('click', function(e) {
  e.preventDefault();
  var url_actuelle = $(this).attr('href');
  var url = url_actuelle.replace('analyses/formulairePdf', 'especes');
  choix_espece(url);
});
// sous menu latéral
$('#downloadFormulaire').on('click', function(event) {
  event.preventDefault();
  var url = $(this).attr('href');
  choix_espece(url);
});
// Fonction pour mettre le permier mot en majuscule
function strUcFirst(a){return (a+'').charAt(0).toUpperCase()+a.substr(1);};
