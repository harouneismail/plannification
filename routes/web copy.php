<?php

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
    $long = strtotime('2020-03-27');
    $hasgoing = idate('y', $long);
    return view('welcome', compact('long'));
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
Route::get('moughprelevselect', [App\Http\Controllers\MoughprelevController::class, 'moughprelevselect']);
Route::get('selectstructsanit', [App\Http\Controllers\StructsanitController::class, 'selectstructsanit']);
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

//lots
Route::get('lot', [App\Http\Controllers\LotController::class, 'index']);
Route::get('lot/create', [App\Http\Controllers\LotController::class, 'create']);
Route::post('lot', [App\Http\Controllers\LotController::class, 'store']);
Route::get('lot/{id}/edit', [App\Http\Controllers\LotController::class, 'edit']);
Route::put('lot/{id}', [App\Http\Controllers\LotController::class, 'update']);
Route::get('lot/{id}/destroy', [App\Http\Controllers\LotController::class, 'destroy']);
Route::get('search', [App\Http\Controllers\FichedenotficationController::class, 'search'])->name('search');
