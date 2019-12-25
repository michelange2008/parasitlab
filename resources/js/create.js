// Destiné à afficher le détail du formulaire de création d'un utilisateur
// Après la saisie des informations communes à tous les utilisateurs, en cliquant sur le bouton "Continuer"
//
$('#userCreateForm').on('submit', function(e) {

  e.preventDefault(); // évite d'envoyer le formulaire

  var saisie = $(this).serialize(); // serialize les données du formulaire

  var url_actuelle = window.location.protocol + "//" + window.location.host + window.location.pathname; // récupère l'adresse de la page actuelle

  var url_store = url_actuelle.replace('/create', ''); // remplace cette adresse par l'adresse correspondant à la méthode store

  $.post({ // envoi une requete ajax pour stocker les données communes du nouvel utilisateur

    url: url_store,
    dataType : 'html',
    data: saisie,
  })
    .done(function(data){
      var donnees = JSON.parse(data); // on récupère trois type d'infos: le nouvel user, son mot de passe et son usertype

      var usertype_code = donnees.usertype.code; // code de l'usertype du nouvel user

      var form = '#'+usertype_code+"CreateForm"; // création des variables pour modifier userCreate.blade.php
      var user = '#user'+usertype_code+"_id";

      $(form).removeClass('d-none'); // On fait afficher le formulaire correspondant au type d'utilisateur

      $(user).append('<input type="hidden" name="user_id" value="'+donnees.user.id+'">'); // on y ajoute un champs caché avec le user_id

      $(user).append('<input type="hidden" name="mdp" value="'+donnees.mdp+'">'); // et un champs caché avec le mot de passe (pour pouvoir lui envoyer)

      })
      .fail(function(data) { // et si ça merde ...

        alert("Désolée, un problème est arrivé à l'enregistrement du nouvel utilisateur. \n\nAppelez Bouiboui !");

      });

})
