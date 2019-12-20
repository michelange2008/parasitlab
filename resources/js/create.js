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
        console.log(data);
      })
      .fail(function() {
        console.log(data);
      });


})
