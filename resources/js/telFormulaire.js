// Quand on clique sur Télécharger un formulaire dans le sous menu Express
$('.telFormulaire').on('click', function(e) {
  // On évite la soumission du formulaire
  e.preventDefault();
  // On récupérère l'href du formulaire (générée automatiquement avec l'afficha du menu)
  var url = $(this).attr('href');
  // Et on lance la fonction choix_espece
  choix_espece(url);
});

// Fonction pour choisir l'espèce dont on veut télécharger le formulaire
function choix_espece(url) {
  // // On vide le card-body (pour éviter d'entasser les listes d'espèces successives)
  $('#card-especes').empty();
  // On récupère la liste de especes avec une requete ajax
  $.get({
    url : url
  })
  .done(function(datas) {
    console.log(JSON.parse(datas));
    // On forme l'adresse des icones
    var url_icones = url.replace('api/especes', 'storage/img/icones/');
    // On analyse le fichier renvoyé par la requete ajax
    var especes = JSON.parse(datas);
    // On passe en revue les espèces
    $.each(especes, function(key, value) {
      // Pour chaque espece on crée une balise img
      var espece = '<img id="' + value.abbreviation + '" class="espece-pdf img-65 img-change mx-3 pointeur" src="' + url_icones + value.abbreviation + '.svg" alt="' + value.nom + '" title="'+ value.nom +'">'
      // On ajoute ces balises à la card-body
      $('#card-especes').append(espece);
    });
  })
  .fail(function(erreur) {
    console.log(erreur);
  });
  // On affiche la fenêtre
  $('#choix').fadeIn();
  // Quand on clique sur une icone espece
  $('.card-body').on('click', '.espece-pdf', function() {
    // On reforme une url de téléchargement du pdf en attribuant l'abbreviation de l'espece choisie pour former le nom du fichier pdf
    url_pdf = url.replace('api/especes', 'storage/pdf/formulaire_' + $(this).attr('id') + '.pdf');
    // Et on télécharge ce fichier
    window.open(url_pdf, null);
    $('#choix').fadeOut();

  })
  // Fermeture de la fenêtre en cliquant sur annuler
  $('#choix_annule').on('click', function(){
    $('#choix').fadeOut();
  })
}
