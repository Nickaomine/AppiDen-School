<?php


use App\Http\Controllers\ClassesController;
use App\Http\Controllers\DepartementController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Auth.login');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*Petite/Grande Section*/
Route::get('petitesection',[ClassesController::class,'petitesection']);
Route::get('filtrepetite', [ClassesController::class, 'filtrepetites']);
Route::get('deletepetitesection/{petiteID}', [ClassesController::class,'deletepetites']);
Route::post('insertpetite',[ClassesController::class,'insertpetites']);
Route::post('updatepetite',[ClassesController::class,'updatepetites']);

/*Grande Section*/
Route::get('grandesection',[ClassesController::class,'grandesection']);
Route::get('filtregrande', [ClassesController::class, 'filtregrandes']);
Route::get('deletegrande/{grandeID}', [ClassesController::class,'deletegrandes']);
Route::post('insertgrande',[ClassesController::class,'insertgrandes']);
Route::post('updategrande',[ClassesController::class,'updategrandes']);

/*Sil*/
Route::get('sil',[ClassesController::class,'sil']);
Route::get('filtresil', [ClassesController::class, 'filtresil']);
Route::get('deletesil/{silID}', [ClassesController::class,'deletesil']);
Route::post('insertsil',[ClassesController::class,'insertsil']);
Route::post('updatesil',[ClassesController::class,'updatesil']);

/*CP*/
Route::get('cp',[ClassesController::class,'cp']);
Route::get('filtrecp', [ClassesController::class, 'filtrecp']);
Route::get('deletecp/{cpID}', [ClassesController::class,'deletecp']);
Route::post('insertcp',[ClassesController::class,'insertcp']);
Route::post('updatecp',[ClassesController::class,'updatecp']);

/*Ce1*/
Route::get('ce1',[ClassesController::class,'ce1']);
Route::get('filtrece1', [ClassesController::class, 'filtrece1']);
Route::get('deletece1/{ce1ID}', [ClassesController::class,'deletece1']);
Route::post('insertce1',[ClassesController::class,'insertce1']);
Route::post('updatece1',[ClassesController::class,'updatece1']);

/*ce2*/
Route::get('ce2',[ClassesController::class,'ce2']);
Route::get('filtrece2', [ClassesController::class, 'filtrece2']);
Route::get('deletece2/{ce2ID}', [ClassesController::class,'deletece2']);
Route::post('insertce2',[ClassesController::class,'insertce2']);
Route::post('updatece2',[ClassesController::class,'updatece2']);

/*cm1*/
Route::get('cm1',[ClassesController::class,'cm1']);
Route::get('filtrecm1', [ClassesController::class, 'filtrecm1']);
Route::get('deletecm1/{cm1ID}', [ClassesController::class,'deletecm1']);
Route::post('insertcm1',[ClassesController::class,'insertcm1']);
Route::post('updatecm1',[ClassesController::class,'updatecm1']);

/*cm2*/
Route::get('cm2',[ClassesController::class,'cm2']);
Route::get('filtrecm2', [ClassesController::class, 'filtrecm2']);
Route::get('deletecm2/{cm2ID}', [ClassesController::class,'deletecm2']);
Route::post('insertcm2',[ClassesController::class,'insertcm2']);
Route::post('updatecm2',[ClassesController::class,'updatecm2']);

/*departement*/
Route::get('departement',[DepartementController::class,'departement']);
Route::get('filtrecm2', [ClassesController::class, 'filtrecm2']);
Route::get('deletecm2/{cm2ID}', [ClassesController::class,'deletecm2']);
Route::post('insertcm2',[ClassesController::class,'insertcm2']);
Route::post('updatecm2',[ClassesController::class,'updatecm2']);



