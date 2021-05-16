// Associé à la vue inputResultatValeur.blade.php incluse dans
// resultatsSaisie.blade.php
// Met à jour la valeur opg d'un parasite quand on saisie la $valeur
// MacMaster
$(".saisie").on('input', function() {
  // On récupère l'id du parasite+prélèvement
  var saisie_id = $(this).attr('id');
  // On explose cet id pour récuperer le couple prelevment-anaitem
  var elements = saisie_id.split('_');
  // On reconstitue l'id du résultat en opg
  var result_id = '#result_' + elements[1];
  // On récupère la valeur saisie
  var valeur = $(this).val();
  // On récupère le multiple (lié à MacMaster)
  var multiple = $(this).attr('mult');
  // On applique ce multiple à l'input en opg
  $(result_id).val(valeur * multiple);
});
