# Globalement

## Les op (gds) sont des utilisateurs de type vétérinaire

* Cela permet de les inclure comme un user qui peut avoir accès aux analyses de certains éleveurs.

# Choix possibles

## Ajout d'un champs supplémentaire pour les demandes d'analyse

1. Apparition d'un champs __*toOpUser*__ dans les colones de la table __demande__
2. Apparition d'un champs __*isOP*__ dans les colonnes de la table __vétérinaire__

### Raison

* Cela permet de les différencier des vétérinaires car cela implique un champs spécifique pour les afficher.

### Conséquences

1. Sur la basse de données

* Dans la table vetos il faut rajouter un champs booléen __isOP__ qui sera vrai pour les gds
  et faux pour tous les autres vétos.

2. Sur le code
   * Faire apparaître les gds dans le tableau index des analyses ?
   * Dans la création d'une demande d'analyse, il faut rajouter un champs liste pour les gds
   * Dans le détail de l'analyse, il faut rajouter une ligne pour le gds avec envoi mail et tout et tout

### Avantages

1. Peu de modification du code plutôt des __ajouts__ donc moins de risque de bug

### Inconvénients

1. Cela ne permet pas d'ajouter plusieurs vétos à la demande d'un éleveur, ni même plusieurs op

## Modification de tovetouser pour permettre un affichage multiple

l'user vétérinaire a une relation *Many-toMany* avec les demandes d'analyse

## Conséquences

1. Sur la base de données

* création d'une table pivot __eleveur-veto__
* suppression de tovetouser dans la table __demandes__

2. Sur le code

* changement de le relation *One-to-Many*

## Avantages
