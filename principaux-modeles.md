---
description: Cette page ne décrit que les principaux modèles
---

# Principaux modèles

Il existe quatre groupes de modèles: les utilisateurs, les analyses proposées, les analyses réalisées et les modèles utilitaires.

## **Utilisateurs**

Tous les utilisateurs appartiennent au modèle **User** et ont un **Usertype** qui les rattache aux trois sous-modèles utilisateurs: **Labo**, **Veto**, **Eleveur**. 

## Analyses proposées

Les modèles correspondant aux analyses proposées sont dans le sous-répertoire _App\Models\Analyses_ et sont: **Anaacte**, **Analyse**, **Anaitem** et **Anatypes**. 

## Analyses réalisées et facturation

Tous les modèles correspondant aux analyses proposées sont dans le répertoire App\Models\Productions et sont principalement: **Demande**, **Prelevement**, **Serie**, **Facture** et **Reglement**. 

Les autres modèles relèvent d'un élément plus précis: Concernant les prélèvement certains modèles décrivent ces prélèvements \(**Etat**, **Signe**\). Aux résultats, est attaché le modèle **Commentaire**. 

Pour les factures, on va trouver les modèles **Actes**, **Anaacte\_Facture** et **Modereglement** .

