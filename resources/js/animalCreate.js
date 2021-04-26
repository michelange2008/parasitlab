// On récupére l'url actuelle
var url_actuelle = window.location.protocol + "//" + window.location.host + window.location.pathname; // récupère l'adresse de la page actuelle

$("#add_animal").on("click", function() {

  if($("#numero").val() == '') {
    $.alert({
      title: "Attention !",
      content: "Il faut saisir au moins une valeur dans le champs numéro",
      theme: 'dark',
      type: 'red',
      icon: 'fas fa-skull-crossbones',
    })
  }
  else {
    var numero = $("#numero").val();
    var numero = $("#nom").val();
    var troupeau_id = $("#troupeau_id").attr('value');

    var url = url_actuelle.replace('melange/createAvecTroupeau', 'addAnimal');

    var data = {
      "troupeau_id" : troupeau_id,
      "numero" : numero,
      "nom" : nom
    };

    console.log(data);

    $.post({
      url: url,
      data: data.serialize(),
    })
  }
})
