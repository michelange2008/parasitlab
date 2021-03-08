// Choix de ne pas afficher l'indicatif du téléphone quand le pays est la France
($('#liste_pays option:selected').val() == "France") ? $("#indicatif").parent().hide() : $("#indicatif").show();
// Si on change de pays
$("#liste_pays").on('change', function() {
  // Qu'on choisit la france comme pays
  if($('#liste_pays option:selected').val() == "France")
  {
    $("#indicatif").val(33); // On passe l'indicatif à 33
    $("#indicatif").parent().hide() // On masque l'indicatif
  // Si on choisit un autre pays
  } else {
    $("#indicatif").val(''); // On vide le champs de l'indicatif de téléphone
    $("#indicatif").parent().show(); //Et on affiche ce champs

  }

});

// Fontion pour vérifier si un email a un format valide
function isEmail(myVar){
  // La 1ère étape consiste à définir l'expression régulière d'une adresse email
  var regEmail = new RegExp('^[0-9a-z._-]+@{1}[0-9a-z.-]{2,}[.]{1}[a-z]{2,5}$','i');

  return regEmail.test(myVar);
}
// Destiné à afficher le détail du formulaire de création d'un utilisateur
// Après la saisie des informations communes à tous les utilisateurs, en cliquant sur le bouton "Continuer"
//

$('#userCreateForm').on('submit', function(e) {

  e.preventDefault(); // évite d'envoyer le formulaire

  // On vérifie que l'adresse email a un format valide. Les autres vérif sont faites par le formulaire lui-même et UserController@store
  var email = $('#champ_mail').val();

  if(isEmail(email)) {

    var saisie = $(this).serialize(); // serialize les données du formulaire

    var url_actuelle = window.location.protocol + "//" + window.location.host + window.location.pathname; // récupère l'adresse de la page actuelle

    var url_store = url_actuelle.replace('/create', ''); // remplace cette adresse par l'adresse correspondant à la méthode store

    $.post({ // envoi une requete ajax pour stocker les données communes du nouvel utilisateur

      url: url_store,
      dataType : 'html',
      data: saisie,
    })
    .done(function(data){

      try {
        JSON.parse(data);
      } catch (e) {
        $.alert({
          title: "Attention",
          content: $('#email_doublon').attr('message'),
          type: 'red'
        });
      } finally {
        var donnees = JSON.parse(data); // on récupère trois type d'infos: le nouvel user, son mot de passe et son usertype
      }

      //######################################
      // ON RECUPERE L'usertype POUR POUVOIR AFFICHER LE FORMULAIRE CORRESPONDANT
      var usertype_code = donnees.usertype.code; // code de l'usertype du nouvel user

      var form = '#'+usertype_code+"CreateForm"; // création des variables pour modifier userCreate.blade.php

      $(form).removeClass('d-none'); // On fait afficher le formulaire correspondant au type d'utilisateur
      //#####################################

      //####################################
      // ON MASQUES LES ELEMENTS DU FORMULAIRE INITIAL ET ON DONNE LE FOCUS AU CHAMP address_1 SI IL EXISTE
      $('#enregistreAnnule').addClass('d-none'); // Masque les bouton poursuivre et annuler

      $('#titreCreationUser').removeClass('d-flex').addClass('d-none'); // Masque le titre

      $('#inputUsertype').addClass('d-none'); // Masque le choix du type d'éleveur

      $('#identite').addClass('d-none'); // Masque les champs nom et email

      $('input[name = "address_1"]').focus()
      //####################################
    })
    .fail(function(data) { // et si ça merde ...

      alert("Désolée, un problème est arrivé à l'enregistrement du nouvel utilisateur. \n\nAppelez Bouiboui !");

    });

  } else {

    $.alert({
      title: "Attention",
      content: $('#email_non_valide').attr('message'),
      type: 'red'
    })
  }


})
