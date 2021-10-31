<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/
//##############################################################################
// MENU ACCUEIL

  Route::get('/essai/{id}', 'Api\DonneesController@observationSelonEspece');
  Route::post('/consentement', 'UserController@consentement')->name('consentement');

  // Route::post('/essai/store', 'Api\DonneesController@options')->name('essai.store');
  Route::post('/essai/store', 'Api\DonneesController@selectAnalyses')->name('essai.store');

  Route::get('/', 'AccueilController@index')->name('accueil');

  Route::get('/accueil', 'AccueilController@index');

  Route::get('veterinaires', ['uses' => 'AccueilController@veterinaires', 'as' => 'veterinaires.accueil']);

  Route::get('eleveurs', ['uses' => 'AccueilController@eleveurs', 'as' => 'eleveurs.accueil']);

  Route::get('cavaliers', ['uses' => 'AccueilController@cavaliers', 'as' => 'cavaliers.accueil']);

  //##############################################################################
  // MENU ANALYSES
  Route::get('analyses/coproscopies', ['uses' => 'Technique\AnalysesController@accueil', 'as' => 'analyses.coproscopies']);

  Route::get('analyses/choisir', ['uses' => 'Technique\AnalysesController@choisir', 'as' => 'analyses.choisir']);

  Route::get('analyses/enpratique', ['uses' => 'Technique\AnalysesController@enpratique', 'as' => 'analyses.enpratique']);

  Route::get('analyses/interpretation', ['uses' => 'Technique\AnalysesController@interpretation', 'as' => 'analyses.interpretation']);

  // ################################################################################
  // MENU PARASITISME

  Route::get('parasitisme', ['uses' => 'Technique\ParasitismeController@accueil', 'as' => 'parasitisme']);

  Route::get('parasitisme/fondamentaux/{id}', ['uses' => 'Technique\ParasitismeController@fondamentaux', 'as' => 'parasitisme.fondamentaux']);

  Route::resource('blog', 'Technique\BlogController')->except('store', 'edit', 'create', 'destroy', 'update');

  //##############################################################################
  // MENU EXPRESS

  Route::get('express/tarifs', ['uses' => 'ExpressController@tarifs', 'as' => 'express.tarifs']);

  Route::get('express/envoiKit', ['uses' => 'ExpressController@envoiKit', 'as' => "express.envoiKit"]);

  Route::post('express/envoiKitStore', ['uses' => 'ExpressController@envoiKitStore', 'as' => "express.envoiKitStore"]);

  Route::get('express/howto', ['uses' => 'ExpressController@howto', 'as' => "express.howto"]);

  //##############################################################################
  // MENU CONTACT INFORMATIONS MENTIONS LEGALES

  Route::get('infos/quisommesnous', ['uses' => 'InfosController@quisommesnous', 'as' => 'infos.quisommesnous']);

  Route::get('infos/contact', ['uses' => 'InfosController@contact', 'as' => 'infos.contact']);

  Route::get('infos/infos-legales', ['uses' => 'InfosController@infoslegales', 'as' => 'infos.infoslegales']);

  Route::get('infos/aide', ['uses' => 'InfosController@aide', 'as' => 'infos.aide']);

  Route::get('infos/rgpd', ['uses' => 'InfosController@rgpd', 'as' => 'infos.rgpd']);
  // Non implémenté
  Route::get('presentation', ['uses' => 'PdfController@presentation', 'as' => 'presentation']);

  Route::get('parasitisme/motclef/{motclef_id}', 'Technique\MotclefController@listeBlogs')->name('motclef.listeblogs');

  //##############################################################################

  Auth::routes(['register' => false]);

  Route::group(['middleware' => 'web', 'middleware' => 'auth', 'middleware' => 'eleveur'], function() {

    Route::get('eleveur', 'EleveurController@index')->name('eleveur');

    Route::get('eleveur/{id}', 'EleveurController@show')->name('eleveur.show');

    Route::post('eleveur', 'EleveurController@update')->name('eleveur.update');

    Route::get('eleveur/demande/{demande_id}', 'EleveurController@demandeShow')->name('eleveur.demandeShow');

    Route::get('resultatPdf/eleveur/{demande_id}', ['uses' => 'PdfController@resultatsPdfEleveur', 'as' => 'resultatspdf.eleveur']);

    Route::get('eleveur/factures', 'EleveurController@facturesIndex')->name('eleveur.facturesIndex');

    Route::get('eleveur/factures/{id}', 'EleveurController@factureShow')->name('eleveur.factureShow');

    Route::get('eleveur/serie/{serie_id}', 'EleveurController@serieShow')->name('eleveur.serieShow');

  });

  // Page perso vétérinaires
  Route::group(['middleware' => 'web', 'middleware' => 'auth', 'middleware' => 'veto'], function() {

    Route::get('veterinaire', 'VeterinaireController@index')->name('veterinaire');

    Route::get('veterinaire/{id}', 'VeterinaireController@show')->name('veterinaire.show');

    Route::post('veterinaire', 'VeterinaireController@update')->name('veterinaire.update');

    Route::get('veterinaire/demande/{demande_id}', 'VeterinaireController@demandeShow')->name('veto.demandeShow');

    Route::get('veterinaire/serie/{serie_id}', 'VeterinaireController@serieShow')->name('veto.serieShow');

    Route::get('resultatPdf/veto/{demande_id}', ['uses' => 'PdfController@resultatsPdfVeto', 'as' => 'resultatspdf.veto']);

  });


  // routes destinées à rediriger l'utilisateur sur des vues différentes en fonction du usertype
  Route::group(['middleware' => 'auth'], function(){

    Route::get('personnel', 'RouteurController@routeurPersonnel')->name('routeurPersonnel');

    Route::get('routeur/serie/{serie_id}', 'RouteurController@routeurSerie')->name('routeurSerie');

    Route::get('routeur/demande/{demande_id}', 'RouteurController@routeurDemande')->name('routeurDemande');

    Route::get('deletemoi/{id}', 'RouteurController@deletemoi')->name('routeur.deletemoi');

    Route::get('jemedelete/{id}', 'RouteurController@jemedelete')->name('routeur.jemedelete');

    Route::get('facturePdf/{id}', ['uses' => 'RouteurController@routeurFacturePdf', 'as' => 'routeurFacturePdf']);

    Route::get('resultatsPdf/{id}', ['uses' => 'RouteurController@routeurResultatsPdf', 'as' => 'routeurResultatsPdf']);

    Route::get('exports/choix', 'ExportsController@choix')->name('exports.choix');

    Route::get('exports/demande/{demande_id}', 'ExportsController@demande')->name('exports.demande');

    Route::get('exports/anaitemsFromEspece/{especes}', 'ExportsController@anaitemsFromEspece')->name('exports.anaitemsFromEspece');

    Route::post('exports/comptage','ExportsController@comptage' )->name('exports.comptage');

    Route::post('exports/export','ExportsController@export' )->name('exports.export');

    Route::get('exports/resultats', 'ExportsController@resultats')->name('exports.resultat');

  });

  // ROUTES INTERNES AU LABORATOIRE
  Route::group(['middleware' => 'auth', 'middleware' => 'labo', 'prefix' => "laboratoire"], function(){

    Route::get('', 'Labo\DemandeController@index')->name('laboratoire');

    route::resource('analyses', 'Analyses\AnalyseController');

    route::resource('anaactes', 'Analyses\AnaacteController');

    route::resource('anatypes', 'Analyses\AnatypeController');

    route::resource('anaitems', 'Analyses\AnaitemController');

    route::resource('unites', 'Analyses\UniteController');

    route::get('demandes/modif/{demande_id}', 'Labo\DemandeController@modif')->name('demandes.modif');

    route::resource('demandes', 'Labo\DemandeController');

    // Crée des nouveaux prélèvements soit au moment de la saisie de la demande soit après être passé par definitNbPrelev soit en ajoutant un nouveau prélèvement
    // Il faut redéfinir la fonction create car la création d'un prélèvement nécessite sytématiquement l'id de la demande correspondante
    route::get('prelevement/create/{demande_id}', 'Labo\PrelevementController@create')->name('prelevement.create');

    route::post('prelevement', 'Labo\PrelevementController@store')->name('prelevement.store');

    route::get('prelevement/edit/{prelevement_id}', 'Labo\PrelevementController@edit')->name('prelevement.edit');

    route::put('prelevement/edit/{prelevement_id}', 'Labo\PrelevementController@update')->name('prelevement.update');
    // Permet de définir le nombre de prélèvements pour une demande déjà saisie mais avec 0 prélèvements
    route::post('prelevement/definitNbPrelev', 'Labo\PrelevementController@definitNbPrelev')->name('prelevement.definitNbPrelev');
      // Route pour demander confirmation de la suppression d'un prélèvement (j'ai eu la flemme de faire en js)
    route::get('prelevement/suppr/{prelevement_id}', 'Labo\PrelevementController@prelevdel')->name('prelevement.prelevdel');

    route::delete('prelevement/delete/{prelevement_id}', 'Labo\PrelevementController@destroy')->name('prelevement.destroy');

    route::get('demandes/{demande_id}/paillasse', 'PdfController@fichePaillasse')->name('paillasse');

    route::get('signer/{demande_id}', 'Labo\DemandeController@signer')->name('demande.signer');

    route::get('envoyer/{destinataire_id}/{demande_id}', 'Labo\EnvoisController@envoyerResultats')->name('mail.envoyerResultats');

    route::get('envoyer_facture/{facture_id}', 'Labo\EnvoisController@envoyerFacture')->name('mail.envoyerFacture');

    route::get('envoyer_tous/{destinataire_id}/{demande_id}', 'Labo\EnvoisController@envoyerResultatsTous')->name('mail.envoyerResultatsTous');

    Route::resource('user', 'UserController');

    Route::resource('laboAdmin', 'Labo\LaboAdminController');

    route::get('vetoAdmin/createOnDemande', 'Labo\VetoAdminController@createOnDemande')->name('vetoAdmin.createOnDemande');

    Route::resource('vetoAdmin', 'Labo\VetoAdminController');

    Route::resource('eleveurAdmin', 'Labo\EleveurAdminController');

    Route::resource('troupeau', 'TroupeauController');

    Route::resource('animal', 'AnimalController');

    Route::resource('espece', 'EspeceController');

    Route:: get('melange/create/{troupeau_id}', 'Labo\MelangeController@createAvecTroupeau')->name('melange.createAvecTroupeau');

    Route:: get('melange/choix_troupeau', 'Labo\MelangeController@choix_troupeau')->name('melange.choix_troupeau');

    Route:: get('melange/prelevements', 'Labo\MelangeController@prelevements_melanges')->name('melange.prelevements_melanges');

    Route::resource('melange', 'Labo\MelangeController');

    Route::resource('typeprod', 'TypeprodController');

    Route::resource('serie', 'Labo\SerieController');

    Route::get('usertypes', 'UsertypeController@liste')->name('usertypeJson');

    Route::get('resultats/cloture/{demande_id}', 'Labo\ResultatController@cloture')->name('resultats.cloture');

    Route::get('resultats/rouvrir/{demande_id}', 'Labo\ResultatController@rouvrir')->name('resultats.rouvrir');

    Route::get('pythie/{commentaire_id}', 'Labo\CommentaireController@pythie')->name('commentaire.pythie');

    Route::resource('commentaire', 'Labo\CommentaireController');

    Route::resource('resultats', 'Labo\ResultatController');

    Route::get('resultatPdf/labo/{demande_id}', ['uses' => 'PdfController@resultatsPdfLabo', 'as' => 'resultatspdf.labo']);

    Route::get('factures/create/{destinataire_id}', 'Labo\FactureController@createFromUser')->name('factures.createFromUser');

    Route::get('factures/create/{destinataire_id}/{demande_id}', 'Labo\FactureController@createDemandeFromUser')->name('factures.createDemandeFromUser');

    Route::get('factures/etablir', 'Labo\FactureController@etablir')->name('factures.etablir');

    // Route::post('facture/paiement', 'Labo\FactureController@paiement')->name('facture.paiement');

    Route::resource('factures', 'Labo\FactureController');

    Route::resource('reglement', 'Labo\ReglementController');

    Route::resource('acte', 'Labo\ActeController');

    Route::resource('blog', 'Technique\BlogController')->except('show', 'index');

    Route::get('traductions', 'TraductionsController@index')->name('traductions');

    Route::get('icones/suppression', 'IconesController@suppr')->name('icones.suppr');

    Route::resource('icones', 'IconesController');

    Route::get('documentation', 'DocController@index')->name('doc.index');
    //###########################
    // GESTION DE L'ALGORITME DE CHOIX
    Route::get('algorithme', 'Analyses\Algorithme\BaseController@index')->name('algorithme.index');

    Route::resource('algorithme/observations', 'Analyses\Algorithme\ObservationsController');
    // Enregistrement de l'association d'une observation avec un age ou une espece: INUTILE ?
    Route::post('algorithme/animal/observations', 'Analyses\Algorithme\ObservationsController@animalObservationStore')->name('animalObservationStore');
    // Liste des observations associées à un age
    Route::get('algorithme/observations/age/{age_id}', 'Analyses\Algorithme\ObservationsController@age')->name('observations.age');
    // Liste des observations associées à une espece
    Route::get('algorithme/observations/espece/{espece_id}', 'Analyses\Algorithme\ObservationsController@espece')->name('observations.espece');
    // Modification de l'association entre une observation et un age
    Route::get('algorithme/observations/age/{age_id}/{observation_id}', 'Analyses\Algorithme\ObservationsController@ageObservation');
    // Modification de l'association entre une observation et une espece
    Route::get('algorithme/observations/espece/{espece_id}/{observation_id}', 'Analyses\Algorithme\ObservationsController@especeObservation');
    // Modification de l'association d'une observation avec des especes ou des ages
    Route::get('algorithme/observation/animal/{observation_id}', 'Analyses\Algorithme\ObservationsController@editAnimal')->name('observation.editAnimal');
    // Modification de l'association d'une observation avec des options
    Route::get('algorithme/observation/option/{observation_id}', 'Analyses\Algorithme\ObservationsController@editOption')->name('observation.editOption');
    // Modification de l'association d'une observation avec des anatypes
    Route::get('algorithme/observation/anatype/{observation_id}', 'Analyses\Algorithme\ObservationsController@editAnatype')->name('observation.editAnatype');
    // Gestion des options (aka explications)
    Route::resource('algorithme/options',  'Analyses\Algorithme\OptionsController');
    // Renvoie à la liste des anatypes associés à un age
    Route::get('algorithme/analyses/age/{age_id}', 'Analyses\AnatypeController@age')->name('anatypes.age');
    // Renvoie à la liste des anatypes associés à une espece
    Route::get('algorithme/analyses/espece/{espece_id}', 'Analyses\AnatypeController@espece')->name('anatypes.espece');

    Route::put('algorithme/analyses/animal/{id}', 'Analyses\AnatypeController@animalUpdate')->name('anatypes.animalUpdate');

    Route::resource('algorithme/options', 'Analyses\Algorithme\OptionsController');

    Route::resource('algorithme/agesAlgo', 'Analyses\Algorithme\AgesController');

    Route::resource('algorithme/especesAlgo', 'Analyses\Algorithme\EspecesAlgoController');

    Route::resource('algorithme/exclusions', 'Analyses\Algorithme\ExclusionsController');

    Route::delete('algorithme/exclusion/destroyObservation/{observation_id}', 'Analyses\Algorithme\ExclusionsController@destroyObservation')->name('exclusions.destroyObservation');

    Route::delete('algorithme/exclusion/destroyEspece/{observation_id}/{espece_id}', 'Analyses\Algorithme\ExclusionsController@destroyEspece')->name('exclusions.destroyEspece');

    Route::delete('algorithme/exclusion/destroyAge/{observation_id}/{age_id}', 'Analyses\Algorithme\ExclusionsController@destroyAge')->name('exclusions.destroyAge');

    Route::resource('algorithme/exclusionsAnaacte', 'Analyses\Algorithme\ExclusionsAnaacteController');

    Route::delete('algorithme/exclusions/destroyObservation/{observation_id}', 'Analyses\Algorithme\ExclusionsAnaacteController@destroyObservation')->name('exclusionsAnaacte.destroyObservation');

    Route::delete('algorithme/exclusions/destroyEspece/{observation_id}/{espece_id}', 'Analyses\Algorithme\ExclusionsAnaacteController@destroyEspece')->name('exclusionsAnaacte.destroyEspece');

    Route::delete('algorithme/exclusions/destroyAge/{observation_id}/{age_id}', 'Analyses\Algorithme\ExclusionsAnaacteController@destroyAge')->name('exclusionsAnaacte.destroyAge');

  });

// });
