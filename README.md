# Introduction

## **Architecture globale du site**

ParasitLab est un site pour le laboratoire de parasitologie du FiBL France à Eurre

{% hint style="info" %}
Le site est réalisé avec les framework php _Laravel_, css _Bootstrap_, javascript _JQuery_
{% endhint %}

Le site présente trois niveaux d'accès:

*  **Accès public**: Sans authentification, c'est la vitrine du laboratoire accessible par le menu extranet
*  **Pages perso**: Ce sont des pages perso pour les éleveurs et les vétérinaires qui ont demandé des analyses au laboratoire. Leur compte est créé au premier contact \(demande de kit, demande d'analyse\) par les administrateurs du site. Un mail est envoyé avec login et mot de passe.
*  **Laboratoire**: C'est le niveau d'accès le plus profond, réservé aux personnel du FiBL. Ce niveau permet deux types d'actions:
  * **la gestion des analyses**: saisie des demandes, des résultats, des factures et envoi par mail de tout ça.
  * **l'administration du site**: ajout d’icônes, de parasites, d'analyses proposées, modif des prix, de la tva, etc.

Le site pour le laboratoire du FiBL

