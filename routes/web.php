<?php

use App\Models\Wilaya;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
   if (auth()->user()) {
    auth()->user()->assignRole('admin');
   }
   return view('welcome');
});
//Wilaya
Route::get('wilaya', [App\Http\Controllers\WilayaController::class, 'index']);
Route::get('wilaya/create', [App\Http\Controllers\WilayaController::class, 'create']);
Route::post('wilaya', [App\Http\Controllers\WilayaController::class, 'store']);
Route::get('wilaya/{id}/edit', [App\Http\Controllers\WilayaController::class, 'edit']);
Route::put('wilaya/{id}', [App\Http\Controllers\WilayaController::class, 'update']);
Route::get('wilaya/{id}/destroy', [App\Http\Controllers\WilayaController::class, 'destroy']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//mough
Route::get('mough', [App\Http\Controllers\MoughController::class, 'index']);
Route::get('mough/create', [App\Http\Controllers\MoughController::class, 'create']);
Route::post('mough', [App\Http\Controllers\MoughController::class, 'store']);
Route::get('mough/{id}/edit', [App\Http\Controllers\MoughController::class, 'edit']);
Route::put('mough/{id}', [App\Http\Controllers\MoughController::class, 'update']);
Route::get('mough/{id}/destroy', [App\Http\Controllers\MoughController::class, 'destroy']);


//structsanit
Route::get('sousdirection', [App\Http\Controllers\StructsanitController::class, 'index']);
Route::get('structsanit/create', [App\Http\Controllers\StructsanitController::class, 'create']);
Route::post('sousdirection', [App\Http\Controllers\StructsanitController::class, 'store']);
Route::get('structsanit/{id}/edit', [App\Http\Controllers\StructsanitController::class, 'edit']);
Route::put('structsanit/{id}', [App\Http\Controllers\StructsanitController::class, 'update']);
Route::get('structsanit/{id}/destroy', [App\Http\Controllers\StructsanitController::class, 'destroy']);

//Rapports
Route::get('rapport', [App\Http\Controllers\RapportController::class, 'index']);
Route::get('rapport/create', [App\Http\Controllers\RapportController::class, 'create']);
Route::post('rapport', [App\Http\Controllers\RapportController::class, 'store']);
Route::get('rapport/{id}/edit', [App\Http\Controllers\RapportController::class, 'edit']);
Route::put('rapport/{id}', [App\Http\Controllers\RapportController::class, 'update']);
Route::get('rapport/{id}/destroy', [App\Http\Controllers\RapportController::class, 'destroy']);

//Analyse
Route::get('rapport/analyse', [App\Http\Controllers\RapportController::class, 'analyse'])->name('analyse');


//Actif
Route::get('actif', [App\Http\Controllers\ActifController::class, 'index']);
Route::get('actif/create', [App\Http\Controllers\ActifController::class, 'create']);
Route::post('actif', [App\Http\Controllers\ActifController::class, 'store']);
Route::get('actif/{id}/edit', [App\Http\Controllers\ActifController::class, 'edit']);
Route::put('actif/{id}', [App\Http\Controllers\ActifController::class, 'update']);
Route::get('actif/{id}/destroy', [App\Http\Controllers\ActifController::class, 'destroy']);

//fichedenotification
Route::get('fichedenotification', [App\Http\Controllers\FichedenotficationController::class, 'index']);
Route::get('fichedenotification/create', [App\Http\Controllers\FichedenotficationController::class, 'create']);
Route::post('fichedenotification', [App\Http\Controllers\FichedenotficationController::class, 'store']);
Route::get('fichedenotification/{id}/edit', [App\Http\Controllers\FichedenotficationController::class, 'edit']);
Route::get('fichedenotification/{id}/print', [App\Http\Controllers\FichedenotficationController::class, 'print']);

Route::put('fichedenotification/{id}', [App\Http\Controllers\FichedenotficationController::class, 'update']);
Route::get('fichedenotification/{id}/destroy', [App\Http\Controllers\FichedenotficationController::class, 'destroy']);

//
Route::get('directioncentraleselect', [App\Http\Controllers\DirectioncentralesController::class, 'directioncentraleselect']);
Route::get('selectsousdirection', [App\Http\Controllers\SousdirectionController::class, 'selectsousdirection']);
Route::get('selectmoughpatient', [App\Http\Controllers\MoughController::class, 'selectmoughpatient']);
Route::get('rapport/graphics', [App\Http\Controllers\RapportController::class, 'chartjs']);

//Wilaya du prelevement
Route::get('wilayaprelev', [App\Http\Controllers\WilayaprelevController::class, 'index']);
Route::get('wilayaprelev/create', [App\Http\Controllers\WilayaprelevController::class, 'create']);
Route::post('wilayaprelev', [App\Http\Controllers\WilayaprelevController::class, 'store']);
Route::get('wilayaprelev/{id}/edit', [App\Http\Controllers\WilayaprelevController::class, 'edit']);
Route::put('wilayaprelev/{id}', [App\Http\Controllers\WilayaprelevController::class, 'update']);
Route::get('wilayaprelev/{id}/destroy', [App\Http\Controllers\WilayaprelevController::class, 'destroy']);

//moughataa du prelevement
Route::get('directioncentrale', [App\Http\Controllers\MoughprelevController::class, 'index']);
Route::get('moughprelev/create', [App\Http\Controllers\MoughprelevController::class, 'create']);
Route::post('directioncentrale', [App\Http\Controllers\MoughprelevController::class, 'store']);
Route::get('moughprelev/{id}/edit', [App\Http\Controllers\MoughprelevController::class, 'edit']);
Route::put('moughprelev/{id}', [App\Http\Controllers\MoughprelevController::class, 'update']);
Route::get('moughprelev/{id}/destroy', [App\Http\Controllers\MoughprelevController::class, 'destroy']);

//maladie
Route::get('maladies', [App\Http\Controllers\NommaladieController::class, 'index']);
Route::get('maladies/create', [App\Http\Controllers\NommaladieController::class, 'create']);
Route::post('maladies', [App\Http\Controllers\NommaladieController::class, 'store']);
Route::get('maladies/{id}/edit', [App\Http\Controllers\NommaladieController::class, 'edit']);
Route::put('maladies/{id}', [App\Http\Controllers\NommaladieController::class, 'update']);
Route::get('maladies/{id}/destroy', [App\Http\Controllers\NommaladieController::class, 'destroy']);

//annees
Route::get('annee', [App\Http\Controllers\AnneController::class, 'index']);
Route::get('annee/create', [App\Http\Controllers\AnneController::class, 'create']);
Route::post('annee', [App\Http\Controllers\AnneController::class, 'store']);
Route::get('annee/{id}/edit', [App\Http\Controllers\AnneController::class, 'edit']);
Route::put('annee/{id}', [App\Http\Controllers\AnneController::class, 'update']);
Route::get('annee/{id}/destroy', [App\Http\Controllers\AnneController::class, 'destroy']);
Route::get('search', [App\Http\Controllers\FichedenotficationController::class, 'search'])->name('search');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//niveau de planification
Route::get('niveauplanification', [App\Http\Controllers\NiveaudeplanificationController::class, 'index']);
Route::get('niveauplanification/create', [App\Http\Controllers\NiveaudeplanificationController::class, 'create']);
Route::post('niveauplanification', [App\Http\Controllers\NiveaudeplanificationController::class, 'store']);
Route::get('niveauplanification/{id}/edit', [App\Http\Controllers\NiveaudeplanificationController::class, 'edit']);
Route::put('niveauplanification/{id}', [App\Http\Controllers\NiveaudeplanificationController::class, 'update']);
Route::get('niveauplanification/{id}/destroy', [App\Http\Controllers\NiveaudeplanificationController::class, 'destroy']);
Route::get('search', [App\Http\Controllers\FichedenotficationController::class, 'search'])->name('search');

//SOUS DIRETION
Route::get('directioncentrale', [App\Http\Controllers\DirectioncentralesController::class, 'index']);
Route::get('directioncentrale/create', [App\Http\Controllers\DirectioncentralesController::class, 'create']);
Route::post('directioncentrale', [App\Http\Controllers\DirectioncentralesController::class, 'store']);
Route::get('directioncentrale/{id}/edit', [App\Http\Controllers\DirectioncentralesController::class, 'edit']);
Route::put('directioncentrale/{id}', [App\Http\Controllers\DirectioncentralesController::class, 'update']);
Route::get('directioncentrale/{id}/destroy', [App\Http\Controllers\DirectioncentralesController::class, 'destroy']);


//SOUS DIRECTION
Route::get('sousdirection', [App\Http\Controllers\SousdirectionController::class, 'index']);
Route::get('sousdirection/create', [App\Http\Controllers\SousdirectionController::class, 'create']);
Route::post('sousdirection', [App\Http\Controllers\SousdirectionController::class, 'store']);
Route::get('sousdirection/{id}/edit', [App\Http\Controllers\SousdirectionController::class, 'edit']);
Route::put('sousdirection/{id}', [App\Http\Controllers\SousdirectionController::class, 'update']);
Route::get('sousdirection/{id}/destroy', [App\Http\Controllers\SousdirectionController::class, 'destroy']);

//Service
Route::get('service', [App\Http\Controllers\ServiceController::class, 'index']);
Route::get('service/create', [App\Http\Controllers\ServiceController::class, 'create']);
Route::post('service', [App\Http\Controllers\ServiceController::class, 'store']);
Route::get('service/{id}/edit', [App\Http\Controllers\ServiceController::class, 'edit']);
Route::put('service/{id}', [App\Http\Controllers\ServiceController::class, 'update']);
Route::get('service/{id}/destroy', [App\Http\Controllers\ServiceController::class, 'destroy']);

Route::get('selectallservice', [App\Http\Controllers\ServiceController::class, 'selectallservice']);

//Axe
Route::get('axe', [App\Http\Controllers\AxeController::class, 'index']);
Route::get('axe/create', [App\Http\Controllers\AxeController::class, 'create']);
Route::post('axe', [App\Http\Controllers\AxeController::class, 'store']);
Route::get('axe/{id}/edit', [App\Http\Controllers\AxeController::class, 'edit']);
Route::put('axe/{id}', [App\Http\Controllers\AxeController::class, 'update']);
Route::get('axe/{id}/destroy', [App\Http\Controllers\AxeController::class, 'destroy']);

//Composante
Route::get('composante', [App\Http\Controllers\ComposanteController::class, 'index']);
Route::get('composante/create', [App\Http\Controllers\ComposanteController::class, 'create']);
Route::post('composante', [App\Http\Controllers\ComposanteController::class, 'store']);
Route::get('composante/{id}/edit', [App\Http\Controllers\ComposanteController::class, 'edit']);
Route::put('composante/{id}', [App\Http\Controllers\ComposanteController::class, 'update']);
Route::get('composante/{id}/destroy', [App\Http\Controllers\ComposanteController::class, 'destroy']);

Route::get('selectComposante2', [App\Http\Controllers\ComposanteController::class, 'selectComposante2']);

Route::get('selectComposante3', [App\Http\Controllers\ComposanteController::class, 'selectComposante3']);

Route::get('selectComposantesimple', [App\Http\Controllers\ComposanteController::class, 'selectComposantesimple']);

//SousComposante
Route::get('souscomposante', [App\Http\Controllers\SouscomposanteController::class, 'index']);
Route::get('souscomposante/create', [App\Http\Controllers\SouscomposanteController::class, 'create']);
Route::post('souscomposante', [App\Http\Controllers\SouscomposanteController::class, 'store']);
Route::get('souscomposante/{id}/edit', [App\Http\Controllers\SouscomposanteController::class, 'edit']);
Route::put('souscomposante/{id}', [App\Http\Controllers\SouscomposanteController::class, 'update']);
Route::get('souscomposante/{id}/destroy', [App\Http\Controllers\SouscomposanteController::class, 'destroy']);

Route::get('souscomposantefuntion', [App\Http\Controllers\SouscomposanteController::class, 'souscomposantefuntion']);

Route::get('souscomposantesimple', [App\Http\Controllers\SouscomposanteController::class, 'souscomposantesimple']);

//
//Action/Intervention
Route::get('actionintervention', [App\Http\Controllers\ActioninterventionController::class, 'index']);
Route::get('actionintervention/create', [App\Http\Controllers\ActioninterventionController::class, 'create']);
Route::post('actionintervention', [App\Http\Controllers\ActioninterventionController::class, 'store']);
Route::get('actionintervention/{id}/edit', [App\Http\Controllers\ActioninterventionController::class, 'edit']);
Route::put('actionintervention/{id}', [App\Http\Controllers\ActioninterventionController::class, 'update']);
Route::get('actionintervention/{id}/destroy', [App\Http\Controllers\ActioninterventionController::class, 'destroy']);

Route::get('actioninterventionselect', [App\Http\Controllers\ActioninterventionController::class, 'actioninterventionselect']);
//
Route::get('actioninterventionsimple', [App\Http\Controllers\ActioninterventionController::class, 'actioninterventionsimple']);

//Interventioncle
Route::get('interventioncle', [App\Http\Controllers\InterventioncleController::class, 'index']);
Route::get('interventioncle/create', [App\Http\Controllers\InterventioncleController::class, 'create']);
Route::post('interventioncle', [App\Http\Controllers\InterventioncleController::class, 'store']);
Route::get('interventioncle/{id}/edit', [App\Http\Controllers\InterventioncleController::class, 'edit']);
Route::put('interventioncle/{id}', [App\Http\Controllers\InterventioncleController::class, 'update']);
Route::get('interventioncle/{id}/destroy', [App\Http\Controllers\InterventioncleController::class, 'destroy']);

Route::get('interventioncleselect', [App\Http\Controllers\InterventioncleController::class, 'interventioncleselect']);
Route::get('interventioncleselect2', [App\Http\Controllers\InterventioncleController::class, 'interventioncleselect2']);

//Interventioncle
Route::get('resultatcomposante', [App\Http\Controllers\ResultatcomposanteController::class, 'index']);
Route::get('resultatcomposante/create', [App\Http\Controllers\ResultatcomposanteController::class, 'create']);
Route::post('resultatcomposante', [App\Http\Controllers\ResultatcomposanteController::class, 'store']);
Route::get('resultatcomposante/{id}/edit', [App\Http\Controllers\ResultatcomposanteController::class, 'edit']);
Route::put('resultatcomposante/{id}', [App\Http\Controllers\ResultatcomposanteController::class, 'update']);
Route::get('resultatcomposante/{id}/destroy', [App\Http\Controllers\ResultatcomposanteController::class, 'destroy']);

//Source de Finacement
Route::get('sourcedefina', [App\Http\Controllers\SourcedefinacementController::class, 'index']);
Route::get('sourcedefina/create', [App\Http\Controllers\SourcedefinacementController::class, 'create']);
Route::post('sourcedefina', [App\Http\Controllers\SourcedefinacementController::class, 'store']);
Route::get('sourcedefina/{id}/edit', [App\Http\Controllers\SourcedefinacementController::class, 'edit']);
Route::put('sourcedefina/{id}', [App\Http\Controllers\SourcedefinacementController::class, 'update']);
Route::get('sourcedefina/{id}/destroy', [App\Http\Controllers\SourcedefinacementController::class, 'destroy']);
//Type d'Activité
Route::get('typeactivite', [App\Http\Controllers\TypeactiviteController::class, 'index']);
Route::get('typeactivite/create', [App\Http\Controllers\TypeactiviteController::class, 'create']);
Route::post('typeactivite', [App\Http\Controllers\TypeactiviteController::class, 'store']);
Route::get('typeactivite/{id}/edit', [App\Http\Controllers\TypeactiviteController::class, 'edit']);
Route::put('typeactivite/{id}', [App\Http\Controllers\TypeactiviteController::class, 'update']);
Route::get('typeactivite/{id}/destroy', [App\Http\Controllers\TypeactiviteController::class, 'destroy']);


//Canavas
Route::get('canavas', [App\Http\Controllers\CanavasController::class, 'index']);
Route::get('canavas/create', [App\Http\Controllers\CanavasController::class, 'create']);
Route::post('canavas', [App\Http\Controllers\CanavasController::class, 'store']);
Route::get('canavas/{id}/edit', [App\Http\Controllers\CanavasController::class, 'edit']);
Route::get('canavas/{id}/details', [App\Http\Controllers\CanavasController::class, 'details']);

Route::put('canavas/{id}', [App\Http\Controllers\CanavasController::class, 'update']);
Route::get('canavas/{id}/destroy', [App\Http\Controllers\CanavasController::class, 'destroy']);
//Resultat de Processus
Route::get('resultatproces', [App\Http\Controllers\ResultatproceController::class, 'index']);
Route::get('resultatproces/create', [App\Http\Controllers\ResultatproceController::class, 'create']);
Route::post('resultatproces', [App\Http\Controllers\ResultatproceController::class, 'store']);
Route::get('resultatproces/{id}/edit', [App\Http\Controllers\ResultatproceController::class, 'edit']);
Route::put('resultatproces/{id}', [App\Http\Controllers\ResultatproceController::class, 'update']);
Route::get('resultatproces/{id}/destroy', [App\Http\Controllers\ResultatproceController::class, 'destroy']);

//
Route::get('resultatattendu', [App\Http\Controllers\ResultatattenduController::class, 'index']);
Route::get('resultatattendu/create', [App\Http\Controllers\ResultatattenduController::class, 'create']);
Route::post('resultatattendu', [App\Http\Controllers\ResultatattenduController::class, 'store']);
Route::get('resultatattendu/{id}/edit', [App\Http\Controllers\ResultatattenduController::class, 'edit']);
Route::put('resultatattendu/{id}', [App\Http\Controllers\ResultatattenduController::class, 'update']);
Route::get('resultatattendu/{id}/destroy', [App\Http\Controllers\ResultatattenduController::class, 'destroy']);
Route::get('getResultatattendu', [App\Http\Controllers\ResultatattenduController::class, 'getResultatattendu']);
//


Route::get('resultatcomposanteselect', [App\Http\Controllers\ResultatcomposanteController::class, 'resultatcomposanteselect']);

Route::get('getResultatproces', [App\Http\Controllers\ResultatproceController::class, 'getResultatproces']);

Route::get('selectaxe', [App\Http\Controllers\AxeController::class, 'selectaxe']);

Route::get('souscomposante2', [App\Http\Controllers\SouscomposanteController::class, 'souscomposante2']);

Route::get('actioninterventionselectid7', [App\Http\Controllers\ActioninterventionController::class, 'actioninterventionselectid7']);
