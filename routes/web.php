<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OfferController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
    Route::get('/', function () {
    return view('welcome');
});


Route::group(
[
	'prefix' => LaravelLocalization::setLocale(),
	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],function () {

    Route::get('show-offer' , [OfferController::class , 'show']);
    Route::post('creat-offer' , [OfferController::class , 'creat'])->name('creat.offer');
    Route::get('delete-offer/{id}' , [OfferController::class , 'deleteOffer'])->name('delete.offer');
    Route::get('edite-offer/{id}' , [OfferController::class , 'editOffer'])->name('edite.offer');
    Route::post('update-offer/{id}' , [OfferController::class , 'updateOffer'])->name('update.offer');
});
