<?php
/**
 * Documentation générale de parasitlab.org
 *
 * ParasitLab est un site pour le laboratoire de parasitologie du FiBL France à Eurre
 *
 * Le site est réalisé avec les framework php _Laravel_, css _Bootstrap_, javascript _JQuery_
 *
 * __Architecture globale du site__
 *
 * Le site présente trois niveaux d'accès:
 * + __Accès public__: Sans authentification, c'est la vitrine du laboratoire accessible par le menu extranet
 * + __Pages perso__: Ce sont des pages perso pour les éleveurs et les vétérinaires qui ont demandé des analyses
 * au laboratoire. Leur compte est créé au premier contact (demande de kit, demande d'analyse) par les administrateurs
 * du site. Un mail est envoyé avec login et mot de passe.
 * + __Laboratoire__: C'est le niveau d'accès le plus profond, réservé aux personnel du FiBL. Ce niveau permet
 * deux types d'actions:
 *
 *  1. la gestion des analyses: saisie des demandes, des résultats, des factures et envoi par mail de tout ça.
 *
 *  2. l'administration du site: ajout d'icones, de parasites, d'analyses proposées, modif des prix, de la tva, etc.
 *
 * <h4>Principaux modèles</h4>
 *
 * Il existe quatre groupes de modèles: les utilisateurs, les analyses proposées,
 * les analyses réalisées et les modèles utilitaires.
 *
 * <h5>Utilisateurs</h5>
 *
 * Tous les utilisateurs appartiennent au modèle __User__ et ont un __Usertype__
 * qui les rattache aux trois sous-modèles utilisateurs: __Labo__, __Veto__, __Eleveur__.
 *
 * </h5>Analyses proposées</h5>
 *
 * Les modèles correspondant aux analyses proposées sont dans le sous-répertoire
 * _App\Models\Analyses_ et sont: __Anaacte__, __Analyse__, __Anaitem__ et __Anatypes__.
 *
 * </h5>Analyses réalisées</h5>
 *
 * Tous les modèles correspondant aux analyses proposées sont dans le répertoire
 * _App\Models\Productions_et sont principalement: __Demande__, __Prelevement__,
 * __Serie__, __Facture__ et __Reglement__. Les autres modèles relèvent d'un élément
 * plus précis: Concernant les prélèvement certains modèles décrivent ces prélèvements
 * (__Etat__, __Signe__). Aux résultats, est attaché le modèle __Commentaire__.
 * Pour les factures, on va trouver les modèles __Actes__, Anaacte_Facture et
 * __Modereglement__ .
 *
 * @see \App\User
 *
 * @package ParasitLab
 * @author Michel BOUY
 */
class Doc
{
}
