$('#userCreateForm').on('submit', function(e) {

  // e.preventDefault();

  var datas = $(this).serialize();

      var url = window.location.protocol + "//" + window.location.host + window.location.pathname;

  var nouvel_url = url.replace('/create', '');

  $.ajax({

    url: nouvel_url,
    type : 'POST',
    dataType : 'html',
    data: datas,
  })
    .done(function(data){
      var donnees = JSON.parse(data);
      var usertype_id = donnees.user.usertype_id;
      console.log(donnees);
      $('#enregistreAnnule').addClass('d-none');
      switch (usertype_id) {
        case 1:
          $('#eleveurCreateForm').removeClass('d-none');
          $('#usereleveur_id').append('<input type="hidden" name="user_id" value="'+donnees.user.id+'">')
          break;

        case 2:
          $('#laboCreateForm').removeClass('d-none');
          $('#userlabo_id').append('<input type="hidden" name="user_id" value="'+donnees.user.id+'">')
          break;

        case 3:
          $('#vetoCreateForm').removeClass('d-none');
          $('#userveto_id').append('<input type="hidden" name="user_id" value="'+donnees.user.id+'">')
          break;
        default:

      }

      })
      .fail(function(data) {
        console.log(data);
      });

})
